<?php
require_once('Models/PersonaModel.php');
require_once('Models/UserModel.php');
require_once('Models/ContraseniaModel.php');
require_once('Models/RolesModel.php');
require_once('Models/ClienteModel.php');

Class sectionClientesModel extends Model{

    function __construct(){
    parent::__construct();
    }

public function getAllClientes(){


    $items = [];
    $query = $this->prepare(
        'SELECT user.id_usuario, per.nombre_persona, per.paterno_persona,per.materno_persona, per.telefono_persona, user.nombre_usuario, rol.nombre_roles, cl.correo_cliente
        FROM contrasenia cont
        INNER JOIN usuario user
        ON user.ID_USUARIO= cont.ID_USUARIO
        INNER JOIN persona per
        ON per.ID_PERSONA = user.ID_PERSONA
        INNER JOIN cliente cl
        ON cl.id_persona = per.id_persona 
        INNER JOIN roles rol
        ON rol.NOMBRE_ROLES ="cliente"'
    );
    $query->execute();
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        array_push($items,$item);
    }

    return $items;
    }

}
?>