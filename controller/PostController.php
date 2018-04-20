<?php

/**
 * Created by PhpStorm.
 * User: bchand
 * Date: 20.04.2018
 * Time: 11:07
 */

require_once '../repository/PostRepository.php';
class PostController
{
    public function index(){
        $postRepository = new PostRepository();
        $view = new View('post_index');
        $view->title = 'Posts';
        $view->heading = '';
        $view->subtitle = 'All Posts';
        $view->entry = $postRepository->readAllSortedByNewest();
        $view->display();
    }
    public function privatePost()
    {
        $postRepository = new PostRepository();
        $view = new View('post_index');
        $view->title = 'Your Submission';
        $view->heading = '';
        $view->subtitle = 'Your Posts';
        $view->entry = $postRepository->readAllPrivate();
        $view->display();
    }
    //Blog create view

    public function create()
    {
        if (Security::isAuthenticated()) {
            $this->doCreate();
            $view = new View('post_create');
            $view->title = 'Submit Image';
            $view->heading = 'Submit Image';
            $view->display();
        } else {
            echo 'You are not logged in!';
        }
    }
    //Prepare image upload -> sends form data to BlogRepository

    //delete image function
    public function delete()
    {
        //can only delete if user is logged in and image id is set.
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $postId = $_GET['id'];
            $postRepository = new PostRepository();
            //call to readById
            $post = $postRepository->readById($postId);
            //only creator and admin can delete image
            if (($post->creator == Security::getUser()->email) || Security::isAdmin()) {
                //call to get_picture_path
                $path = $postRepository->get_picture_path($postId);
                if ($postRepository->deleteById($postId)) {
                    unlink($path);
                }
            }
        }
        // redirects back to last page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    //change title view
    public function changeTitle()
    {
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $this->doChangeTitle();
            $view = new View('post_change');
            $view->id = $_GET['id'];
            $view->title = 'Change title';
            $view->heading = 'Change title';
            $view->display();
        }else{
            echo'you are not logged in!';
        }
    }
    //change title function
    private function doChangeTitle()
    {
        if (isset($_POST['send'])) {
            $newtitle = htmlspecialchars($_POST['title']);
            $postRepository = new PostRepository();
            $post = $postRepository->readById($_GET['id']);
            if (($post->creator == Security::getUser()->email) || Security::isAdmin()) {
                //call to updateTitle
                if ($postRepository->updateTitle($post->id, $newtitle)) {
                    Message::set("update", "update Successful! go to <a href=\"/post/privatePost\">Private Post</a>");
                }else{
                    Message::set("update", "update failed, please try again or ask the administrator");
                }
            }
        }
    }


}
