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
                'precio' => $this->precioProducto,
                'estado' =>$this->estado);

                error_log($this->categoria);
                error_log($this->nombreProducto);
                error_log($this->codigoProducto);
                error_log($this->cantidadProducto);
                error_log($this->imgProducto);
                error_log($this->precioProducto);
                error_log($this->estado);

            $query->execute($arrayData);
            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
            
            //$this->idProducto = $this->db->lastInsertId();

        }catch(Exception $e){
            error_log('ERROR::ProductoModel::save()-> '.$e);
            return false;
        }

    }//fin save product

    
public function getAll(){
    $items = [];
    try{
        $query = $this->query(
            'SELECT * FROM `producto` WHERE estado_producto = "AC"' );
        
        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new ProductoModel();

            $item->from($p);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        error_log('ProductoModel::getAll() =>'.$e);
        return false;
    }

}//fin get all products



public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `producto` WHERE id_producto = :id 
            AND estado_producto = "AC" ' );
            $query->execute(['id'=> $id]);
        
            $producto = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->from($producto);

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
    $this->precioProducto = $precio;
}
public function setEstado($estado){ 
    $this->estado = $estado;
}


public function exist($name)
    {
        try {
            $query = $this->prepare(
                'SELECT * FROM `producto`
            WHERE nombre_producto = :name
            AND estado_producto = "AC" ' );
            $query->execute(['name' => $name]);

          if($query->rowCount()){
            error_log('ProductoModel::exist()->rowCount => true');
            return true;
          }else{
            error_log('ProductoModel::exist()->rowCount => false');
            return false;
          }
        } catch (PDOException $e) {
            error_log('ProductoModel::exist() => '.$e);
        }
    }//fin product exist

public function getAllCategoryId($idCat){
    $items = [];
    try{
        $query = $this->prepare(
            'SELECT * FROM `producto` WHERE id_categoria = :id 
            AND estado_producto = "AC" ' );
            $query->execute(['id'=> $idCat]);
        
            $producto = $query->fetAll(PDO::FETCH_ASSOC);

            $this->from($producto);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductoModel();

                $item->from($p);
                array_push($items,$item);
            }

            return $items;
    }catch(PDOException $e){
        return false;
    } 
}
public function getCategoryIdAndLimit($idCat, $n){
    $items = [];
    try{
        $query = $this->prepare(
            'SELECT * FROM `producto` WHERE id_categoria = :id ORDER BY nombre_producto DESC LIMIT :n
            AND estado_producto = "AC" ' );
            $query->execute([
                'id'=> $idCat,
                'n' => $n]);
        
            $producto = $query->fetAll(PDO::FETCH_ASSOC);

            $this->from($producto);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductoModel();

                $item->from($p);
                array_push($items,$item);
            }

            return $items;
    }catch(PDOException $e){
        return false;
    } 
} 
 
}
