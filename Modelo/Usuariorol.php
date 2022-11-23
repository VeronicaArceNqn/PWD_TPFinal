<?php 
class Usuariorol
{
    private $objUsuario;
    private $objRol;
    private $mensajeoperacion;

   
    public function __construct(){
        
        $this->objUsuario="";
        $this->objRol="";
        $this->mensajeoperacion ="";
    }
    public function setear($objUsuario, $objRol)
    {
        $this->setObjUsuario($objUsuario);
        $this->setObjRol($objRol);
    }
    
    
    
    public function getObjUsuario(){
        return $this->objUsuario;
        
    }
    public function setObjUsuario($valor){
        $this->objUsuario = $valor;
    }
    

    public function getObjRol(){
        return $this->objRol;

    }
    public function setObjRol($valor){
        $this->objRol = $valor;

    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getObjUsuario()->getIdusuario()."";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                    $objUsuario = new Usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();
          
                    $objRol = new Rol();
                    $objRol->setIdrol($row['idrol']);
                    $objRol->cargar();
          
                    $this->setear($objUsuario, $objRol);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuariorol(idusuario, idrol)  VALUES('".$this->getObjUsuario()->getIdusuario()."','".$this->getObjRol()->getIdrol()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setObjRol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuariorol SET idrol='".$this->getObjRol()->getIdrol()."' ".
            " WHERE idusuario=".$this->getObjUsuario()->getIdusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->modificar: ".$base->getError());
        }
        return $resp;
    }
    /*
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM rol WHERE idrol=".$this->getidrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Rol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    */
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new UsuarioRol();

                    $objUsuario = new Usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();

                    $objRol = new Rol();
                    $objRol->setIdrol($row['idrol']);
                    $objRol->cargar();

                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
               
            }
            
        }
        else {
          // $this->setmensajeoperacion("UsuarioRol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    //Ver si es necesario implementar la funcion Buscar
    /*
    public function buscar($idrol){
        $base = new BaseDatos();
        $sql = "SELECT * FROM Usuariorol WHERE idrol = '". $idrol. "'";
        $resp = false;
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                if ($row = $base->Registro()){
                    $this->setIdrol($row['idrol']);
                    $this->setRodescripcion($row['usrodescripcion']);
                    $resp = true;
                }
            }else{
                $this->setmensajeoperacion($base->getError());
            }
        }else{
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }*/
    
}


?>