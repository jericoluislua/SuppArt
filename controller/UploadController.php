<?php

require_once '../repository/PostRepository.php';
class UploadController
{
    public function index()
    {
        $view = new View('post_upload');
        $view->title = 'Post an image';
        $view->heading = '';
        $view->subtitle ="Post an image";
        $view->display();
    }
    public function doUpload(){
            if (isset($_POST['send'])) {
                $destination = "/SuppArt/uploads/";
                $picture_array = $_FILES['picture'];
                $picturelink = $destination . '/';
                //saves path extension in $ext
                $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                //protects from attackers
                $title = htmlspecialchars($_POST['title']);
                $date = date("Y-m-d");
                $private = isset($_POST['private']);
                //saves current user in
                $creator = $_SESSION['LoggedIn'];
                $postRepository = new PostRepository();
                if ($ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "svg"|| $ext == "JPG"|| $ext == "GIF" || $ext == "SVG") {
                    //call to upload
                    $insertId = $postRepository->upload($picturelink, $title, $date, $creator, $private);
                    //moves image to folder only if sqlquerry successful
                    if ($insertId > 0) {
                        $dst = $picturelink . $insertId . '.' . $ext;
                        if (move_uploaded_file($picture_array['tmp_name'], $dst)) {
                            //updates new imagepath in database
                            if ($postRepository->update_picture($insertId, $dst)) {
                                if ($private == 'true') {
                                    Message::set("upload", "Upload successful! Go to <a href=\"post/privatePost\">Private Post</a>");
                                } else {
                                    Message::set("upload", "Upload successful! Go to <a href=\"post/\">Post</a>");
                                }

                                header('Location: /');
                            }
                        }
                    }
                } else {
                    Message::set("upload", "You can only upload pictures");
                }
            }
        }
}