<?php
$titulo =".: Carrito compras :.";
$dir="";
include ($dir."../estructura/header.php");


?> 	<section class="shopping-cart dark">
<div class="container">
   <div class="block-heading">
     <h2>Carrito de compras</h2>
  
   </div>
   <div class="content">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                                <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/wShpvTg/C3.webp">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Lorem Ipsum dolor</a>
                                                <div class="product-info">
                                                    <div>Display: <span class="value">5 inch</span></div>
                                                    <div>RAM: <span class="value">4GB</span></div>
                                                    <div>Memory: <span class="value">32GB</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 quantity">
                                            <label for="quantity">Quantity:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-3 price">
                                            <span>$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex">
                                <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/SXwW8g6/E1.webp">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Lorem Ipsum dolor</a>
                                                <div class="product-info">
                                                    <div>Display: <span class="value">5 inch</span></div>
                                                    <div>RAM: <span class="value">4GB</span></div>
                                                    <div>Memory: <span class="value">32GB</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 quantity">
                                            <label for="quantity">Quantity:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-3 price">
                                            <span>$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="row">
                            <div class="col-md-3 d-flex"width="300px" height="">
                             
                                <img class="img-fluid mx-auto d-flex image" src="https://i.ibb.co/V2TFP2R/C6.webp" >
                             </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">Lorem Ipsum dolor</a>
                                                <div class="product-info">
                                                    <div>Display: <span class="value">5 inch</span></div>
                                                    <div>RAM: <span class="value">4GB</span></div>
                                                    <div>Memory: <span class="value">32GB</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 quantity">
                                            <label for="quantity">Quantity:</label>
                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                        </div>
                                        <div class="col-md-3 price">
                                            <span>$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="summary">
                    <h3>Resumen</h3>
                    <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
                  
                    
                    <button type="button" class="btn btn-primary btn-lg btn-block">Comprar</button>
                </div>
            </div>
        </div> 
    </div>
</div>
</section>
<?php 
include ($dir."../estructura/footer.php");


?>