<?php
/*include('Clases/Persona.php');
$persona = new Persona();
    $persona->insertPersona('Belen','Guevara','Vega','69154578','1999-05-18');
var_dump($persona);
$producto = new Producto();
$r= $producto->productoExist('Teclado pequeño Delux K1102');
var_dump($r);
include('Clases/Producto.php');
include('formProducto.php');
if(isset($_POST['btn-producto'])){
    $categoriaProducto = $_POST['categoriaProducto'];;
    $nombreProducto = $_POST['nombreProducto'];
    $codigoProducto = $_POST['codigoProducto'];
    $cantidadProducto = $_POST['cantidadProducto'];
    $precioProducto = $_POST['precioProducto'];
    //$estadoProducto ='AC';
    $producto = new Producto();
    $producto->insertProducto($categoriaProducto,$nombreProducto,$codigoProducto,$cantidadProducto,$precioProducto);
    var_dump($producto);
}else{
echo('no se hizo click'); 
}
*/

include('Clases/Categoria.php');
include('insertCategoria.php');
if(isset($_POST['btn-categoria'])){
    $a = $_POST['nombreCategoria'];
    $categoria = new Categoria();
    $categoria->insertCategoria($a);
    var_dump($categoria);
} else{
    echo('no se hizo click');
}
?>
