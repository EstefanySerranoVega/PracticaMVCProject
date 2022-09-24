<?php

Class RolesModel Extends Model implements IModel {
    private $idRoles;
    private $accesos;
    private $nombreRoles;
    private $creacion;
    private $estado;
function __construct(){
    parent::__construct();
}


public function save(){
    $this->estado = 'AC';
    try{
        $query = $this->prepare('INSERT INTO `roles`
        VALUES(
            NULL,
            :accesos,
            :nombre,
            :creacion,
            :estado )');
        $arrayData = array(
            'accesos' => $this->accesos,
            'nombre' => $this->nombreRoles,
            'creacion' => $this->creacionRoles,
            'estado' => $this->estadoRoles );

        $query->execute($arrayData);

        $this->idRoles = $this->conexion()->lastInsertId();
        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin save
public function getAll(){
    $items =[];
    try{
        $query = $this->query(
            'SELECT * FROM `roles`WHERE estado_roles = "AC"');
        while($p = $query->Fetch(PDO::FETCH_ASSOC)){
            $item = new RolesModel();

            $item->setId($p['id_roles']);
            $item->setAccesos($p['id_roles']);
            $item->setNombre($p['nombre_roles']);
            $item->setCreacion($p['creacion_roles']);
            $item->setEstado($p['estado_roles']);

            array_push($items,$item);

            return $items;
        }
    }catch(PDOException $e){
        return false;
    }
}//fin getAll

public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `roles` WHERE id_roles =:id 
            AND estado_estados = "AC"' );
        $query->execute(['id'=> $id]);

        $roles = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->setId($roles['id_roles']);
        $this->setAccesos($roles['id_roles']);
        $this->setNombre($roles['nombre_roles']);
        $this->setCreacion($roles['creacion_roles']);
        $this->setEstado($roles['estado_roles']);

        return $this;
    }catch(PDOException $e){
        return false;
    }
}//fin get

public function delete($id){}//fin delete


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `roles` SET 
            id_accesos = :accesos, 
            nombre_roles = :nombre
            WHERE estado_roles = "AC"
            AND id_roles = :id');
        $query->execute([
            'accesos' => $this->accesos,
            'nombre' => $this->nombreRoles,
            'id' => $this->getId()]);

            return true;
    }catch(PDOException $e){
        return false;
    }
}//fin update
public function from($array){
    
    $this->idRoles = $array['id_roles'];
    $this->accesos = $array['id_accesos'];
    $this->nombreRoles = $array['nombre_roles'];
    $this->creacion = $array['creacion_roles'];
    $this->estado = $array['estado_roles'];
}//fin from

//SETTERS
public function setId($id){
    $this->idRoles =$id;
}
public function setAccesos($accesos){
    $this->accesos = $accesos;
}
public function setNombre($nombre){
    $this->nombreRoles = $nombre;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}
public function setEstado($estado){
    $this->estado = $estado;
}

//GETTERS
public function getId(){
    return $this->idRoles;
}
public function getAccesos(){
    return $this->accesos;
}
public function getNombre(){
    return $this->nombreRoles;
}
public function getCreacion(){
    return $this->creacion;
}
public function getEstado(){
    return $this->estado;
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

}

?>