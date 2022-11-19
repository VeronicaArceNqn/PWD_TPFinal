<?php
class Compra extends BaseDatos{
 private $idcompra;
 private $cofecha;
 private $objUsuario;
 public function __construct()
 {
    $this->compra="";
    $this->cofecha="";
    $this->objUsuario=new Usuario();

 }


 /**
  * Get the value of idcompra
  */
 public function getIdcompra()
 {
  return $this->idcompra;
 }

 /**
  * Set the value of idcompra
  */
 public function setIdcompra($idcompra)
 {
  $this->idcompra = $idcompra;

 }



 /**
  * Get the value of cofecha
  */
 public function getCofecha()
 {
  return $this->cofecha;
 }

 /**
  * Set the value of cofecha
  */
 public function setCofecha($cofecha)
 {
  $this->cofecha = $cofecha;

 }

 /**
  * Get the value of objUsuario
  */
 public function getObjUsuario()
 {
  return $this->objUsuario;
 }

 /**
  * Set the value of objUsuario
  */
 public function setObjUsuario($objUsuario)
 {
  $this->objUsuario = $objUsuario;

 }
}

?>