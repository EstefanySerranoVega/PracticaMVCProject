<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form form-cliente">
            <h1>AGREGAR CLIENTE</h1>
            <form action="" method="post">
                <input type="email" name="correoCliente" placeholder="Escriba su correo">
                <input type="submit" value="GUARDAR" name="btn-cliente" class="btn btn-cliente">
          
               <input type="text"name="idPersona">
                <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
                    <input type="pass" name="passwordUsuario" placeholder="Contraseña" >
                    <input type="text" name="idRoles">
                    <input type="submit" value="Ingresar" name="btn-accederUser" id="btn btn-accederUser" class="btn btn-accederUser" >
               <input type="text"  name="nombrePersona" id="nombrePersona" placeholder="Nombre" >
                <input type="text" name="paternoPersona" id="paternoPersona" placeholder="Apellido Paterno" >
                <input type="text" name="maternoPersona" id="maternoPersona" placeholder="Apellido Materno" >
                <input type="text" name="telefonoPersona" id="telefonoPersona" placeholder="Telefono" >
                <input type="date" name="nacPersona" id="nacPersona" >
                <input type="text" name="estadoPersona" id="estadoPersona" >
                <input type="submit" value="Buscar" name="btn-newPersona" id="btn btn-newPersona" class="btn btn-newPersona">
                <input type="submit" value="Seleccionar" name="btn-selectPersona" id="btn btn-selectPersona" class="btn btn-selectPersona">
                <input type="submit" value="Modificar" name="btn-updatePersona" id="btn btn-updatePersona" class="btn btn-updatePersona">
            </form>
        </div>
</body>
</html>