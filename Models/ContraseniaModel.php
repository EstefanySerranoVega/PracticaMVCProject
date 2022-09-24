<?php

Class ContraseniaModel Extends Model implements IModel{
private $idContrasenia;
private $user;
private $nombreContrasenia;
private $estado;
private $modificacion;
private $creacion;

function __construct(){
    parent::__construct();    

}//fin construct

public function save(){
    $this->estado = 'AC';
    try{
        $query = $this->prepare(
            'INSERT INTO `contrasenia` VALUES(
            NULL,
            :user,
            :nombre,
            :estado,
            :modificacion,
            :creacion )');
        $arrayData=array(
            'user' => $this->user,
            'nombre' => $this->nombreContrasenia,
            'estado' => $this->estado,
            'modificacion' => $this->modificacion,
            'creacion' => $this->creacion
        );
        $query->execute($arrayData);
        $this->idContrasenia = $this->db->lastInsertId();
        return true;

    }catch(PDOException $e){

       echo 'Hubo u error al insertar los datos '.$e;
       return   false;
    }
}//fin save 


public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `contrasenia` WHERE estado_contrasenia = "AC"' );
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new ContraseniaModel();

            $item->setId($p['id_contrasenia']);
            $item->setUser($p['id_usuario']);
            $item->setNombre($p['nombre_contrasenia']);
            $item->setEstado($p['estado_contrasenia']);
            $item->setModificacion($p['modificacion_contrasenia']);
            $item->setCreacion($p['creacion_contrasenia']);

            array_push($items,$item);

            return $items;
        }
    }catch(PDOException $e){
        return false;
    }
}//fin get all

public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `contrasenia` WHERE id_contrasenia = :id 
            AND estado_contraseni = "AC" ');
        $query->execute(['id' => $id]);

        $contrasenia = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->setId($contrasenia['id_contrasenia']);
        $this->setUser($contrasenia['id_usuario']);
        $this->setNombre($contrasenia['nombre_contrasenia']);
        $this->setEstado($contrasenia['estado_contrasenia']);
        $this->setModificacion($contrasenia['modificacion_contrasenia']);
        $this->setCreacion($contrasenia['creacion_contrasenia']);

        return $this;
    }catch(PDOException $e){
        return false;
    }
}//fin get

public function delete($id){}//fin delete

public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `contrasenia` SET 
            nombre_contrasenia = :nombre
            WHERE id_contrasenia = :id AND estado_contrasenia = "AC" ');

        $query->execute([
            'nombre' => $this->nombreContrasenia,
            'id' => $this->getId()]);

        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin update
public function from($array){
    $this->idContrasenia = $array['id_contrasenia'];
    $this->user = $array['id_usuario'];
    $this->nombreContrasenia = $array['nombre_contrasenia'];
    $this->estado = $array['estado_contrasenia'];
    $this->modificacion = $array['modificacion_contrasenia'];
    $this->creacion = $array['creacion_contrasenia'];
}//fin from



//getters
public function getId(){
    return $this->idContrasenia;
}
public function getUser(){
    return $this->user;
}
public function getNombre(){
    return $this->nombreContrasenia;
}
public function getEstado(){
    return $this->estado;
}
public function getModificacion(){
    return $this->modificacion;
}
public function getCreacion(){
    return $this->creacion ;
}

//setters

public function setId($id){
    $this->idContrasenia = $id;
}
public function setUser($user){
    $this->user = $user;
}
public function setNombre($pass){
    $this->nombreContrasenia = $pass;
}
public function setEstado($estado){
    $this->estado = $estado;
}
public function setModificacion($modificacion){
    $this->modificacion = $modificacion;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}


}

?>