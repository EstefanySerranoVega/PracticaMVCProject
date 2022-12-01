<?php
require_once('Models/ProductoModel.php');
require_once('Models/CategoriaModel.php');
require_once('Models/AlmacenProductoModel.php');
Class viewProductoModel extends Model{
private $id;
private $producto;
private $category;
private $categoria;
private $ap;
function __construct(){
    $this->category = new CategoriaModel();
    $this->producto = new ProductoModel();
    $this->ap = new AlmacenProductoModel();
    parent::__construct();

}

public function currentProducto(){

}
public function getCurrentProduct($id){
    $query = $this->query(
        'SELECT almacen_producto.id_ap as id_ap,
    producto.id_producto as id_producto,
    producto.nombre_producto as nombre, 
    producto.id_categoria as categoria,
    producto.codigo_producto as codigo,
    producto.img_producto as img,
    producto.industria_producto as industria,
    producto.marca_producto as marca,
    producto.descripcion_producto as descripcion,
    almacen_producto.pventa_ap as precio FROM `almacen_producto`
    inner join producto
    on producto.id_producto = almacen_producto.ID_PRODUCTO
    WHERE producto.estado_producto = "AC"
         AND producto.id_producto = '.$id);
    $query->execute();

    $producto = $query->fetchAll(PDO::FETCH_ASSOC);

    $this->categoria = $producto[0]['categoria'];
error_log('categoria '.$this->categoria);
      // $this->getSimilarProductos($this->categoria);
        return $producto;  
    }
 public function getSimilarProductos(){
    error_log('cargando productos similares');
    error_log('id buscado: '.$this->categoria);
    $items = [];
    $query = $this->query(
        'SELECT almacen_producto.id_ap as id_ap,
    producto.id_producto as id_producto,
    producto.nombre_producto as nombre, 
    producto.id_categoria as categoria,
    producto.codigo_producto as codigo,
    producto.img_producto as img,
    producto.industria_producto as industria,
    producto.marca_producto as marca,
    producto.descripcion_producto as descripcion,
    almacen_producto.pventa_ap as precio FROM `almacen_producto`
    inner join producto
    on producto.id_producto = almacen_producto.ID_PRODUCTO
    WHERE producto.estado_producto = "AC"
     AND producto.id_categoria = '.$this->categoria);
    $query->execute();

    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }
    return $items;

 }


}

?>