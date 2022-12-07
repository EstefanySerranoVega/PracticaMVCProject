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
<h1>Formulario de pago <small><?php echo 'Bienvenido '.$p[0]['nombre'].'! por favor revise sus datos';?></small></h1>


<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
    <h1> <small>Datos del usuario</small></h1>
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
        <input type="text" name="direccion" id="dieccion" value="<?php echo $p[0]['direccion'];?>">
    </div>
</div>
<h2>PRODUCTOS:</h2>
<div class="data-producto">
<?php
    $total = 0;
    $n = 0;
           foreach($_SESSION['carrito'] as $index=>$item){
                require_once('Clases/sectionAlmacenModel.php');
                $almacen = new sectionAlmacenModel();
                $p = $almacen->getItem($item['id_ap']);
                ?>
                <div class="item">
               <label for="name-item"><?php echo $p[0]['producto']; ?></label>
               <label for="cantidad">Cantidad:</label> 
               <label for="cantidad"><?php echo $item['cantidad'];?></label>
                <input type="hidden" name="cant-item" id="cant-item" value="<?php echo $item['cantidad'];?>">
                
              <label for="precio">Precio:</label>
               <label for="precio-item"><?php echo $p[0]['precio_v'];?>.bs</label>
                <label for="total" name="total" id="total">Total:</label>
                <label for="total"><?php echo number_format( $item['cantidad'] * $p[0]['precio_v']);?></label>
                <input type="hidden" name="total" id="total" value="<?php echo number_format( $item['cantidad'] * $p[0]['precio_v']);?>">
                </div>
                <?php 
                $n++;
                $total =  $total + $item['cantidad'] * $p[0]['precio_v'];
                } ?>
    
    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="sb-x1y0c21745031@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <input type="hidden" name="item_name" id="" value="productos" required=""><br>
<label for="total">Total a pagar:</label>
<label for="total"><?php echo $d;?></label>
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