<?php
$dir="";
$titulo = "Login";
include_once $dir.'../../configuracion.php';
include_once $dir.'../estructura/cabecera.php';
?>	
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Login</h3>
<div class="row float-left">
    <div class="col-md-12 float-left">
      <?php 
      if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
        echo $datos['msg'];
      }
        
     ?>
    </div>
</div>

<br>
<br>
<br>

<div class="row float-right">

    <div class="col-md-12 float-right">
        
    </div>
</div>


<form method="post" action="accion.php" name="formulario" id="formulario">
    <input id="accion" name ="accion" value="login" type="hidden">
    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="nombre" class="control-label">Nombre:</label>
                <div class="input-group">
                <input id="usnombre" name="usnombre" type="text" class="form-control" value="" required >
                </div>
            </div>
        </div>
    </div>

   
    <div class="row mb-3">
        <div class="col-sm-3 ">
            <div class="form-group has-feedback">
                <label for="uspass" class="control-label">Pass:</label>
                <div class="input-group">
                <input id="uspass" name="uspass" type="password" class="form-control"  required>
             </div>
            </div>
        </div>
    </div>
	<input type="button" class="btn btn-primary btn-block" value="Validar" onclick="iniciarSesion()">
</form>
<a href="index.php">Volver</a>

<script>

function iniciarSesion()
{
    var password =  document.getElementById("uspass").value;
    alert(password);
    var passhash = CryptoJS.MD5(password).toString();
    alert(passhash);
    document.getElementById("uspass").value = passhash;

    setTimeout(function(){ 
        document.getElementById("formulario").submit();

	}, 500);
}
</script>
</div>
</div>

<?php
include_once '../estructura/pie.php';
?>