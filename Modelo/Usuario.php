<?php
class Usuario extends BaseDatos{
    private $idusu;
    private $nombre;
    private $pass;
    private $mail;
    private $deshabilitado;
    private $mensajeoperacion;

    public function __contruct(){
        $this->idusu="";
        $this->nombre="";
        $this->pass="";
        $this->mail="";
        $this->deshabilitado="";
        $this->mensajeoperacion ="";
    }
    public function setear($idusu, $nombre, $pass, $mail){
        $this->setIdusuario($idusu);
        $this->setUsnombre($nombre);
        $this->setUspass($pass);
        $this->setUsmail($mail);
        }
    public function getIdusuario(){
        return $this->idusu;
        
    }
    public function setIdusuario($valor){
        $this->idusu = $valor;
    }
    public function getUsnombre(){
        return $this->nombre;
        
    }
    public function setUsnombre($valor){
        $this->nombre = $valor;
    }
    public function getUspass  (){
        return $this->pass;
        
    }
    public function setUspass($valor){
        $this->pass = $valor;
    }
    public function getUsmail(){
        return $this->mail;
        
    }
    public function setUsmail($valor){
        $this->mail = $valor;
    }
    public function getUsdeshabilitado(){
        return $this->deshabilitado;
        
    }
    public function setUsdeshabilitado($valor){
        $this->deshabilitado = $valor;
    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = '".$this->getIdusuario()."'";
        if ($base->Iniciar()){
            $resp = $base->Ejecutar($sql);
            if($resp>-1){
                if($resp>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'],$row['usmail'], $row['usdeshabilitado']);
                }
            }    
        } else {
            $this->setmensajeoperacion("Usuario->listar: ". $base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        
        // se puede crear la variable usdeshab para registrar null en el campo usdeshabilitado

        $usdeshab="null";
        $sql="INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado) VALUES ('".$this->getUsnombre()."','".$this->getUspass()."','".$this->getUsmail()."', '".$usdeshab."')";
       //echo "Este es el sql para insertar ".$sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)){
                $this->setIdusuario($elid);
                $resp = true;
            }else{
                $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
            }

        }else{
            $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar($tipo){
        //print_r($tipo);
        $resp = false;
        $base = new BaseDatos();
        if($tipo['accion'] == "borradoLogico"){
            $fechaActual=Date("Y-m-d h:i:s");
            //echo date("Y-m-d h:i:s");
            $sql="UPDATE usuario SET usdeshabilitado = '$fechaActual' WHERE idusuario = ".$this->getIdusuario()."";
            echo "<br> este es el UPDATE borradoLogico ". $sql;
        }else{
            $sql = "UPDATE usuario SET uspass = '".$this->getUspass()."' WHERE idusuario = ". $this->getIdusuario()."";
            echo "<br> este es el UPDATE Contraseña ". $sql;
        }
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        //echo $sql . " y el Parámetro es ";
        //print_r($parametro);
        if ($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        //echo $sql . " estoy en listar";
        $res = $base->Ejecutar($sql);
        if ($res>-1){
            if ($res>0){
                while ($row = $base->Registro()){
                    $obj = new Usuario();
                    $obj->buscar($row['idusuario']);
                   // $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'],$row['usmail']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
           // $this->setmensajeoperacion("usuarios->listar: ". $base->getError());
        }
        //print_r($arreglo);
        return $arreglo;
    }
    /**
   * Recupera los datos de la persona por numero de documento
   * @param int idUsuario
   * @return true en caso de encontrar los datos, false en caso contrario 
   */
    public function buscar($idusuario){
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = ". $idusuario.";";
        $resp = false;
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                if ($row = $base->Registro()){

                    $this->setIdusuario($row['idusuario']);
                    $this->setUsnombre($row['usnombre']);
                    $this->setUspass($row['uspass']);
                    $this->setUsmail($row['usmail']);
                    if($row['usdeshabilitado']=="0000-00-00 00:00:00"){
                        $usdeshab="habilitado";
                    }else{
                        $usdeshab="deshabilitado";
                    }
                    
                    $this->setUsdeshabilitado($usdeshab);
                    $resp = true;
                    //echo $resp. "en buscar";
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