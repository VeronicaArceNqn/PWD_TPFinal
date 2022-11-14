<?php
class Producto extends BaseDatos{
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;  
    private $tipo;
    private $precio;
    private $mensajeoperacion;

    public function __contruct(){
        $this->idproducto="";
        $this->pronombre="";
        $this->prodetalle="";
        $this->procantstock="";
        $this->tipo="";
        $this->precio="";
        $this->mensajeoperacion ="";
    }
    public function setear($idproducto, $pronombre, $prodetalle, $procantstock, $tipo, $precio){
        $this->setIdproducto($idproducto);
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $this->setTipo($tipo);
        $this->setPrecio($precio);
        }
    public function getIdproducto(){
        return $this->idproducto;
        
    }
    public function setIdproducto($valor){
        $this->idproducto = $valor;
    }
    public function getPronombre(){
        return $this->pronombre;
        
    }
    public function setPronombre($valor){
        $this->pronombre = $valor;
    }
    public function getProdetalle  (){
        return $this->prodetalle;
        
    }
    public function setProdetalle($valor){
        $this->prodetalle = $valor;
    }
    public function getProcantstock(){
        return $this->procantstock;
        
    }
    public function setProcantstock($valor){
        $this->procantstock = $valor;
    }
    public function getTipo(){
        return $this->tipo;
        
    }
    public function setTipo($valor){
        $this->tipo = $valor;
    }
    public function getPrecio(){
        return $this->precio;
        
    }
    public function setPrecio($valor){
        $this->precio = $valor;
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
        $sql = "SELECT * FROM producto WHERE idproducto = '".$this->getIdproducto()."'";
        if ($base->Iniciar()){
            $resp = $base->Ejecutar($sql);
            if($resp>-1){
                if($resp>0){
                    $row = $base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'],$row['procantstock'], $row['tipo'], $row['precio']);
                }
            }    
        } else {
            $this->setmensajeoperacion("Producto->listar: ". $base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        echo "estoy en insertar de Producto";
        // se puede crear la variable usdeshab para registrar null en el campo usdeshabilitado

        //$usdeshab="null";
        $sql="INSERT INTO producto(pronombre, prodetalle, procantstock, tipo, precio) VALUES (".$this->getPronombre().",'".$this->getProdetalle()."',".$this->getProcantstock().", '".$this->getTipo()."',".$this->getPrecio().");";
       echo "Este es el sql para insertar <br>".$sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)){
                $this->setIdproducto($elid);
                $resp = true;
            }else{
                $this->setmensajeoperacion("Producto->insertar: ".$base->getError());
            }

        }else{
            $this->setmensajeoperacion("Producto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    /*public function modificar($tipo){
       // print_r($tipo);
        $resp = false;
        $base = new BaseDatos();
        if($tipo['accion'] == "borradoLogico"){
            $fechaActual=Date("Y-m-d h:i:s");
            //echo date("Y-m-d h:i:s");
            $sql="UPDATE usuario SET usdeshabilitado = '$fechaActual' WHERE idusuario = ".$this->getIdusuario()."";
            //echo "<br> este es el UPDATE borradoLogico ". $sql;
        }else{
            $sql = "UPDATE usuario SET uspass = '".$this->getUspass()."' WHERE idusuario = ". $this->getIdusuario()."";
           // echo "<br> este es el UPDATE Contraseña ". $sql;
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
    }*/

    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql = "SELECT * FROM producto ";
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
                    $obj = new Producto();
                    $obj->buscar($row['idproducto']);
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
   * @param int idproducto
   * @return true en caso de encontrar los datos, false en caso contrario 
   */
    public function buscar($idproducto){
        $base = new BaseDatos();
        $sql = "SELECT * FROM producto WHERE idproducto = ". $idproducto.";";
        $resp = false;
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                if ($row = $base->Registro()){

                    $this->setIdproducto($row['idproducto']);
                    $this->setPronombre($row['pronombre']);
                    $this->setProdetalle($row['prodetalle']);
                    $this->setProcantstock($row['procantstock']);
                    $this->setTipo($row['tipo']);
                    $this->setPrecio($row['precio']);
                    /*if($row['usdeshabilitado']=="0000-00-00 00:00:00"){
                        $usdeshab="habilitado";
                    }else{
                        $usdeshab="deshabilitado";
                    }
                    
                    $this->setUsdeshabilitado($usdeshab);*/
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