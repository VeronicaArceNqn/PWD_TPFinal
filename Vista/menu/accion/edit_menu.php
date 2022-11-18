<?php
include_once "../../../configuracion.php";
$data = data_submitted();
$respuesta = false;
if (isset($data['idmenu'])){
    $objC = new AbmMenu();
    $respuesta = $objC->modificacion($data);
    
    if (!$respuesta){

        $sms_error = " La accion  MODIFICACION No pudo concretarse";
        
    }
  //  $retorno['entra'] = "si entro";
}
$retorno['respuesta'] = $respuesta;
if (!$respuesta){
    
    $retorno['errorMsg']=" La accion  MODIFICACION No pudo concretarse";
    
}
echo json_encode($retorno);
?>