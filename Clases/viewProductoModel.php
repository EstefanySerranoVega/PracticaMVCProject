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
    $query = $this->prepare(
        'SELECT almacen_producto.id_ap as id_ap,
    producto.id_producto as id_producto,
    producto.nombre_producto as nombre, 
    producto.id_categoria as id_categoria,
    categoria.nombre_categoria as categoria,
    producto.codigo_producto as codigo,
    producto.img_producto as img,
    producto.industria_producto as industria,
    producto.marca_producto as marca,
    producto.descripcion_producto as descripcion,
    almacen_producto.pventa_ap as precio FROM `almacen_producto`
    inner join producto
    on producto.id_producto = almacen_producto.ID_PRODUCTO
    INNER JOIN categoria 
    ON categoria.id_categoria = producto.id_categoria
    WHERE producto.estado_producto = "AC"
         AND producto.id_producto = '.$id);
    $query->execute();

    $producto = $query->fetchAll(PDO::FETCH_ASSOC);

    $this->categoria = $producto[0]['id_categoria'];
error_log('categoria '.$this->categoria);
      // $this->getSimilarProductos($this->categoria);
        return $producto;  
    }
 public function getSimilarProductos(){
    error_log('cargando productos similares');
    error_log('id buscado: '.$this->categoria);
    $items = [];
    $query = $this->prepare(
        'SELECT almacen_producto.id_ap as id_ap,
        producto.id_producto as id_producto,
        producto.nombre_producto as nombre_producto, 
        producto.id_categoria as categoria_producto,
        producto.codigo_producto as codigo_producto,
        producto.IMG_PRODUCTO as img_producto,
        producto.industria_producto as industria_producto,
        producto.marca_producto as marca_producto,
        producto.DESCRIPCION_PRODUCTO as descripcion_producto,
        almacen_producto.PVENTA_AP as precio_producto FROM `almacen_producto`
    inner join producto
    on producto.id_producto = almacen_producto.ID_PRODUCTO
    WHERE producto.estado_producto = "AC"
     AND producto.id_categoria = :categoria
     GROUP BY(producto.ID_PRODUCTO)');
    $query->execute(['categoria'=>$this->categoria]);

    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }
    return $items;

 }


}

?>