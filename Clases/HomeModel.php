<?php
require_once('libreries/Model.php');
require_once('Models/ProductoModel.php');
require_once('Models/CategoriaModel.php');
require_once('Models/AlmacenProductoModel.php');
Class HomeModel extends Model  {

private $producto;
private $category;

    function __construct(){
        $this->category = new CategoriaModel();
        $this->ap= new AlmacenProductoModel();
        parent::__construct();
    }

    public function getAllProductos(){
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
    on producto.id_producto = almacen_producto.id_producto_ap
    WHERE producto.estado_producto = "AC"
    GROUP BY producto.codigo_producto');
    $query->execute();
    
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
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
    
    public function getAllDestacados(){
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
        almacen_producto.cantidad_ap as cantidad,
        almacen_producto.PVENTA_AP as precio_producto FROM `almacen_producto`
        inner join producto
        on producto.id_producto = almacen_producto.ID_PRODUCTO_AP
        WHERE producto.estado_producto = "AC"
        GROUP BY producto.codigo_producto
    ORDER BY (almacen_producto.ingreso_ap) DESC LIMIT 10');
        $query->execute();
        
        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
            return $items;
        }


public function getSearch($parametro){
    $p = "%".$parametro."%";
    $items = [];
    
    $query = $this->prepare(
        "SELECT almacen_producto.id_ap as id_ap,
        producto.id_producto as id_producto,
        producto.nombre_producto as nombre_producto, 
        producto.id_categoria as categoria_producto,
        producto.codigo_producto as codigo_producto,
        producto.IMG_PRODUCTO as img_producto,
        producto.industria_producto as industria_producto,
        producto.marca_producto as marca_producto,
        producto.DESCRIPCION_PRODUCTO as descripcion_producto,
        almacen_producto.cantidad_ap as cantidad,
        almacen_producto.PVENTA_AP as precio_producto FROM `almacen_producto`
        inner join producto
        on producto.id_producto = almacen_producto.ID_PRODUCTO_AP
        WHERE producto.estado_producto = 'AC'
        AND producto.nombre_producto  LIKE :parametro");
    $query->execute(['parametro'=>$p]);
    
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }
        return $items;

}
public function getFilterCategory($cat){
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
    on producto.id_producto = almacen_producto.ID_PRODUCTO_AP
    WHERE producto.estado_producto = "AC"
    AND producto.id_categoria = :cat
    GROUP BY producto.codigo_producto');
    $query->execute(['cat'=>$cat]);
    
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }


        return $items;
    }

}

?>