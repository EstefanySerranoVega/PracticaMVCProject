<?php
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
            <img src="" alt="">
        </div>
        <div class="info-producto_select">
            <form action="<?php echo URL_RAIZ;?>sendCarrito">
                <label for="name-categoria">Categoria</label>
                <label for="name-producto">
                    <h1>Nombre del producto</h1>
                </label>
                <label for="desc">Precio de venta: por unidad</label>
                <label for="precio">Precio</label>
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad">
                <input type="submit" value="AGREGAR AL CARRITO">
                <input type="submit" value="COMPRAR AHORA!">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus nemo reiciendis ut totam recusandae quibusdam vitae quas, quasi fugiat. Asperiores nulla sint delectus quasi facilis, voluptatum fuga error quam vero!</p>
            </form>
        </div>
    </div>
    <div class="similar-products">
        <div class="header-similar_products">
            <h1>Explora productos similares</h1>
        </div>
        <div class="section-similar_products">
        <div class="card-producto" >
                    <div class="img-producto">
                        <img src="asd" alt="">
                    </div>
                    <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="info-producto">
                        <div class="name-producto info-text">
                            <label for="">Nombre del producto</label>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
        </div>
        <div class="card-producto" >
                    <div class="img-producto">
                        <img src="asd" alt="">
                    </div>
                    <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="info-producto">
                        <div class="name-producto info-text">
                            <label for="">Nombre del producto</label>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
        </div>
        <div class="card-producto" >
                    <div class="img-producto">
                        <img src="asd" alt="">
                    </div>
                    <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="info-producto">
                        <div class="name-producto info-text">
                            <label for="">Nombre del producto</label>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
        </div>
        <div class="card-producto" >
                    <div class="img-producto">
                        <img src="asd" alt="">
                    </div>
                    <form action="<?php echo URL_RAIZ;?>carrito/addProducto" class="info-producto">
                        <div class="name-producto info-text">
                            <label for="">Nombre del producto</label>
                        </div>
                        <div class="cod-producto info-text">
                            <label for="codigo">Codigo:</label>
                        </div>
                        <div class="precio-producto info-text">
                            <label for="precio">Precio:</label>
                        </div>
                        <button>Agregar al Carrito</button>
                    </form>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
