<?php

/**
 * Created by PhpStorm.
 * User: laffan
 * Date: 4/17/2018
 * Time: 10:00 PM
 */
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