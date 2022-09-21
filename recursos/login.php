<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="content_back-login">
            <div class="card-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesión para ver más contenido</p>
                <button id="btn-login">Iniciar Sesion</button>
            </div>
            <div class="card-register">
                <h3>¿Aún no tienes cuenta?</h3>
                <p>Únete para ver nuestras actualizaciones</p>
                <button id="btn-register">Registrarse</button>
           <a href="newUser.php">Registrarse</a>
            </div>
        </div>
        <div class="content_login-register">
        <div class="form-login">
        <form action="#" method="post" class="user">
            <?php
            if (isset($errorLogin)) {
                echo $errorLogin;
            }
            ?>
            <h1>INICIAR SESION</h1>
            <input type="text" name="username" id="name" class="name">
            <input type="text" name="password" id="pass" class="pass">
            <input type="submit" value="VER" name="login" id="btn-login">
            
        </form>

    </div>
    <div class="form-register">
        <h1>REGISTRARSE</h1>
        <form action="" method="post" name="card-newUser">
                <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="text" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
            <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
            <input type="pass" name="passwordUsuario" placeholder="Contraseña">
            <input type="text" name="" placeholder="Confirme su contraseña">
            <input type="submit" value="Ingresar" name="btn-accederUser" id="btn-accederUser" class="btn btn-accederUser">

        </form>

    </div>
        </div>
    </div>


</body>

</html>