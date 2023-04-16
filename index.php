<?php

if(!isset($_SESSION['idUsuario'])){
    header('location: ./Controllers/LoginController.php');
}

?>