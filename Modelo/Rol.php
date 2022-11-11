<?php 
class Rol extends BaseDatos
{
    private $idrol;
    private $rol;
    private $mensajeoperacion;

   
    public function __construct(){
        
        $this->idrol="";
        $this->rol="";
        $this->mensajeoperacion ="";
    }
    public function setear($idrol, $rol)
    {
        $this->setIdrol($idrol);
        $this->setRodescripcion($rol);
    }
    
    
    
    public function getIdrol(){
        return $this->idrol;
        
    }
    public function setIdrol($valor){
        $this->idrol = $valor;
    }
    

    public function getRodescripcion(){
        return $this->rol;

    }
    public function setRodescripcion($valor){
        $this->rol = $valor;

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
        $sql="SELECT * FROM rol WHERE idrol = ".$this->getIdrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();


                    $this->setear($row['idrol'], $row['rodescripcion']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Rol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO rol(rodescripcion)  VALUES('".$this->getRodescripcion()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdrol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Rol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE rol SET rodescripcion='".$this->getRodescripcion()."' ".
            " WHERE idrol=".$this->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Rol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->modificar: ".$base->getError());
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
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Rol();
                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        }
        else {
        //$this->setmensajeoperacion("Rol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

    public function buscar($idrol){
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idrol = '". $idrol. "'";
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
    }
    
}


?>