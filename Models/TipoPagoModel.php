<?php

Class TipoPagoModel extends Model implements IModel{
private $idTP;
private $nombreTP;
private $creacion;
private $estado;

function __construct(){
    parent::__construct();
}//fin constructor


public function save(){
    $this->estado = 'AC';
    try{
        $query = $this->prepare(
            'INSERT INTO `tipo_pago` VALUES(
            NULL,
            :nombre,
            :creacion,
            :estado)');
                
        $arrayData=  array(
            'nombre' => $this->nombreTP,
            'creacion' => $this->creacion,
            'estado' => $this->estado );

        $query->execute($arrayData);

        $this->idTP = $this->db->lastInsertId();
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin save
public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `tipo_pago` WHERE estado_tipo_pago = "AC" ');
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new TipoPagoModel();

            $item->setId($p['id_tipo_pago']);
            $item->setNombre($p['nombre_tipo_pago']);
            $item->setCreacion($p['creacion_tipo_pago']);
            $item->setEstado($p['estado_tipo_pago']);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        return false;
    }
}//fin get all
public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `tipo_pago` WHERE id_tipo_pago =:id
            AND estado_tipo_pago = "AC" ');
        $query->execute(['id' => $this->idTP]);

        $tipoPago = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->setId($tipoPago['id_tipo_pago']);
        $this->setNombre($tipoPago['nombre_tipo_pago']);
        $this->setCreacion($tipoPago['creacion_tipo_pago']);
        $this->setEstado($tipoPago['estado_tipo_pago']);

        return $this;

    }catch(PDOException $e){
        return false;
    }
}//fin get

public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `tipo_pago` SET 
            estado_tipo_pago = "DC"
            WHERE id_tipo_pago = :id
            AND estado_tipo_pago = "AC"');

        $query->execute(['id' => $this->idTP]);

        return true;

    }catch(PDOException $e){
        return false;}
}//fin delete


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `tipo_pago` SET 
            nombre_tipo_pago = :nombre
            WHERE id_tipo_pago = :id
            AND estado_tipo_pago = "AC"');

        $query->execute(['id' => $this->idTP]);

        return true;

    }catch(PDOException $e){
        return false;}
}//fin update


public function from($array){
    $this->idTP = $array['id_tipo_pago'];
    $this->nombreTP = $array['nombre_tipo_pago'];
    $this->creacion = $array['creacion_tipo_pago'];
    $this->estado = $array['estado_tipo_pago'];
}//fin from

public function tipoPagoExist($a){
    $this->idTP =$a;
    $this->estadoTP = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `tipo_pago`
    WHERE id_tipo_pago= :tipoPago
    estado_tp =: estado '
);
$select = $sql->execute([
    'tipoPago'=>$this->idTipoPago,
    'estado'=>$this->estadoTP
]);
if($sql->rowCount()){
    return true;
}else{
    return false;}

}catch(Exception $x){
    return 'Ha ocurrido un error '.$x;
}
}//fin tipo pago exist

//SETTERS
public function setId($id){
    $this->idTp = $id;
}
public function setNombre($nombre){
    $this->nombreTP = $nombre;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}
public function setEstado($estado){
    $this->estado = $estado;
}

//GETTERS
public function getId(){
    return $this->idTP;
}
public function getNombre(){
    return $this->nombreTP;
}
public function getCreacion(){
    return $this->creacion;
}
public function getEstado(){
    return $this->estado;
}


}

?>