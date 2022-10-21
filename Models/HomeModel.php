<?php
require_once('libreries/core/Model.php');
require_once('Models/ProductoModel.php');
Class HomeModel extends Model  {
    function __construct(){
    }

    public function getAllProductos(){
        $producto = new ProductoModel();
        $p = $producto->getAll();

        return $p;
    }


}

?>