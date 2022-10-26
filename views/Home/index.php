<?php 
require_once('Clases/HomeModel.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuesta Ecommerce</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>home.css">

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
                    <h1>TITULO PUBLICIDAD DEL PRODUCTO!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, expedita! Hic, ullam quasi! Illo, cumque laudantium? Mollitia corporis praesentium consequatur, tenetur ut quia molestiae molestias commodi ratione facere et?
                        Ducimus?
                    </p>
                    <button>Ver producto</button>
                </div>
            </div>
            <div class="container">
                <div class="section-category">
                <?php
                    $category	 = new HomeModel();
                    $cat = $category->getAllCategory();
                    $items =[];
                    for($i=0;$i<count($cat);$i++){
                   array_push($items,$cat);?>
                   
                    <div class="category">
                 <?php 
                      echo $cat[$i][1]; ?>
                    </div>
                    <?php  }?>
           
                </div>
            <section class="section-destacados">
           
                <div class="title-section_destacados">
                    <h1>Productos destacados</h1>
                </div>
                
                
                <div class="section-productos_destacados">

                <?php
                    $productos = new HomeModel();
                    $producto = $productos->getAllProductos();
                    $items =[];
                    for($i=0;$i<count($producto);$i++){?>
                        
              
                    <div class="card-producto" >
                    <?php  array_push($items,$producto[$i]);
                    $id = $producto[$i]['ID_PRODUCTO'];
                    var_dump($id);?>
                    <div class="img-producto">
                        <img src="<?php echo URL_RAIZ.IMG.$producto[$i]['IMG_PRODUCTO'];?>" alt="">
                        
                    </div>
                    <form action="<?php echo URL_RAIZ;?>viewProducto/selectProducto/id=<?php echo $producto[$i]['ID_PRODUCTO']?>" class="info-producto" method="GET">
                    <div class="name-producto info-text">
                            <?php echo $producto[$i]['NOMBRE_PRODUCTO'].'<br>'; ?>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                            <?php echo $producto[$i]['CODIGO_PRODUCTO'].'<br>'; ?>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        <?php    echo $producto[$i]['PRECIO_VENTA_PRODUCTO'].'.bs'.'<br>';   ?>

                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
                    
       
                    </div>
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
                    $producto = $productos->getAllProductos();
                    $items =[];
                    for($i=0;$i<count($producto);$i++){?>
                        
              
                    <div class="card-producto" >
                    <?php  array_push($items,$producto[$i]);?>
                    <div class="img-producto">
                        <img src="<?php echo URL_RAIZ.IMG.$producto[$i]['IMG_PRODUCTO'];?>" alt="">
                        
                    </div>
                    <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="info-producto">
                    <div class="name-producto info-text">
                            <?php echo $producto[$i]['NOMBRE_PRODUCTO'].'<br>'; ?>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                            <?php echo $producto[$i]['CODIGO_PRODUCTO'].'<br>'; ?>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        <?php    echo $producto[$i]['PRECIO_VENTA_PRODUCTO'].'.bs'.'<br>';   ?>

                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
       
                    </div>
                <?php }  ?>
                </div>
            </section>
            </div>
         
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>