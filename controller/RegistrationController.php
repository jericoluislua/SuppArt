<?php

class RegistrationController
{

    public function index(){
        $view = new View('user_create');
        $view->title = 'Get started on helping your fellow artists!';
        $view->heading = '';
        $view->subtitle = 'Registration';
        $view->display();
    }
}