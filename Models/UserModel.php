<?php

class UserModel extends Model implements IModel{
    private $idUser;
    private $persona;
    private $roles;
    private $nameUser;
    private $profile;
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
                    :profile,
                    :estado,
                    :creacion)' );
            $arrayData = array(
                    'persona' => $this->persona,
                    'roles' => $this->roles,
                    'nameUser' => $this->nameUser,
                    'profile' => $this->profile,
                    'estado' => $this->estado,
                    'creacion' => $this->creacion );
            $query->execute($arrayData);
           
           $id = $this->query("SELECT MAX(id_usuario) AS id FROM usuario");
           if ($row = $id->fetchAll()) {
           $this->idUser = $row[0][0];
           }
           error_log('id: '.$this->idUser);
           if($query->rowCount()) {
            return true;
            }else{
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
                'SELECT * FROM `usuario` WHERE estado_usuario = "AC"');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

                $item = new UserModel();

                $item->from($p);

                array_push($items,$p);

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

             return $user;

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
                
            $query->execute(['id' => $id ]);

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
                nombre_usuario = :nameUser,
                profile_usuario =:img
                WHERE estado_usuario = "AC"
                AND id_usuario = :id ' );
            $query->execute([
                'nameUser' =>$this->nameUser,
                'img' => $this->profile,
                'id' => $this->idUser]);

            return true;
        }catch(PDOException $e){
            echo 'Hubo un error '.$e;
            return false;
        }
    }//fin update

    public function from($array){
        $this->idUser = $array[0]['ID_USUARIO'];
        $this->persona = $array[0]['ID_PERSONA'];
        $this->roles = $array[0]['ID_ROLES'];
        $this->nameUser = $array[0]['NOMBRE_USUARIO'];
        $this->profile = $array[0]['PROFILE_USUARIO'];
        $this->estado = $array[0]['ESTADO_USUARIO'];
        $this->creacion = $array[0]['CREACION_USUARIO'];
    }
  

//setters
public function setId($id){
    $this->idUser = $id;
}
public function setNombre($nombre){
    $this->nameUser = $nombre;
}
public function setProfile($profile){
    $this->profile = $profile;
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
public function getProfile(){
    return $this->profile;
}
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