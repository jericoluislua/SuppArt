<?php
//import BlogRepository and CommentRepository
require_once '../repository/PostRepository.php';
require_once '../repository/CommentRepository.php';
class CommentController
{
    //Commentview
    public function commentView($post, $commentlist){
        $view = new View('blog_comments');
        $view->title = 'Comments';
        $view->heading = '';
        $view->post = $post;
        $view->comments = $commentlist;
        $view->display();
    }
    //prepares data -> sends data to CommentRepository
    public function doCreate(){
        //only logged in users can write comments
        if(Security::isAuthenticated()){
            if($_POST['send']){
                $userid = Security::getUser()->id;
                $postid = $_GET['blogid'];
                //protects from attackers
                $comment = htmlspecialchars($_POST['commentarea']);
                $time = date("Y-m-d");
                $commentRepository = new CommentRepository();
                //call to createComment
                $commentRepository->createComment($userid, $postid, $comment, $time);
                header('Location: /comment/showComments?id='.$postid);
            }
        }else{
            echo'Only logged in users can write comments';
        }
    }
    //requests all comments of an entry from CommentRepository
    public function showComments(){
        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
            $postRepository = new PostRepository();
            //call to readById
            $post = $postRepository->readById($postId);
            $commentRepository = new CommentRepository();
            $commentlist = $commentRepository->getComments($postId);
            $this->commentView($post, $commentlist);
        }
    }
    //delete comment function -> sends delete request to CommentRepository
    public function commentDelete(){
        if (Security::isAuthenticated()) {
            $commentid = $_GET['id'];
            $commentRepository = new CommentRepository();
            //call to readById
            $comment = $commentRepository->readById($commentid);
            if ($comment->id == Security::getUserId()) {
                if($commentRepository->deleteById($commentid)){
                    header('Location: /comment/showComments?id='.$comment->postid);
                }
            }
        }
    }
}