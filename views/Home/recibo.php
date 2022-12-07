<?php
require_once('Models/AlmacenProductoModel.php');
require_once('Clases/pagarModel.php');
$pagar = new pagarModel();
$p = $pagar->getDataUser();
var_dump($p);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    recibo
    <form action="" class="form-recibo">
        <h1>Detalles de venta</h1>
        <label for="producto">Producto</label>
        <input type="text" name="producto">
        <a href="<?php echo URL_RAIZ;?>">Volver al home</a>
        <a href="<?php echo URL_RAIZ;?>venta/envio">Coordinar envío</a>
    </form>
</body>
</html>