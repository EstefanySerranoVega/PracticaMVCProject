<?php
require_once('libreries/core/Model.php');
require_once('Models/CategoriaModel.php');
Class DashboardModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAllCategory(){
        $category = new CategoriaModel();
        $cat = $category->getAll();
        $items =[];
        for($i=0; $i<Count($cat);$i++){
            $item = array(
                'id' => $cat[$i]['ID_CATEGORIA'],
                'nombre' => $cat[$i]['NOMBRE_CATEGORIA']
            );
            array_push($items,$item);
        }
return $items; 
    }

}
?>