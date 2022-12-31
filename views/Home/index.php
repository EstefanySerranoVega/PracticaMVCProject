<?php 
require_once('Clases/HomeModel.php');
require_once('Clases/sectionAdministrarModel.php');
$slider = new sectionAdministrarModel();
$sl = $slider->getDataSlider();
//require_once();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <link rel="stylesheet" href="<?php 
    echo URL_RAIZ.STYLE;?>home.css">
<script src="<?php echo URL_RAIZ.SCRIPT.'slider.js';?>"></script></script>
</head>

<body>
    <div class="container-page">
        <?php 
  require_once('views/header.php'); ?>
        
    <div class="container-gral">
        <div  class="hero" >
            <div class="img-producto_hero">
                <img src="<?php echo URL_RAIZ.IMG.$sl[0]['img'];?>" alt="">
            </div>

            <div class="info-producto_hero">
                <h1 id="title-hero_home"class="title-hero_home"><?php echo $sl[0]['titulo'];?></h1>
                <p class="text-hero" id="text-hero_home" class="text-hero_home">
                <?php echo $sl[0]['texto'];?> </p>
                <a href="<?php echo URL_RAIZ;?>viewProducto?id=<?php echo $sl[0]['id_p'];?>">
                <button type="submit" class="btn-hero_home" >Ver producto</button>
            </a>
           
            </div>
        </div>
        <div class="container">
            <div class="section-category">
                <?php
                $category	 = new HomeModel();
                $cat = $category->getAllCategory();
                $items =[];
                for($i=0;$i<count($cat);$i++){;?>
                   
                <a href="<?php echo URL_RAIZ;?>home/category?cat=<?php echo $cat[$i]['id']?>"  class="category">
                <div class="category">
                    <h2> <?php  echo $cat[$i]['name']; ?></h2>
                    </div>
                </a>  <?php }?>
           
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
                   <label for="producto"><h4><?php echo $producto[$i]['nombre_producto'];?></h4></label>
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
                            <label for="precio">Bs.-<?php echo number_format($producto[$i]['precio_producto'],2);?></label>
                        <input type="hidden" name="precio-producto" id="precio-producto" value="<?php echo $producto[$i]['precio_producto'];?>"readonly>
                       </div>  
                </div>
                <button type="submit"  class="btn-addCarrito" id="btn-addCarrito" name="btn-addCarrito">AGREGAR AL CARRITO</button>
                 </form>
                <?php }  ?>
                </div>
            </section>
            <section class="section-categories">
                <div class="banner-category first-category">
                    <a href="">
                    <div class="img">
            <img src="<?php echo URL_RAIZ.IMG;?>aq.jpg" alt="">
            </div> 
            <div class="text">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim quas facere quisquam voluptate debitis praesentium deleniti doloribus temporibus ab vero?

                </p>
                <button>Ver más</button>
            </div>
                    </a>
       
            </div>
                <div class="banner-category second-category">
            <a href="">
            <div class="img">
            <img src="<?php echo URL_RAIZ.IMG;?>microfono.webp" alt="">
            </div> 
            <div class="text">
                <p>Lorem Enim quas facere quisquam praesentium deleniti doloribus temporibus ab vero?
                    
                </p>
                
                <button>Ver más</button>
            </div>
            </a>
                </div>
                <div class="banner-category third-category">
                <a href="">
                <div class="img">
            <img src="<?php echo URL_RAIZ.IMG;?>sandberg.jpg" alt="">
            </div> 
            <div class="text">
                <p>Lorem ipsum dolor adipisicing elit.voluptate debitis praesentium deleniti doloribus temporibus ab vero?
                    
                </p>
                
                <button>Ver más</button>
            </div>
                </a>
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
    <label for="producto"><h4><?php echo $producto[$i]['nombre_producto'];?></h4></label>
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
            <label for="precio">Bs.-<?php echo number_format($producto[$i]['precio_producto'],2);?></label>
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
        <?php
        
        require_once('views/footer.php');
        ?>
</body>

</html>
<?php 
require_once('helpers/html/require.php');
?>