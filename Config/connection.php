<?php

require 'params.php';

class Connection
{

    public static function getConnection(){
        $connection = new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
        // $con = new mysqli('127.0.0.1', 'root', '', 'mi_app');

        if ($connection->connect_errno) {
            echo "ocurrio un error en la conexion" . $connection->connect_errno;
        }

        return $connection;
    }
    
}
