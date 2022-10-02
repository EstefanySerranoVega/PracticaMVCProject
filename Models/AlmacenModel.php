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

        $this->idAlmacen = $this->db->lastInsertId();

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
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new AlmacenModel();

            $item->setId($p['id_almacen']);
            $item->setNombre($p['nombre_almacen']);
            $item->setCreacion($p['creacion_almacen']);
            $item->setEstado($p['estado_almacen']);

            array_push($items,$item);
        }

        return $items;
    }catch(PDOException $e){
        echo 'Hubo un error al cargar los elementos '.$e;

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

        $this->setId($almacen['id_almacen']);
        $this->setNombre($almacen['nombre_almacen']);
        $this->setCreacion($almacen['creacion_almacen']);
        $this->setEstado($almacen['estado_almacen']);

        return $this;

    }catch(PDOException $e){
        echo 'Ha ocurrido un error '.$e;

        return false;
    }
}//fin get


public function delete($id){}//fin delete


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
    $this->idAlmacen = $array['id_almacen'];
    $this->nombreAlmacen = $array['nombre_almacen'];
    $this->creacionAlmacen = $array['creacion_almacen'];
    $this->estadoAlmacen = $array['estado_almacen'];
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



public function almacenExist($a){
    $this->idAlmacen = $a;
    $this->estadoAlmacen  = 'AC ';
    try{
        $sql = $this->db->prepare(
            'SELECT * FROM `almacen`
            WHERE id_accesos = :almacen
            AND estado_almacen = :estado'
        );
        $select = $sql->execute([
            'almacen'=>$this->idAlmacen,
            'estado'=>$this->estadpoAlmacen
        ]);
        if($sql->rowCount()){
            return true;
        }else{
            return false;
        }
    }catch(Exception $x){
        return 'Ha ocurrido un error '.$x;
    }
}//fin almacen exist

}

?>