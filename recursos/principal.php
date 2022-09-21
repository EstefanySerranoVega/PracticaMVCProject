<?php
include('Clases/Database.php');
include('Clases/user.php');
//include('Clases/Persona.php');
//$resp = $conectando->conexion();


/*Conexion con tablas: tabla persona*/
if (isset($_POST['login'])) {
    echo 'hiciste click';
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    echo 'La funcion se ejecutará luego ';
    $user = new User();
    $nombre = $user->userExist($usuario, $password);
    echo 'El resultado es: ' . $nombre;
    if ($nombre = true) {
        echo'if de principal.php';
        include_once('home.php');
    } else {
        include_once('formPrueba.php');
        echo 'error al iniciar sesión';
    }
} else {
    echo ('no hiciste click');
}
/*seleccionando datos: tabla persona*/
if (isset($_POST['btn-newPersona'])) {
    echo 'hiciste click';
    $NOMBRE_PERSONA = $_POST['nombrePersona'];
    $MATERNO_PERSONA = $_POST['maternoPersona'];
    $PATERNO_PERSONA = $_POST['paternoPersona'];
    $TELEFONO_PERSONA = $_POST['telefonoPersona'];
    $NAC_PERSONA = $_POST['nacPersona'];
    $ESTADO_PERSONA = $_POST['estadoPersona'];
    }
if (isset($_POST['btn-selectPersona'])) {
    $NOMBRE_PERSONA = $_POST['nombrePersona'];
    $MATERNO_PERSONA = $_POST['maternoPersona'];
    $PATERNO_PERSONA = $_POST['paternoPersona'];
    $TELEFONO_PERSONA = $_POST['telefonoPersona'];
    $NAC_PERSONA = $_POST['nacPersona'];
    $ESTADO_PERSONA = $_POST['estadoPersona'];
    $selectPersona = "SELECT * FROM `persona`";
    $resultado = mysqli_query($conexion, $selectPersona)
        or trigger_error("error " . mysqli_error($conexion));
    if ($resultado->num_rows > 0) {
        echo var_dump($resultado);
    }
}


/*CREACION USUARIO
TABLAS: 
- TABLA USUARIO
- TABLA CONTRASENIA
- TABLA USUARIO-CONTRASENIA*/
if (isset($_POST['btn-accederUser'])) {
    /*variables tabla USUARIO */
    $ID_PERSONA = $_POST['idPersona'];
    $NOMBRE_USUARIO = $_POST['nombreUsuario'];
    $CREACION_USUARIO = date('Y-m-d H:i:s');
    $ESTADO_USUARIO = 'AC';
    $ID_ROLES = $_POST['idRoles'];
    $crearUsuario = "INSERT INTO `usuario`(
ID_PERSONA,
NOMBRE_USUARIO,
CREACION_USUARIO,
ESTADO_USUARIO,
ID_ROLES 
) VALUES( 
    '$ID_PERSONA',
    '$NOMBRE_USUARIO',
    '$CREACION_USUARIO',
    '$ESTADO_USUARIO',
    '$ID_ROLES')";
    $resultado = mysqli_query($conexion, $crearUsuario)
        or trigger_error("error " . mysqli_error($conexion));

    /*varibles tabla CONTRASENIA*/

    $NOMBRE_CONTRASENIA = $_POST['passwordUsuario'];
    $CREATE_CONTRASENIA = date('Y-m-d H:i:s');
    $ESTADO_CONTRASENIA = 'AC';
    $crearContrasenia = "INSERT INTO `contrasenia`(
NOMBRE_CONTRASENIA,
CREATE_CONTRASENIA,
ESTADO_CONTRASENIA 
) VALUES(
    '$NOMBRE_CONTRASENIA',
    '$CREATE_CONTRASENIA',
    '$ESTADO_CONTRASENIA' )";
    $resultado = mysqli_query($conexion, $crearContrasenia)
        or trigger_error("error " . mysqli_error($conexion));

    /*variables tabla USUARIO-CONTRASENIA*/
    $ID_USUARIO_UC = 2; //capture el id tabla usuario
    $ID_CONTRASENIA_UC = 1; //capture id tabla contrasenia
    $CREACION_USUARIO_CONTRASENIA = date('Y-m-d H:i:s');
    $ESTADO_USUARIO_CONTRASENIA = 'AC';
    $crearUC = "INSERT INTO `usuario_contrasenia`(
NOMBRE_USUARIO,
ID_USUARIO,
ID_CONTRASENIA,
CREACION_USUARIO_CONTRASENIA,
ESTADO_USUARIO_CONTRASENIA 
) VALUES(
'$NOMBRE_USUARIO',
'$ID_USUARIO_UC',
'$ID_CONTRASENIA_UC',
'$CREACION_USUARIO_CONTRASENIA',
'$ESTADO_USUARIO_CONTRASENIA' )";
    $resultado = mysqli_query($conexion, $crearUC)
        or trigger_error("error " . mysqli_error($conexion));
}
/*AGREGANDO ACCESOS
TABLA ACCESOS*/
if (isset($_POST['btn-newAcceso'])) {
    /*variables tabla accesos*/
    $NOMBRE_ACCESOS = $_POST['nameAcceso'];
    $CREACION_ACCESO = date('Y-m-d H:i:s');
    $ESTADO_ACCESO = 'AC';
    $newAcceso = "INSERT INTO `accesos`(
NOMBRE_ACCESOS,
CREACION_ACCESO,
ESTADO_ACCESO 
)VALUES(
'$NOMBRE_ACCESOS',
'$CREACION_ACCESO',
'$ESTADO_ACCESO'
)";
    $resultado = mysqli_query($conexion, $newAcceso)
        or trigger_error("Error " . mysqli_error($conexion));
}
/*AGREAGANDO 
TABLA ROLES*/
if (isset($_POST['btn-roles'])) {
    /*variables tabla roles*/
    $NOMBRE_ROLES = $_POST['nombreRol'];
    $ESTADO_ROLES = 'AC';
    $CREACION_ROLES = date('Y-m-d H:i:s');
    $ID_ACCESOS = $_POST['idAccesos'];
    $newRol = "INSERT INTO `roles`(
NOMBRE_ROLES,
ESTADO_ROLES,
CREACION_ROLES,
ID_ACCESOS 
) VALUES(
'$NOMBRE_ROLES',
'$ESTADO_ROLES',
'$CREACION_ROLES',
'$ID_ACCESOS'
)";
    $resultado = mysqli_query($conexion, $newRol)
        or trigger_error("error " . mysqli_error($conexion));
}
/*AGREGANDO PRODUCTOS*/
if (isset($_POST['btn-producto'])) {
    /*variables tabla producto*/
    $NOMBRE_PRODUCTO = $_POST['nombreProducto'];
    $ID_CATEGORIA = $_POST['categoriaProducto'];
    $PRECIO_VENTA_PRODUCTO = $_POST['precioProducto'];
    $CANTIDAD_PRODUCTO = $_POST['cantidadProducto'];
    $ESTADO_PRODUCTO = 'AC';
    $CODIGO_PRODUCTO = $POST['codigoProducto'];
    //$ID_SUCURSAL = idSucursal;

}
/*AGREGANDO CLIENTE*/
if (isset($_POST['btn-cliente'])) {
    /*variables tabla cliente*/
    // $ID_PERSONA = idCliente;
    $CORREO_CLIENTE = $_POST['correoCliente'];
    $ESTADO_CLIENTE = 'AC';
}
/*AGREGANDO CATEGORIAS*/
if (isset($_POST['btn-categoria'])) {
    /*variables tabla categoria*/
    $NOMBRE_CATEGORIA = $_POST['nombrecategoria'];
    $ESTADO_CATEGORIA = 'AC';
    $CREACION_CATEGORIA = date("Y-m-d");
    //$ID_ACCESOS = accesos;

}
/*agregando proveedor*/
if (isset($_POST['btn-proveedor'])) {
    /*variables tabla proveedor*/
    // $ID_PERSONA = idPersona;
    $EMPRESA_PROVEEDOR = $_POST['nombreEmpresa'];
    $ESTADO_PROVEEDOR = 'AC';
}
/*AGREGANDO TIPO PAGO*/
if (isset($_POST['btn-tipoPago'])) {
    /*variables tabla tipo pago*/
    $NOMBRE_TIPO_PAGO = $_POST['nombreTipoPago'];
    $ESTADO_TIPO_PAGO = 'AC';
    $CREACION_TIPO_PAGO = date("Y-m-d");
}
/*tabla CLIENTE_PRODUCTO_PROVEEDOR*/
if (isset($_POST['btn-UPP'])) {
    /*variables CLIENTE_PRODUCTO_PROVEEDOR*/
    $ID_USUARIO_UPP = $_POST['idUserUPP'];
    $ID_PRODUCTO_UPP = $_POST['idProductoUPP'];
    $ID_PROVEEDOR_UPP = $_POST['idProveedorUPP'];
    $PRECIO_UPP = $_POST['precioUPP'];
    $CREACION_UPP = date('Y-m-d H:i:s');
    $ESTADO_UPP = 'AC';
    $FECHA_INGRESO_UPP = $_POST['fechaIngresoUPP'];
}
/*TABLA VENTA*/
if (isset($_POST['btn-venta'])) {
    /*variables venta*/
    $ID_CLIENTE_PRODUCTO = $_POST['idClienteProducto'];
    $FECHA_VENTA = date("Y-m-d H:i:s");
    $ESTADO_VENTA = 'AC';
}
/*TABLA ALMACEN*/
if (isset($_POST['btn-almacen'])) {
    /*variables tabla almacen*/
    $NOMBRE_ALMACEN = $_POST['nombreAlmacen'];
    $CREACION_ALMACEN = date('Y-m-d H:i:s');
    $ESTADO_ALMACEN = 'AC';
    $ID_PRODUCTO = $_POST['idProducto'];
}
/*TABLA SUCURSAL*/
if (isset($_POST['btn-sucursal'])) {
    $NOMBRE_SUCURSAL = $_POST['nombreSucursal'];
    $DIRECCION_SUCURSAL = $_POST['direccionSucursal'];
    $CREACION_SUCURSAL = date('Y-m-d H:i:s');
    $ESTADO_SUCURSAL = 'AC';
    $ID_ALMACEN = $_POST['idAlmacen'];
}
/*tabla cliente producto*/
if (isset($_POST['btn-clienteProducto'])) {
    $ID_CLIENTE = $_POST['idClienteCP'];
    $ID_PRODUCTO = $_POST['idProductoCP'];
    $CANTIDAD_CP = $_POST['cantidadCP'];
    $TOTAL_CP = $_POST['totalCP'];
    $CREACION_CP = date("Y-m-d H:i:s");
    $ESTADO_CP = 'AC';
    $ID_TIPO_PAGO = $_POST['idTipoPagoCP'];
}
/*tabla almacen producto*/
if (isset($_POST['btn-almacenProducto'])) {
    $ID_PRODUCTO_AP = $_POST['idProducto'];
    $ID_ALMACEN_AP = $_POST['idAlmacen'];
    $FECHA_AP = date("Y-m-d H:i:s");
    $ESTADO_AP = 'AC';
}
if (isset($_POST['verUser'])) {
    $id = $_POST['num'];
    $query = 'SELECT USER_PASS.ID_USUARIO_CONTRASENIA,
                    USER.ID_USUARIO, USER.NOMBRE_USUARIO,
                    PASS.ID_CONTRASENIA, PASS.NOMBRE_CONTRASENIA,
                    PER.ID_PERSONA, PER.NOMBRE_PERSONA 
    FROM `usuario_contrasenia` USER_PASS 
    INNER JOIN `usuario` USER
    ON USER.ID_USUARIO = USER_PASS.ID_USUARIO
    INNER JOIN `contrasenia` PASS
    ON PASS.ID_CONTRASENIA = USER_PASS.ID_CONTRASENIA
    INNER JOIN `persona` PER
    ON PER.ID_PERSONA = USER.ID_PERSONA';

    /*Con PDO*/
    $query = $resp->prepare(
        'SELECT USER_PASS.ID_USUARIO_CONTRASENIA,
    USER.ID_USUARIO, USER.NOMBRE_USUARIO,
    PASS.ID_CONTRASENIA, PASS.NOMBRE_CONTRASENIA,
    PER.ID_PERSONA, PER.NOMBRE_PERSONA 
FROM `usuario_contrasenia` USER_PASS 
INNER JOIN `usuario` USER
ON USER.ID_USUARIO = USER_PASS.ID_USUARIO
INNER JOIN `contrasenia` PASS
ON PASS.ID_CONTRASENIA = USER_PASS.ID_CONTRASENIA
INNER JOIN `persona` PER
ON PER.ID_PERSONA = USER.ID_PERSONA'
    );
}