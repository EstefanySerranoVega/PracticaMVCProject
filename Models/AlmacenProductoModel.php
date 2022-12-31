<?php
Class AlmacenProductoModel extends model implements IModel{
    private $idAP;
    private $almacen;
    private $producto;
    private $pventa;
    private $pcompra;
    private $lote;
    private $cantidad;
    private $proveedor;
    private $usuario;
    private $ingreso;
    private $estado;
    
    public function __construct(){
        parent::__construct();
    }

    public function save(){
        try{
            $query = $this->prepare(
                'INSERT INTO `ALMACEN_PRODUCTO` VALUES(
                    NULL,
                    :usuario,
                    :producto,
                    :proveedor,
                    :almacen,
                    :venta,
                    :compra,
                    :lote,
                    :cantidad,
                    :ingreso,
                    :estado
                )');
            $arrayData = array(
                'usuario' => $this->usuario,
                'producto' => $this->producto,
                'proveedor' => $this->proveedor,
                'almacen' => $this->almacen,
                'venta' => $this->pventa,
                'compra' => $this->pcompra,
                'lote' => $this->lote,
                'cantidad' => $this->cantidad,
                'ingreso' => $this->ingreso,
                'estado' => $this->estado
            );
            error_log(
                ' usuario: '.$this->usuario.
                ' producto: '.$this->producto.
                ' proveedor: '.$this->proveedor.
                ' almacen: '. $this->almacen.
                ' venta: '.$this->pventa.
                ' compra: '. $this->pcompra.
                ' lote: '.$this->lote.
                ' cantidad: '.$this->cantidad.
                ' ingreso: '.$this->ingreso.
                ' estado: '.$this->estado
            );
            $query->execute($arrayData);
            $id = $this->query("SELECT MAX(ID_AP) AS id FROM ALMACEN_PRODUCTO");
            if ($row = $id->fetchAll()) {
                $this->idAP = $row[0][0];
                }
                return true;

        }catch(PDOException $e){
            error_log('ERROR::APModel::save()=> '.$e);
            return false;
        }
    }//fin save

public function getAll(){
$items = [];
try{
    $query = $this->query(
        'SELECT * FROM `ALMACEN_PRODUCTO` WHERE ESTADO_AP = "AC"'
    );
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        $ap = new AlmacenProductoModel();

        $ap->from($item);

        array_push($items,$item);
    }
    return $items;
}catch(PDOException $e){
    error_log('ERROR::APModel::getAll()=> '.$e);
}

}//fin get all

public function get($id){
try{
    $query = $this->prepare(
        'SELECT * FROM `ALMACEN_PRODUCTO` WHERE ID_AP = :id AND ESTADO_AP = "AC"');
    $query->execute(['id' => $id]);

    $ap = $query->fetchAll(PDO::FETCH_ASSOC);
    $this->from($ap);

    return $this;
}catch(PDOException $e){
    error_log('ERROR::AlmacenProducto::get => '.$e);
}
}//fin get

public function delete($id){
    try{
    $query = $this->prepare(
        'UPDATE `almacen_producto` SET
        estado_ap = "DC"
        WHERE id_ap =:id
        AND estado_ap = "AC" ' );
    $query->execute(['id' => $id ]);

    return true;
}catch(PDOException $e){
    return false;
}
}//fin delete($id)

public function update(){}//fin update

public function from($array = []){
     $this->idAP = $array['ID_AP'];
     $this->usuario = $array['ID_USUARIO_AP'];
     $this->producto = $array['ID_PRODUCTO_AP'];
     $this->proveedor = $array['ID_PROVEEDOR_AP'];
     $this->almacen = $array['ID_ALMACEN_AP'];
     $this->pventa = $array['PVENTA_AP'];
     $this->pcompra = $array['PCOMPRA_AP'];
     $this->lote = $array['LOTE_AP'];
     $this->cantidad = $array['CANTIDAD_AP'];
     $this->ingreso = $array['INGRESO_AP'];
     $this->estado = $array['ESTADO_AP'];
}//fin from

//SETTERS
public function setId($id){
    $this->idAP = $id;}
public function setAlmacen($almacen){
    $this->almacen = $almacen;}
public function setProducto($producto){ 
    $this->producto = $producto;}
public function setVenta($precio){
    $this->pventa = $precio;}
public function setCompra($precio){
    $this->pcompra = $precio;}
public function setLote($lote){
    $this->lote = $lote;}
public function setCantidad($cantidad){
    $this->cantidad = $cantidad;}
public function setProveedor($proveedor){
    $this->proveedor = $proveedor;}
public function setUsuario($user){
$this->usuario = $user;}
public function setIngreso($fecha){
    $this->ingreso = $fecha;}
public function setEstado($estado){
    $this->estado = $estado;}

//GETTERS

public function getId(){
return $this->idAP;}
public function getAlmacen(){
    return $this->almacen;}
public function getProducto(){
    return $this->producto;}
public function getVenta(){
    return $this->pventa;}
public function getCompra(){
    return $this->pcompra;}
public function getLote(){
    return $this->lote;}
public function getCantidad(){
    return $this->cantidad;}
public function getProveedor(){
    return $this->proveedor;}
public function getUsuario(){
    return $this->usuario;}
public function getIngreso(){
    return $this->ingreso;}
public function getEstado(){
    return $this->estado; }

public function getForProducto($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `ALMACEN_PRODUCTO` WHERE ID_PRODUCTO = :id AND ESTADO_AP = "AC"');
        $query->execute(['id' => $id]);
    
        $ap = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->from($ap);
    
        return $this;
    }catch(PDOException $e){
        error_log('ERROR::AlmacenProducto::getForProducto => '.$e);
    }
}
public function countProducto($id){
    $items = [];
    try{
        $query = $this->query(
            'SELECT ID_PRODUCTO_AP FROM almacen_producto where ID_PRODUCTO_AP ='.$id);
        
            $query->execute();
       $cant = $query->rowCount();  
    error_log('cantidad: '.$cant);
            return $cant;      
    
    }catch(PDOException $e){
        error_log('ERROR::AlmacenProducto->countProducto()=>'.$e);
    }

}
public function updateCantidad(){
    try{
        $query = $this->prepare(
            'UPDATE `almacen_producto` SET
            cantidad_ap = :cantidad
            WHERE id_producto_ap = :producto');
        $arrayData= array(
            'cantidad' => $this->cantidad,
            'producto' => $this->producto);
        $query->execute($arrayData);

        return true;
    }catch(PDOException $e){
        error_log('AlmacenProductoModel()->updateCantidad()=> '.$e);
    }

}
public function getProductoAndDate($id){
    try{
        $query = $this->prepare(
            'SELECT MAX(INGRESO_AP) AS fecha,
            ID_AP, ID_PRODUCTO_AP, LOTE_AP,CANTIDAD_AP, PVENTA_AP
            FROM almacen_producto
            WHERE id_producto_Ap = :id
            AND ESTADO_AP="AC"');
        $query->execute(['id' => $id]);
    
        $ap = $query->fetchAll(PDO::FETCH_ASSOC);
        $ap;
    
        return $ap;
    }catch(PDOException $e){
        error_log('ERROR::AlmacenProducto::getForProducto => '.$e);
    }
}
}
?>