<?php

require_once 'App/Model/User.php';
class LoginController extends Controller
{

    public function index()
    {
        TwigController::render('Login.twig');
    }

    public function login()
    {
        if ($this->isLogged()) {
            echo 'Ya estas logueado';
            die;
        }

        if (!validatePost(['user', 'pass'])) {
            echo 'No se enviaron todos los parametros';
            die;
        }

        $user = trim($_POST['user']);
        $pass = trim($_POST['pass']);
        $user = User::login($user, $pass);

        if ($user) {
            $_SESSION['id'] = $user->id;
            header('Location: index.php');
            die;
        }

        echo 'No se encontro un usuario con el nombre de usuario y contraseña ingresados';
        die;
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        die;
    }
}
