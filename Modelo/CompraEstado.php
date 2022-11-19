<?php 
class CompraEstado{
private $idcompraestado;
private $objCompra;
private $objCompraEstadoTipo;
private $cefechaini;
private $cefechafin;
public function __construct()
{
    $this->idcompraestado="";
    $this->objCompra=new Compra();
    $this->objCompraEstadoTipo=new CompraEstadoTipo();
    $this->cefechaini="";
    $this->cefechafin="";
}


/**
 * Get the value of idcompraestado
 */
public function getIdcompraestado()
{
return $this->idcompraestado;
}

/**
 * Set the value of idcompraestado
 */
public function setIdcompraestado($idcompraestado)
{
$this->idcompraestado = $idcompraestado;

}

/**
 * Get the value of objCompra
 */
public function getObjCompra()
{
return $this->objCompra;
}

/**
 * Set the value of objCompra
 */
public function setObjCompra($objCompra)
{
$this->objCompra = $objCompra;
}

/**
 * Get the value of objCompraEstadoTipo
 */
public function getObjCompraEstadoTipo()
{
return $this->objCompraEstadoTipo;
}

/**
 * Set the value of objCompraEstadoTipo
 */
public function setObjCompraEstadoTipo($objCompraEstadoTipo)
{
$this->objCompraEstadoTipo = $objCompraEstadoTipo;

}

/**
 * Get the value of cefechaini
 */
public function getCefechaini()
{
return $this->cefechaini;
}

/**
 * Set the value of cefechaini
 */
public function setCefechaini($cefechaini)
{
$this->cefechaini = $cefechaini;

return $this;
}

/**
 * Get the value of cefechafin
 */
public function getCefechafin()
{
return $this->cefechafin;
}

/**
 * Set the value of cefechafin
 */
public function setCefechafin($cefechafin)
{
$this->cefechafin = $cefechafin;

return $this;
}
}


?>