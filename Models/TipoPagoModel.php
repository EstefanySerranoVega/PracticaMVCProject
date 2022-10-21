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
        $id = $this->query("SELECT MAX(id_tipo_pago) AS id FROM tipo_pago");
            
        if ($row = $id->fetchAll()) {
        $this->idTP = $row[0][0];
        }

        if($query->rowCount() > 0) {
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        error_log('ERROR::TipoPagoModel::save()-> '.$e);
        return false;
    }
}//fin save
public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `tipo_pago` WHERE estado_tipo_pago = "AC" ');
        while($p = $query->fetch()){
            $item = new TipoPagoModel();

            $item->from($p);

            array_push($items,$p);
        }
        return $items;
    }catch(PDOException $e){
        error_log('TipoPagoModel::getAll() => '.$e);
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

        $this->from($tipoPago);

        return $this;

    }catch(PDOException $e){
        error_log('TipoPagoModel::get() => '.$e);
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

public function exist($name){
    try{
        $query = $this->prepare(
            'SELECT * FROM `tipo_pago`
            WHERE nombre_tipo_pago = :name
            estado_tp = "AC" ');
        $query->execute(['name'=>$name]);
        if($query->rowCount()){
            error_log('TipoPagoModel::exist()->rowCount()=> true');
            return true;
        }else{
            error_log('TipoPagoModel::exist()->rowCount()=> false');
            return false;}

    }catch(PDOException $e){
        error_log('TipoPagoModel::exist()=> '.$e);
}
}//fin tipo pago exist


}

?>