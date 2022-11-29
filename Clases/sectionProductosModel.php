<?php

Class sectionProductosModel Extends Model {
    function __construct(){

        parent::__construct();
    }
    public function getAllProductos(){

        $items =[] ;
        $query = $this->query(
            'SELECT producto.id_producto AS id,
            producto.nombre_producto as nombre,
            producto.id_categoria as id_cat,
             categoria.nombre_categoria as cat,
            producto.img_producto as img,
             producto.marca_producto as marca,
            producto.industria_producto as industria,
             producto.codigo_producto as codigo,
            producto.descripcion_producto as descripcion FROM producto
            INNER JOIN categoria 
            ON producto.id_categoria = categoria.id_categoria 
            WHERE estado_producto = "AC" ');
        $query->execute();

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
        return $items;
    }
}

?>