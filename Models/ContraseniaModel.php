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

    
        $id = $this->query("SELECT MAX(id_contrasenia) AS id FROM contrasenia");
        if ($row = $id->fetchAll()) {
        $this->idContrasenia = $row[0][0];
        }
         if($query->rowCount()>0) {
         
            return true;
            }else{
                
              return false;}
            

    }catch(PDOException $e){

       error_log('ERROR::ContraseniaModel::save()-> false'.$e) ;
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

            array_push($items,$p);
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

        $contrasenia = $query->fetchAll();

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
    $this->idContrasenia = $array[0];
    $this->user = $array[1];
    $this->nombreContrasenia = $array[2];
    $this->estado = $array[3];
    $this->modificacion = $array[4];
    $this->creacion = $array[5];
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