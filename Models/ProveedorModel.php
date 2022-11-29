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
  
            
            $query->execute($arrayData);
            $id = $this->query("SELECT MAX(id_proveedor) AS id FROM proveedor");
            
            if ($row = $id->fetchAll()) {
            $this->idProveedor = $row[0][0];
            }

            if($query->rowCount() > 0) {
                return true;
            }else{
                return false;
            }

        }catch(PDOException $e){
            error_log('ProveedorModel'.$e);
            return false;
        }
    }//fin save


    public function getAll(){
        $items = [];
       //$this->estado = 'AC';
        try{
            $query = $this->query(
                'SELECT * FROM `proveedor` WHERE 
                estado_proveedor = "AC"' );
            while($item =$query->fetch(PDO::FETCH_ASSOC)){

                $proveedor = new ProveedorModel();

                $proveedor->from($item);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ProveedorModel::getAll()=> '.$e);
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

            $this->from($proveedor);

            return $this;

        }catch(PDOException $e){
            error_log('ProveedorModel::get()=> '.$e);
            return false;
        }
    }//fin get


    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `proveedor` SET
                estado_proveedor = "DC"
                WHERE estado_proveedor = "AC"
                AND id_proveedor = :id' );
            $query->execute(['id' => $id]);
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin delete


    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `proveedor` SET
                empresa_proveedor = :empresa,
                correo_proveedor = :correo
                WHERE estado_proveedor = "AC"
                AND id_proveedor = :id' );
                error_log($this->empresaProveedor);
                error_log($this->correoProveedor);
                error_log($this->idProveedor);
            $query->execute([
                'empresa' => $this->empresaProveedor,
                'correo' => $this->correoProveedor,
                'id' => $this->idProveedor ]);
            
            return true;
        }catch(PDOException $e){
            return false;
        }
    }//fin updateProducto


    public function from($array = []){
        $this->idProveedor = $array['ID_PROVEEDOR'];
        $this->empresaProveedor = $array['EMPRESA_PROVEEDOR'];
        $this->correoProveedor =$array['CORREO_PROVEEDOR'];
        $this->estado = $array['ESTADO_PROVEEDOR'];
        $this->creacion = $array['CREACION_PROVEEDOR'];
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

    public function exist($name){

        try{
            $query = $this->prepare(
                ' SELECT * FROM `proveedor`
                WHERE empresa_proveedor= :name,
                    estado_proveedor = "AC"' );
            $query->execute(['name'=>$name]);
            if($query->rowCount() > 0){
                error_log('ProveedorModel::exist()->rowCount()=> true');
                return true;
            }else{
                error_log('ProveedorModel::exist()->rowCount()=> false');
                return false;
            }
        }catch(PDOException $e){
            error_log('ProveedorModel::exist() => '.$e);
        }

    }//fin proveedor exist

    
}
?>