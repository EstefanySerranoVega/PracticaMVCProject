<?php
require_once('Database.php');
Class EntidadBase{

    private $db;
    private $conectar;
    private $tabla;
    function __construct($table){
        $this->tabla = (string)$table;
        $this->db = new Database();
        $this->conectar = $this->db->Conexion();
    }

    public function getConexion(){
        return $this->conectar;
    }
    
    public function getdb(){
        return $this->db;
    }
    public function getAll($id){
        $sql = $this->conectar->prepare(
            'SELECT * FROM ? ORDER BY ? DESC'
        );
       /*
        $select = $sql->execute([$this->tabla, $id]);
        while($row = $select->fetch_object()) {
        }
       */
    }
}

?>