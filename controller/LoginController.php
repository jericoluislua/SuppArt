<?php

require_once '../repository/UserRepository.php';

/**
 * Created by PhpStorm.
 * User: bluaje
 * Date: 19.04.2018
 * Time: 13:10
 */
class LoginController
{
    public function index(){

        $view = new View('user_login');
        $view->title = 'Login';
        $view->subtitle = 'Login';
        $view->heading = '';
        $view->display();
    }

    public function doLogin()
    {
        if(isset($_POST['loginsend'])) {

            $loginemail = $_POST['loginemail'];
            $loginpassword  = $_POST['loginpassword'];

            //??
            if(!empty($_POST['loginpassword']) & !empty($_POST['loginemail'])){
                $userRepository = new UserRepository();
                $isLoggedIn = $userRepository->login($loginemail, $loginpassword);
                if(isset($isLoggedIn)){
                    $_SESSION['LoggedIn'] = $loginemail;
                    echo "Session created.";
                    session_start();
                    if (isset($_SESSION['LoggedIn'])){
                        die('here');

                        echo "Session has started.";
                        echo $_SESSION['LoggedIn'];
                    }
                }else{
                    //echo "Invalid Username or Password.";
                }
            }


        }

    }
}