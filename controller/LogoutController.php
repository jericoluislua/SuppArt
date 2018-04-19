<?php

/**
 * Created by PhpStorm.
 * User: bchand
 * Date: 18.04.2018
 * Time: 11:33
 */
class LogoutController
{
    public function index(){
        $view = new View('user_index');
        $view->title = 'Logged out';
        $view->heading = '';
        $view->subtitle = 'logged out';
        $view->display();
    }

    public function doLogout(){

    }
}