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
    
<div class="form form-proveedor">
            <h1>INSERTAR PROVEEDOR</h1>
            <form action="BD/principal.php" method="post" name="car-proveedor">
            <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="text" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
              <input type="text" name="nombreEmpresa" placeholder="Nombre empresa">
                <input type="submit" value="GUARDAR" name="btn-proveedor" id="btn btn-proveedor">
            </form>
</div>
</body>
</html>