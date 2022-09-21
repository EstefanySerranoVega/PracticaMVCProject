<?php
require_once('libreries/core/Model.php');
Class HomeModel extends Model implements IModel {
    function __construct(){
        echo 'home model funciona! ';
    }

    
    public function save(){}
    public function delete($id){}
    public function update(){}
    public function from($array){}
    public function get($id){}
    public function getAll(){}
}

?>