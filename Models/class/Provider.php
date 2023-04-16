<?php

class Provider {

    private $codproveedor;
    private $proveedor;
    private $contacto;
    private $telefono;
    private $direccion;

    function __construct($codproveedor, $proveedor, $contacto, $telefono, $direccion) {
    	$this->codproveedor = $codproveedor;
    	$this->proveedor = $proveedor;
    	$this->contacto = $contacto;
    	$this->telefono = $telefono;
    	$this->direccion = $direccion;
    
    }

    public function getCodproveedor() {
    	return $this->codproveedor;
    }

    /**
    * @param $codproveedor
    */
    public function setCodproveedor($codproveedor) {
    	$this->codproveedor = $codproveedor;
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

    public function getContacto() {
    	return $this->contacto;
    }

    /**
    * @param $contacto
    */
    public function setContacto($contacto) {
    	$this->contacto = $contacto;
    }

    public function getTelefono() {
    	return $this->telefono;
    }

    /**
    * @param $telefono
    */
    public function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }

    public function getDireccion() {
    	return $this->direccion;
    }

    /**
    * @param $direccion
    */
    public function setDireccion($direccion) {
    	$this->direccion = $direccion;
    }


}