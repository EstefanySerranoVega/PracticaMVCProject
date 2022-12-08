<?php

Class storeModel extends Model{
    
    function __construct(){
        parent::__construct();
    }
    public function getAllCategory(){
        $items =[];
        $query = $this->query(
            'SELECT categoria.id_categoria as id_category,
            categoria.nombre_categoria as name_category, 
            categoria.ESTADO_CATEGORIA as estado_category, 
            COUNT(producto.NOMBRE_PRODUCTO) as stock_category
            FROM categoria, producto
            WHERE categoria.ID_CATEGORIA = producto.ID_CATEGORIA
            AND categoria.estado_categoria = "AC"
            GROUP BY categoria.ID_CATEGORIA
            ORDER BY COUNT(producto.NOMBRE_PRODUCTO) DESC' );
            $query->execute();

            while($item = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($items,$item);
            }

            return $items;
    }

    public function filterCategory($id){    
    $items = [];
    
    $query= $this->prepare(
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
        AND producto.id_categoria = :id
        GROUP BY producto.codigo_producto');
    $query->execute(['id'=> $id]);
    
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }
        return $items;
    }

    public function getCategory($id){
        $items =[];
        $query = $this->prepare(
            'SELECT categoria.id_categoria as id_category,
            categoria.nombre_categoria as name_category, 
            categoria.ESTADO_CATEGORIA as estado_category, 
            COUNT(producto.NOMBRE_PRODUCTO) as stock_category
            FROM categoria, producto
            WHERE categoria.ID_CATEGORIA = producto.ID_CATEGORIA
            AND categoria.estado_categoria = "AC"
            AND categoria.ID_CATEGORIA != :id
            GROUP BY categoria.ID_CATEGORIA
            ORDER BY COUNT(producto.NOMBRE_PRODUCTO) DESC' );
            $query->execute(['id'=>$id]);

            while($item = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($items,$item);
            }

            return $items;
    }
}

?>