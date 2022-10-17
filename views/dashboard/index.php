<?php
require_once('Models/DashboardModel.php');

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
    <h2>NUEVA CATEGORIA: </h2>
    <form action="<?php
            echo constant('URL_RAIZ');?>Dashboard/newCategoria" method = "post">
            <label for="nameCategory">Nombre de la categoria: </label>  
            <input type="text" name="nombreCategoria" id="nonmbreCategoria">
            <input type="submit" value="GUARDAR">  
    </form>
    <h2>NUEVO PRODUCTO: </h2>
    <form action="<?php
            echo constant('URL_RAIZ');?>Dashboard/newProducto" method = "post">
          
        <label for="nameProducto">Nombre del Producto: </label>
        <input type="text" name="nameProducto" id="nameProducto">
        <label for="selectCat">Selecione una categoria: </label>
        <?php 
            
            $Dashboard = new DashboardModel(); 
            $category = $Dashboard->getAllCategory()
            foreach( $category as $name):
            $id = $category['id_categoria'];
            $nm = $category['nombre_categoria'];
            $id = $category['id_categoria'];
            $id = $category['id_categoria'];
            ?><select name="category" id="category">
           
            <option value="option"> <?php echo $name; ?>  </option>
            <?php endforeach; ?>
        </select>
        <label for="cod">Codigo del Producto: </label>
        <input type="text" name="codigoProducto" id="codigoProducto">
        <label for="cant">Cantidad Producto: </label>
        <input type="number" name="cantidadProducto" id="cantidadProducto">
        <label for="precio">Precio de venta del Producto: </label>
        <input type="number" name="precioVenta" id="precioVenta">
        <input type="submit" value="GUARDAR">  
    </form>

    <h2>NUEVO PROVEEDOR:</h2>
    <form action="<?php
            echo constant('URL_RAIZ');?>Dashboard/newProveedor" method = "post">
            
        <label for="prov">Empresa proveedor:</label>
        <input type="text" name="empresaProveedor" id="empresaProveedor">    
        <label for="email">Correo proveedor:</label>
        <input type="email" name="correoProveedor" id="correoProveedor">
        <input type="submit" value="GUARDAR">  
            
    </form>
</body>
</html>