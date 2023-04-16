<?php

require_once('../config/connection.php');
require_once('class/Role.php');

class RoleModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function insertProvider($proveedor,$contacto,$telefono,$direccion)
    {
        $query = "INSERT INTO `proveedor` (`proveedor`, `contacto`, `telefono`, `direccion`) VALUES ('{$proveedor}', '{$contacto}', '{$telefono}', '{$direccion}')";

        $result = $this->connection->query($query);

        return true;
    }
    public function updateProvider($id,$proveedor,$contacto,$telefono,$direccion)
    {
        $query = "UPDATE `proveedor` SET `proveedor` = '{$proveedor}', `contacto` = '{$contacto}', `telefono` = '{$telefono}', `direccion` = '{$direccion}' WHERE `proveedor`.`codproveedor` = {$id}";

        $result = $this->connection->query($query);

        return true;
    }
    public function deleteProviderById($id)
    {
        $query = "DELETE FROM proveedor WHERE `proveedor`.`codproveedor` = {$id}";

        $result = $this->connection->query($query);

        return true;
    }
    public function getProvider($id)
    {
        $query = "SELECT `codproveedor`,`proveedor`,`contacto`,`telefono`,`direccion` FROM `proveedor` WHERE `proveedor`.`codproveedor` = {$id}";

        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $providerObj[] = new Provider(
                $obj->codproveedor,
                $obj->proveedor,
                $obj->contacto,
                $obj->telefono,
                $obj->direccion
            );
        }

        return $providerObj;
    }
    public function getRoles()
    {
        $query = "SELECT `idrol`,`rol` FROM `rol` WHERE 1";

        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $rolesObj[] = new Role(
                $obj->idrol,
                $obj->rol
            );
        }

        return $rolesObj;
    }

}
