<?php

Class UsuarioProductoProveedorModel extends Model implements IModel{
private $idUPP;
private $usuario;
private $producto;
private $proveedor;
private $almacen;
private $precioUPP;
private $fechaIngresoUPP;
private $estado;
private $creacion;

function __construct(){
    parent::__construct();
}//fin constructor

public function save(){
    $this->estado = 'AC';
    try{
        $query = $this->prepare(
            'INSERT INTO `usuario_producto_proveedor`
            VALUES(
                NULL,
                :user,
                :producto,
                :proveedor,
                :almacen,
                :precio,
                :ingreso,
                :estado,
                :creacion )');

            $arrayData= array(
                'user' => $this->usuario,
                'producto' => $this->producto,
                'proveedor' => $this->proveedor,
                'almacen' => $this->almacen,
                'precio' => $this->precioUPP,
                'ingreso' =>$this->fechaIngresoUPP,
                'estado' => $this->estado,
                'creacion' => $this->creacion  );
            
            $query->execute($arrayData);
            
            $id = $this->query("SELECT MAX(id_usuario_producto_proveedor) AS id FROM usuario_produccto_proveedor");
            
            if ($row = $id->fetchAll()) {
            $this->idUPP = $row[0][0];
            }

            if($query->rowCount() > 0) {
                return true;
            }else{
                return false;
            }
            return true;
    }catch(PDOException $e){
        error_log('ERROR::UsuarioProductoProveedorModel::save()-> '.$e);
        return false;}
}//fin save


public function getAll(){
    $items =[];
    try{
        $query = $this->query(
            'SELECT * FROM `usuario_producto_proveedor` 
            WHERE  estado_UPP = "AC"' );
            
        while($p = $query->fetch()){
            $item = new UsuarioProductoProveedorModel();

            $item->from($p);

            array_push($items,$p);
        }

        return $items;

    }catch(PDOException $e){
        error_log('ERROR::usuarioProductoProveedor->getAll() => '.$e);
        return false;
    }
}//fin get all
public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `usuario_producto_proveedor`
            WHERE id_usuario_producto_proveedor = :id
            AND estado_upp = "AC"');
        $query->execute(['id' => $this->idUPP]);

        $upp = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->from($upp);

        return $this;

    }catch(PDOException $e){
        error_log('ERROR::usuarioProductoProveedor->get() => '.$e);
        return false;}
}//fin get

public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `usuario_producto_proveedor` SET
            estado_upp = "DC"
            WHERE id_usuario_producto_proveedor =:id 
            AND estado_upp = "AC"'   );

        $query->execute(['id' => $this->getId() ]);    

            return true;
    }catch(PDOException $e){
        return false;
    }
}//fin delete

public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `usuario_producto_proveedor` SET
            precio_upp = :precio 
            WHERE id_usuario_producto_proveedor =:id 
            AND estado_upp = "AC"'   );
        $query->execute([
            'precio' => $this->precioUPP,
            'id' => $this->getId() ]);    

            return true;
    }catch(PDOException $e){
        return false;
    }
}//fin update
public function from($array){
    $this->idUPP = $array['id_usuario_producto_proveedor'];
    $this->usuario = $array['id_usuario'];
    $this->producto = $array['id_producto'];
    $this->proveedor = $array['id_proveedor'];
    $this->almacen = $array['id_almacen_upp'];
    $this->precioUPP = $array['precio_upp'];
    $this->fechaIngresoUPP = $array['fecha_ingreso_upp'];
    $this->estado = $array['estado_upp'];
    $this->creacion = $array['creacion_upp'];
}//fin from

//SETTERS
public function setId($id){
    $this->idUPP = $id;
}
public function setUsuario($usuario){
    $this->usuario = $usuario;
}
public function setProducto($producto){
    $this->producto = $producto;
}
public function setProveedor($proveedor){
    $this->proveedor = $proveedor;
}
public function setAlmacen($almacen){
    $this->almacen = $almacen;
}
public function setPrecio($precio){
    $this->precioUPP = $precio;
}
public function setIngreso($ingreso){
    $this->fechaIngresoUPP = $ingreso;
}
public function setEstado($estado){
    $this->estado = $estado;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}


//GETTERS

public function getId(){
    return $this->idUPP;
}
public function getUsuario(){
    return $this->usuario ;
}
public function getProducto(){
    return $this->producto ;
}
public function getProveedor(){
    return $this->proveedor ;
}
public function getAlmacen(){
    return $this->almacen;
}
public function getPrecio(){
    return $this->precioUPP ;
}
public function getIngreso(){
    return $this->fechaIngresoUPP ;
}
public function getEstado(){
    return $this->estado ;
}
public function getCreacion(){
    return $this->creacion ;
}



}

?>