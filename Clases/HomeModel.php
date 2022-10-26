<?php
require_once('libreries/core/Model.php');
require_once('Models/ProductoModel.php');
require_once('Models/CategoriaModel.php');
Class HomeModel extends Model  {
    function __construct(){
    }

    public function getAllProductos(){
        $producto = new ProductoModel();
        $p = $producto->getAll();

        return $p;
    }
    public function getAllCategory(){
        error_log('getAllCategory-> execute ');
        $category = new CategoriaModel();
        $cat = $category->getAllLimit(6);
        return $cat;

    }


}

?>