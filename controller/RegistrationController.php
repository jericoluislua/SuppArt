<?php

require_once '../repository/UserRepository.php';

class RegistrationController
{

    public function index(){

        $view = new View('user_create');
        $view->title = 'Get started on helping your fellow artists!';
        $view->subtitle = 'Registration';
        $view->heading = '';
        $view->display();
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

        header('Location: /user/');

    }
}