<?php

Class sectionProviderModel extends Model{

    function __construct(){
        parent::__construct();
    }
    public function getDataProvider($id){
        $items = [];
        $query = $this->query(
            'SELECT id_proveedor, empresa_proveedor, correo_proveedor FROM proveedor 
            WHERE estado_proveedor = "AC"
            AND id_proveedor = '.$id );
            $query->execute();
            
            while($item = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($items,$item);
            }

            return $items;
    }
}

?>