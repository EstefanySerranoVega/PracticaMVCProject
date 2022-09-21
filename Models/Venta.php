<?php
require_once('ClienteProducto.php');

Class Venta{

    private $idVenta;
    private $clienteProducto;
    private $fechaVenta;
    private $estadoVenta;
    private $conexion;
    private $db;

    function __construct(){
$this->conexion = new Database();
$this->db = $this->conexion->Conexion();
$this->clienteProducto = new ClienteProducto();

    }//fin constructor

    public function ventaExist($a){
$this->idVenta =$a;
$this->estadoVenta = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `venta`
    WHERE id_venta =:venta
    AND estado_venta = :estado '
);
$select  = $sql->execute([
    'venta'=>$this->idVenta,
    'estado'=>$this->estadoVenta
]);
if($sql->rowCount()){
    return true;
}else{
    return false;
}
}catch(Exception $x){
    return 'Ha ocurrido un errror '.$x;
}

    }//fin venta exist

    public function insertVenta($a){
        $this->clienteProducto->setIdCP($a);
        $idCP = $this->clienteProducto->getIdCP();
        $this->fechaVenta = Date('Y-m-d H:i:s');
        $this->estadoVenta = 'AC';
        try{
            $sql = 'INSERT INTO `venta`
            VALUES(
                NULL,
                ?,
                ?,
                ?
            )';
            $insert = $this->db->prepare($sql);
            $arrayData =array(
            $idCP,
            $this->fechaVenta,
            $this->estadoVenta);
            $resInsert = $insert->execute($arrayData);
            $this->idVenta = $this->db->lastInsertId();

            return $resInsert;
        }catch(Exception $x){
            return 'Ha ocurrido un error '.$x;
        }
    }//fin insert venta 
    
    public function setIdVenta($a){
        $this->idVenta = $a;

        $sql = $this->db->prepare(
            'SELECT `id_venta` FROM venta
            WHERE id_venta = :venta'
        );
        $select = $sql->execute(['venta'=> $this->idVenta]);
    }//fin set id venta

    public function getIdVenta(){
        return $this->idVenta;
    }//fin funtion get id venta

    public function deleteVenta($a){
        $this->idVenta =$a;
        $this->estadoVenta = 'DC';
        try{
        $sql = $this->db->prepare(
            'UPDATE `venta`SET
             estado_venta = :estado 
            WHERE id_venta =:venta'
            
        );
        $delete  = $sql->execute([
            'estado'=>$this->estadoVenta,
            'venta'=>$this->idVenta
        ]);
        return $delete;
        
        }catch(Exception $x){
            return 'Ha ocurrido un errror '.$x;
        }
        
            }//fin delete venta
}

?>