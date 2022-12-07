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
}

?>