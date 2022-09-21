<?php

Class ClienteProductoModel Extends Model implements IModel{
    private $idCP;
    private $cantidadCP;
    private $totalCP;
    private $creacionCP;
    private $estadoCP;

    function __construct(){
        parent::__construct();

        $this->cantidadCP  = 0;
        $this->totalCP = 0;
        $this->creacionCP = Date('Y-m-d H:i:s');
        $this->estadoCP = '';
        //$this->cliente = new ClienteModel();
        //$this->producto = new ProductoModel();
        //$this->tp = new TipoPagoModel();

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
                'creacion' =>$this->creacionCP,
                'estado' => $this->estadoCP
            ); 
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
            $query = $this->query('SELECT * FROM `cliente_producto`');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ClienteProductoModel();

                $item->setId($p['id_ClienteProducto']);
                $item->setPersonaCP($p['id_persona']);
                $item-> setCantidad($p['cantidad_cp']);
                $item->setCreacion($p['creacion_cp']);
                $item->setEstado($p['estado_cp']);

                array_push($items, $item);
                return $items;
            }
        }catch(PDOException $e){
            echo 'Ha ocurrido un error '.$e;
            return false;
        }
    }//fin get all


    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `cliente_producto` 
                WHERE id_cp = :id
                AND estado_cp = "AC"' );
            $query->execute([
                'id'=>$id ]);
        }catch(PDOException $e){
            return false;
        }
    }//fin get


    public function delete($id){}
    public function update(){}
    public function from($array){}


//SETTERS
public function setId($id){
    $this->idCP = $id;
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
public function setPersonaCP($persona){
    $this->personaCP = $persona;
}

//GETTERS

public function getId(){return $this->idCP;}
public function getCantidad(){ return $this->cantidadCP;}
public function getCreacion(){ return $this->creacionCP;}
public function getEstado(){ return $this->estadoCP;}
public function getPersonCP(){return $this->personaCP;}


}

?>