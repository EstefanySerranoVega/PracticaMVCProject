<?php 
require_once('Clases/pagarModel.php');
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
    <form action="<?php echo URL_RAIZ;?>pagar/procesar" method="post" class="pagar" id="form_pagar">
    <h1> <small>Datos del usuario</small></h1>
 <input type="text" name="total" id="total" value="<?php echo $d;?>">
        <label for="nombre">NOMBRE:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $p[0]['nombre'];?>">
        <label for="paterno">PATERNO:</label>
        <input type="text" name="paterno" id="paterno" value="<?php echo $p[0]['paterno'];?>">
        <label for="materno">MATERNO:</label>
        <input type="text" name="materno" id="materno" value="<?php echo $p[0]['materno'];?>">
        <label for="telefono">TELEFONO:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $p[0]['telefono'];?>">
        <label for="correo">CORREO:</label>
        <input type="text" name="correo" id="correo" value="<?php echo $p[0]['correo'];?>">
        <label for="direccion">DIRECCION:</label>
        <input type="text" name="direccion" id="dieccion" value="<?php echo $p[0]['direccion'];?>">
        <p>Verifique que sus datos sean correctos para procesar el pago y el envío</p>
        <input type="submit" value="PAGAR AHORA!">
    </form>
    <h1>Ejemplo <small>Formulario de pago</small></h1>

<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
    <?php
        
    $total = 0;
    $n = 0;
           foreach($_SESSION['carrito'] as $index=>$item){
           // var_dump(count($_SESSION['carrito']));
           //var_dump($index);
            ?>
                <?php
                require_once('Clases/sectionAlmacenModel.php');
                $almacen = new sectionAlmacenModel();
                $p = $almacen->getItem($item['id_ap']);
                ?>
                <div class="item">
               <label for="name-item"><?php echo $p[0]['producto']; ?></label>
                <input type="number" name="cant-item" id="cant-item" value="<?php echo $item['cantidad'];?>">
                <label for="precio-item"><?php echo $p[0]['precio_v'];?>.bs</label>
                <label for="total" name="total" id="total">Total:</label>
                <input type="number" name="total" id="total" value="<?php echo number_format( $item['cantidad'] * $p[0]['precio_v']);?>">
                </div>
                <?php 
                $n++;
                $total =  $total + $item['cantidad'] * $p[0]['precio_v'];
                } ?>
    <!-- Valores requeridos -->
    <input type="hidden" name="business" value="sb-j7fah15266486@business.example.com">
    <input type="hidden" name="cmd" value="_xclick">

    <label for="item_name" class="form-label">Nombre del Producto:</label>
    <input type="text" name="item_name" id="" value="productos" required=""><br>

    <label for="amount" class="form-label">Precio:</label>
    <input type="text" name="amount" id="" value="<?php echo $d;?>" required=""><br>

    <input type="hidden" name="currency_code" value="EUR">

    <label for="quantity" class="form-label">Cantidad:</label>
    <input type="text" name="quantity" id="" value="1" required=""><br>

    <!-- Valores opcionales -->
    <!-- En el siguiente enlace puedes encontrar una lista completa de Variables HTML para pagos estándar de PayPal. -->
    <!-- https://developer.paypal.com/docs/paypal-payments-standard/integration-guide/Appx-websitestandard-htmlvariables/ -->

    <input type="hidden" name="item_number" value="1">
    <!-- <input type="hidden" name="invoice" value="0012"> -->

    <input type="hidden" name="lc" value="es_ES">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="return" value="<?php URL_RAIZ; ?>receptor">
    <input type="hidden" name="cancel_return" value="<?php URL_RAIZ; ?>">

    <hr>

    <button type="submit">Pagar ahora con Paypal!</button>

</form>
</div>

</body>
</html>