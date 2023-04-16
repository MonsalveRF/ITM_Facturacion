<?php

require_once('../config/connection.php');
require_once('class/Product.php');
require_once('ProviderModel.php');

class ProductModel
{
    private $connection;
    public $providerClass;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
        $this->providerClass = new ProviderModel();
    }
    public function insertProduct($codigoproducto,$descripcion,$precio,$proveedor,$existencia,$foto){
        $query = "INSERT INTO `producto` (`codigoproducto`, `descripcion`, `proveedor`, `precio`, `existencia`, `foto`) VALUES ('{$codigoproducto}', '{$descripcion}', '{$proveedor}', '{$precio}', '{$existencia}', '{$foto}');";

        $result = $this->connection->query($query);

        return true;
    }

    public function updateProduct($idproducto,$codigoproducto,$descripcion,$precio,$proveedor,$existencia,$foto){
        $query = "UPDATE `producto` SET `codigoproducto` = '{$codigoproducto}', `descripcion` = '{$descripcion}', `proveedor` = '{$proveedor}', `precio` = '{$precio}', `existencia` = '{$existencia}', `foto` = '{$foto}' WHERE `producto`.`idproducto` = {$idproducto}";

        $result = $this->connection->query($query);

        return true;
    }
    public function deleteProductById($id){
        $query = "DELETE FROM producto WHERE `producto`.`idproducto` = {$id}";

        $result = $this->connection->query($query);

        return true;
    }
    public function getProduct($id)
    {

        $query = "SELECT `idproducto`,`codigoproducto`,`descripcion`,`precio`,b.`proveedor`,`existencia`,`foto` from `producto` as a
        inner join proveedor  as b on b.codproveedor = a.proveedor WHERE idproducto = '{$id}' ";
        /* retrive all products */
        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $productsObj = new Product(
                $obj->idproducto,
                $obj->codigoproducto,
                $obj->descripcion,
                $obj->precio,
                $obj->proveedor,
                $obj->existencia,
                $obj->foto
            );
        }

        return $productsObj;
    }

    
    public function getProducts()
    {

        $query = "SELECT `idproducto`,`codigoproducto`,`descripcion`,`precio`,b.`proveedor`,`existencia`,`foto` from `producto` as a
        inner join proveedor  as b on b.codproveedor = a.proveedor WHERE 1  ";
        /* retrive all products */
        $result = $this->connection->query($query);

        if ($result->num_rows === 0) {
            return null;
        }

        while ($obj = $result->fetch_object()) {
            //output query from database
            $productsObj[] = new Product(
            $obj->idproducto,
            $obj->codigoproducto,
            $obj->descripcion,
            $obj->precio,
            $obj->proveedor,
            $obj->existencia,
            $obj->foto
            );
        }

        return $productsObj;
    }


}
