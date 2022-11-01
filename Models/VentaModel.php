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

            $id = $this->query("SELECT MAX(id_venta) AS id FROM venta");
            
            if ($row = $id->fetchAll()) {
            $this->idVenta = $row[0][0];
            }
    
            if($query->rowCount() > 0) {
                return true;
            }else{
                return false;
            }

            return true;
        }catch(Exception $e){
            error_log('ERROR::VentaModel::save()-> '.$e);
            return false;
        }
    }//fin save

    public function getAll(){
        $items =[];
        try{
            $query =$this->query(
                'SELECT * FROM `venta` WHERE estado_venta = "AC"');
            while($p = $query->fetch()){
                $item = new VentaModel();

                $item->from($p);

                array_push($items,$p);
            }

            return $items;
        }catch(PDOException $e){
            error_log('ERROR::VentaModel->getAll() => '.$e);
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
            
            $this->from($venta);

        }catch(PDOException $e){
            error_log('ERROR::VentaModel->get() => '.$e);
            return false;
        }
    }//fin get

    public function delete($id){}//fin delete

    public function update(){}//fin update

    public function from($array){
        $this->idVenta = $array[0];
        $this->clienteProducto = $array[1];
        $this->fechaVenta = $array[2];
        $this->estado = $array[3];
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

//function select producto mas vendido

}

?>