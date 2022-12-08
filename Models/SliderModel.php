<?php

Class SliderModel extends Model implements IModel{
    
private $idSlider;
private $producto;
private $titulo;
private $texto;
private $estado;

    public function __construct(){
        parent::__construct();
    }
    public function save(){   
        try{
        $query = $this->prepare(
            'INSERT INTO `slider` VALUES(
                NULL,
                :producto,
                :titulo,
                :texto,
                :estado )' );
                
        $arrayData=  array(
            'producto' => $this->producto,
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'estado' => $this->estado);

        
        $query->execute($arrayData);
        $id = $this->query("SELECT MAX(id_slider) AS id FROM proveedor");
        
        if ($row = $id->fetchAll()) {
        $this->idProveedor = $row[0][0];
        }

        if($query->rowCount() > 0) {
            return true;
        }else{
            return false;
        }

    }catch(PDOException $e){
        error_log('sliderModel'.$e);
        return false;
    }}
public function getAll(){
    $items = [];
   //$this->estado = 'AC';
    try{
        $query = $this->query(
            'SELECT * FROM `slider` WHERE 
            estado_slider = "AC"' );
        while($item =$query->fetch(PDO::FETCH_ASSOC)){

            $slider = new ProveedorModel();

            $slider->from($item);

            array_push($items,$item);
        }
        return $items;
    }catch(PDOException $e){
        error_log('sliderModel::getAll()=> '.$e);
        return false;
    }
}
public function get($id){
    try{
        $query = $this->prepare(
            'SELECT * FROM `slider` WHERE
            id_slider = :id AND estado_slider = "AC"');

        $query->execute(['id'=> $this->idSlider]);

        $slider = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->from($slider);

        return $slider;

    }catch(PDOException $e){
        error_log('ProveedorModel::get()=> '.$e);
        return false;
    }
}
public function delete($id){
    try{
        $query = $this->prepare(
            'UPDATE `slider` SET
            estado_slider = "DC"
            WHERE estado_slider = "AC"
            AND id_slider = :id' );
        $query->execute(['id' => $id]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}
public function update(){
    try{
        $query = $this->prepare(
            'UPDATE `slider` SET
            id_producto = :producto,
            titulo_slider = :titulo,
            texto_slider = :texto
            WHERE estado_slider= "AC"
            AND id_slider = :id' );
        $query->execute([       
            'producto' => $this->producto,
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'id' => $this->idSlider]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}
public function from($array = []){
    $this->idSlider = $array['ID_SLIDER'];
    $this->producto = $array['ID_PRODUCTO'];
         $this->titulo = $array['TITULO_SLIDER'];
        $this->texto = $array['TEXTO_SLIDER'];
        $this->estado = $array['ESTADO_SLIDER'];
}

//SETTERS
public function setId($id){ $this->idSlider = $id;}
public function setProducto($producto){ $this->producto = $producto;}
public function setTitulo($titulo){ $this->titulo = $titulo;}
public function setTexto($texto){ $this->texto = $texto;} 
public function setEstado($estado){$this->estado =$estado;}

//GETTERS
public function getId(){
    return $this->idSlider;
}
public function getProducto(){
    return $this->producto;
}
public function getTitulo(){
    return $this->titulo;
}
public function getTexto(){
    return $this->texto;
}
public function getEstado(){
    return $this->estado;
}
public function updateProducto(){
    try{
        $query = $this->prepare(
            'UPDATE `slider` SET
            id_producto = :producto
            WHERE estado_slider= "AC"
            AND id_slider = :id' );
        $query->execute([       
            'producto' => $this->producto,
            'id' => $this->idSlider]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}
public function updateTitulo(){
    try{
        $query = $this->prepare(
            'UPDATE `slider` SET
            titulo_slider = :titulo
            WHERE estado_slider= "AC"
            AND id_slider = :id' );
        $query->execute([       
            'titulo' => $this->titulo,
            'id' => $this->idSlider]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}
public function updateTexto(){
    try{
        $query = $this->prepare(
            'UPDATE `slider` SET
            texto_slider = :texto
            WHERE estado_slider= "AC"
            AND id_slider = :id' );
        $query->execute([       
            'texto' => $this->texto,
            'id' => $this->idSlider]);
        
        return true;
    }catch(PDOException $e){
        return false;
    }
}
}
?>