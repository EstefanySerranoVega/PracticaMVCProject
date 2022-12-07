<?php
Class ProfileModel extends Model {

    function __construct(){
        parent::__construct();
    }
public function getDataCliente($id){
try{
    $items =[];
    $query = $this->query(
        'SELECT p.id_persona as id_p,
        p.nombre_persona as nombre,
        p.paterno_persona as paterno,
        p.materno_persona as materno,
        p.nac_persona as nacimiento,
        p.telefono_persona as telefono,
        c.id_cliente as id_c,
        c.correo_cliente as correo,
        c.direccion_cliente as direccion,
        u.id_usuario as id_u,
        u.nombre_usuario as username,
        u.profile_usuario as profile
        FROM persona p 
        INNER JOIN cliente c 
        ON p.id_persona = c.ID_PERSONA
        INNER JOIN  usuario u
        ON u.id_persona = p.id_persona
        WHERE u.id_usuario ='.$id );
        $query->execute();

        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
        return $items;

}catch(PDOException $e){
    error_log('ProfileModel::getDataCliente()::ERROR=> '.$e);
}
}
public function getDataUser($id){
    try{
        $items =[];
        $query = $this->query(
            'SELECT p.id_persona as id_p,
            p.nombre_persona as nombre,
            p.paterno_persona as paterno,
            p.materno_persona as materno,
            p.nac_persona as nacimiento,
            p.telefono_persona as telefono,
            u.id_usuario as id_u,
            u.nombre_usuario as username,
            u.profile_usuario as profile
            FROM persona p 
            INNER JOIN  usuario u
            ON u.id_persona = p.id_persona
            WHERE u.id_usuario ='.$id );
            $query->execute();
    
            while($item = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($items,$item);
            }
            return $items;
    
    }catch(PDOException $e){
        error_log('ProfileModel::getDataCliente()::ERROR=> '.$e);
    }
    }
}

?>