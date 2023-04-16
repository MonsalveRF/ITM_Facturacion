<?php

require_once('../config/connection.php');
require_once('class/Clients.php');

class ClientsModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();

    }
    public function insertCliente($nit,$nombre,$telefono,$direccion){
        $query = "INSERT INTO `cliente` ( `nit`, `nombre`, `telefono`, `direccion`) VALUES ('{$nit}', '{$nombre}', '{$telefono}', '{$direccion}')";
        

        $result = $this->connection->query($query);

        return true;
    }

    public function updateClient($idcliente,$nit,$nombre,$telefono,$direccion){
        $query = "UPDATE `cliente` SET `idcliente` = '{$idcliente}', `nit` = '{$nit}', `nombre` = '{$nombre}', `telefono` = '{$telefono}', `direccion` = '{$direccion}' WHERE `cliente`.`idcliente` = {$idcliente}";

        $result = $this->connection->query($query);

        return true;
    }
    public function deleteClientById($id){
        $query = "DELETE FROM cliente WHERE `cliente`.`idcliente` = {$id}";

        $result = $this->connection->query($query);

        return true;
    }

    public function getClient($id)
    {

        $query = "SELECT `idcliente`,`nit`,`nombre`,`telefono` ,`direccion` from `cliente` WHERE idcliente = '{$id}' ";
        /* retrive all products */
        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $clientsObj = new Clients(
                $obj->idcliente,
                $obj->nit,
                $obj->nombre,
                $obj->telefono,
                $obj->direccion
            );
        }

        return $clientsObj;
    }

    
    public function getClients()
    {

        $query = "SELECT `idcliente`,`nit`,`nombre`,`telefono`,`direccion` from `cliente` WHERE 1  ";
        /* retrive all products */
        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $clientsObj[] = new Clients(
                $obj->idcliente,
                $obj->nit,
                $obj->nombre,
                $obj->telefono,
                $obj->direccion
            );
        }

        return $clientsObj;
    }


}
