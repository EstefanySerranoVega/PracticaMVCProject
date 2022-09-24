<?php

Class CategoriaModel Extends Model implements IModel {
private $idCategoria;
private $nombreCategoria;
private $creacionCategoria;
private $estadoCategoria;


function __construct(){
    parent::__construct();

    $this->nombreCategoria = '';
    $this->creacionCategoria = Date('Y-m-d H:i:s');
    $this->estadoCategoria = '';
}//fin construct


public function save(){
    $this->estadoCategoria = 'AC';
    try{
        $query = $this->prepare(
            'INSERT INTO `categoria` VALUES(
                NULL,
                :nombre,
                :creacion,
                :estado ) ' );
        $arrayData = array(
            'nombre' => $this->nombreCategoria,
            'creacion' => $this->creacionCategoria,
            'estado' => $this->estadoCategoria);

        $query->execute($arrayData);

        $this->idCategoria = $this->conexion()->lastInsertId();
        
        return true;
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
}//fin save


public function getAll(){
    $items = [];
    try{
        $query = $this->query('SELECT *FROM `categoria`');
        while($p = $query->fetch(PDO::FETCH_ASSOC)){

            $item = new CategoriaModel();

            $item->setId($p['id_categoria']);
            $item->setNombre($p['nombre_categoria']);
            $item->setCreacion($p['creacion_categoria']);
            $item-> setEstado($p['estado_categoria']);

            array_push($items,$item);

            return $items;
        }
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }

}//fin get all


public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `categoria` WHERE id_categoria = :id ');
        $query->execute([
            'id'=>$id]);

        $categoria = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->setId($categoria['id_categoria']);
        $this->setNombre($categoria['nombre_categoria']);
        $this->setCreacion($categoria['creacion_categoria']);
        $this->setEstado($categoria['estado_categoria']);

        return $this;

    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
}//fin get


public function delete($id){
    
    $this->estadoCategoria = 'DC';
}//fin delete


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `categoria` SET
            nombre_categoria = :nombre,
            creacion_categoria = :creacion,
            estado_categoria = :estado
            WHERE id_categoria = :id ' );
        $query->execute([
            'nombre' => $this->nombreCategoria,
            'creacion' => $this->creacionCategoria,
            'estado' => $this->creacionCategoria,
            'id' => $this->getId()
        ]);

        return true;
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
}//fin update
public function from($array){
    $this->idCategoria = $array['id_categoria'];
    $this->nombreCategoria = $array['nombre_categoria'];
    $this->creacionCategoria = $array['creacion_categoria'];
    $this->estado = $array['estado_categoria'];
}//fin array

    //SETTERS
    public function setId($id){ 
        $this->idCategoria = $id; }
    public function setNombre($nombre){
        $this->nombreCategoria = $nombre; } 
    public function setCreacion($creacion){
        $this->creacionCategoria = $creacion;  } 
    public function setEstado($estado){
        $this->estadoCategoria =$estado;} 

//GETTERS
        public function getId(){
        return $this->idCategoria;}
        public function getNombre(){
        return $this->nombreCategoria;}
        public function getCreacion(){
        return $this->creacionCategoria;}
        public function getEstado(){
            return $this->estadoCategoria;}

}

?>