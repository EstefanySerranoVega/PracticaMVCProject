<?php
require_once('Accesos.php');
require_once('Database.php');

Class Roles {
    private $idRoles;
    private $nombreRoles;
    private $creacionRoles;
    private $estadoRoles;
    private $accesos;
    private $conexion;
    private $db;
function __construct(){
    $this->accesos = new Accesos();
    $this->conexion = new Database();
    $this->db = $this->conexion->conexion();
}

public function rolesExist($a){
$this->idRoles = $a;
$this->estadoRoles = 'AC';

try{
$sql =$this->db->prepare(
    'SELECT * FROM `roles` 
    WHERE id_roles =:roles 
    AND estado_roles =:estado'
);
$select = $sql->execute([
    'roles'=>$this->idRoles,
    'estado'=>$this->estadoRoles
]);
if($sql->rowCount()){
    return true;
}else{
    return false;
}

}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}
}//fin roles exist

public function insertRoles($a,$b){
$idAcceso = $a;
$this->nombreRoles =$b;
$this->creacionRoles = Date('Y-m-d H:i:s');
$this->estadoRoles = 'AC';
try{
    $sql='INSERT INTO `roles`
    VALUES(
        NULL,
        ?,
        ?,
        ?,
        ?
    )';
    $insert = $this->db->prepare($sql);
    $arrayData = array(
        $idAcceso,
        $this->nombreRoles,
        $this->creacionRoles,
        $this->estadoRoles
    );
    $resInsert = $insert->execute($arrayData);
    $this->idRoles = $this->db->lastInsertId();
    return $resInsert;

}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}
}//fin insert idRoles


public function setIdRoles($a){

    $this->idRoles =$a;
    $sql = $this->db->prepare(
        'SELECT id_roles FROM `roles`
        WHERE id_roles= :rol');
        $select = $sql->execute(['rol' => $this->idRoles]);

}//fin set ROLES

public function getIdRoles(){
return $this->idRoles;
}//fin get idRoles



public function deleteRoles($a){
$this->idRoles = $a;
$this->estadoRoles = 'DC';
try{
$sql = $this->db->prepare(
    'UPDATE `roles` SET
     `estado_roles` = :estado
     WHERE `id_roles`= :roles'
);
$delete = $sql->execute([
    'estado'=>$this->estadoRoles,
    'roles'=>$this->idRoles
]);
return $delete;
}catch(Exception $x){
    return 'Hubo un error'.$x;
}

}//fin delete roles


public function updateRoles(){}

}

?>