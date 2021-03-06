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
        $view->subtitle = 'Logged out';
        $view->display();
    }

    public function doLogout(){
        //session_start();
        if(isset($_SESSION['LoggedIn'])){
            session_destroy();
            session_unset($_SESSION['LoggedIn']);
            $loggedOut = true;
            header('Location: /?loggedOut=true');

        }
    }
}