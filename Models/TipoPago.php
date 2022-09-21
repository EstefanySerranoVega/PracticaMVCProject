<?php
require_once('Database.php');

Class TipoPago extends Database{
private $idTP;
private $nombreTP;
private $creacionTP;
private $estadoTP;
private $conexion;
private $db;

function __construct(){
    $this->conexion = new Database();
    $this->db = $this->conexion->Conexion();
}//fin constructor

public function tipoPagoExist($a){
    $this->idTP =$a;
    $this->estadoTP = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `tipo_pago`
    WHERE id_tipo_pago= :tipoPago
    estado_tp =: estado '
);
$select = $sql->execute([
    'tipoPago'=>$this->idTipoPago,
    'estado'=>$this->estadoTP
]);
if($sql->rowCount()){
    return true;
}else{
    return false;}

}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}
}//fin tipo pago exist


public function insertTP($a){
$this->nombreTP = $a;
$this->creacionTP = Date('Y-m-d H:i:s');
$this->estadoTP = 'AC'; 

try{

    $sql ='INSERT INTO `tipo_pago`
    VALUES(
        NULL,
        ?,
        ?,
        ?
    )';
    $insert = $this->db->prepare($sql);
    $arrayData=  array(
        $this->nombreTP,
        $this->creacionTP,
        $this->estadoTP
    );
    $resInsert = $insert->execute($arrayData);
     $this->idTP = $this->db->lastInsertId();
    return $resInsert;

}catch(Exception $x){

    return 'Hubo un error al insertar los datos '.$x;
}

}


public function setIdTP($a){
    $this->idTP = $a;
    $sql = $this->db->prepare(
        'SELECT id_tipo_pago FROM `tipo_pago`
        WHERE id_tipo_pago = :tipoPago'
    );
    $select = $sql->execute(['tipoPago'=> $this->idTP]);
    
    }//fin set id tipo pago


public function getIdTP(){
    return $this->idTP;
}//fin get id tipo pago



public function deleteTP($a){
    
    $this->idTP =$a;
    $this->estadoTP = 'DC';
try{
$sql = $this->db->prepare(
    'UPDATE `tipo_pago` SET
    estado_tp =: estado
    WHERE id_tipo_pago= :tipoPago'
);
$delete = $sql->execute([
    'estado'=>$this->estadoTP,
    'tipoPago'=>$this->idTipoPago
]);
return $delete;
}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}
}//fin delete tipo pago

public function updateTP(){}

}

?>