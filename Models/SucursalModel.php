<?php


Class SucursalModel extends Model implements IModel{
    private $idSucursal;
    private $almacen;
    private $nombreSucursal;
    private $direccionSucursal;
    private $estado;
    private $creacion;

    function __construct(){
        parent::__construct();
    }//fin construct

    public function save(){
        $this->estado = 'AC';
        try{
        $query = $this->prepare(
            'INSERT INTO `sucursal` VALUES(
                NULL,
                :almacen,
                :nombre,
                :direccion,
                :estado,
                :creacion)');
                
        $arrayData =array(
            'almacen' => $this->almacen,
            'nombre' => $this->nombreSucursal,
            'direccion' => $this->direccionSucursal,
            'estado' => $this->estadoSucursal,
            'creacion' => $this->creacionSucursal);

        $query->execute($arrayData);
            
        $this->idSucursal = $this->db->lastInsertId();
        
        return true;
        }catch(Exception $e){
            
            return false;
        }  
    }//fin save

public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `sucursal` WHERE estado_sucursal = "AC"');
            
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new SucursalModel();

            $item->from($p);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        error_log('SucursalModel::getAll()=> '.$e);
        return false;
    }
}//fin getAll


public function get($id){
    try{
        $query =$this->prepare(
            'SELECT * FROM WHERE id_sucursal = :id
            AND estado_sucursal = "AC" ' );
        $query->execute(['id' => $id]);

        $sucursal = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->from($sucursal);

        return $this;
    }catch(PDOException $e){
        error_log('SucursalModel::get()=> '.$e);
        return false;
    }
}//fin get


public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `sucursal` SET 
            estado_roles = "DC"
            WHERE estado_sucursal = "AC"
            AND id_sucursal = :id'  );

        $query->execute(['id' => $this->getid()]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin delete


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `sucursal` SET 
            nombre_sucursal = :nombre
            direccion_sucursal = :direccion
            WHERE estado_sucursal = "AC"
            AND id_sucursal = :id'  );

        $query->execute([
            'nombre' => $this->nombreSucursal,
            'direccion' => $this->direccionSucursal,
            'id' => $this->getid()]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}//fin update

public function from($array){
    $this->idSucursal = $array['id_sucursla'];
    $this->almacen = $array['id_almacen'];
    $this->nombreAlmacen = $array['nombre_almacen'];
    $this->direccionSucursal = $array['direccion_sucursal'];
    $this->creacionSucursal = $array['creacion_sucursal'];
    $this->estadoSucursal = $array['estado_sucursal'];
}//fin from

//SETTERS

public function setId($id){
    $this->idSucursal = $id;
}
public function setAlmacen($almacen){
    $this->almacen = $almacen;
}
public function setNombre($nombre){
    $this->nombreAlmacen = $nombre;
}
public function setDireccion($direccion){
    $this->direccionSucursal = $direccion;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}
public function setEstado($estado){
    $this->estado = $estado;
}

//GETTERS
public function getId(){
    return $this->idSucursal;
}
public function getAlmacen(){
    return  $this->almacen;
}
public function getNombre(){
    return $this->nombreAlmacen;
}
public function getDireccion(){
    return $this->direccionSucursal;
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
            'SELECT * FROM `sucursal`
            WHERE nombre_sucursal = :name
            AND estado_sucursal = "AC"');

        $query->execute([ 'name'=>$name]);
        if($query->rowCount() > 0){
            error_log('SucursalModel::exist()->rowCount()=> true');
            return true;
        }else{
            error_log('SucursalModel::exist()->roeCount=> false');
            return false;
        }

    }catch(Exception $x){
        return 'Ha ocurrido un error'.$x;
    }
}//fin sucursal exist


}
?>