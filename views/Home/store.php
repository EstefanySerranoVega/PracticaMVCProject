<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php  echo URL_RAIZ.STYLE;?>store.css">
</head>
<body>
    <?php 
    require_once('views/header.php'); 
    require_once('Clases/StoreModel.php');
    require_once('Clases/HomeModel.php');
    $categoria = new StoreModel();
    $c = $categoria->getAllCategory();
?>
    <div class="container">

        <aside class="aside-categorias">
        <?php 
    for($i=0;$i<count($c);$i++){
    ?>
<div class="category">
    <h1><?php echo $c[$i]['name_category']?></h1>
    <div class="action">
        <div class="true">
    <div class="icon-cat">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
</svg>
    </div>
        </div>
    <div class="false">
        <div class="icon-cat">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/>
</svg>
    </div></div>
    </div>
    
</div>
<?php
    }
    ?>
        </aside>
        <div class="section-productos_store">
            <div class="section-productos">     <?php
                    $productos = new HomeModel();
                    $producto = $productos->getAllProductos();
                    for($i=0;$i<count($producto);$i++){
                        //<?php echo URL_RAIZ;carrito/addCarrito?>
                 
               
               <form action="<?php echo URL_RAIZ;?>carrito/addCarrito?id=<?php echo $producto[$i]['id_ap'];?>"  id="card_producto" class="card-producto" method="post">
  
                 <a href="<?php echo URL_RAIZ;?>viewProducto?id=<?php echo $producto[$i]['id_producto'];?>" class="">
                    <div class="image-producto">
                        <img src="<?php echo URL_RAIZ.IMG.$producto[$i]['img_producto'];?>" alt="" name="img-producto" id="img-producto" class="img-producto">
                        <input type="hidden" name="id-producto" id="id-producto" value="<?php echo $producto[$i]['id_producto'];?>">
                         </div>
                    </a>
                <div class="info-productos">

                <div class="name-producto info-text">
                    <label for="producto">Producto:</label>
                    <label for="producto"><?php echo $producto[$i]['nombre_producto'];?></label>
                    <input type="hidden" name="id-ap" id="id-ap" value="<?php echo $producto[$i]['id_ap'];?>">
                   <input type="hidden" name="nombre-producto" id="nombre-producto" value="<?php echo $producto[$i]['nombre_producto'];?>" readonly>
                   <input type="hidden" name="categoria-producto" id="categoria-producto" value="<?php echo $producto[$i]['categoria_producto']; ?>"readonly> 
                </div>
                        <div class="cod-producto info-text">
                            <label for="codigo" name="codigo">Codigo:</label>
                            <label for="codigo"><?php echo $producto[$i]['codigo_producto'];?></label>
                            <input type="hidden" name="codigo-producto" id="codigo-producto" value="<?php echo $producto[$i]['codigo_producto'];?>"readonly>
  
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                            <label for="precio"><?php echo $producto[$i]['precio_producto'].'.Bs';?></label>
                        <input type="hidden" name="precio-producto" id="precio-producto" value="<?php echo $producto[$i]['precio_producto'];?>"readonly>
                       </div>  
                </div>
                <button type="submit"  class="btn-addCarrito" id="btn-addCarrito" name="btn-addCarrito">AGREGAR AL CARRITO</button>
                 </form>
                
                <?php }  ?>
            </div>
        </div>
    </div>
</body>
</html> 