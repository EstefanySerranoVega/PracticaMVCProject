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

<a href="home.php">Volver al inicio</a>

    <div class="form form-newUser">
        <h1>NUEVO USUARIO</h1>
        <form action="" method="post" name="card-newUser">
                <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="text" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
            <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
            <input type="pass" name="passwordUsuario" placeholder="Contraseña">
            <input type="text" name="" placeholder="Confirme su contraseña">
            <input type="submit" value="Ingresar" name="btn-accederUser" id="btn btn-accederUser" class="btn btn-accederUser">
<?php
include('insertCliente.php');
?>
        </form>

    </div>
</body>

</html>