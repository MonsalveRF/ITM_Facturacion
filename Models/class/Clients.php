<?php
class Clients 
{
    private $idcliente;
    private $nit;
    private $nombre;
    private $telefono;
    private $direccion;



    function __construct($idcliente, $nit, $nombre, $telefono,$direccion) {
    	$this->idcliente = $idcliente;
    	$this->nit = $nit;
    	$this->nombre = $nombre;
    	$this->telefono = $telefono;
        $this->direccion = $direccion;
    
    }

    public function getIdcliente() {
    	return $this->idcliente;
    }

  
    public function setIdcliente($idcliente) {
    	$this->idcliente = $idcliente;
    }


    public function getTelefono() {
    	return $this->telefono;
    }

    public function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }

    public function getNombre() {
    	return $this->nombre;
    }

 
    public function setNombre($nombre) {
    	$this->nombre = $nombre;
    }
    public function getDireccion() {
    	return $this->direccion;
    }

 
    public function setDireccion($direccion) {
    	$this->direccion = $direccion;
    }


    public function getNit() {
    	return $this->nit;
    }

    /**
    * @param $nit
    */
    public function setNit($nit) {
    	$this->nit = $nit;
    }
}
