<?php
Class sectionAdministrarModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    public function getDataSlider(){
        try{
            $items =[];
    $query = $this->prepare(
    'SELECT 
    slider.id_slider as id_slider, 
    slider.id_producto as id_p,
    producto.nombre_producto as producto,
    producto.img_producto as img,
    slider.titulo_slider as titulo,
    slider.texto_slider as texto
    FROM `slider`
    INNER JOIN producto 
    ON producto.id_producto = slider.id_producto
    WHERE estado_slider = "AC"');
          $query->execute();

          while($item = $query->fetch(PDO::FETCH_ASSOC)){
              array_push($items,$item);
          }
          return $items;

        }catch(PDOException $e){
            error_log('hubo un error con los datos del slider '.$e);
        }
    }
}

?>