<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php
//require_once("principal.php");
?>
</head>
<body>
    
<a href="logout.php">Cerrar sesión</a>
    <a href="newUser.php">Registrarse</a>
    <div class="container-page">
        <div class="form form-newPersona">
            <h1>REGISTRAR PERSONA xd</h1>
            <form action="#" method="post" name="card card-newPersona">
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
        
        <div class="form form-newUser">
                <h1>NUEVO USUARIO</h1>
                <form action="" method="post" name="card-newUser">
                <input type="text"name="idPersona">
                <input type="text" name="nombreUsuario" placeholder="Nombre de usuario" required>
                    <input type="pass" name="passwordUsuario" placeholder="Contraseña" >
                    <input type="text" name="idRoles">
                    <input type="submit" value="Ingresar" name="btn-accederUser" id="btn btn-accederUser" class="btn btn-accederUser" >
               
                </form>

        </div>
        <div class="form form-accesos">
            <h1>ADMINISTRAR ACCESOS</h1>
            <form action="" method="POST" name="card-newAcceso">
                <input type="text" name="nameAcceso" placeholder="Nombre del Acceso" id="nameAcceso" required>
            <input type="submit" value="AGREGAR" name="btn-newAcceso" id="btn btn-newAcceso">
        </form>
        </div>
        <div class="form form-roles">
            <h1>ADMINISTRAR ROLES</h1>
            <form action="" method="post" name="card-roles">
                <input type="text" name="nombreRol" id="nombreRol" placeholder="Nombre rol">
                <input type="text" name="idAccesos">
                <input type="submit" value="AGREGAR" name="btn-roles" id="btn btn-roles">
            </form>
        </div>
        <div class="form form-productos">
            <h1>AGREGAR PRODUCTOS</h1>
            <form action="" method="post">
                <input type="text" name="nombreProducto" placeholder="Nombre producto" id="nombreProducto">
                <input type="text" name="categoriaProducto" placeholder="Categoria producto" id="categoriaProducto">
                <input type="text" name="precioProducto" placeholder="Precio producto" id="precioProducto">
                <input type="text" name="cantidadProducto" placeholder="Cantidad producto" id="cantidadProducto">
                <input type="text" name="codigoProducto" placeholder="Codigo producto" id="codigoProducto">
                <input type="submit" value="REGISTRAR" name="btn-producto" id="btn btn-producto">
            </form>
        </div>
        <div class="form form-cliente">
            <h1>AGREGAR CLIENTE</h1>
            <form action="" method="post">
                <input type="email" name="correoCliente" placeholder="Escriba su correo">
                <input type="submit" value="GUARDAR" name="btn-cliente" class="btn btn-cliente">
            </form>
        </div>    
        <div class="form form-categoria">
            <h1>ADMINISTRAR CATEGORIA</h1>
            <form action="" method="post" name="card-categoria">
                <input type="text" name="nombreCategoria" id="nombreCategoria" placeholder="Nombre categoria">
                <input type="submit" value="AGREGAR" name="btn-categoria" id="btn btn-categoria">
            </form>
        </div>
        <div class="form form-tipoPago">
            <h1>ADMINISTRAR TIPOS DE PAGO</h1>
            <form action="BD/principal.php" method="post" name="card-tipoPago">
                <input type="text" name="nombreTipoPago" id="nombreTipoPago" placeholder="Nombre tipo pago">
                <input type="submit" value="AGREGAR" name="btn-tipoPago" id="btn btn-tipoPago">
            </form>
        </div>
        <div class="form form-userProductoProveedor">
            <h1>USUARIO PRODUCTO Y PROVEEDOR</h1>
            <form action="BD/principal.php" method="post" name="card card-UPP">
                <input type="text" name="idUserUPP" placeholder="nombre de usuario" id="idUserUPP">
                <input type="text" name="idProveedorUPP" placeholder="nombre del proveedor" id="idProveedorUPP">
                <input type="text" name="idProductoUPP" placeholder="Nombre del producto" id="idProductoUPP">
                <input type="text" name="precioUPP" placeholder="precio producto" id="precioUPP">
                <input type="date" name="fechaIngresoUPP" id="fechaIngresoUPP">
                <input type="submit" value="AGREGAR" name="btn-UPP" id="btn btn-UPP">
            </form>
        </div>
        <div class="form-venta">
            <h1>TABLA VENTA</h1>
            <form action="DB/principal.php" method="post" name="card card-venta">
            <input type="text" name="idClienteProducto" id="idClienteProducto" placeholder="ID cliente producto">
    <input type="submit" value="GUARDAR" name="btn-venta" id="btn btn-venta">
            </form>

        </div>
        <div class="form form-almacen">
            <h1>TABLA ALMACEN</h1>
            <form action="DB/principal.php" method="post" name="card card-almacen">
                <input type="text" name="idProducto" placeholder="Nombre producto">
                <input type="text" name="nombreAlmacen" placeholder="Nombre de almacen">
                <input type="submit" value="GUARDAR" name="btn-almacen" id="btn btn-almacen">
            </form>
        </div>
        <div class="form form-sucursal">
            <h1>TABLA SUCURSAL</h1>
            <form action="DB/principal.php" method="post" name="card card-sucursal">
                <input type="text" name="nombreSucursal" placeholder="Nombre sucursal" id="nombreSucursal">
                <input type="text" name="direccionSucursal" placeholder="Direccion sucursal" id="direccionSucursal">
                <input type="text" name="idAlmacen" placeholder="Almacen" id="idAlmacen">
                <input type="submit" value="GUARDAR" name="btn-sucursal" id="btn btn-sucursal">
            </form>
        </div>
        <div class="form form-clienteProducto">
            <h1>TABLA CLIENTE PRODUCTO</h1>
            <form action="DB/principal.php" method="post" name="card card-clienteProducto">
                <input type="text" name="idClienteCP" placeholder="Nombre Cliente" id="idClienteCP">
                <input type="text" name="idProductoCP" placeholder="Nombre Producto" id="idProductoCP"> 
                <input type="text" name="cantidadCP" placeholder="Cantidad Producto" id="cantidadCP">
                <input type="text" name="totalCP" placeholder="Total" id="totalCP">
                <input type="text" name="idTipoPagoCP" placeholder="Tipo pago" id="idTipoPagoCP">
                <input type="submit" value="GUARDAR" name="btn-clienteProducto" id="btn btn-clienteProducto">
            </form>
        </div>
        <div class="form-almacenProducto">
            <h1>TABLA ALMACEN PRODUCTO</h1>
            <form action="DB/principal.php" method="post" name="card card-almacenProducto">
                <input type="text" name="idProducto" placeholder="id Producto" id="idProducto">
                <input type="text" name="idAlmacen" placeholder="id Almacen" id="idAlmacen">
                <input type="submit" value="AGREGAR AL ALMACEN" name="btn-almacenProducto" id="btn btn-almacenProducto">
            </form>
        </div>
    </div>
</body>
</html>