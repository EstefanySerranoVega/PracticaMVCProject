<?php 

Class ProductoModel Extends Model implements IModel {
    private $idProducto;
    private $categoria;
    private $nombreProducto;
    private $imgProducto;
    private $marca;
    private $industria;
    private $codigoProducto;
    private $descripcion;
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
                    :img,
                    :marca,
                    :industria,
                    :codigo,
                    :descripcion,
                    :estado)');
             $arrayData= array(
                'categoria' => $this->categoria,
                'nombre' => $this->nombreProducto,
                'img' => $this->imgProducto,
                'marca' => $this->marca,
                'industria' => $this->industria,
                'codigo' => $this->codigoProducto,
                'descripcion' => $this->descripcion,
                'estado' =>$this->estado);

            $query->execute($arrayData);

            $id = $this->query("SELECT MAX(id_producto) AS id FROM producto");
            if ($row = $id->fetchAll()) {
            $this->idProducto = $row[0][0];
            error_log('ultimo id es: '.$this->idProducto);
            }

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
            array_push($items,$p);
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
            $producto = $query->fetch(PDO::FETCH_ASSOC);

            $this->from($producto);

            return $producto;
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
        
        $arrayData= array('id' => $id);
            
        $query->execute($arrayData);

        return true;
    }catch(PDOException $e){
        return false;}
}//fin deleteProducto


public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `producto` SET
             id_categoria = :categoria,
             nombre_producto = :nombre,
             img_producto = :img,
             marca_producto = :marca,
             industria_producto = :industria,
             codigo_producto = :codigo,
             descripcion_producto = :descripcion
             WHERE estado_producto = "AC"
             AND id_producto = :id');
        $arrayData= array(
            'categoria' => $this->categoria,
            'nombre' => $this->nombreProducto,
            'img' => $this->imgProducto,
            'marca' => $this->marca,
            'industria' => $this->industria,
            'codigo' => $this->codigoProducto,
            'descripcion' => $this->descripcion,
            'id' => $this->idProducto );
            
        $query->execute($arrayData);

        return true;
    }catch(PDOException $e){
        error_log('ERROR::ProductoModel::update()-> '.$e);
        return false;}
}//fin updateProducto

public function from($array){
    $this->idProducto = $array['ID_PRODUCTO'];
    $this->categoria = $array['ID_CATEGORIA'];
    $this->nombreProducto = $array['NOMBRE_PRODUCTO'];
    $this->imgProducto = $array['IMG_PRODUCTO'];
    $this->marca = $array['MARCA_PRODUCTO'];
    $this->industria = $array['INDUSTRIA_PRODUCTO'];
    $this->codigoProducto = $array['CODIGO_PRODUCTO'];
    $this->descripcion = $array['DESCRIPCION_PRODUCTO'];
    $this->estado = $array['ESTADO_PRODUCTO'];
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
public function getImg(){
    return $this->imgProducto;
}
public function getMarca(){
    return $this->marca;
}
public function getIndustria(){
    return $this->industria;
}
public function getCodigo(){
    return $this->codigoProducto;
}
public function getDescripcion(){
    return $this->descripcion;
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
public function setImg($img){
    $this->imgProducto = $img;
}
public function setMarca($marca){
    $this->marca = $marca;
}
public function setIndustria($industria){
    $this->industria = $industria;
}
public function setCodigo($codigo){
    $this->codigoProducto = $codigo;
}
public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}
public function setEstado($estado){ 
    $this->estado = $estado;
}


public function exist($codigo)
    {
        try {
            $query = $this->prepare(
                'SELECT * FROM `producto`
            WHERE codigo_producto = :name
            AND estado_producto = "AC" ' );
            $query->execute(['name' => $codigo]);

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
        
            //$producto = $query->fetch(PDO::FETCH_ASSOC);
            //$this->from($producto);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ProductoModel();

                $item->from($p);
                array_push($items,$p);
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
        error_log('ERROR::ProductoModel::getCategoryIdAndLimit()'.$e);
        return false;
    } 
} 
 
}
