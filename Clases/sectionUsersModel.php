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
    $persona = new PersonaModel();
    $usuario = new UserModel();
    $password = new ContraseniaModel();
    $rol = new RolesModel();
    $per = $persona->getAll();
    $u = $usuario->getAll();
    $p = $password->getAll();
    $r = $rol->getAll();
    $items = [];
    
    for($i=0; $i<Count($p);$i++){
        for($j=0;$j<Count($u);$j++){
            //contrasenia and user
        if($p[$i]['ID_USUARIO'] == $u[$j]['ID_USUARIO']){
            error_log('is es true');
            error_log('per es: '.Count($per));
            error_log('user es: '.Count($u));
            for($s=0;$s<Count($per);$s++){
                //persona and user
                if($per[$s]['ID_PERSONA'] == $u[$j]['ID_PERSONA']){
                    for($x=0;$x<Count($r);$x++){
                        error_log('for roles');
                        //
                        if($u[$j]['ID_ROLES'] == $r[$x]['ID_ROLES']){
                            if($r[$x]['NOMBRE_ROLES'] != 'cliente'){
                                
                                $item = array(
                                    'id_user' => $u[$j]['ID_USUARIO'],
                                    'name' => $per[$s]['NOMBRE_PERSONA'],
                                    'paterno' => $per[$s]['PATERNO_PERSONA'],
                                    'rol' => $r[$x]['NOMBRE_ROLES'],
                                    'telefono' => $per[$s]['TELEFONO_PERSONA'],
                                    'username' => $u[$j]['NOMBRE_USUARIO'],
                                    'estado' => $u[$j]['ESTADO_USUARIO']
                                );
                                array_push($items,$item);
                            }
                     
                        }
                    }
                }
            }
        }
        }
    }

    return $items;
    }
    

}
?>