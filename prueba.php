<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Persona{
protected $dni;
protected $nombre;
protected $correo;
protected $celular;

public function __construct($dni, $nombre, $correo, $celular)
{
$this->dni = $dni;
$this->nombre = $nombre;
$this->correo = $correo;
$this->celular = $celular;
}
}
class Entrenador extends Persona
{
private $aClases;

public function __construct($dni, $nombre, $correo, $celular)
{
parent::__construct($dni, $nombre, $correo, $celular); //constructor de la class Persona
$this->aClases = array();
}


public function __get($propiedad)
{
return $this->$propiedad;
}
public function __set($propiedad, $valor)
{
$this->$propiedad = $valor;
}

public function asignarClase($clase)
{
$this->aClases[]=$clase;
}
}


$entrenador1= new Entrenador();
$entrenador1=


?>