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

            $item->from($p);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        error_log('ContraseniaModel::getAll()=> '.$e);
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

        $this->from($contrasenia);

        return $this;
    }catch(PDOException $e){
        error_log('ContraseniaModel::get()=> '.$e);
        return false;
    }
}//fin get

public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `contrasenia` SET 
            estado_contrasenia = "DC"
            WHERE  id_contrasenia = :id
            AND estado_contrasenia = "AC" ');

        $query->execute(['id' => $this->getId()]);

        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin delete

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
 private function getHashedPass($pass){
    return password_hash($pass,PASSWORD_DEFAULT, ['const' => 5]);

 }

//setters

public function setId($id){
    $this->idContrasenia = $id;
}
public function setUser($user){
    $this->user = $user;
}
public function setNombre($pass){
    $this->nombreContrasenia = $this->getHashedPass($pass);
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
public function comparePassword($pass, $user){
    try{
        $user = $this->get($user); 
        return password_verify($pass,$user->getNombre());
    }catch(PDOException $e){
        error_log('ERROR::CONTRASENIAMODEL_conparePassword '.$e);
        return false;
    }
}

}

?>