<?php
require_once('libreries/Database.php');
require_once('libreries/imodel.php');
Class Model extends Database{
function __construct(){
    $this->db = new Database();
    $this->conexion = $this->db->Conexion();
}
function query($query){
    return $this->db->conexion()->query($query);
}
function prepare($query){
    
    return $this->db->conexion()->prepare($query);
}

}

?>