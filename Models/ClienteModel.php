<?php
Class ClienteModel extends Model implements IModel {
    private $idCliente;
    private $persona;
    private $correoCliente;
    private $direccion;
    private $creacionCliente;
    private $estadoCliente;


    function __construct(){
        parent::__construct();
    }//fin construct

   
    public function save(){
        error_log('ClienteModel::save()');
        $this->estadoCliente = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `cliente` VALUES(
                    NULL,
                    :persona,
                    :correo,
                    :direccion,
                    :estado,
                    :creacion)');

            $arrayData = array(
                'persona'=>$this->persona,
                'correo' => $this->correoCliente,
                'direccion' => $this->direccion,
                'estado' => $this->estadoCliente,
                'creacion' => $this->creacionCliente);
            $query->execute($arrayData);

            $id = $this->query("SELECT MAX(id_cliente) AS id FROM cliente");
            if ($row = $id->fetchAll()) {
            $this->idCliente = $row[0][0];
            } if($query->rowCount()) {
                error_log('ClienteModel::save()=>true');
              return true;
              }else{
                error_log('ClienteModel::save()=>false');
                return false;}
             
        }catch(PDOException $e){
            error_log('Hubo un error '.$e);
            return false;
        }
    }//fin save

    
    public function getAll(){
        $items = []; 
        try{
            $query = $this->query('SELECT * FROM `cliente`');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

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
                CORREO_CLIENTE = :correo
                DIRECCION_CLIENTE = :direccion

                WHERE  id_cliente = :id' );
            $query->execute([
                'correo' => $this->correoCliente,
                'direccion' => $this->direccion,
                'id' => $this->getId()]);

            return true;
        }catch(PDOException $e){
            echo 'Ha ocurrido un error '.$e;
        }
    }//fin update
    public function from($array){
        $this->idCliente = $array['ID_CLIENTE'];
        $this->persona = $array['ID_PERSONA'];
        $this->correoCliente = $array['CORREO_CLIENTE'];
        $this->direccion = $array['DIRECCION_CLIENTE'];
        $this->creacionCliente = $array['CREACION_CLIENTE'];
        $this->estadoCliente = $array['ESTADO_CLIENTE'];
    }//fin from

    //SETTERS
    public function setId($id){ 
        $this->idCliente = $id; }
    public function setCorreo($correo){
        $this->correoCliente = $correo; }
    public function setDireccion($direccion){ 
        $this->direccion = $direccion;} 
    public function setCreacion($creacion){
        $this->creacionCliente = $creacion;  } 
    public function setEstado($estado){
        $this->estadoCliente = $estado;} 
    public function setPersona($persona){
        $this->persona = $persona;}

//GETTERS
        public function getId(){
        return $this->idCliente;}
        public function getCorreo(){
        return $this->correoCliente;}
        public function getDireccion(){
            return $this->direccion;}
        public function getCreacion(){
        return $this->creacionCliente;}
        public function getEstado(){
            return $this->estadoCliente;}
        public function getPersona(){
            return $this->persona; }

}
?>