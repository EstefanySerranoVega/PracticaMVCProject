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

            $item->setId($p['id_sucursal']);
            $item->setAlmacen($p['id_almacen']);
            $item->setNombre($p['nombre_sucursal']);
            $item->setDireccion($p['direccion_sucursal']);
            $item->setCreacion($p['creacion_sucursal']);
            $item->setEstado($p['estado_sucursal']);

            array_push($items,$item);

            return $items;
        }
    }catch(PDOException $e){
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

        $this->setId($sucursal['id_sucursal']);
        $this->setAlmacen($sucursal['id_almacen']);
        $this->setNombre($sucursal['nombre_almacen']);
        $this->setDireccion($sucursal['direccion_sucursal']);
        $this->setCreacion($sucursal['creacion_sucursal']);
        $this->setEstado($sucursal['estado_sucursal']);

        return $this;
    }catch(PDOException $e){
        return false;
    }
}//fin get


public function delete($id){}//fin delete


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

public function sucursalExist($a){
$this->idSucursal = $a;
$this->estadoSucursal = 'AC';
try{
$sql = $this->db->prepare(
    'SELECT * FROM `sucursal`
    WHERE id_sucursal = :sucursal
    AND estado_sucursal =:estado ');
    $select = $sql->execute([
        'sucursal'=>$this->idSucursal,
        'estado'=>$this->idSucursal
    ]);
    if($sql->rowCount()){
        return true;
    }else{
        return false;
    }

}catch(Exception $x){
    return 'Ha ocurrido un error'.$x;
}
}//fin sucursal exist


}
?>