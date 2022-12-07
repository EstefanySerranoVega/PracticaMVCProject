<?php 
require_once('Clases/HomeModel.php');
require_once('helpers/html/require.php');
//require_once();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>home.css">
<script src="<?php echo URL_RAIZ.SCRIPT.'slider.js';?>"></script></script>
</head>

<body>
    <div class="container-page">
        <?php 
  require_once('views/header.php'); ?>
        
    <div class="container-gral">
        <div class="hero">
            <div class="img-producto_hero">
                <img src="<?php echo URL_RAIZ.IMG;?>audifonos.webp" alt="">
            </div>

            <div class="info-producto_hero">
                <h1 id="title-hero_home"class="title-hero_home">TITULO PUBLICIDAD DEL PRODUCTO!</h1>
                <p class="text-hero" id="text-hero_home" class="text-hero_home">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, expedita! Hic, ullam quasi! Illo, cumque laudantium? Mollitia corporis praesentium consequatur, tenetur ut quia molestiae molestias commodi ratione facere et?
                        Ducimus?
                </p>
                <button class="btn-hero_home">Ver producto</button>
            </div>
        </div>
        <div class="container">
            <div class="section-category">
                <?php
                $category	 = new HomeModel();
                $cat = $category->getAllCategory();
                $items =[];
                for($i=0;$i<count($cat);$i++){;?>
                   
                <div class="category">
                    <h2> <?php  echo $cat[$i]['name']; ?></h2>
                    </div>  <?php }?>
           
            </div>
            <section class="section-destacados">
                <div class="title-section_destacados">
                    <h1>Productos destacados</h1>
                </div>
                <div class="section-productos_destacados">
                <?php
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
            </section>
            <section class="section-ultimos">
                <div class="title-section_ultimos">
                    <h1>Ultimos productos</h1>
                </div>
                <div class="section-productos_ultimos">
                <?php
                    $productos = new HomeModel();
                    $producto = $productos->getAllDestacados();
                    for($i=0;$i<count($producto);$i++){
                        //<?php echo URL_RAIZ;carrito/addCarrito?>
                 <form action="<?php echo URL_RAIZ;?>carrito/addCarrito?id=<?php echo $producto[$i]['id_producto'];?>"  id="card_producto" class="card-producto" method="post">
  
                 <a href="<?php echo URL_RAIZ;?>viewProducto?id=<?php echo $producto[$i]['id_producto']?>" class="">
                    <div class="image-producto">
                        <img src="<?php echo URL_RAIZ.IMG.$producto[$i]['img_producto'];?>" alt="" name="img-producto" id="img-producto" class="img-producto">
                        <input type="hidden" name="id-producto" id="id-producto" value="<?php echo $producto[$i]['id_producto']?>">
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
            </section>
            </div>
         
        </div>
        <footer class="footer">
        </footer>
    </div>
</body>

</html>