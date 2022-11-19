<?php 
class CompraEstadoTipo extends BaseDatos{
private $idcompraestadotipo;
private $cetdescripcion;
private $cetdetalle;
public function __construct()
{
    $this->idcompraestadotipo="";
    $this->cetdescripcion="";
    $this->cetdetalle="";
}


/**
 * Get the value of idcompraestadotipo
 */
public function getIdcompraestadotipo()
{
return $this->idcompraestadotipo;
}

/**
 * Set the value of idcompraestadotipo
 */
public function setIdcompraestadotipo($idcompraestadotipo)
{
$this->idcompraestadotipo = $idcompraestadotipo;

}

/**
 * Get the value of cetdescripcion
 */
public function getCetdescripcion()
{
return $this->cetdescripcion;
}

/**
 * Set the value of cetdescripcion
 */
public function setCetdescripcion($cetdescripcion)
{
$this->cetdescripcion = $cetdescripcion;

}

/**
 * Get the value of cetdetalle
 */
public function getCetdetalle()
{
return $this->cetdetalle;
}

/**
 * Set the value of cetdetalle
 */
public function setCetdetalle($cetdetalle)
{
$this->cetdetalle = $cetdetalle;
}
}


?>