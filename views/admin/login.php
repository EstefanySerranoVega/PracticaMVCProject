
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL_RAIZ').constant('STYLE')?>login.css">
</head>
<body>
    <div class="container-gral">
        <div class="portada-login">
            <img src="<?php echo constant('URL_RAIZ').constant('IMG');?>tec.png" alt="">
        </div>
        <div class="login">
            <form action="<?php echo constant('URL_RAIZ');?>login/authenticate" method="post">
                <div class="header-form"><h2>INICIAR SESION</h2>
                <a href="<?php echo constant('URL_RAIZ');?>singup">Singup -></a>
            </div>
            <div class="content-form">
                <label for="name">Nombre de Usuario: </label>
                <input type="text" name="username" id="username" placeholder="Nombre de usuario">
                <label for="name">Contraseña: </label>
               <input type="password" name="password" id="password" placeholder="Contraseña">
                <input type="submit" value="INGRESAR" id="btn-login" class="btn-login">
           
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
    </div>
</body>
</html>