<?php

class UploadController
{
    public function index()
    {
        $postRepository = new PostRepository();
        $view = new View('post_upload');
        $view->title = 'Post an image';
        $view->heading = '';
        $view->subtitle ="Post an image";
        $view->entry = $postRepository->readAllSortedByNewest();
        $view->display();
    }
    public function changeTitle()
    {
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $this->doChangeTitle();
            $view = new View('blog_change');
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
            $blogRepository = new PostRepository();
            $blog = $blogRepository->readById($_GET['id']);
            if (($blog->creator == Security::getUser()->email) || Security::isAdmin()) {
                //call to updateTitle
                if ($blogRepository->updateTitle($blog->id, $newtitle)) {
                    echo "'update', 'update Successful! go to <a href='/post/privatePage'>Private post</a>')";
                }else{
                    Message::set("update", "update failed, please try again or ask the administrator");
                }
            }
        }
    }
    public function upload(){
        $target_dir = "/SuppArt/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo " Your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    public function delete()
    {
        //can only delete if user is logged in and image id is set.
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $postId = $_GET['id'];
            $postRepository = new PostRepository();
            //call to readById
            $blog = $postRepository->readById($postId);
            //only creator and admin can delete image
            if (($blog->creator == Security::getUser()->email) || Security::isAdmin()) {
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
}