<?php
class Product 
{
    private $idproducto;
    private $codigoproducto;
    private $descripcion;
    private $precio;
    private $proveedor;
    private $existencia;
    private $foto;



    function __construct($idproducto, $codigoproducto, $descripcion, $precio,$proveedor, $existencia, $foto) {
    	$this->idproducto = $idproducto;
    	$this->codigoproducto = $codigoproducto;
    	$this->descripcion = $descripcion;
    	$this->precio = $precio;
        $this->proveedor = $proveedor;
    	$this->existencia = $existencia;
    	$this->foto = $foto;
    
    }

    public function getIdproducto() {
    	return $this->idproducto;
    }

    /**
    * @param $idproducto
    */
    public function setIdproducto($idproducto) {
    	$this->idproducto = $idproducto;
    }

    public function getCodigoproducto() {
    	return $this->codigoproducto;
    }

    /**
    * @param $codigoproducto
    */
    public function setCodigoproducto($codigoproducto) {
    	$this->codigoproducto = $codigoproducto;
    }

    public function getDescripcion() {
    	return $this->descripcion;
    }

    /**
    * @param $descripcion
    */
    public function setDescripcion($descripcion) {
    	$this->descripcion = $descripcion;
    }

    public function getPrecio() {
    	return $this->precio;
    }

    /**
    * @param $precio
    */
    public function setPrecio($precio) {
    	$this->precio = $precio;
    }

    public function getExistencia() {
    	return $this->existencia;
    }

    /**
    * @param $existencia
    */
    public function setExistencia($existencia) {
    	$this->existencia = $existencia;
    }

    public function getFoto() {
    	return $this->foto;
    }

    /**
    * @param $foto
    */
    public function setFoto($foto) {
    	$this->foto = $foto;
    }


    public function getProveedor() {
    	return $this->proveedor;
    }

    /**
    * @param $proveedor
    */
    public function setProveedor($proveedor) {
    	$this->proveedor = $proveedor;
    }
}
