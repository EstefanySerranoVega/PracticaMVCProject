<?php 
require_once('Clases/pagarModel.php');
require_once('helpers/html/require.php');
$pagar = new pagarModel();
$p = $pagar->getDataUser();
$d = $pagar->getTotalCarrito();
require_once('Clases/sectionAlmacenModel.php');
$almacen = new sectionAlmacenModel();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>pagar.css">
</head>
<body>
<div class="container-gral">


<div class="form-pago"> 
    <div class="option-back">
    <a href="<?php echo URL_RAIZ ?>">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
            </svg>
            </div>
    </a>
    <a href="<?php echo URL_RAIZ;?>carrito">
            
            <div class="icon">
             <div class="icon addCart"> 
                 <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/>
                </svg>
             </div>
             </div>    
         </a>
    </div>
<h1>Formulario de pago <br><small><?php echo 'Bienvenido '.$p[0]['nombre'].'! por favor revise sus datos';?></small></h1>


<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
    <h1> <small class="d">Datos del usuario</small></h1>
<div class="data-user">
<input type="hidden" name="total" id="total" value="<?php echo $d;?>">
       
<div class="user">
<div class="text">
    <label for="nombre">NOMBRE:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $p[0]['nombre'];?>">
</div>
<div class="text">
<label for="paterno">PATERNO:</label>
        <input type="text" name="paterno" id="paterno" value="<?php echo $p[0]['paterno'];?>">
       
</div>
       <div class="text">  <label for="materno">MATERNO:</label>
        <input type="text" name="materno" id="materno" value="<?php echo $p[0]['materno'];?>">
        </div>
</div>
       <div class="text"> <label for="telefono">TELEFONO:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $p[0]['telefono'];?>">
       </div> 
       <div class="text"><label for="correo">CORREO:</label>
        <input type="text" name="correo" id="correo" value="<?php echo $p[0]['correo'];?>">
        
    </div>
    <div class="text">
        <label for="direccion">DIRECCION:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $p[0]['direccion'];?>">
    </div>
</div>
<h2>PRODUCTOS:</h2>
<div class="data-producto">
    <div class="table-items">
        <div class="header-table">
        <div class="cell-header">
    <label for="cantidad">PRODUCTO</label> 
    </div>
    <div class="cell-header">
    <label for="cantidad">CANTIDAD</label> 
    </div> 
    <div class="cell-header">
    <label for="cantidad">PRECIO</label> 
    </div>
    <div class="cell-header">
    <label for="cantidad">TOTAL</label> 
    </div>
        </div>
        <div class="body-table">
            <?php
    $total = 0;
    $n = 0;
           foreach($_SESSION['carrito'] as $index=>$item){
                require_once('Clases/sectionAlmacenModel.php');
                $almacen = new sectionAlmacenModel();
                $p = $almacen->getItem($item['id_ap']);
                ?>
                <div class="row">
                <div class="cell-table">
            <label for="name-item"><?php echo $p[0]['producto']; ?></label>
              
            </div>   
             <div class="cell-table">
            <label for="name-item"><?php echo  $item['cantidad']; ?></label>
            </div>   
             <div class="cell-table">
            <label for="name-item"><?php echo $p[0]['precio_v'].'.Bs'; ?></label>
            </div>    
            <div class="cell-table">
            <label for="name-item"><?php echo number_format( $item['cantidad'] * $p[0]['precio_v']).'.Bs';?></label>
            </div>  
                </div>
                <?php 
                $n++;
                $total =  $total + $item['cantidad'] * $p[0]['precio_v'];
                } ?> 
        </div> 
 
           
    </div>

    <div class="text-total">
<label for="total">Total a pagar:</label>
<label for="total"><h2><?php echo $d.'.Bs';?></h2></label>

    </div>

        
    
    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="sb-x1y0c21745031@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <input type="hidden" name="item_name" id="" value="productos" required=""><br>

    <input type="hidden" name="amount" id="" value="<?php echo $d;?>" required=""><br>

    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="quantity" id="" value="1" required=""><br>

    <!-- Valores opcionales -->
    <!-- En el siguiente enlace puedes encontrar una lista completa de Variables HTML para pagos estándar de PayPal. -->
    <!-- https://developer.paypal.com/docs/paypal-payments-standard/integration-guide/Appx-websitestandard-htmlvariables/ -->

    <input type="hidden" name="item_number" value="1">
   <!-- <input type="hidden" name="invoice" value="0012">  -->

    <input type="hidden" name="lc" value="es_ES">
    <input type="hidden" name="no_shipping" value="0">
   <!-- <input type="hidden" name="image_url" value="https://picsum.photos/150/150"> -->
    <input type="hidden" name="return" value="<?= URL_RAIZ;?>pagar/success">
    <input type="hidden" name="cancel_return" value="<?= URL_RAIZ; ?>pagar/cancelar">

    <hr>
</div>

    <button type="submit">Pagar ahora con Paypal!</button>

</form>
<a href="<?php echo URL_RAIZ;?>pagar/cancelar">
    <button>CANCELAR</button>
</a>
</div>