<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function login()
    {
        $view = new View('user/login');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Log dich ein';
        $view->display();
    }

    public function doLogin()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $userRepository = new UserRepository();
        $user = $userRepository->login($email, $password);

        if (isset($user)) {
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION['user'] = $user;
            header('Location: /');
            exit();
        }

        header('Location: /user/login?login=false');
        exit();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($username, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        //$userRepository = new UserRepository();
        //$userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
