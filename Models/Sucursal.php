<?php
require_once('Almacen.php');

Class Sucursal{
    private $idSucursal;
    private $almacen;
    private $nombreSucursal;
    private $direccionSucursal;
    private $estadoSucursal;
    private $creacionSucursal;
    private $conexion;
    private $db;

    function __construct(){

        $this->conexion= new Database();
        $this->db= $this->conexion->Conexion();
        $this->almacen= new Almacen();

    }//fin construct

public function sucursalExist($a){
$this->idSucursal = $a;
$this->estadoSucursal = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `sucursal`
    WHERE id_sucursal = :sucursal
    AND estado_sucursal =:estado ');
    $select = $sql->execute([
        'sucursal'=>$this->idSucursal,
        'estado'=>$this->idSucursal
    ]);
    if($sql->rowCount()){
        return true;
    }else{
        return false;
    }

}catch(Exception $x){
    return 'Ha ocurrido un error'.$x;
}
}//fin sucursal exist


public function insertSucursal($a,$b,$c){
$idAlmacen = $a;
$this->nombreSucursal =$b;
$this->direccionSucursal =$c;
$this->estadoSucursal = 'AC';
$this->creacionSucursal = Date('Y-m-d H:i:s');

try{
$sql = 'INSERT INTO `sucursal`
VALUES(
    NULL,
    ?,
    ?,
    ?,
    ?,
    ?
)';
$insert = $this->db->prepare($sql);
$arrayData =array(
    $idAlmacen,
$this->nombreSucursal,
$this->direccionSucursal,
$this->estadoSucursal,
$this->creacionSucursal);
$resInsert = $insert->execute($arrayData);

$this->idSucursal = $this->db->lastInsertId();
return $resInsert;
}catch(Exception $x){

    return 'Se ha producido un error '.$x;
}  
}//fin insert sucursal


public function setIdSucursal($a){
$this->idSucursal = $a;

try{
$sql = $this->db->prepare(
    'SELECT id_sucursal FROM `sucursal`
        WHERE id_sucursal = :sucursal'
);
$select = $sql->execute([
    'sucursal'=>$this->idSucursal
]);

}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}

}//fin  set id sucursal

public function getIdSucursal(){
        return $this->idSucursal;
}//fin get id sucursalExist


public function deleteSucursal($a){
    $this->idSucursal = $a;
    $this->estadoSucursal = 'DC';
    
    try{
    $sql = $this->db->prepare(
        'UPDATE `sucursal` SET
        estado_sucursal =:estado
        WHERE id_sucursal =:sucursal'
    );
    $delete = $sql->execute([
        'estado'=>$this->estadoSucursal,
        'sucursal'=>$this->idSucursal
    ]);
    return $delete;
    }catch(Exception $x){
        return 'Ha ocurrido un error '.$x;
    }
}//fin delte sucursal


public function updateSucursal(){}//fin update sucursal
}
?>