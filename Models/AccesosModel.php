<?php

Class AccesosModel Extends Model implements IModel{
    private $idAccesos;
    private $nombreAccesos;
    private $creacionAccesos;
    private $estadoAccesos;


    function __construct(){
        parent::__construct();
        
     $this->nombreAccesos = '';
     $this->creacionAccesos = Date('Y-m-d H:i:s');
     $this->estadoAccesos = '';
    }//fin constructor
 
    public function save(){
        
     $this->estadoAccesos = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `accesos` VALUES(
                    NULL,
                    :nombre,
                    :creacion,
                    :estado)' );

            $arrayData = array(
            'nombre' => $this->nombreAccesos,
            'creacion' =>$this->creacionAccesos,
            'estado' =>$this->estadoAccesos  );

            $query->execute($arrayData);

            $this->idAccesos = $this->conexion()->lastInsertId();
        
            return true;
        }catch(PDOException $e){
            echo'Hubo un error al agregar el acceso '.$e;
            return false;
        } 

    }//fin save

    
    public function getAll(){
        $items = [];
        try{
            $query = $this->query(
                'SELECT * FROM `accesos` WHERE estado_accesos ="AC"');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

                $item = new AccesosModel();

                $item->setId($p['id_accesos']);
                $item->setNombre($p['nombre_accesos']);
                $item->setCreacion($p['creacion_accesos']);
                $item->setEstado($p['estado_accesos']);

                array_push($items,$item);
            }
            
            return $items;
        }catch(PDOException $e){
            echo 'Hubo un error al cargar los elementos '.$e;

            return false;
        }

    }//fin getAll


    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `accesos` WHERE id_accesos = :id
                AND estado_accesos = "AC"');
            $query->execute([ 'id'=>$id]);

            $accesos = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->setId($accesos['id_accesos']);
            $this->setNombre($accesos['nombre_accesos']);
            $this->setCreacion($accesos['creacion_accesos']);
            $this->setEstado($accesos['estado_accesos']);

            return $this;

        }catch(PDOException $e){
            echo'Hubo un error '.$e;
            return false;
        }
    
    }//fin get

    public function delete($id){

        $this->estadoAccesos = 'DC';
    } //fin delete


    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `accesos` SET
                nombre_accesos = :nombre
                WHERE id_accesos =  :id
                AND estado_accesos = "AC"');
            $query->execute([
                'nombre' => $this->nombreAccesos,
                'id' => $this->getId()  ]);
            
            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin update   


    public function from($array){
        $this->idAccesos = $array['id_accesos'];
        $this->nombreAccesos = $array['nombre_accesos'];
        $this->creacionAccesos = $array['creacion_accesos'];
        $this->estadoAccesos = $array['estado_accesos'];
    }//fin from
  

    //SETTERS
    public function setId($id){ 
        $this->idAccesos = $id; }
    public function setNombre($nombre){
        $this->nombreAccesos = $nombre; } 
    public function setCreacion($creacion){
        $this->creacionAccesos = $creacion;  } 
    public function setEstado($estado){
        $this->estadoAccesos =$estado;} 

//GETTERS
        public function getId(){
        return $this->idAccesos;}
        public function getNombre(){
        return $this->nombreAccesos;}
        public function getCreacion(){
        return $this->creacionAccesos;}
        public function getEstado(){
            return $this->estadoAccesos;
        }

}


?>