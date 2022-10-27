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

        $id = $this->query("SELECT MAX(id_roles) AS id FROM roles");
            
        if ($row = $id->fetchAll()) {
        $this->idRoles = $row[0][0];
        }

        if($query->rowCount() > 0) {
            return true;
        }else{
            return false;
        }

    }catch(PDOException $e){
        error_log('ERROR::RolesModel::save()-> '.$e);
        return false;
    }
}//fin save
public function getAll(){
    $items =[];
    try{
        $query = $this->query(
            'SELECT * FROM `roles`WHERE estado_roles = "AC"');
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new RolesModel();

            $item->from($p);

            array_push($items,$p);

        }
        return $items;
    }catch(PDOException $e){
        error_log('RolesModel::getAll()=> '.$e);
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

        $this->from($roles);

        return $this;
    }catch(PDOException $e){
        error_log('RolesModel::get()=> '.$e);
        return false;
    }
}//fin get

public function delete($id){    try{
    $query = $this->prepare(
        'UPDATE `roles` SET 
        estado_roles = "DC"
        WHERE estado_roles = "AC"
        AND id_roles = :id');
    $query->execute([ 'id' => $this->getId()]);

        return true;
}catch(PDOException $e){
    return false;
}}//fin delete


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
    
    $this->idRoles = $array['ID_ROLES'];
    $this->accesos = $array['ID_ACCESOS'];
    $this->nombreRoles = $array['NOMBRE_ROLES'];
    $this->creacion = $array['CREACION_ROLES'];
    $this->estado = $array['ESTADO_ROLES'];
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

public function exist($name){
    try{
        $query =$this->prepare(
            'SELECT * FROM `roles` 
            WHERE nombre_roles = :name 
            AND estado_roles = "AC" ');
        $query->execute(['name'=>$name]);
    if($query->rowCount() > 0){
        error_log('RolesModel::exist()->rowCount()=> true');
        return true;
    }else{
        error_log('RolesModel::exist()->rowCount()=> false');
        return false;
    }

}catch(PDOException $e){
    error_log('RolesModel::exist()=> '.$e);
}
}//fin roles exist

}

?>