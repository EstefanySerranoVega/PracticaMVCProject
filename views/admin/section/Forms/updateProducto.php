<?php
require_once('Models/CategoriaModel.php');
require_once('Models/ProveedorModel.php');
$cat = new CategoriaModel();
$c = $cat->getAll();
$items = [];
$prov = new ProveedorModel();
$p = $prov->getAll();
$provider=[];

require_once('Models/ProductoModel.php');
if($_GET['id']){
    $id = $_GET['id'];
$producto = new ProductoModel();
$product = $producto->get($id);
var_dump($id);
var_dump($product);

}else{
        echo 'no se ha encontrado el producto solicitado';
}

?><link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>formProducto.css">
<body class="body-formProducto">
<div class="producto">
        <h2>Actualizar PRODUCTO: </h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/newProducto" method = "post">
              
            <label for="nameProducto">Nombre del Producto: </label>
            <input type="text" name="nameProducto" id="nameProducto">
            <label for="selectCat" id="selectCat">Categoria: </label>
            
            <select name="category" id="category">
                <?php   
                  for($i=0; $i<count($c);$i++){
                   ?>
       <option value="<?php echo $c[$i]['ID_CATEGORIA']; ?>">
                <?php  echo $c[$i]['NOMBRE_CATEGORIA'];  ?>
                 </option>
               <?php 
               }
                ?>
        
            </select>
            <label for="cod" id="codigoProducto">Codigo: </label>
            <input type="text" name="codigoProducto" id="codigoProducto" value="<?php echo $product['CODIGO_PRODUCTO']?>">
            <label for="selectProv" id="selectProv">Proveedor: </label>
            <select name="provider" id="provider">
                <?php   
                  for($i=0; $i<count($p);$i++){
                   ?>
              <option value="<?php echo $p[$i]['ID_PROVEEDOR']; ?>">
                <?php  echo $p[$i]['EMPRESA_PROVEEDOR'];  ?>
                 </option>
               <?php 
               }
                ?>
        
            </select>
            <label for="cant" id="cant">Cantidad Producto: </label>
            <input type="number" name="cantidadProducto" id="cantidadProducto" >
            <label for="precio" id="precio">Precio de Adquisición: </label>
            <input type="number" name="precioA" id="precioA">
            <label for="precio" id="precio">Precio de venta: </label>
            <input type="number" name="precioVenta" id="precioVenta" value="">
            <input type="file" name="imgProducto" id="imgProducto">
            <input type="submit" value="GUARDAR" class="button">  
        </form>
        </div>
        
   
</body>