<?php

Class VentaModel extends Model implements IModel{

    private $idVenta;
    private $clienteProducto;
    private $fechaVenta;
    private $estado;

    function __construct(){
        parent::__construct();
    }//fin constructor

    
    public function save(){
        $this->estadoVenta = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `venta` VALUES(
                NULL,
                :cp,
                :fecha,
                :estado )' );
                
            $arrayData =array(
                'cp' => $this->clienteProducto,
                'fecha' => $this->fechaVenta,
                'estado' => $this->estado);

            $query->execute($arrayData);

            $this->idVenta = $this->db->lastInsertId();

            return true;
        }catch(Exception $e){
            return false;
        }
    }//fin save

    public function getAll(){
        $items =[];
        try{
            $query =$this->query(
                'SELECT * FROM `venta` WHERE estado_venta = "AC"');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new VentaModel();

                $item->setId($p['id_venta']);
                $item->setCP($p['id_cliente_producto']);
                $item->setFecha($p['fecha_venta']);
                $item->setEstado($p['estado_venta']);

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
                'SELECT * FROM `venta` WHERE estado_venta = "AC" 
                AND id_venta = :id' );
            $query->execute(['id' => $id]);

            $venta = $query->fetchAll(PDO::FETCH_ASSOC);
            
            $this->setId($venta['id_venta']);
            $this->setCP($venta['id_cliente_producto']);
            $this->setFecha($venta['fecha_venta']);
            $this->setEstado($venta['estado_venta']);

        }catch(PDOException $e){
            return false;
        }
    }//fin get

    public function delete($id){}//fin delete

    public function update(){}//fin update

    public function from($array){
        $this->idVenta = $array['id_venta'];
        $this->clienteProducto = $array['id_cliente_producto'];
        $this->fechaVenta = $array['fecha_venta'];
        $this->estado = $array['estado_venta'];
    }//fin from

//SETTERS
public function setId($id){
    $this->idVenta = $id;
}
public function setCP($cp){
    $this->clienteProducto = $cp;
}
public function setFecha($fecha){
    $this->fechaVenta = $fecha;
}
public function setEstado($estado){
    $this->estado = $estado;
}

//GETTERS

public function getId(){
    return $this->idVenta ;
}
public function getCP(){
     return $this->clienteProducto;
}
public function getFecha(){
    return $this->fechaVenta ;
}
public function getEstado(){
    return $this->estado;
}



}

?>