<?php
class Role
{
    private $idRol;
    private $rol;

    function __construct($idRol, $rol) {
    	$this->idRol = $idRol;
    	$this->rol = $rol;
    
    }

    public function getIdRol() {
    	return $this->idRol;
    }

    /**
    * @param $idRol
    */
    public function setIdRol($idRol) {
    	$this->idRol = $idRol;
    }

    public function getRol() {
    	return $this->rol;
    }

    /**
    * @param $rol
    */
    public function setRol($rol) {
    	$this->rol = $rol;
    }
}
