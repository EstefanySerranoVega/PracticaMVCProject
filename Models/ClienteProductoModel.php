<?php

Class ClienteProductoModel Extends Model implements IModel{
    private $idCP;
    private $cliente;
    private $producto;
    private $tipoPago;
    private $cantidadCP;
    private $totalCP;
    private $estado;
    private $creacion;

    function __construct(){
        parent::__construct();

        }//fin constructor

    public function save(){
        $this->estadoCP = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `cliente_producto` VALUES (
                    NULL,
                    :cliente,
                    :producto,
                    :tipoPago,
                    :cantidad,
                    :total,
                    :estado,
                    :creacion )' );
            $arrayData = array(
                'cliente'=> $this->cliente,
                'producto'=>$this->producto,
                'tipoPago'=> $this->tipoPago,
                'cantidad'=> $this->cantidad,
                'estado' => $this->estado,
                'creacion' =>$this->creacion);

            $query->execute($arrayData);

            $this->idCP = $this->Conexion()->lastInsertId();

            return true;
        }catch(PDOException $e){
            echo 'Ha ocurrido un error'.$e;
            return false;
        }
    }//fin save

    
    public function getAll(){
        $items = [];
        try{
            $query = $this->query(
                'SELECT * FROM `cliente_producto` WHERE estado_cp = "AC"');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ClienteProductoModel();

                $item->from($p);

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ClienteProductoModel::getAll() => '.$e);
            return false;
        }
    }//fin get all


    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `cliente_producto` 
                WHERE id_cp = :id AND estado_cp = "AC"
                AND estado_cp = "AC"' );
            $query->execute([ 'id'=>$id ]);

            $clienteProducto = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->from($clienteProducto);

            return $this;

        }catch(PDOException $e){
            error_log('ClienteProductoModel::get() => '.$e);
            return false;
        }
    }//fin get


    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `cliente_persona` SET
                estado_cp = "DC"
                WHERE id_cliente_producto =:id
                AND estado_cp = "AC" ' );
            $query->execute(['id' => $this->getId() ]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin delete


    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `cliente_persona` SET
                cantidad_cp = :cantidad
                WHERE id_cliente_producto =:id
                AND estado_cp = "AC" ' );
            $query->execute([
                'cantidad' => $this->cantidadCP,
                'id' => $this->getId() ]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin update


    public function from($array){
        $this->idCP = $array['id_tipo_pago'];
        $this->cliente = $array['id_cliente'];
        $this->producto = $array['id_producto'];
        $this->tipoPago = $array['id_tipo_pago'];
        $this->cantidadCP = $array['cantidad_cp'];
        $this->estado = $array['estado_cp'];
        $this->creacion = $array['creacion_cp'];

    }//fin from


//SETTERS
public function setId($id){
    $this->idCP = $id;
}
public function setCliente($cliente){
    $this->cliente = $cliente;
}
public function setProducto($producto){
    $this->producto = $producto;
}
public function setTipoPago($tp){
    $this->tipoPago = $tp;
}
public function setCantidad($cantidad){
    $this->cantidadCP = $cantidad;
}
public function setCreacion ($creacion){
    $this->creacionCP = $creacion;
}
public function setEstado($estado){
    $this->estadoCP = $estado;
}

//GETTERS

public function getId(){return $this->idCP;}
public function getCliente(){return $this->cliente;}
public function getProducto(){return $this->producto;}
public function getTipoPago(){return $this->tipoPago;}
public function getCantidad(){ return $this->cantidadCP;}
public function getCreacion(){ return $this->creacionCP;}
public function getEstado(){ return $this->estadoCP;}


}

?>