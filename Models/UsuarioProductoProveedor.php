<?php
require_once('User.php');
require_once('Producto.php');
require_once('Proveedor.php');
require_once('Almacen.php');

Class UsuarioProductoProveedor{
private $usuario;
private $producto;
private $proveedor;
private $almacen;
private $estadoUPP;
private $precioUPP;
private $fechaIngresoUPP;
private $creacionUPP;
private $conexion;
private $db;

function __construct(){
$this->conexion = new Database();
$this->db = $this->conexion ->Conexion();
$this->usuario = new User();
$this->producto = new Producto();
$this->proveedor = new Proveedor();
$this->almacen = new Almacen();

}//fin constructor

public function uppExist($a){
$this->idUPP = $a;
$this->estadoUPP = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `usuario_producto_proveedor`
    WHERE id_usuario_producto_proveedor =:upp
    AND estado_UPP = :estado'
);
$select = $sql->execute([
    'upp'=>$this->idUPP,
    'estado'=>$this->estadoUPP
]);
if($sql->rowCount()){
    return true;
}else{
return false;
}

}catch(Exception $x){
    return 'Ha cocurrido un error '.$x;
}

}//fin function upp exist


public function insertUPP($a,$b,$c,$d,$e){

    $this->usuario->setIdUser($a);
    $this->producto->setIdProducto($b);
    $this->proveedor->setIdProveedor($c);
    $this->almacen->setIdAlmacen($d);

    $this->estadoUPP = 'AC';
    $this->precioUPP = $e;
    $this->fechaIngresoUPP = Date('y-m-d H:i:s');
    $this->creacionUPP  = Date('y-m-d H:i:s');

    $idUser = $this->usuario->getIdUser();
    $idProducto = $this->producto->getIdProducto();
    $idProveedor = $this->proveedor->getIdProveedor();
    $idAlmacen = $this->almacen->getIdAlmacen();
    try{
$sql = 'INSERT INTO `usuario_producto_proveedor`
VALUES(
    NULL,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
)';
$arrayData= array(
    $idUser,
    $idProducto,
    $idProveedor,
    $idAlmacen,
    $this->estadoUPP,
    $this->precioUPP,
    $this->fechaIngresoUPP,
    $this->creacionUPP
);
$insert = $this->db->prepare($sql);
$resInsert = $insert->execute($arrayData);

$this->idUPP = $this->db->lastInsertId();
return $resInsert;
    }catch(Exception $x){

        return 'Ha ocurrido un error inesperado '.$x;
    }

}//fin insert idUPP

public function setIdUPP($a){
    $this->idUPP =$a;
    $sql = $this->db->prepare(
        'SELECT id_usuario_producto_proveedor
        FROM `usuario_producto_proveddor`
        WHERE id_usuario_producto_proveedor = :upp
        ' 
    );
    $select = $sql->execute(['upp'=> $this->idUPP]);
}//fin set id user upp

public function getIdUPP(){
    return $this->idUPP;
}//fin get id upp of


public function deleteUPP($a){
    $this->idUPP = $a;
    $this->estadoUPP = 'DC';
    try{
    $sql = $this->db->prepare(
        'UPDATE `usuario_producto_proveedor`
        SET estado_UPP = :estado
        WHERE id_usuario_producto_proveedor =:upp'  
    );
    $delete = $sql->execute([
        'estado'=>$this->estadoUPP,
        'upp'=>$this->idUPP
    ]);
    return $delete;
}catch(Exception $x){

    return 'Ha ocurrido un error inesperado '.$x;
}
}//fin delete upp


}

?>