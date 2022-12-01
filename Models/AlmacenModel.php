<?php

Class AlmacenModel Extends Model Implements IModel{
private $idAlmacen;
private $nombreAlmacen;
private $creacionAlmacen;
private $estadoAlmacen;


function __construct(){
    parent::__construct();
    $this->nombreAlmacen = '';
    $this->creacionAlmacen = date('Y-m-d H:i:s');
    $this->estadoAlmacen = '';
}//fin construct

public function save(){

    $this->estadoAlmacen = 'AC';
    try{

        $query = $this->prepare(
            'INSERT INTO `almacen` 
            VALUES(
                NULL,
                :nombre,
                :creacion,
                :estado )'
            );

        $arrayData = Array(
            'nombre' => $this->nombreAlmacen,
            'creacion' => $this->creacionAlmacen,
            'estado' => $this->estadoAlmacen);
        $query->execute($arrayData);

        $id = $this->query("SELECT MAX(id_almacen) AS id FROM almacen");
        if ($row = $id->fetchAll()) {
        $this->idAlmacen = $row[0][0];
        }

        return true;
    }catch(PDOException $x){
        echo 'Error al insertar los datos '.$x;
        return false;
    }
}//fin save()


public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `almacen` WHERE estado_almacen = "AC"');
        while($p = $query->fetch()){
            $item = new AlmacenModel();

            $item->from($p);

            array_push($items,$p);
        }

        return $items;
    }catch(PDOException $e){
        error_log('AlmacenModel::getAll() => '.$e);

        return false;
    }
}//fin get all

public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `almacen` WHERE id_almacen = :id
            AND estado_almacen = "AC"');
        $query->execute([ 'id'=>$id ]);

        $almacen = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->from($almacen);

        return $this;

    }catch(PDOException $e){
        error_log('AlmacenModel::get() => '.$e);

        return false;
    }
}//fin get


public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `almacen` SET 
            estado_almacen = "DC"
            WHERE id_almacen = :id 
            AND estado_almacen = "AC" ');
        $query->execute([ 'id' => $id ]);

        return true;
    }catch(PDOException $e){
        echo 'Hubo un error'.$e;
        return false;
    }
}//fin delete


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `almacen` SET 
            nombre_almacen = :nombre,
            creacion_almacen = :creacion,
            estado_almacen = :estado
            WHERE id_almacen = :id ' );
        $query->execute([
            'nombre' => $this->nombreAlmacen,
            'creacion' => $this->creacionAlmacen,
            'estado' => $this->estadoAlmacen,
            'id' => $this->getId() ]);

        return true;
    }catch(PDOException $e){
        echo 'Hubo un error'.$e;
        return false;
    }
}//fin update


public function from($array){
    $this->idAlmacen = $array[0];
    $this->nombreAlmacen = $array[2];
    $this->creacionAlmacen = $array[3];
    $this->estadoAlmacen = $array[4];
}//fin from

    //SETTERS
    public function setId($id){ 
        $this->idAlmacen = $id; }
    public function setNombre($nombre){
        $this->nombreAlmacen = $nombre; } 
    public function setCreacion($creacion){
        $this->creacionAlmacen = $creacion;  } 
    public function setEstado($estado){
        $this->estadoAlmacen =$estado;} 
//GETTERS
        public function getId(){
        return $this->idAlmacen;}
        public function getNombre(){
        return $this->nombreAlmacen;}
        public function getCreacion(){
        return $this->creacionAlmacen;}
        public function getEstado(){
            return $this->estadoAlmacen;
        }



public function exist($a){
    $this->idAlmacen = $a;
    $this->estadoAlmacen  = 'AC ';
    try{
        $query = $this->prepare(
            'SELECT * FROM `almacen`
            WHERE id_accesos = :almacen
            AND estado_almacen = :estado'
        );
        $query->execute([
            'almacen'=>$this->idAlmacen,
            'estado'=>$this->estadpoAlmacen
        ]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }catch(Exception $e){
        return 'AlmacenModel::exist() => '.$e;
    }
}//fin almacen exist



}

?>