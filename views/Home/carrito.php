<?php  
require_once('Clases/CarritoModel.php');
$carrito = new CarritoModel();
$lista = $carrito->listProducts();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>carrito.css">
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <div class="container">
        <div class="shopping-cart">
         
         
            <div class="header-shopping_cart">
                <h1>Shopping cart</h1>
                <p class="num-items">Num Items</p>
            </div>   <?php

            if(!empty($_SESSION['carrito'])){
    $total = 0;
    $n = 0;
           foreach($_SESSION['carrito'] as $index=>$item){
           // var_dump(count($_SESSION['carrito']));
           var_dump($index);
            ?>
            <form action="">
                <?php
                require_once('Clases/sectionAlmacenModel.php');
                $almacen = new sectionAlmacenModel();
                $p = $almacen->getItem($item['id']); ?>
                <div class="item">
                <img src="<?php echo URL_RAIZ.IMG.$p[0]['img'];?>" alt="" class="img-item">
                <label for="name-item"><?php echo $p[0]['producto'] ?></label>
                <input type="number" name="cant-item" id="cant-item" value="<?php echo $item['cantidad']?>">
                <label for="precio-item"><?php echo $p[0]['precio_v'] ?>.bs</label>
                <label for="total" name="total" id="total">Total:</label>
                <input type="number" name="total" id="total" value="<?php echo number_format( $item['cantidad'] * $p[0]['precio_v']);?>">
               
                <a href="<?php echo URL_RAIZ;?>carrito/deleteItems?item=<?php echo $p[0]['id_producto']?>">
               <div class="icon-delete">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                </div>
                </a>
                </div>
                <?php 
                $n++;
                $total =  $total + $item['cantidad'] * $p[0]['precio_v'];
              
                }
            ?>
            </form>
            <?php
          }else{
            echo 'el carrito está vacío';}
          ?>
            <div class="button-back">
                <div class="icon-back">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M109.3 288L480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288z"/></svg>
                </div>
            </div>
        </div>
        <div class="summary">
            <div class="header-summary">
                <h2>Summary</h2>
            </div>
            <form action="">
                <div class="header-form_summary">
                <label for="num-items">Total de productos seleccionados:</label>
                <label for="total-items"><?php  echo $n;?> items</label>
                </div>
                <div class="footer-form_summary">
                <label for="total-price" class="total-price">PRECIO TOTAL</label>
                <label for="total-shop" class="total-shop"> <?php 
                echo $total;?>.bs</label>

                </div>
                <input type="submit" value="COMPRAR AHORA!" class="btn-checkout">
            </form>
        </div>
      
      
    </div>
</body>
</html>