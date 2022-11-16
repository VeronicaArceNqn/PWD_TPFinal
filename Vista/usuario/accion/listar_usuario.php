<?php 
include_once "../../../configuracion.php";
$data = data_submitted();
$objControl = new ABMusuario();
$list = $objControl->buscar($data);
$arreglo_salida =  array();
foreach ($list as $elem ){
    
    $nuevoElem['idusuario'] = $elem->getIdusuario();
    $nuevoElem["usnombre"]=$elem->getUsnombre();
    $nuevoElem["usmail"]=$elem->getUsmail();
    $nuevoElem["usdeshabilitado"]=$elem->getUsdeshabilitado();
    
    array_push($arreglo_salida,$nuevoElem);
}
//verEstructura($arreglo_salida);
echo json_encode($arreglo_salida,0,2);

?>