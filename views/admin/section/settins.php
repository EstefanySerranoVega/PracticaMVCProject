<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>settins.css">
</head>
<body>
<?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');?>

<div class="container-gral">
    <div class="menu-settins">
        <a href="<?php echo URL_RAIZ;?>settins/cliente">   
             <div class="options-settins new-cliente">
            <div class="icon">
            </div>
            CREAR NUEVO USUARIO CLIENTE
        </div>
    </a>
        <a href="<?php echo URL_RAIZ;?>settins/usuario?r=3">
        <div class="options-settins new-user">
        <div class="icon">
</div>
CREAR NUEVO USUARIO COLABORADOR</div>
</a>
<a href="<?php echo URL_RAIZ;?>settins/admin?r=2"> 
    <div class="options-settins new-admin">
        <div class="icon">
    </div>
    CREAR NUEVO USUARIO ADMINISTRADOR</div>
</a>
        <a href="">
        <div class="options-settins">
            PRODUCTOS ELIMINADOS
        </div>
    </a>
    <a href="">
        <div class="options-settins">
            CATEGORIAS ELIMINADAS
        </div>
    </a>
    <a href="">
        <div class="options-settins">
            PROVEEDORES ELIMINADOS
        </div>
    </a>
    </div>
   </div>
   </div>
</body>
</html>