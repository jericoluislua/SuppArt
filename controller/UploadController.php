<?php

class UploadController
{
    public function index()
    {
        $view = new View('user_upload');
        $view->title = 'Upload Your Picture';
        $view->subtitle = 'Post';
        $view->heading = '';
        $view->display();
    }

}