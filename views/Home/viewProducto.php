<?php 

require_once('Clases/viewProductoModel.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $producto = new viewProductoModel();
    $p =$producto->getCurrentProduct($id);
    $ps = $producto->getSimilarProductos();
}else{
    error_log('no existe');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>producto.css">
</head>
<body>
    
<div class="container-gral">
<?php require_once('views/header.php'); ?>
<div class="container">
    <div class="section-select_producto">
        <div class="img-producto_select">
            <img src="<?php echo URL_RAIZ.IMG.$p['imagen'] ?>" alt="" class="img">
            
        </div>
        <div class="info-producto_select">
            <form action="<?php echo URL_RAIZ;?>carrito/addCarrito" method="post">
            <input type="hidden" name="categoria-producto" id="categoria-producto" value ="<?php echo $p['categoria']?>" readonly>
            <input type="hidden" name="id-producto" id="id-producto" value="<?php echo $p['id'];?>">
            <input type="text" name="nombre-producto" id="nombre-producto" class="name-select"value="<?php echo $p['name'] ?>" readonly>
            <label for="codigo">Codigo:</label>
            <input type="text" name="codigo-producto" id="codigo-producto" value="<?php echo $p['codigo'] ?>" readonly> 
            <label for="desc">Precio de venta: por unidad</label>
            <input type="text" name="precio-producto" id="precio-producto" value="<?php echo $p['precio'].'Bs';?>" readonly>
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad-producto" id="cantidad-producto" value="1">
                <input type="submit" class="btn-selectProducto" value="AGREGAR AL CARRITO">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus nemo reiciendis ut totam recusandae quibusdam vitae quas, quasi fugiat. Asperiores nulla sint delectus quasi facilis, voluptatum fuga error quam vero!</p>
            </form>
        </div>
    </div>
    <div class="similar-products">
        <div class="header-similar_products">
            <h1>Explora productos similares</h1>
        </div>
        <div class="section-similar_products">
        <?php
      $items =[];
                    for($i=0;$i<count($ps);$i++){?>
                        
              <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="card-producto" method="post">
              <a href="<?php echo URL_RAIZ;?>viewProducto" class="">
                    <div class="image-producto">
                        <input type="image" src="<?php echo URL_RAIZ.IMG.$ps[$i]['imagen'];?>" alt=""name="img-producto" id="img-producto" class="image">
                    </div>
                    </a>
                <div class="info-productos">

                <div class="name-producto info-text">
                   <input type="text" name="nombre-producto" id="nombre-producto"  class="input-text nombre-info_text" value="<?php echo $ps[$i]['name']?>" readonly>
                   <input type="hidden" name="categoria-producto" id="categoria-producto" class="input-text categoria-info_text" value="<?php echo $ps[$i]['categoria']; ?>"readonly> 
                </div>
                        <div class="cod-producto info-text">
                            <label for="codigo" name="codigo">Codigo:</label>
                            <input type="text" name="codigo-producto" id="codigo-producto" class="input-text  codigo-info_text" value="<?php echo $ps[$i]['codigo']; ?>"readonly>
  
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio" >Precio:</label>
                        <input type="text" name="precio-producto" id="precio-producto" class="input-text precio-info_text" value="<?php echo $ps[$i]['precio'].'.bs';?>"readonly>

                        </div>  </div>
                        <input type="submit" value="AGREGAR AL CARRITO" class="btn-addCarrito" id="btn-addCarrito" name="btn-addCarrito">
                 
              </form>
                <?php }  ?>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
