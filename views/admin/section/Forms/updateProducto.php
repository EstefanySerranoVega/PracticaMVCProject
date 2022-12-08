<?php
require_once('helpers/html/require.php');
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

}else{
        echo 'no se ha encontrado el producto solicitado';
}

?><link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>formProducto.css">
<body class="body-formProducto">
<div class="producto">

        <h2>Actualizar PRODUCTO: </h2>
        <form action="<?php echo URL_RAIZ;?>Dashboard/updateProducto" method = "post">
             <input type="hidden" name="id" id="id" value="<?php echo $product['ID_PRODUCTO'];?>">
             <div class="data">
             <label for="nameProducto">Nombre del Producto: </label>
            <input type="text" name="nameProducto" id="nameProducto" value="<?php echo $product['NOMBRE_PRODUCTO'] ?>">
           
             </div>
        <div class="data">
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
            <input type="text" name="codigoProducto" id="codigoProducto" value="<?php echo $product['CODIGO_PRODUCTO'];?>" value="">
            
        </div>
        <div class="data">
        <label for="marca" id="marca">Marca: </label>
            <input type="text" name="marca" id="marca" value="<?php echo $product['MARCA_PRODUCTO'];?>">
            <label for="industria" id="industria">Industria:</label>
            <input type="text" name="industria" id="industria" value="<?php echo $product['INDUSTRIA_PRODUCTO'];?>">
            
        </div>
     <div class="data">
     <label for="descripcion" id="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $product['DESCRIPCION_PRODUCTO'];?>">
           
     </div>
     <div class="container-img">
     <div class="img">
     <img src="<?php echo URL_RAIZ.IMG. $product['IMG_PRODUCTO'];?>" alt="">
     </div> 
     <div class="text">
     <input type="file" name="imgProducto" id="imgProducto">
     <label for="descripcion">Descripcion:</label>
     <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
          
     </div> 
     </div>
      <input type="submit" value="GUARDAR" class="button">  
        </form>
        </div>
        
   
</body>