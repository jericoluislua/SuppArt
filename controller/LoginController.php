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
    public function index()
    {
        if(isset($_POST['loginsend']))
        {
            $loginemail = $_POST['loginemail'];
            $loginpassword  = $_POST['loginpassword'];

            //??
            if(!empty($_POST['loginpassword']) & !empty($_POST['loginemail']))
            {
                $userRepository = new UserRepository();
                $valid = $userRepository->login($loginemail, $loginpassword);

                if(!empty($valid))
                {
                    $_SESSION['LoggedIn'] = $loginemail;
                    header('Location: /');
                }
                else
                {
                    echo "Invalid username or password.";
                }

            }


        }


        $view = new View('user_login');
        $view->title = 'Login';
        $view->subtitle = 'Login';
        $view->heading = '';
        $view->display();

    }
}



/*if (!isset($_SESSION['LoggedIn']))
{
    //var_dump($valid);

    echo "Session not yet started.";
}else
{
    //var_dump($valid);

    echo "Session already starting. <br/>";
}*/