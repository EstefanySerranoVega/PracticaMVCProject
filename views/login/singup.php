<?php

require_once('helpers/html/require.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE?>singup.css">
</head>
<body>
    
    <div class="container-gral">
        <div class="singup">
            <form action="<?php
            echo constant('URL_RAIZ');?>singup/newUser" method="POST">
               <div class="header-form">
               <h2>Registrarse</h2>
                <p>¿Tienes una cuenta? <a href="<?php echo constant('URL_RAIZ'); ?>login"  >Iniciar Sesion</a> </p> 
               </div>
            <div class="content-form">
                <input type="hidden" name="rol" id="rol" value="<?php echo $rol;?>">
               <label for="nombrePersona">Escriba su nombre</label>
                <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="tel" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
                <input type="text" name="username" id="nameUser" placeholder="Nombre de usuario">
                <input type="password" name="password" id="password" placeholder="password">
                <input type="submit" value="Registrar" name="btn-newPersona" id="btn btn-newPersona" class="btn btn-newPersona">
            
            </div>
            <div class="header-form">
                <a href="<?php echo URL_RAIZ ?>">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            </div>
            </a>
            </div>
            </form>
        </div>
        <div class="portada-singup">
            <img src="<?php echo URL_RAIZ.IMG;?>tec-1.png" alt="">
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE?>singup.css">
</head>
<body>
    
    <div class="container-gral">
        <div class="singup">
            <form action="<?php
            echo constant('URL_RAIZ');?>singup/newCliente" method="POST">
               <div class="header-form">
               <h2>Registrarse</h2>
                <p>¿Tienes una cuenta? <a href="<?php echo constant('URL_RAIZ'); ?>login"  >Iniciar Sesion</a> </p> 
               </div>
            <div class="content-form">
                
                <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="tel" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="email" name="emailCliente" id="emailCliente" placeholder="Email">
                <input type="text" name="direccion" id="direccion" placeholder="Direccion">
                <input type="date" name="nacPersona" id="nacPersona">
                <input type="text" name="username" id="nameUser" placeholder="Nombre de usuario">
                <input type="password" name="password" id="password" placeholder="password">
                <input type="submit" value="Registrar" name="btn-newPersona" id="btn btn-newPersona" class="btn btn-newPersona">
            
            </div>
            <div class="header-form">
                <a href="<?php echo URL_RAIZ ?>">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            </div>
            </a>
            </div>
            </form>
        </div>
        <div class="portada-singup">
<img src="<?php echo URL_RAIZ.IMG;?>tec-1.png" alt="">
        </div>
    </div>
</body>
</html>