<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'Login';
        $view->subtitle = 'Login';
        $view->heading = '';
        $view->users = $userRepository->readAll(1);
        $view->display();
    }
    public function doLogin()
    {
        if($_POST['loginsend']) {

            $loginemail = $_POST['loginemail'];
            $loginpassword  = $_POST['loginpassword'];

            if(!empty($_POST['loginpassword']) && !empty($_POST['loginemail'])){
                $userRepository = new UserRepository();
                $userRepository->login($loginemail, $loginpassword);
            }


        }
        header('Location: /user');
    }
    public function doCreate()
    {
        if ($_POST['send']) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password  = $_POST['password'];
            $admin = $_POST['admin'];
            $password = 'no_password';

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password, $admin);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
