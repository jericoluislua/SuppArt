<?php

/**
 * Created by PhpStorm.
 * User: laffan
 * Date: 4/17/2018
 * Time: 10:37 PM
 */
class LoginController
{
    public function index()
    {
        $view = new View('user_index');
        $view->title = 'Login';
        $view->heading = '';
        $view->subtitle = 'Login';
        $view->display();
    }
    public function login(){

    }
}