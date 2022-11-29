<?php

Class CategoriaModel Extends Model implements IModel {
private $idCategoria;
private $nombreCategoria;
private $creacion;
private $estado;


function __construct(){
    parent::__construct();

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
            'creacion' => $this->creacion,
            'estado' => $this->estado);

        $query->execute($arrayData);
 
        $id = $this->query("SELECT MAX(id_categoria) AS id FROM categoria");
        if ($row = $id->fetchAll()) {
        $this->idCategoria = $row[0][0];
        }
        

        if($query->rowCount()>0) {
          error_log('CategoriaModel::save()=>true');
            return true;
            }else{
              error_log('CategoriaModel::save()=>false');
              return false;}
        return true;
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
}//fin save


public function getAll(){
    $items = [];
    try{
        $query = $this->query('SELECT * FROM `categoria`
        WHERE estado_categoria ="AC"');

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            $category = new CategoriaModel();
            $category->from($item);
  
        array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        error_log('CategoriaModel::getAll()=> '.$e);
        return false;
    }

}//fin get all


public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `categoria` WHERE id_categoria = :id ');
        $query->execute([ 'id'=>$id]);

        $categoria = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->from($categoria);

        return $this;
    }catch(PDOException $e){
        error_log('CategoriaModel::get()=> '.$e);
        return false;
    }
}//fin get


public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `categoria` SET
            estado_categoria = "DC"
            WHERE id_categoria = :id
            AND estado_categoria = "AC" ' );
        $query->execute([ 'id' => $id]);

        return true;
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
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
            'creacion' => $this->creacion,
            'estado' => $this->estado,
            'id' => $this->idCategoria
        ]);

        return true;
    }catch(PDOException $e){
        echo 'Hubo un error '.$e;
        return false;
    }
}//fin update
public function from($array = [] ){
    $this->idCategoria = $array['ID_CATEGORIA'];
    $this->nombreCategoria = $array['NOMBRE_CATEGORIA'];
    $this->creacion = $array['CREACION_CATEGORIA'];
    $this->estado = $array['ESTADO_CATEGORIA'];
}//fin array

    //SETTERS
    public function setId($id){ 
        $this->idCategoria = $id; }
    public function setNombre($nombre){
        $this->nombreCategoria = $nombre; } 
    public function setCreacion($creacion){
        $this->creacion = $creacion;  } 
    public function setEstado($estado){
        $this->estado =$estado;} 

//GETTERS
        public function getId(){
        return $this->idCategoria;}
        public function getNombre(){
        return $this->nombreCategoria;}
        public function getCreacion(){
        return $this->creacionCategoria;}
        public function getEstado(){
            return $this->estadoCategoria;}

public function exist($name){
    try{
        $query = $this->prepare(
            'SELECT * FROM `categoria`
            WHERE nombre_categoria = :name
            AND estado_categoria = "AC"');
            $query->execute(['name' => $name]);
          
          if($query->rowCount()){
            return true;
          }else{
            return false;
          }
    }catch(PDOException $e){
        error_log('CategoriaModel::exist()=> '.$e);
    }

}
public function getAllLimit($n){
    $items = [];

    try{
        $query = $this->query(
            'SELECT * FROM categoria
            WHERE estado_categoria = "AC"
            ORDER BY nombre_categoria
            LIMIT '.$n );
        //$query->execute(['n'=> $n]);

        //$categoria = $query->fetchAll();


        //error_log('query es: '.$query);
        
        while($p = $query->fetch()){
            //error_log('p es: '.$p);
            $item = new CategoriaModel();
            $item->from($p);
            array_push($items,$p);
        }
        return $items;


    }catch(PDOException $e){
        error_log('ERROR::CategoriaModel::getAllLimit()-> '.$e);
        return false;
    }

}


public function getNameById($id){
    $query = $this->query(
        'SELECT nombre_categoria from categoria where id_categoria ='.$id );
        
        $name = $query->fetchAll(PDO::FETCH_ASSOC);
        return $name[0]['nombre_categoria'];

}

}

?>