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
        <div class="Register">
            <form action="<?php
            echo constant('URL_RAIZ');?>singup/newUser" method="POST">
            <?php error_log('view/action '.constant('URL_RAIZ').'singup/newUser');?>
                <h2>Registrarse</h2>
                <h2>¿Tienes una cuenta? <a href="<?php echo constant('URL_RAIZ'); ?>/views/login/index.php"  >Iniciar Sesion</a> </h2>
                <label for="nombrePersona">Escriba su nombre</label>
                <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="text" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
                <input type="text" name="username" id="nameUser" placeholder="Nombre de usuario">
                <input type="password" name="password" id="password" placeholder="password">
                <input type="submit" value="Registrar" name="btn-newPersona" id="btn btn-newPersona" class="btn btn-newPersona">
            </form>
        </div>
    </div>
</body>
</html>