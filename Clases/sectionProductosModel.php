<?php

Class sectionProductosModel Extends Model {
    function __construct(){

        parent::__construct();
    }
    public function getAllProductos(){

        $items =[] ;
       $query = $this->query(
        'SELECT usuario_producto_proveedor.id_usuario_proveedor_producto as id_upp,
        prod.nombre_producto as nombre_producto,
        cat.nombre_categoria as categoria_producto,
        prod.codigo_producto as codigo_producto,
        prod.precio_venta_producto as precio_producto,
        prod.cantidad_producto as stock_producto,
         prov.empresa_proveedor as proveedor_producto from usuario_producto_proveedor
        inner join producto prod
        on usuario_producto_proveedor.id_producto = prod.ID_PRODUCTO
        inner join categoria cat
        on cat.ID_CATEGORIA = prod.ID_CATEGORIA
        inner join proveedor prov
        on usuario_producto_proveedor.ID_PROVEEDOR = prov.ID_PROVEEDOR');
        $query->execute();

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
        return $items;
    }
}

?>