<?php

    require_once('Models/ProveedorModel.php');
    $proveedor = new ProveedorModel();
    $pr = $proveedor->getAll();
    require_once('Models/ProductoModel.php');
    $producto = new ProductoModel();
    $p = $producto->getAll();

echo 'Ingresar nuevo lote, ahre';

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
        <form action="<?php echo URL_RAIZ;?>sectionAlmacen/AddLote" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $p[0]['id_producto'];?>" readonly>
           <label for="producto">SELECCIONE UN PRODUCTO:</label>
            <select name="id" id="id">
            <?php   
                  for($i=0; $i<count($p);$i++){
                   ?>
                <option value="<?php echo $p[$i]['ID_PRODUCTO'];?>">
                <?php echo $p[$i]['NOMBRE_PRODUCTO'];?>
                 </option>
               <?php 
               }
                ?>
            </select>
            <label for="proveedor">PROVEEDOR:</label>
            <select name="proveedor" id="proveedor">
            <?php   
                  for($i=0; $i<count($pr);$i++){
                   ?>
                <option value="<?php echo $pr[$i]['ID_PROVEEDOR'];?>">
                <?php echo $pr[$i]['EMPRESA_PROVEEDOR'];?>
                 </option>
               <?php 
               }
                ?>
            </select>
            <label for="cantidad">CANTIDAD:</label>
            <input type="number" name="cantidad" id="cantidad" >
            <label for="precio">PRECIO:</label>
            <input type="number" name="precio" id="precio" >
            <label for="precioVenta">PRECIO DE VENTA:</label>
            <input type="number" name="precioVenta" id="precioVenta" value="">
            <input type="submit" value="AGREGAR">
        </form>
    </div>
</body>
</html>