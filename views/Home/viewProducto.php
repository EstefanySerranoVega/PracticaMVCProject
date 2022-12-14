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
            <img src="<?php echo URL_RAIZ.IMG.$p[0]['img']; ?>" alt="" class="img">
        </div>
        <div class="info-producto_select">
            <form action="<?php echo URL_RAIZ;?>carrito/addCarrito" method="post">
            <div class="info-select">
            <input type="hidden" name="categoria-producto" id="categoria-producto" value ="<?php echo $p[0]['id_categoria'];?>" readonly>
            <input type="hidden" name="id-producto" id="id-producto" value="<?php echo $p[0]['id_producto'];?>">
            <input type="hidden" name="id-ap" id="id-ap" value="<?php echo $p[0]['id_ap'];?>">
            <input type="hidden" name="nombre-producto" id="nombre-producto" class="name-select" value="<?php echo $p[0]['nombre'];?>" readonly>
            
            <label for="producto" class="producto-name"><?php echo $p[0]['nombre'];?></label>
           <div class="text">
           <label for="codigo" class="sub">Codigo:</label>
            <label for="codigo"><?php echo $p[0]['codigo'];?></label>
           </div>
            <input type="hidden" name="codigo-producto" id="codigo-producto" value="<?php echo $p[0]['codigo'] ?>" readonly> 
            <div class="text">
            <label for="desc" class="sub">Precio de venta: por unidad</label>
            <label for="precio"><?php echo $p[0]['precio'].'.Bs';?></label>
            </div>
            <div class="text">
            <label for="desc" class="sub">Marca</label>
            <label for="precio"><?php echo $p[0]['marca'];?></label>
            </div>    <div class="text">
            <label for="desc" class="sub">Industria</label>
            <label for="precio"><?php echo $p[0]['industria'];?></label>
            </div>
            <input type="hidden" name="precio-producto" id="precio-producto" value="<?php echo $p[0]['precio'].'Bs';?>" readonly>
            
            <input type="hidden" name="cantidad-producto" id="cantidad-producto" value="1">
                <p><?php echo $p[0]['descripcion'] ?></p>
            </div>
                <button type="submit"  class="btn-addCarrito" id="btn-addCarrito" name="btn-addCarrito">AGREGAR AL CARRITO</button>
              
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
            for($i=0;$i<count($ps);$i++){
                ;?>
                        
              <form action="<?php echo URL_RAIZ;?>carrito/addCarrito?id=<?php echo $ps[$i]['id_ap'];?>" class="card-producto" method="post">
                <a href="<?php echo URL_RAIZ;?>viewProducto?id=<?php echo $ps[$i]['id_producto']?>" class="link-card" >
                    <div class="image-producto">
                        <img src="<?php echo URL_RAIZ.IMG.$ps[$i]['img_producto'];?>" alt="" name="img-producto" id="img-producto" class="img-producto">
                    </div>
                    </a>   
                    <div class="info-productos">
                <div class="name-producto info-text">
                    <label for="producto" class="product" ><?php echo $ps[$i]['nombre_producto'];?></label>
                    <input type="hidden" name="id-ap" id="id-ap" value="<?php echo $ps[$i]['id_ap'];?>">
                    <input type="hidden" name="id-producto" id="id-producto" value="<?php echo $ps[$i]['id_producto'];?>">
                   <input type="hidden" name="nombre-producto" id="nombre-producto" value="<?php echo $ps[$i]['nombre_producto'];?>" readonly>
                   <input type="hidden" name="categoria-producto" id="categoria-producto" value="<?php echo $ps[$i]['categoria_producto']; ?>"readonly> 
                </div>
                        <div class="cod-producto info-text">
                            <div class="text">
                            <label for="codigo" name="codigo">Codigo:</label>
                            <label for="codigo"><?php echo $ps[$i]['codigo_producto'];?></label>
                        </div>
                            <input type="hidden" name="codigo-producto" id="codigo-producto" value="<?php echo $ps[$i]['codigo_producto'];?>"readonly>
  
                        </div>
                        <div class="precio-producto info-text">
                      <div class="text">
                      <label for="precio">Precio:</label>
                            <label for="precio"><?php echo $ps[$i]['precio_producto'].'.Bs';?></label>
                       
                      </div>
                      <input type="hidden" name="precio-producto" id="precio-producto" value="<?php echo $ps[$i]['precio_producto'];?>"readonly>
                       </div>  
                </div>
                <button type="submit"  class="btn-addCarrito" id="btn-addCarrito" name="btn-addCarrito">AGREGAR AL CARRITO</button>
                 
              </form>
                <?php }  ?>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
