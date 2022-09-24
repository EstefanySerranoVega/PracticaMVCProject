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

            $this->idAccesos = $this->conexion()->lastInsertId();

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
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

                $item = new ClienteModel();

                $item->setId($p['id_cliente']);
                $item->setPersona($p['id_persona']);
                $item->setCorreo($p['correo_cliente']);
                $item->setCreacion($p['creacion_cliente']);
                $item->setEstado($p['estado_cliente']);

                array_push($items, $item);
            }
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin get all


    
    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `cliente` WHERE id_cliente = :id ');
            $query->execute([
                'id'=>$id]);

            $cliente = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->setId($cliente['id_cliente']);
            $this->setPersona($cliente['id_persona']);
            $this->setCorreo($cliente['correo_cliente']);
            $this->setCreacion($cliente['creacion_cliente']);
            $this->setEstado($cliente['estado_cliente']);

            return $this;

        }catch(PDOException $e){
            echo 'Hubo un error'.$e;
            return false;
        }
    }//fin get


    public function delete($id){

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
        $this->idCliente = $array['id_cliente'];
        $this->persona = $array['id_persona'];
        $this->correoCliente = $array['correo_cliente'];
        $this->creacionCliente = $array['creacion_cliente'];
        $this->estadoCliente = $array['estado_cliente'];
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