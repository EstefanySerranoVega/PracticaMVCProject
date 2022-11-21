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

            $id = $this->query("SELECT MAX(id_accesos) AS id FROM accesos");
            if ($row = $id->fetchAll()) {
            $this->idAccesos = $row[0][0];
            }
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
            while($item = $query->fetch(PDO::FETCH_ASSOC)){

                $accesos = new AccesosModel();

                $accesos->from($item);

                array_push($items,$item);
            }
            
            return $items;
        }catch(PDOException $e){
            error_log('AccesosModel::getAll()=> '.$e);

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

            $this->from($accesos);

            return $this;

        }catch(PDOException $e){
            error_log('AccesosModel::get() => '.$e);
            return false;
        }
    
    }//fin get

    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `accesos` SET
                estado_accesos = "DC"
                WHERE id_accesos =  :id
                AND estado_accesos = "AC"');
            $query->execute(['id' => $id ]);
            
            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
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


    public function from($array = []){
        $this->idAccesos = $array['ID_ACCESOS'];
        $this->nombreAccesos = $array['NOMBRE_ACCESOS'];
        $this->creacionAccesos = $array['CREACION_ACCESOS'];
        $this->estadoAccesos = $array['ESTADO_ACCESOS'];
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

        public function exist($name){
            try{
                $query = $this->prepare(
                    'SELECT * FROM `accesos`
                    WHERE nombre_accesos = :name
                    AND estado_accesos = "AC" ' );
                $query->execute(['name' => $name]);

                if($query->rowCount() > 0){
                    error_log('AccesosModel::exist()->rowCount => true');
                    return true;
                }else{
                    error_log('AccesosModel::exist()->rowCount => false');
                    return false;
                }
            }catch(PDOException $e){
                error_log('AccesosModel::exist() => '.$e);
            }
        }
}


?>