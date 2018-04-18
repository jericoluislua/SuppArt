<?php

/**
 * Created by PhpStorm.
 * User: bluaje
 * Date: 18.04.2018
 * Time: 11:27
 */
class LogoutController
{

    public function index()
    {

        $view = new View('user_index');
        $view->title = 'Login';
        $view->heading = '';
        $view->subtitle = 'Login';
        $view->display();
    }
}