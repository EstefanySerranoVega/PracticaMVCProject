<?php
require_once('Models/ProductoModel.php');
require_once('Models/CategoriaModel.php');
Class viewProductoModel extends Model{
private $id;
private $producto;
private $category;
private $categoria;
function __construct(){
    $this->category = new CategoriaModel();
    $this->producto = new ProductoModel();
    parent::__construct();

}

public function currentProducto(){

}
public function getCurrentProduct($id){
    error_log('se recibió el id: '.$id);
    $p =$this->producto->get($id);
      
        $item = array(
            'id' => $p['ID_PRODUCTO'],
            'categoria' =>$p['ID_CATEGORIA'],
            'name' => $p['NOMBRE_PRODUCTO'],
            'codigo' => $p['CODIGO_PRODUCTO'],
            'cantidad' => $p['CANTIDAD_PRODUCTO'],
            'imagen' => $p['IMG_PRODUCTO'],
            'precio' => $p['PRECIO_VENTA_PRODUCTO']
        );   
        $this->categoria = $item['categoria'];
      // $this->getSimilarProductos($this->categoria);
        return $item;
    }
 public function getSimilarProductos(){
    error_log('cargando productos similares');
    error_log('id buscado: '.$this->categoria);
    $p =$this->producto->getAllCategoryId($this->categoria);
    $items= [];
    for($i=0; $i<count($p);$i++){
      
    $item = array(
        'id' => $p[$i]['ID_PRODUCTO'],
        'categoria' => $p[$i]['ID_CATEGORIA'],
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


}

?>