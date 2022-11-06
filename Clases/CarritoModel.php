<?php
require_once('assets/ApiCarrito.php');
Class CarritoModel extends Model{

function __construct(){
    parent::__construct();
    error_log('carrito model se ejecutó');
}
public function listProducts(){
   //return $this->carrito->getCurrentProducto();
}


}

?>