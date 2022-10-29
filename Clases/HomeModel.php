<?php
require_once('libreries/core/Model.php');
require_once('Models/ProductoModel.php');
require_once('Models/CategoriaModel.php');
Class HomeModel extends Model  {

private $producto;
private $category;

    function __construct(){
        $this->category = new CategoriaModel();
        $this->producto = new ProductoModel();
    }

    public function getAllProductos(){
        $p = $this->producto->getAll();
        $items =[];
        for($i=0; $i<count($p);$i++){
            $categoria = $this->category->getNameById($p[$i]['ID_CATEGORIA']);
            
            $item = array(
                'id' => $p[$i]['ID_PRODUCTO'],
                'cat' =>$categoria,
                'name' => $p[$i]['NOMBRE_PRODUCTO'],
                'codigo' => $p[$i]['CODIGO_PRODUCTO'],
                'cantidad' => $p[$i]['CANTIDAD_PRODUCTO'],
                'imagen' => $p[$i]['IMG_PRODUCTO'],
                'precio' => $p[$i]['PRECIO_VENTA_PRODUCTO']
            );
            array_push($items,$item);
        }
        return $items;
    }
    public function getAllCategory(){
        $cat = $this->category->getAllLimit(6);
        $items =[];
        for($i=0; $i<count($cat);$i++){
           
            $item = array(
                'id' => $cat[$i]['ID_CATEGORIA'],
                'name' => $cat[$i]['NOMBRE_CATEGORIA']
            );
            array_push($items,$item);
        }
        return $items;

    }


}

?>