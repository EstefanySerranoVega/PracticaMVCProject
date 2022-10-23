<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container-gral">
<?php require_once('views/header.php'); ?>
<div class="container">
    <div class="section-select_producto">
        <div class="img-producto_select">
            
        </div>
        <div class="info-producto_select">
            <form action="<?php echo URL_RAIZ;?>sendCarrito"></form>
        </div>
    </div>
    <div class="similar-products"></div>
</div>
</div>
</body>
</html>