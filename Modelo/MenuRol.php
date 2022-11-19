<?php 

class MenuRol{

    private $objMenu;
    private $objRol;
    public function __construct()
    {
        $this->objMenu=new Menu();
        $this->objRol=new Rol();
    }

    public function getObjMenu()
    {
        return $this->objMenu;
    }

    /**
     * Set the value of objMenu
     */
    public function setObjMenu($objMenu)
    {
        $this->objMenu = $objMenu;
    }

    /**
     * Get the value of objRol
     */
    public function getObjRol()
    {
        return $this->objRol;
    }

    /**
     * Set the value of objRol
     */
    public function setObjRol($objRol)
    {
        $this->objRol = $objRol;
    }
}

?>