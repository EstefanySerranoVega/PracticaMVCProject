<?php
require_once('libreries/core/Database.php');
require_once('libreries/core/imodel.php');
Class Model extends Database{
function __construct(){
    $this->db = new Database();
}
function query($query){
    return $this->db->conexion()->query($query);
}
function prepare($query){
    
    return $this->db->conexion()->prepare($query);
}

}

?>