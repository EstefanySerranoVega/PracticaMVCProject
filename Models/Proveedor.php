<?php
include('Database.php');
Class Proveedor{
    private $idProveedor;
    private $empresaProveedor;
    private $correoProveedor;
    private $estadoProveedor;
    private $creacionProveedor;
    private $conexion;
    private $db;
    

    function __construct(){
$this->conexion= new Database(); 
$this->db = $this->conexion->Conexion();

    }//fin construct

    public function proveedorExist($a){

        $this->idProveedor = $a;
        $this->estadoProveedor = 'AC';
        try{
$sql = $this->db->prepare(
    ' SELECT * FROM `proveedor`
    WHERE id_proveedor= :proveedor,
    estado_proveedor = :estado'
);
$select = $sql->execute([
    'proveedor'=>$this->idProveedor,
'estado'=>$this->estadoProveedor
]);
if($sql->rowCount()){
    return true;
}else{
    return false;
}
        }catch(Exception $x){
            return 'Ha ocurrido un error '.$x;
        }

    }//fin proveedor exist


    public function insertProveedor($a,$b){
        
        $this->empresaProveedor = $a;
        $this->correoProveedor = $b;
        $this->estadoProveedor ='AC';
        $this->creacionProveedor = Date('Y-m-d H:i:s');

try{
    $sql = $this->db->prepare(
        'INSERT INTO `proveedor` VALUES(
            NULL,
            ?,
            ?,
            ?,
            ?
        )');
        $arrayData=  array(
            $this->empresaProveedor,
            $this->correoProveedor,
            $this->estadoProveedor,
            $this->creacionProveedor);
           $resInsert= $sql->execute($arrayData);
    $this->idProveedor= $this->db->lastInsertId();
    return $resInsert;
}catch(Exception $x){
    return 'Error al inserrtar los datos '.$x;
}
    }//fin insert proveedor 


    public function setIdProveedor($a){
        $this->idProveedor = $a;
        $sql = $this->db->prepare(
            'SELECT id_proveedor FROM`proveedor`
            WHERE id_proveedor = :proveedor '
        );
        $select = $sql ->execute(['proveedor' => $this->idProveedor]);
        
        }//fin set id proveedor
        


public function getIdProveedor(){
    return $this->idProveedor;
}//fin get id proveedor 


public function deleteProveedor($a){
$this->idProveedor = $a;
$this->estadoProveedor = 'DC';
try{
$sql = $this->db->prepare(
    'UPDATE `proveedor` SET
    estado_proveedor = :estado
    WHERE id_proveedor =:proveedor');
    $delete =$sql->execute([
        'estado'=>$this->estadoProveedor,
        'proveedor'=>$this->idProveedor
    ]);
return $delete;
}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}

}//fin delete proveedor

    public function updateProveedor(){}
    
}
?>