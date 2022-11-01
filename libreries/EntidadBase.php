<?php
require_once('Database.php');
Class EntidadBase {

    protected $db;
    protected $tabla;
    protected $id;
    protected $data;
    function __construct( $id, $table, PDO $conexion){
        $this->id = $id;
        $this->tabla = (string)$table;
        $this->db = $conexion;
        
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