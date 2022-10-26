<?php

require_once('Models/ProductoModel.php');

Class sectionProductosModel Extends Model {
    function __construct(){

        parent::__construct();
    }
    public function getAllProductos(){
        $productos = new productoModel();
        $producto =$productos->getAll();
        return $producto;
    }
}

?>