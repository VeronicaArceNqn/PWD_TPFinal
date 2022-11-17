<?php
$titulo =".: Inicio :.";
$dir="";
include ($dir."../estructura/header.php");
//include ($dir."../login.php");
?>
<style>
.card {
   
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 width: 420px;
  
  margin: 20px;
  text-align: center;
  font-family: arial;
   float:left;
   border:#353A40 solid 1px;  
   margin-bottom: 20px;
}
.card .contenedorImg{
        display: flex;
        background-color: transparent;
        width: 100%;
        height: 120px;
        justify-content:center;
    } 
    .imagen{
        object-fit: contain;
        width: 85%;
        height: 85%;
        text-align: center;
        padding: -25px;
        background-color: transparent;
    }
.price {
  color: grey;
  font-size: 22px;
}
.producto p{
     
     color:#353A40 ;
     text-align: center;
     cursor: pointer;
 
 }
  .titulo{  
     color:#353A40 ;
     text-align: center;
     font-weight: bold;
 }
  .titulo:hover{  
     color:#5bc0de ;
     text-align: center;
     cursor:pointer;
 }
 .precioProducto {
     font-weight:bold;
     font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     font-size: large;
     color: #0d6efd;
 }
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #ffc107;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
 
}

.card button:hover {
  opacity: 0.7;
}
</style>


<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/C1-2.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">20000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 2mpx</a>

  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/C3.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">21000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 3mpx</a>
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/C2.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">23000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 4mpx</a>
  
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/c4.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">25000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 5mpx</a>
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/c5.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">26000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 5mpx</a>
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/A1.webp" alt="Denim Jeans" class="imagen">
</div><h2>WD</h2>
<p class="precioProducto">24000 $</p>
        <a class="titulo" href="#" onclick="">Disco duro WD Purple 1TB</a>
 
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/E2.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">34000 $</p>
        <a class="titulo" href="#" onclick="">DVR Dahua 4108</a>
 
  <p><button>Agregar</button></p>
</div>
<div class="card">
<div class="contenedorImg">
  <img src="../../uploads/E1.webp" alt="Denim Jeans" class="imagen">
</div><h2>Dahua</h2>
<p class="precioProducto">24000 $</p>
        <a class="titulo" href="#" onclick="">Camara Dahua 4104</a>
 
  <p><button>Agregar</button></p>
</div>

    <?php 

include ($dir."../estructura/footer.php");
?>