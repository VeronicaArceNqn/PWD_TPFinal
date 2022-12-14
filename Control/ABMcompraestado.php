<?php
class ABMcompraestado{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
            else {
                echo "no esta registrado";
            }
        }
        if($datos['accion']=='borradoLogico'){
            if($this->bajaLogica($datos)){
                $resp =true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            $objAbmce=null;
            if (isset($datos['idcompraestado'])) {
                $arrayabmce = ['idcompraestado' => $datos['idcompraestado']];
                //print_r($arrayabmce);
                $objAbmce = $this->buscar($arrayabmce);
                //echo "<br>objAbmce me devuelve de buscar : <br>";
                //print_r($objAbmce);
            }
            if ($objAbmce == null) {
                // $mensajeResultado = $this->verificarUsuarioMail($datos);
                //print_r($datos);
                //print_r($mensajeResultado['Resultado']);
                //if ($mensajeResultado==null) {
                    if (isset($datos['accion'])) {
                        //echo $datos['accion'];
                       // print_r($datos);
                        if ($this->alta($datos)) {
                            $resp = true;
                        }
                    }
                    /*} else {
                        echo $mensajeResultado['Mensaje'];
                    }*/
            }
            else {
                echo "El correo electrónico ya esta registrado";
            }
        }



        return $resp;

        }
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    *@param array $param
    *@return CompraEstado
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idcompraestado', $param) and array_key_exists('idcompra', $param) and array_key_exists('idcompraestadotipo', $param) and array_key_exists('cefechaini', $param) and array_key_exists('cefechafin', $param) ){
            $obj = new CompraEstado();

            $objCompra = new Compra();
        $objCompra->setIdcompra($param['idcompra']);
        $objCompra->cargar();

        $objCet = new CompraEstadoTipo();
        $objCet->setIdcompraestadotipo($param['idcompraestadotipo']);
        $objCet->cargar();

            $obj->setear($param['idcompraestado'], $objCompra, $objCet, $param['cefechaini'], $param['cefechaini']);
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return CompraEstado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idcompraestado'])){
            $obj = new CompraEstado();
            $obj->setear($param['idcompraestado'], null, null, null,null);
        }
        return $obj;
    }
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraestado']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        //print_r($param);
        $resp = false;
        $param['idcompraestado']=null;

        $elObjce = $this->cargarObjeto($param);
        if ($elObjce!=null and $elObjce->insertar()){
            $resp = true;
        }
        return $resp;
     }
      /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    
    public function bajaLogica($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjce = $this->cargarObjetoConClave($param);
            if($elObjce!=null and $elObjce->modificar("borradoLogico")){
                $resp = true;
            }
        }
        return $resp;
    }
     /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if($this->seteadosCamposClaves ($param)){
            $elObjce = $this->cargarObjeto($param);
            //print_r($param);
            if($elObjce!=null and $elObjce->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
       //echo "Este dato ingresa a Buscar en ABMusuario";
        
        //print_r($param);
        //echo "<br>";
        //print_r ($param['idcompraestado']);
        if($param<>NULL){
            if(isset($param['idcompraestado'])) 
                $where.=" and idcompraestado = ".$param['idcompraestado'];
            if(isset($param['idcompra'])) 
                $where.=" and idcompra =".$param['idcompra'];
            if(isset($param['idcompraestadotipo'])) 
                $where.=" and idcompraestadotipo =".$param['idcompraestadotipo'];
            if(isset($param['cefechaini'])) 
                $where.=" and cefechaini ='".$param['cefechaini']."'";
            if(isset($param['idcompra'])) 
                $where.=" and cefechaini ='".$param['cefechaini']."'";    
            
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = CompraEstado::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      
   
}



?>