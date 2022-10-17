<?php

class UserModel extends Model implements IModel{
    private $idUser;
    private $persona;
    private $roles;
    private $nameUser;
    private $estado;
    private $creacion;

    function __construct(){
        parent::__construct();

    }//fin construct user


    
    public function save(){
        try{
            $query = $this->prepare(
                'INSERT INTO `usuario`
                VALUES(
                    NULL,
                    :persona,
                    :roles,
                    :nameUser,
                    :estado,
                    :creacion)' );
            $arrayData = array(
                    'persona' => $this->persona,
                    'roles' => $this->roles,
                    'nameUser' => $this->nameUser,
                    'estado' => $this->estado,
                    'creacion' => $this->creacion );
            $query->execute($arrayData);
           $this->idUser = $this->conexion()->lastInsertId();
           error_log('UserModel::save()->persona '.$this->persona );
           error_log('UserModel::save()->roles '.$this->roles);     
           error_log('UserModel::save()->nameUser '.$this->nameUser);     
           error_log('UserModel::save()->estado '.$this->estado);     
           error_log('UserModel::save()->creacion '.$this->creacion);          
           
           if($query->rowCount()) {
            error_log('UserModel::save()->true');  
            return true;
            }else{
              error_log('UserModel::save()=>false');
              return false;}
         
        }catch(PDOException $e){
            error_log('ERROR::UserModel::save()->false '.$e);
            return false;
        }
    }//fin save


    public function getAll(){
        $items = [];
        $this->estado = 'AC';
        try{
            $query = $this->query(
                'SELECT * FROM `usuario` WHERE estado_usuario = '.$this->estado);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

                $item = new UserModel();

                $item->from($p);

                array_push($items,$item);

            }
            return $items;
        }catch(PDOException $e){
           error_log('ERROR::USER_MODEL->getAll() => '.$e);
           return false;
        }
    }//fin getAll
    
    public function get($id){
        try{
             $query = $this->prepare(
                'SELECT * FROM `usuario` 
                WHERE id_usuario = :id AND estado_usuario = "AC"');
             $query->execute([ 'id'=>$id]);

             $user = $query->fetchAll(PDO::FETCH_ASSOC);
                
             $this->from($user);

             return $this;

            }catch(PDOException $e){
                error_log('ERROR::UserModel->get() => '.$e);
            return false;
            }
    }//fin get


    public function delete($id){
        try{
            $query = $this->prepare(
                'UPDATE `usuario` SET 
                estado_usuario = "DC"
                WHERE estado_usuario = "AC"
                AND id_usuario = :id ' );
                
            $query->execute(['id' => $this->getId()  ]);

            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin delete

    public function update(){
        try{
            $query = $this->prepare(
                'UPDATE `usuario` SET 
                nombre_usuario = :nameUser
                WHERE estado_usuario = "AC"
                AND id_usuario = :id ' );
            $query->execute([
                'nameUser' =>$this->nameUser,
                'id' => $this->getId()  ]);

            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin update

    public function from($array){
        $this->idUser = $array['id_usuario'];
        $this->persona = $array['id_persona'];
        $this->roles = $array['id_roles'];
        $this->nameUser = $array['nombre_usuario'];
        $this->estado = $array['estado_usuario'];
        $this->creacion = $array['creacion_usuario'];
    }
  

//setters
public function setId($id){
    $this->idUser = $id;
}
public function setNombre($nombre){
    $this->nameUser = $nombre;
}
public function setEstado($estado){
    $this->estado = $estado;
}
public function setCreacion($creacion){
    $this->creacion = $creacion;
}
public function setPersona($persona){
    $this->persona = $persona;
}
public function setRoles($roles){
    $this->roles = $roles;
}

//getters 

public function getId(){
    return $this->idUser;}
public function getNombre(){
    return $this->nameUser;}
public function getEstado(){
    return $this->estado;}
public function getCreacion(){
    return $this->estado;}
public function getPersona(){
    return $this->persona;}
public function getRoles(){
    return $this->roles;}

public function exist($name){
    try{
        $query = $this->prepare(
            'SELECT * FROM `usuario` 
            WHERE nombre_usuario = :name
            AND estado_usuario = "AC"');
        $query->execute(['name' => $name]);
        if($query->rowCount() > 0){
            error_log('UserModel::exist->rowCount()=> true');
            return true;
        }else{
            error_log('UserModel::exist->rowCount()=> false');
            return false;
        }
    }catch(PDOException $e){
       error_log('ERROR::UserModel->exist() => '.$e);
        return false;
    }
}

}

?>