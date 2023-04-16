<?php
require '../Models/UserModel.php';

class UserController extends UserModel
{

        
    public function addUserView()
    {

        $formularioEditar = false; 
        $roles = $this->roleClass->getRoles();

        require '../Views/userForm.php';
    }
    public function addUser()
    {

        $nombre =  $_POST["nombre"];
        $correo = $_POST["correo"];
        $usuario =  $_POST["usuario"];
        $clave = $_POST["password"];
        $idRol = $_POST["idRol"];
        
        $this->saveUser($clave,$correo,$idRol,$nombre,$usuario);

        echo "<script> alert('Usuario agregado correctamente'); window.location.href='UserController.php';</script>";
    }
    public function editUserView()
    {
        $formularioEditar = true;
        $idusuario = $_GET['id'];
        $passw = $_GET['password'];
        $user = $this->getUser($idusuario,$passw);
        require '../Views/userForm.php';
    }
    public function editUser()
    {
        $precio = $_POST["idusuario"];
        $clave = $$_POST["clave"];
        $correo = $$_POST["correo"];
        $fecharegistro = $$_POST["fecharegistro"];
        $idRol = $$_POST["idrol"];
        $idusuario = $$_POST["idusuario"];
        $nombre =  $$_POST["nombre"];
        $usuario =  $$_POST["usuario"];
    

        $this->updateUser($clave,$correo,$fecharegistro,$idRol,$idusuario,$nombre,$usuario);
        /* notification */
        echo "<script> alert('Usuario actualizado correctamente'); window.location.href='UserController.php';</script>";
    }
    public function deleteUser($id)
    {

        $this->deleteProductById($id);
        /* notification */
        echo "<script> alert('Usuario eliminado correctamente'); window.location.href='UserController.php';</script>";
    }
    public function usersView()
    {

        $User = $this->getUsers();

        require '../Views/usuarios.php';
    }
    
}
session_start();

$Controller = new UserController();
/* Accion */
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    } else {
        $action = 'usersView';
    }
}


switch ($action) {

    case 'addUserView':
        $Controller->addUserView();
        break;
    case 'addUser':
        $Controller->addUser();
        break;
    case 'editUserView':
        $Controller->editUserView();
        break;
    case 'editUser':
        $Controller->editUser();
        break;
    case 'deleteUser':
        $Controller->deleteUser($id);
        break;
    case 'usersView':
        $Controller->usersView();
        break;
    default:
        $Controller->usersView();
        break;
}
