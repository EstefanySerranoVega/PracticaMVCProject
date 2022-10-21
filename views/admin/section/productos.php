<?php
require_once('Models/sectionProductos.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>sectionProductos.css">
</head>

<div class="container-page">
        <div class="menu">
            
        <div class="section-menu my-profile">
            <div class="profile">
                
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg>
            </div>
            <h2>Mi Perfil</h2>
            </div>
        </div>
            <div class="section-menu panel-admin">
                <ul>
                    <li>
                    <a href="">AGREGAR</a></li>
                    <li>
                        <a href="<?php echo URL_RAIZ;?>sectionProductos">VER PRODUCTOS</a>
                    </li>
                    <li>
                    <a href="">VER CLIENTES</a></li>
                    <li>
                    <a href="">VER VENTAS</a></li>
                </ul>
            </div>
            <div class="section-menu">
                <ul>
                    <li>
                        <a href="<?php echo URL_RAIZ;?>">Ver pagina</a>
                    </li>
                </ul>
            </div>

        </div>
        
    <div class="container">
        <div class="welcome-dashboard">
            
            <div class="text">
                <h2>Aquí puedes gestionar la información que desees, echa un vistazo!</h2>
                <button class="button">Explorar</button>
            </div>
            <div class="img">
                <img src="<?php echo URL_RAIZ.IMG;?>welcome.webp" alt="">
            </div>
        </div>
        <div class="productos">
        <?php
        $productos = new sectionProductosModel(); 
        $producto = $productos->getAllProductos();
    ?>
    <table border="1" >
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        <?php
              $res = [];
              for($i=0;$i<count($producto);$i++){
                
              array_push($res,$producto[$i][1]);  ?>
        <tr>
     
            <td> <?php echo $producto[$i][3]; ?> </td>
            <td> <?php echo $producto[$i][2]; ?> </td>
            <td> <?php echo $producto[$i][1]; ?> </td>
            <td> <?php echo $producto[$i][6]; ?> </td>
            <td> <?php echo $producto[$i][4]; ?> </td>
            <?php } ?>
        </tr>
    </table>
        </div>
    
        </div>
        <div class="options">
            <div class="section-option">
                <div class="categoria">
        <h2>NUEVA CATEGORIA: </h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/newCategoria" method = "post">
                <label for="nameCategory">Nombre de la categoria: </label>  
                <input type="text" name="nombreCategoria" id="nonmbreCategoria">
                <input type="submit" value="GUARDAR" class="button">  
        </form>
                </div>
            </div>
            <div class="section-option">
                <div class="proveedor">
                    
        <h2>NUEVO PROVEEDOR:</h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/newProveedor" method = "post">
                
            <label for="prov">Empresa proveedor:</label>
            <input type="text" name="empresaProveedor" id="empresaProveedor">    
            <label for="email">Correo proveedor:</label>
            <input type="email" name="correoProveedor" id="correoProveedor">
            <input type="submit" value="GUARDAR" class="button">  
            </form> 
                </div>
            </div>
            <div class="section-option"></div>
            <div class="section-option"></div>
        </div>
    </div>
</body>
</html>
<body>
    Seccion productos del administrador
    
</body>
</html>