<?php
if($_GET['id']){
    $id = $_GET['id'];
    echo 'el id es: '.$id;
    require_once('Clases/sectionAlmacenModel.php');
    $almacen = new sectionAlmacenModel();
    $p =$almacen->getItem($id);
    require_once('Models/AlmacenProductoModel.php');
    $al = new AlmacenProductoModel();
    $a = $al->countProducto(2);
    var_dump($a);
}else{
    echo 'no se encontró el item';
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>lote.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="">
            
            <label for="codigo">CODIGO:</label>
            <input type="text" name="codigo" id="codigo" value="<?php echo $p[0]['codigo'];?>">
            <label for="producto">PRODUCTO:</label>
            <input type="text" name="producto" id="producto" value="<?php echo $p[0]['producto'];?>">
            <label for="categoria">CATEGORIA:</label>
            <input type="text" name="categoria" id="categoria" value="<?php echo $p[0]['categoria'];?>">
            <label for="proveedor">PROVEEDOR:</label>
            <input type="text" name="proveedor" id="proveedor" value="<?php echo $p[0]['proveedor'];?>">
            <label for="cantidad">CANTIDAD:</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php echo $p[0]['cantidad'];?>">
            <label for="precio">PRECIO:</label>
            <input type="number" name="precio" id="precio" value="<?php echo $p[0]['precio'];?>">
            <label for="precio">PRECIO DE VENTA:</label>
            <input type="number" name="precioVenta" id="precioVenta" value="<?php echo $p[0]['precio_v'];?>">
        </form>
    </div>
</body>
</html>