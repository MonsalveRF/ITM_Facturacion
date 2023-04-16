<?php

require '../Models/UserModel.php';

class HomeController extends UserModel{


    public function homeView (){
        require '../Views/home.php';
    }

    public function logOut (){
        
        session_destroy();
        header('Location: LoginController.php?action=loginView');

    } 

}

session_start();
if(!$_SESSION['idUsuario']){
    header('Location: LoginController.php?action=loginView');
}

$Controller = new HomeController();
/* Accion */
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'homeView';
    }
}


switch ($action) {
    case 'logOut':
        $Controller->logOut();
        break;
    case 'homeView':
        $Controller->homeView();
        break;

    default:
        $Controller->homeView();
        break;
}
