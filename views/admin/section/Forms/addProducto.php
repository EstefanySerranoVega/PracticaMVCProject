<?php
require_once('Models/CategoriaModel.php');
require_once('Models/ProveedorModel.php');
$cat = new CategoriaModel();
$c = $cat->getAll();
$items = [];
$prov = new ProveedorModel();
$p = $prov->getAll();
$provider=[];
?><link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>formProducto.css">
<body class="body-formProducto">
<div class="producto">
        <h2>NUEVO PRODUCTO: </h2>
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
            <input type="text" name="codigoProducto" id="codigoProducto">
            <label for="marca" id="marca">Marca: </label>
            <input type="text" name="marca" id="marca">
            <label for="industria" id="industria">Industria:</label>
            <input type="text" name="industria" id="industria">
            <label for="descripcion" id="descripcion">Descripcion: </label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
            <input type="file" name="imgProducto" id="imgProducto">
            <input type="submit" value="GUARDAR" class="button">  
        </form>
        </div>
        
   
</body>
