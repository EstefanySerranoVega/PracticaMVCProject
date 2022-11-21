<?php

Class sectionProductosModel Extends Model {
    function __construct(){

        parent::__construct();
    }
    public function getAllProductos(){

        $items =[] ;
        $query = $this->query(
            'SELECT almacen_producto.id_ap as id_ap,
        producto.id_producto as id_producto,
        producto.nombre_producto as nombre, 
        producto.id_categoria as categoria,
        categoria.nombre_categoria as name_cat,
        producto.codigo_producto as codigo,
        producto.img_producto as img,
        producto.industria_producto as industria,
        producto.marca_producto as marca,
        producto.descripcion_producto as descripcion,
        almacen_producto.pventa_ap as precio,
        almacen_producto.id_proveedor_ap as proveedor,
        proveedor.empresa_proveedor as name_proveedor,
        almacen_producto.cantidad_Ap as cantidad FROM `almacen_producto`
        inner join producto
        on producto.id_producto = almacen_producto.ID_PRODUCTO
        inner join categoria
        on producto.id_categoria = categoria.ID_CATEGORIA
        inner join proveedor
        on almacen_producto.id_proveedor_ap = proveedor.id_proveedor
        WHERE producto.estado_producto = "AC" ');
        $query->execute();

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
        return $items;
    }
}

?>