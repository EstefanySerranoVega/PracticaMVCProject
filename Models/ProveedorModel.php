<?php
Class ProveedorModel Extends Model implements IModel{
    private $idProveedor;
    private $empresaProveedor;
    private $correoProveedor;
    private $estado;
    private $creacion;
    

    function __construct(){
        parent::__construct();
    }//fin construct


    public function save(){
        try{
            $query = $this->prepare(
                'INSERT INTO `proveedor` VALUES(
                    NULL,
                    :empresa,
                    :correo,
                    :estado,
                    :creacion )' );
                    
            $arrayData=  array(
                'empresa' => $this->empresaProveedor,
                'correo' => $this->correoProveedor,
                'estado' => $this->estado,
                'creacion' => $this->creacion);
  
            $this->idProveedor= $this->conexion()->lastInsertId();

            $query->execute($arrayData);

           return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin save


    public function getAll(){
        $items = [];
        $this->estado = 'AC';
        try{
            $query = $this->query(
                'SELECT * FROM `proveedor` WHERE 
                estado_proveedor = '.$this->estado );
            while($p =$query->fetch(PDO::FETCH_ASSOC)){

                $item = new ProveedorModel();

                $item->setId($p['id_proveedor']);
                $item->setEmpresa($p['empresa_proveedor']);
                $item->setCorreo($p['correo_proveedor']);
                $item->setEstado($p['estado_proveedor']);
                $item->setCreacion('creacion_proveedor');

                array_push($items,$item);

                return $items;
            }
        }catch(PDOException $e){
            return false;
        }
    }//fin get all


    public function get($id){
        try{
            $query = $this->prepare(
                'SELECT * FROM `proveedor` WHERE
                id_proveedor = :id AND estado_proveedor = "AC"');

            $query->execute(['id'=> $this->idProveedor]);

            $proveedor = $query->fetchAll(PDO::FETCH_ASSOC);

            $this->setId($proveedor['id_proveedor']);
            $this->setEmpresa($proveedor['empresa_proveedor']);
            $this->setCorreo($proveedor['correo_proveedor']);
            $this->setEstado($proveedor['estado_proveedor']);
            $this->setCreacion($proveedor['creacion_proveedor']);

            return $this;

        }catch(PDOException $e){
            return false;
        }
    }//fin get


    public function delete($id){}//fin delete


    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `proveedor` SET
                empresa_proveedor = :empresa,
                correo_proveedor = :correo
                WHERE estado_proveedor = "AC"
                AND id_proveedor = :id' );
            $query->execute([
                'empresa' => $this->empresaProveedor,
                'correo' => $this->correoProveedor,
                'id' => $this->getId() ]);
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin updateProducto


    public function from($array){
        $this->idProveedor = $array['id_proveedor'];
        $this->empresaProveedor = $array['empresa_proveedor'];
        $this->correoProveedor =$array['correo_proveedor'];
        $this->estado = $array['estado_proveedor'];
        $this->creacion = $array['creacion_proveedor'];
    }//fin from

//setters
    public function setId($id){
        $this->idProveedor = $id;
    }
    public function setEmpresa($empresa){
        $this->empresaProveedor = $empresa;
    }
    public function setCorreo($correo){
        $this->correoProveedor = $correo;
    }
    public function setEstado($estado){
        $this->estado =$estado;
    }
    public function setCreacion($creacion){
        $this->creacion = $creacion;
    }
//getters
public function getId(){
    return $this->idProveedor;
}
public function getEmpresa(){
    return $this->empresaProveedor;
}
public function getCorreo(){
    return $this->correoProveedor;
}
public function getEstado(){
    return $this->estado;
}
public function getCreacion(){
    return $this->creacion;
}

    public function proveedorExist($a){

        $this->idProveedor = $a;
        $this->estadoProveedor = 'AC';
        try{
            $sql = $this->db->prepare(
                ' SELECT * FROM `proveedor`
                WHERE id_proveedor= :proveedor,
                    estado_proveedor = :estado' );
            $select = $sql->execute([
                'proveedor'=>$this->idProveedor,
                'estado'=>$this->estadoProveedor]);
            if($sql->rowCount()){
                return true;
}else{
    return false;
}
        }catch(Exception $x){
            return 'Ha ocurrido un error '.$x;
        }

    }//fin proveedor exist

    
}
?>