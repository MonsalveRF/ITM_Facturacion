<?php

require_once('../config/connection.php');
require_once('class/User.php');
require_once('RoleModel.php');

class UserModel
{
    private $connection;
    public $roleClass;
    public function __construct()
    {
        $this->connection = Connection::getConnection();
        $this->roleClass = new RoleModel();
    }

    public function saveUser($clave,$correo,$idRol,$nombre,$usuario)
    {
        
        $query = "INSERT INTO `usuario` (`nombre`, `correo`, `usuario`, `clave`, `idRol`) VALUES ('{$nombre}', '{$correo}', '{$usuario}', '{$clave}', '{$idRol}')";
        
        $result = $this->connection->query($query);

        return true;
    }
    public function deleteProductById($id)
    {
        
        $query = "DELETE FROM Usuario WHERE `idusuario` = {$id}";

        $result = $this->connection->query($query);

        return true;
    }

    public function updateUser($clave,$correo,$fecharegistro,$idRol,$idusuario,$nombre,$usuario){
        $query = "UPDATE `Usuario` SET `clave` = '{$clave}', `correo` = '{$correo}', `fecharegistro` = '{$fecharegistro}', `idRol` = '{$idRol}', `idusuario` = '{$idusuario}', `nombre` = '{$nombre}', `usuario` = '{$usuario}' WHERE `usuario`.`idusuario` = {$idusuario}";

        $result = $this->connection->query($query);

        return true;
    }
    
    public function getUser($user, $password)
    {
        $userObj = null;
        
        /* find user */

        $result = $this->connection->query("SELECT * FROM Usuario where usuario = '{$user}' and clave = '{$password}'");

        $rows = $result->num_rows;
        if ($rows === 0) {
            return null;
        }
        
        
        while ($obj = $result->fetch_object()) {

            //output query from database
            $userObj = new User(
                $obj->idusuario,
                $obj->nombre,
                $obj->usuario,
                $obj->correo,
                $obj->clave,
                $obj->idRol,
                $obj->fechaRegistro
            );
        }

        return $userObj;
    }
    public function getUsers()
    {

        /* retrive all users */
        $query = "SELECT `idUsuario`,`nombre`,`correo`,`usuario`,`idRol`,`fechaRegistro`,`clave` FROM usuario";
        /* retrive all userts */
        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }


        while ($obj = $result->fetch_object()) {
            //output query from database
            $users[] = new User(
                $obj->idUsuario,
                $obj->nombre,
                $obj->usuario,
                $obj->correo,
                $obj->clave,
                $obj->idRol,
                $obj->fechaRegistro
                
            );
        }

        return $users;
    }
}
