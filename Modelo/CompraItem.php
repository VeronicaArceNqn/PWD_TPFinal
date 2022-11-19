<?php
 class CompraItem extends BaseDatos{
    private $idcompraitem;
    private $objProducto;
    private $objCompra;
    private $cicantidad;
    
    public function __construct()
    {
    $this->idcompraitem="";
    $this->objProducto=new Producto();
    $this->objCompra=new Compra();
    $this->cicantidad="";
    }

    /**
     * Get the value of idcompraitem
     */
    public function getIdcompraitem()
    {
        return $this->idcompraitem;
    }

    /**
     * Set the value of idcompraitem
     */
    public function setIdcompraitem($idcompraitem)
    {
        $this->idcompraitem = $idcompraitem;
    }

    /**
     * Get the value of objProducto
     */
    public function getObjProducto()
    {
        return $this->objProducto;
    }

    /**
     * Set the value of objProducto
     */
    public function setObjProducto($objProducto)
    {
        $this->objProducto = $objProducto;
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
     * Get the value of cicantidad
     */
    public function getCicantidad()
    {
        return $this->cicantidad;
    }

    /**
     * Set the value of cicantidad
     */
    public function setCicantidad($cicantidad)
    {
        $this->cicantidad = $cicantidad;

    }
}

?>