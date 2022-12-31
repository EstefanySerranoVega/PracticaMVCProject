<?php
require_once('Models/PersonaModel.php');
require_once('Models/UserModel.php');
require_once('Models/ContraseniaModel.php');
require_once('Models/RolesModel.php');

Class sectionUsersModel extends Model{

    function __construct(){
    parent::__construct();
    }
    public function getAllUsers(){
    

        $items = [];
        $query = $this->prepare(
            'SELECT user.id_usuario as id,
            per.nombre_persona,
             per.paterno_persona,
             per.materno_persona, 
             per.telefono_persona,
             per.nac_persona as nacimiento,
              user.nombre_usuario,
              user.profile_usuario as img,
               rol.nombre_roles, 
               user.estado_usuario
           FROM contrasenia cont
           INNER JOIN usuario user
           ON user.ID_USUARIO= cont.ID_USUARIO
           INNER JOIN persona per
           ON per.ID_PERSONA = user.ID_PERSONA
           INNER JOIN roles rol
           ON rol.id_roles = user.id_roles
WHERE rol.nombre_roles !="cliente"'
        );
        $query->execute();
        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);
        }
    
        

    return $items;
    }
    public function getUserById($id){    
        error_log('id: '.$id);
        $items = [];
        $query = $this->query(
            'SELECT user.id_usuario as id_user,
            per.id_persona as id_p,
            per.id_persona as id_persona,
             per.nombre_persona as name,
              per.paterno_persona as paterno,
              per.materno_persona as materno,
               per.telefono_persona as telefono, 
              per.nac_persona as nacimiento,
               user.nombre_usuario as username,
              user.profile_usuario as img,
                rol.nombre_roles as rol, 
                user.estado_usuario
            FROM contrasenia cont
            INNER JOIN usuario user
            ON user.ID_USUARIO= cont.ID_USUARIO
            INNER JOIN persona per
            ON per.ID_PERSONA = user.ID_PERSONA
            INNER JOIN roles rol
            ON rol.NOMBRE_ROLES != "cliente"
            WHERE user.id_usuario = '.$id.'
            AND user.estado_usuario = "AC"');
        $query->execute();
        while($item = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($items,$item);

        }

    return $items;
    }
    

}
?>