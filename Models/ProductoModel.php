<?php 

Class ProductoModel Extends Model implements IModel {
    private $idProducto;
    private $categoria;
    private $nombreProducto;
    private $codigoProducto;
    private $cantidadProducto;
    private $imgProducto;
    private $precioProducto;
    private $estado;


    function __construct(){
        parent::__construct();
    }//fin function construct
 

    public function save(){

        $this->estado = 'AC';
        try{
            $query = $this->prepare(
                'INSERT INTO `producto` VALUES(
                    NULL,
                    :categoria,
                    :nombre,
                    :codigo,
                    :cantidad,
                    :img,
                    :precio,
                    :estado)');
             $arrayData= array(
                'categoria' => $this->categoria,
                'nombre' => $this->nombreProducto,
                'codigo' => $this->codigoProducto,
                'cantidad' => $this->cantidadProducto,
                'img' => $this->imgProducto,
                'precio' => $this->precioVProducto,
                'estado' =>$this->estado);

            $query->execute($arrayData);
            
            $this->idProducto = $this->db->lastInsertId();

            return true;
        }catch(Exception $e){
            return false;
        }

    }//fin save product

    
public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `producto` WHERE estado_producto = "AC"' );
        while($p = $query->fetchAll(PDO::FETCH_ASSOC)){
            $item = new ProductoModel();

            $item->setId($p['id_producto']);
            $item->setCategoria($p['id_categoria']);
            $item->setNombre($p['nombre_producto']);
            $item->setCodigo($p['codigo_producto']);
            $item->setCantidad($p['cantidadProducto']);
            $item->setImg($p['img_producto']);
            $item->setPrecio($p['precio_venta_producto']);
            $item->setEstado($p['estado_producto']);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        return false;
    }

}//fin get all products



public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `producto` WHERE id_productp = :id 
            AND estado_producto = "AC" ' );
            $query->execute(['id'=> $id]);
        
            $producto = $query->fetAll(PDO::FETCH_ASSOC);

            $this->setId($producto['id_producto']);
            $this->setCategoria($producto['id_categoria']);
            $this->setNombre($producto['nombre_producto']);
            $this->setCodigo($producto['codigo_producto']);
            $this->setCantidad($producto['cantidad_producto']);
            $this->setImg($producto['img_producto']);
            $this->setPrecio($producto['precio_venta_producto']);
            $this->setEstado($producto['estado_producto']);

            return $this;
    }catch(PDOException $e){
        return false;
    }
}//fin get

public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `producto` SET
             estado_producto = "DC"
             WHERE estado_producto = "AC"
             AND id_producto = :id');
        
        $arrayData= array(['id' => $this->getId() ]);
            
        $query->execute($arrayData);

        return true;
    }catch(PDOException $e){
        return false;}
}//fin deleteProducto


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `producto` SET
             categoria_producto = :categoria,
             nombre_producto = :nombre,
             codigo_producto = :codigo,
             cantidad_producto = :cantidad,
             img_producto = :img,
             precio_venta_producto = :precio
             WHERE estado_producto = "AC"
             AND id_producto = :id');
        
        $arrayData= array([
            'categoria' => $this->categoriaProducto,
            'nombre' => $this->nombreProducto,
            'codigo' => $this->codigoProducto,
            'cantidad' => $this->cantidadProducto,
            'img' => $this->imgProducto,
            'precio' => $this->precioProducto,
            'id' => $this->getId() ]);
            
        $query->execute($arrayData);

        return true;
    }catch(PDOException $e){
        return false;}
}//fin updateProducto

public function from($array){
    $this->idProducto = $array['id_producto'];
    $this->categoria = $array['id_categoria'];
    $this->nombreProducto = $array['nombre_producto'];
    $this->codigoProducto = $array['codigo_producto'];
    $this->cantidadProducto = $array['cantidad_producto'];
    $this->imgProducto = $array['img_producto'];
    $this->precioProducto = $array['precio_venta_producto'];
    $this->estado = $array['estado_producto'];
}//fin from

//getters 
public function getId(){
    return $this->idProducto;
}
public function getCategoria(){
    return $this->categoria;
}
public function getNombre(){
    return $this->nombreProducto;
}
public function getCodigo(){
    return $this->codigoProducto;
}
public function getCantidad(){
    return $this->cantidadProducto;
}
public function getImg(){
    return $this->imgProducto;
}
public function getPrecio(){
    return $this->precioProducto;
}
public function getEstado(){
    return $this->estado;
}

//setters
public function setId($id){
    $this->idProducto = $id;
}
public function setCategoria($categoria){
    $this->categoria = $categoria;
}
public function setNombre($nombre){
    $this->nombreProducto = $nombre;
}
public function setCodigo($codigo){
    $this->codigoProducto = $codigo;
}
public function setCantidad($cantidad){
    $this->cantidadProducto = $cantidad;
}
public function setImg($img){
    $this->imgProducto = $img;
}
public function setPrecio($precio){
    $this->precioproducto = $precio;
}
public function setEstado($estado){ 
    $this->estado = $estado;
}


public function exist($name)
    {
        $this->estadoProducto = 'AC';
        try {
            $sql = $this->db->prepare(
                'SELECT *
                FROM `producto`
            WHERE nombre_producto = :name
            AND estado_producto = :estado '
            );
            $select = $sql->execute([
                'name' => $name,
            'estado'=>$this->estadoProducto]);
          if($sql->rowCount()){
            return true;
          }else{
            return false;
          }
        } catch (exception $x) {
            return 'Hubo un error al verificar el producto' . $x;
        }
    }//fin product exist


   
 
}
