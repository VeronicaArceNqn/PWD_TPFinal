<?php
class ABMrol{
    //Espera como parámetro un arrego asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos){
        $resp = false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $resp = true;
            }
        }
       /* if($datos['accion']=='borrar'){
            if($this->baja($datos)){
                $resp =true;
            }
        }*/
                  /*  if($datos['accion']=='nuevo'){
                        if($this->alta($datos)){
                            $resp =true;
                        }
                        
                    }*/




                    if ($datos['accion'] == 'nuevo') {
             
                        $objRol=null;
                        if (isset($datos['idrol'])) {
                            $arrayrol = ['idrol' => $datos['idrol']];
                            //print_r($arrayrol);
                            
                            
                            $objRol = $this->buscar($arrayrol);
                            //echo "<br> objRol me devuelve de buscar : <br>";
                            //print_r($objRol);
                        }
                        if ($objRol == null) {
                           $mensajeResultado = $this->verificarIdRol($datos);
                           //print_r($datos);
                           //print_r($mensajeResultado['Resultado']);
                            
            
                            if ($mensajeResultado['Resultado']) {
                                if (isset($datos['accion'])) {
                                    //echo $datos['accion'];
                                    print_r($datos);
                                    if ($this->alta($datos)) {
                                        $resp = true;
                                    }
                                }
                            } else {
            
                                echo $mensajeResultado['Mensaje'];
                            }
                        }
                        else {
                        echo "<H4 class='text-center bg-danger text-light'>El rol ya esta registrado</  H4>";
                       }
                    }



        return $resp;

        }
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    *@param array $param
    *@return Rol
    */
    private function cargarObjeto($param){
        $obj = null;

        if (array_key_exists('idrol', $param) and array_key_exists('rodescripcion', $param) ){
            $obj = new Rol();
            $obj->setear($param['idrol'], $param['rodescripcion']);
        }
       // print_r($obj);
        return $obj;
    }
     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Rol
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idrol'])){
            $obj = new Rol();
            $obj->setear($param['idrol'], null);
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
        if (isset($param['idrol']))
            $resp = true;
        return $resp;
     }
     public function alta($param){
       // print_r($param);
        $resp = false;
        $param['idrol']=null;

        $elObjRol = $this->cargarObjeto($param);
        if ($elObjRol!=null and $elObjRol->insertar()){
            $resp = true;
        }
        return $resp;
     }
      /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    /*
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjUsuario = $this->cargarObjetoConClave($param);
            if($elObjUsuario!=null and $elObjUsuario->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }*/
     /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if($this->seteadosCamposClaves ($param)){
            $elObjRol = $this->cargarObjeto($param);
            if($elObjRol!=null and $elObjRol->modificar()){
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
        //echo "Este dato ingresa a Buscar en ABMRol";
        
        //print_r($param);
        //echo "<br>";
        //print_r ($param['usmail']);
        if($param<>NULL){
            if(isset($param['idrol'])) 
                $where.=" and idrol = ".$param['idrol'];
            if(isset($param['rodescripcion'])) 
                $where.=" and rodescripcion ='".$param['rodescripcion']."'";
            
        }
        //print_r($where);
        //echo "<br>";
        $arreglo = Rol::listar($where);
        //echo "Estoy en buscar \n";
        //print_r($arreglo);
    
        return $arreglo;
       }
      /**
     * Busca un objeto Rol, 
     * @param array $param
     * @return Rol 
     */
    public function verificarIdRol($datos)
    {
        $objRol = NULL;
        $listaRol = $this->buscar($datos);
        //print_r($datos);
        //print_r($listaRol);
        if (count($listaRol)==1){
            $objRol= $listaRol[0];
        }
        //echo "retorno de verificar rol : ";
        //print_r($objRol);
        return $objRol;
    }
}



?>