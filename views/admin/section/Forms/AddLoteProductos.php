<?php
if($_GET['id']){
    $id = $_GET['id'];
    echo 'el id es: '.$id;
    require_once('Clases/sectionAlmacenModel.php');
    $almacen = new sectionAlmacenModel();
    $p =$almacen->getItem($id);
    require_once('Models/ProveedorModel.php');
    $proveedor = new ProveedorModel();
    $pr = $proveedor->getAll();
}else{
    echo 'no se encontrĂ³ el item';
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
        <form action="<?php echo URL_RAIZ;?>sectionAlmacen/AddLote" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $p[0]['id_producto'];?>" readonly>
           
            <label for="codigo">CODIGO:</label>
            <input type="text" name="codigo" id="codigo" value="<?php echo $p[0]['codigo'];?>" readonly>
            <label for="producto">PRODUCTO:</label>
            <input type="text" name="producto" id="producto" value="<?php echo $p[0]['producto'];?>" readonly>
            <label for="categoria">CATEGORIA:</label>
            <input type="text" name="categoria" id="categoria" value="<?php echo $p[0]['name_cat'];?>" readonly>
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