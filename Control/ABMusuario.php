<?php
class ABMusuario{
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
            $objUsuario=null;
            if (isset($datos['usmail'])) {
                $arraymail = ['usmail' => $datos['usmail']];
                //print_r($arraymail);
                $objUsuario = $this->buscar($arraymail);
                //echo "<br>objUsuario me devuelve de buscar : <br>";
                //print_r($objUsuario);
            }
            if ($objUsuario == null) {
                // $mensajeResultado = $this->verificarUsuarioMail($datos);
                //print_r($datos);
                //print_r($mensajeResultado['Resultado']);
                //if ($mensajeResultado==null) {
                    if (isset($datos['accion'])) {
                        //echo $datos['accion'];
                        print_r($datos);
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
    *@return Usuario
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idusuario', $param) and array_key_exists('usnombre', $param) and array_key_exists('uspass', $param) and array_key_exists('usmail', $param) ){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['uspass'], $param['usmail']);
        }
        //print_r($obj);
        return $obj;
    }
    
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Usuario
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idusuario'])){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], null, null, null, null);
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
       // print_r($param);
        $resp = false;
        $param['idusuario']=null;

        $elObjUsuario = $this->cargarObjeto($param);
        if ($elObjUsuario!=null and $elObjUsuario->insertar()){
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
            $elObjUsuario = $this->cargarObjetoConClave($param);
            if($elObjUsuario!=null and $elObjUsuario->modificar($param)){
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
            $elObjUsuario = $this->cargarObjeto($param);
            print_r($param);
            if($elObjUsuario!=null and $elObjUsuario->modificar($param)){
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
            if(isset($param['usnombre'])) 
                $where.=" and usnombre ='".$param['usnombre']."'";
            if(isset($param['uspass'])) 
                $where.=" and uspass ='".$param['uspass']."'";
            if(isset($param['usmail'])) 
                $where.=" and usmail ='".$param['usmail']."'";
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = Usuario::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      /**
     * Busca un objeto usuario, 
     * @param array $param
     * @return Usuario 
     */
    public function verificarUsuarioMail($datos)
    {
        $objUsuario = NULL;
        $listaUsuario = $this->buscar($datos);
        //print_r($datos);
        //print_r($listaUsuario);
        if (count($listaUsuario)==1){
            $objUsuario= $listaUsuario[0];
        }
        echo "retorno de verificar usuario : ";
        print_r($objUsuario);
        return $objUsuario;
    }
    
    public function darRoles($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario']))
                $where .= " and idusuario =" . $param['idusuario'];
            if (isset($param['idrol']))
                $where .= " and idrol ='" . $param['idrol'] . "'";
        }
        $obj = new UsuarioRol();
        $arreglo = $obj->listar($where);
        //echo "Van ".count($arreglo);
        return $arreglo;
    }
}



?>