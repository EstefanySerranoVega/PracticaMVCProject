<?php
require_once('assets/ApiCarrito.php');
Class CarritoModel extends Model{

function __construct(){
    $this->carrito = new ApiCarrito();
    parent::__construct();
    error_log('carrito model se ejecutó');
}
public function listProducts(){
    $lista = $this->carrito->getCurrentProducto();
    return $lista;
}
public function prueba(){
    $lista = $this->carrito->getListProducto();
    return $lista;
}


}

?>