<?php

require '../Models/UserModel.php';

class LoginController extends UserModel
{

    public function loginView()
    {
        require '../Views/login.php';
    }

    public function signUpView()
    {
        require '../Views/register.php';
    }
    /* registrar */
    public function signUp()
    {
        /* si se envío el formulario */
        if (isset($_POST['user'])) {

            /*  $this->saveUser(); */
        }
        return false;
    }
    /* ingresar */
    public function login($user, $password)
    {
        $userObj = null;

        $userObj = $this->getUser($user, $password);

        /* Si devuelve nulo, no se encontro el usuario y no se crea la sesion */
        if ($userObj == null) {

            return null;
        }

        session_start();
        $_SESSION['idUsuario'] = $userObj->getIdUsuario();
        $_SESSION['usuario'] =  $userObj->getUsuario();
        $_SESSION['idRol'] =  $userObj->getIdRol();

        header('Location: HomeController.php');
    }
}

$Controller = new LoginController();
/* Accion */
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'loginView';
    }
}


switch ($action) {
    case 'loginView':
        $Controller->loginView();
        break;
    case 'signUpView':
        $Controller->signUpView();
        break;
    case 'signUp':
        $Controller->signUp();
        break;
    case 'login':

        if (isset($_POST['user']) && isset($_POST['password'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];

            $response = $Controller->login($user, $password);


            if ($response === null) {
                $Controller->loginView();
            }
        }
        break;

    default:
        $Controller->loginView();
        break;
}
