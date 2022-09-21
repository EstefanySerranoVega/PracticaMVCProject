<?php 

Class ProductoModel {
    private $nameProducto;
    private $codigoProducto;
    private $cantidadProducto;
    private $precioVProducto;
    private $categoria;
    private $idProducto;
    private $conexion;
    private $db;


    function __construct(){
        
    }//fin function construct
 
    public function productoExist($a)
    {
        $this->idProducto =$a;
        $this->estadoProducto = 'AC';
        try {
            $sql = $this->db->prepare(
                'SELECT *
                FROM `producto`
            WHERE id_producto = :producto
            AND estado_producto = :estado '
            );
            $select = $sql->execute([
                'producto' => $this->idProducto,
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


    public function insertProducto($a, $b, $c, int $d, int $e)
    {
        $this->categoria->setIdCategoria($a);
       $idCategoria= $this->categoria->getIdCategoria();
        $this->nameProducto = $b;
       $this->codigoProducto = $c;
        $this->cantidadProducto = $d;
        $this->precioVProducto = $e;
        $estadoP='AC';
        echo'ejecutando funcion para insertar producto';
        try{
            $sql =('INSERT INTO 
            `producto` VALUES(
                    NULL,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?)');
             $insert = $this->db->prepare($sql);
             $arrayData= array(
                $idCategoria,
                $this->nameProducto,
                $this->codigoProducto,
                $this->cantidadProducto,
                $this->precioVProducto,
                $estadoP);
            $resInsert= $insert->execute($arrayData);
            
        $this->idProducto = $this->db->lastInsertId();
            return $resInsert;
        }catch(Exception $e){
            return 'No se puedo insertar el producto'.$e;
        }
       
    }//fin function insert productoExist


    public function setIdProducto($a){
        $this->idProducto = $a;
        $sql = $this->db->prepare(
            'SELECT id_producto FROM `producto`
            WHERE id_producto = :producto '
        );
        $select = $sql->execute(['producto'=> $this->idProducto]);
    }
    public function getIdProducto()
    {
        return $this->idProducto;
    }//fin get id producto
    public function getNameProducto()
    {
        return $this->nameProducto;
    }
    public function setNameProducto($nameProducto)
    {
    }
    public function deleteProducto($a)  {
        $this->idProducto = $a;
        $this->estadoProducto = 'DC';
try{
    $sql = $this->db->prepare(
        'UPDATE `producto` SET 
        estado_producto = :estado
        WHERE id_producto = :producto'
    );
$delete = $sql->execute([
    'estado'=>$this->estadoProducto,
    'producto'=>$this->idProducto
]);
return $delete;
}catch(Exception $x){
    return 'Ha ocurrido un error'.$x;
}

    }//fin delete producto

        
    public function updateProducto($idProducto)
    {
        //actualizar dato de producto
    }
   
 
}
