<?php
Class ClienteModel extends Model implements IModel {
    private $idCliente;
    private $persona;
    private $correoCliente;
    private $creacionCliente;
    private $estadoCliente;


    function __construct(){
        parent::__construct();

         //$this->persona =new Persona();
         $this->correoCliente = '';
         $this->creacionCliente = Date('Y-m-d H:i:s');
         $this->estadoCliente = '';
    }//fin construct

   
    public function save(){
        $this->estadoCliente = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `cliente` VALUES(
                    NULL,
                    :persona,
                    :correo,
                    :creacion,
                    :estado)');

            $arrayData = array(
                'persona'=>$this->persona,
                'correo' => $this->correoCliente,
                'creacion' => $this->creacionCliente,
                'estado' => $this->estadoCliente);

            $query->execute($arrayData);

            $id = $this->query("SELECT MAX(id_cliente) AS id FROM cliente");
            if ($row = $id->fetchAll()) {
            $this->idCliente = $row[0][0];
            }
            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin save

    
    public function getAll(){
        $items = []; 
        try{
            $query = $this->query('SELECT * FROM `cliente`');
            while($p = $query->fetch()){

                $item = new ClienteModel();

                $item->from($p);

                array_push($items, $p);
            }

            return $items;
        }catch(PDOException $e){
            error_log('ClienteModel::getAll() => '.$e);
            return false;
        }
    }//fin get all


    
    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `cliente` WHERE id_cliente = :id ');
            $query->execute(['id'=>$id]);

            $cliente = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->from($cliente);

            return $this;

        }catch(PDOException $e){
            error_log('ClienteModel::get() => '.$e);
            return false;
        }
    }//fin get


    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `cliente` SET
                estado_cliente = "DC"
                WHERE  id_cliente = :id
                AND estado_cliente = "AC"' );
            $query->execute(['id' => $id]);

            return true;
        }catch(PDOException $e){
            echo 'Ha ocurrido un error '.$e;
        }
    }//fin delete
    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `cliente` SET
                correo_cliente = :correo
                WHERE  id_cliente = :id' );
            $query->execute([
                'correo' => $this->correoCliente,
                'id' => $this->getId()]);

            return true;
        }catch(PDOException $e){
            echo 'Ha ocurrido un error '.$e;
        }
    }//fin update
    public function from($array){
        $this->idCliente = $array[0];
        $this->persona = $array[1];
        $this->correoCliente = $array[2];
        $this->creacionCliente = $array[3];
        $this->estadoCliente = $array[4];
    }//fin from

    //SETTERS
    public function setId($id){ 
        $this->idCliente = $id; }
    public function setCorreo($correo){
        $this->correoCliente = $correo; } 
    public function setCreacion($creacion){
        $this->creacionCliente = $creacion;  } 
    public function setEstado($estado){
        $this->estadoCliente = $estado;} 
        public function setPersona($persona){
            $this->persona = $persona;}

//GETTERS
        public function getId(){
        return $this->idCliente;}
        public function getNombre(){
        return $this->correoCliente;}
        public function getCreacion(){
        return $this->creacionCliente;}
        public function getEstado(){
            return $this->estadoCliente;
        }
        public function getPersona(){
            return $this->persona;
        }

}
?>