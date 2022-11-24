<?php 
class ABMusuariorol{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
        }
        if($datos['accion']=='borradoLogico'){
            if($this->bajaLogica($datos)){
                $resp =true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            $objUsurol=null;
            /*if (isset($datos['idusuario'])) {
                $arrayusurol= ['idusuario' => $datos['idusuario']];
                print_r($arrayusurol);
                $objUsurol = $this->buscar($arrayusurol);
                echo "<br>objUsurol me devuelve de buscar : <br>";
                print_r($objUsurol);
            }*/
            if ($objUsurol == null) {
                // $mensajeResultado = $this->verificarUsuarioMail($datos);
                //print_r($datos);
                //print_r($mensajeResultado['Resultado']);
                //if ($mensajeResultado==null) {
                    if (isset($datos['accion'])) {
                        //echo $datos['accion'];
                        //print_r($datos);
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
    *@return UsuarioRol
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idusuario', $param) and array_key_exists('idrol', $param) ){
            
            $obj = new UsuarioRol();
            
            $objUsuario = new Usuario();
            $objUsuario->setIdusuario($param['idusuario']);
            $objUsuario->cargar();

            $objRol = new Rol();
            $objRol->setIdrol($param['idrol']);
            $objRol->cargar();

            $obj->setear($objUsuario, $objRol );
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return UsuarioRol
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idusuario']) and isset($param['idrol'])){
            $obj = new UsuarioRol();

            $objUsuario = new Usuario();
            $objUsuario->setIdusuario($param['idusuario']);
            $objUsuario->cargar();

            $objRol = new Rol();
            $objRol->setIdrol($param['idrol']);
            $objRol->cargar();

            $obj->setear($objUsuario, $objRol );
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
        if (isset($param['idusuario']))
            $resp = true;
        //echo "SeteadosCamposClaves". $resp;
        return $resp;
     }
     public function alta($param){
        //print_r($param);
        $resp = false;
        //$param['idusuario']=null;

        $elObjusurol = $this->cargarObjeto($param);
        if ($elObjusurol!=null and $elObjusurol->insertar()){
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
            $elObjusurol = $this->cargarObjetoConClave($param);
            if($elObjusurol!=null and $elObjusurol->modificar("borradoLogico")){
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
            $elObjusurol = $this->cargarObjeto($param);
            //print_r($param);
            if($elObjusurol!=null and $elObjusurol->modificar()){
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
        //print_r ($param['usmail']);
        if($param<>NULL){
            if(isset($param['idusuario'])) 
                $where.=" and idusuario = ".$param['idusuario'];
            if (isset($param['idrol']))
                $where .= " and idrol = ".$param['idrol'];
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = UsuarioRol::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      
   
}

?>