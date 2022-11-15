
<?php 
include_once "../../configuracion.php";
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $titulo;?></title>
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/bootstrap/easyui.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/icon.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/themes/color.css">
<link rel="stylesheet" type="text/css" href="../js/jquery-easyui-1.10.8/demo/demo.css">
<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-easyui-1.10.8/jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:200px;background:#fff;padding:10px">
	
     <div id="logo" align="center"style="width: 100%;height: 180px;background-image: url('../images/logo-sis-text-2-(800p).png');
  background-repeat: no-repeat;
  background-size: contain;
   background-position: center center;
  border: 0px solid black;
  text-align: center;
  "> 
	</div>
    </div>
	<!--<div data-options="region:'west',split:true,title:'West'" style="width:150px;padding:10px;">west content</div>-->
	<div data-options="region:'east',split:false,collapsed:true,title:'LOGIN'" style="width:200px;padding:10px;"> Datos de sesion</div>
	<div data-options="region:'south',border:false" style="height:50px;background:#212529;color:white;padding:10px;text-align:center;">© 2022 Copyright: PWD - Grupo Nº7</div>


  <div data-options="region:'center',title:''">
  <div>
	
	<div class="easyui-panel" style="padding:5px; background-color:#0d6efd;color:white; width:100%;text-decoration:none;">
		<a href="../home/index.php" class="easyui-linkbutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="plain:true">Home</a>
		<a href="#" class="easyui-menubutton"  style="padding:5px; background-color:#0d6efd;color:white;"data-options="menu:'#mm1'">Camaras</a>
		<a href="#" class="easyui-menubutton"  style="padding:5px; background-color:#0d6efd;color:white;" data-options="menu:'#mm2'">Equipos</a>
		<a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#0d6efd;color:white;" data-options="menu:'#mm3'">Accesorios</a>
        <a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#212529;color:white;" data-options="menu:'#mm4'">Administración</a>
		<a href="#" class="easyui-menubutton"   style="padding:5px; background-color:#212529;color:white;" data-options="menu:'#mm5'">Gestión de usuario</a>
		<!--<div id="cantProductos"style="float:right;font-size:27px;">0</div>-->
	</div>
	<div id="mm1" style="width:150px;">
		
		<div class="menu-sep"></div>
	
		<div>Dahua</div>
		<div>Hikvision</div>
		<!--<div class="menu-sep"></div>
		<div>
			<span>Toolbar</span>
			<div>
				<div>Address</div>
				<div>Link</div>
			
			</div>
		</div>
			<div data-options="iconCls:'icon-remove'">Delete</div>
		<div>Select All</div>
		-->
	
	</div>
	<div id="mm2" style="width:100px;">
		<div>DVR</div>
		<div>NVR</div>
		
	</div>
	<div id="mm3">
		<div>Discos duros</div>
		<div>Cables</div>
		<div>Conectores</div>
	</div>
    <div id="mm4">
       
        <div href="../menu/listaMenu.php" style="text-decoration:none;"> GestionarMenu
	</div>
		<div>Supervisar compra</div>
	</div>
	<div id="mm5">
        <div  href="../usuario/listaUsuario.php" style="text-decoration:none;">Registrar Usuario
</div>
        <div>Rol</div>
        <div>Menu</div>
		<div>Producto</div>
		<div>Supervisar compra</div>
	</div>