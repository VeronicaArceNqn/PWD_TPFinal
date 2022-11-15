<?php
include_once "../../../configuracion.php";

//$data = data_submitted();
$datos = data_submitted();
/*echo "<pre>";
print_r($datos);
echo "</pre>";*/ 

$resp = false;
$objAbmUsuario = new ABMusuario();

$botonAuto='';


    if (isset($datos['accion'])){
        // abm() en ABMUsuario controla la accion nuevo y editar.
        $resp = $objAbmUsuario->abm($datos);
        if(!$resp){
            
            $mensaje = "La accion de eliminación no pudo concretarse.";
        }
        //echo $mensaje;
       // echo("<script>location.href = './index.php?msg=$mensaje';</script>");
    }
/*
if (isset($data['idusuario'])&&isset($data['accion'])){
    $objC = new ABMusuario();
    $respuesta = $objC->abm($data);
    if (!$respuesta){
        $mensaje = " La accion  ELIMINACION No pudo concretarse";
    }
}
*/
$retorno['respuesta'] = $resp;
if (isset($mensaje)){
   
    $retorno['errorMsg']=$mensaje;

}
    echo json_encode($retorno);
?>