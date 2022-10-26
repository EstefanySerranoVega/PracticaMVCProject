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
    /*    foreach($cat as $key){
            var_dump($key);   }*/   
return $cat; 
    }

}
?>