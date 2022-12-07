<?php
require_once('Models/PersonaModel.php');
require_once('Models/UserModel.php');
require_once('Models/ClienteModel.php');
Class Profile extends Controllers {

function __construct(){
    parent::__construct();
}

public function render(){
    error_log('rol es: '.$_SESSION['idRol']);
    if($_SESSION['idRol']=1){
        $this->view->render('Home/myProfile');
    }else if($_SESSION['idRol']=2){
        $this->view->render('admin/section/myProfile');
    }else if($_SESSION['idRol']=3){
        $this->view->render('admin/section/myProfile');
    }else{
        $this->view->render('Home');
    }
    
}
public function profile(){     
    $this->view->render('admin/section/myProfile');
   

}public function MyProfile(){
    $this->view->render('Home/myProfile');

}
public function recibo(){
    $this->view->render('Home/recibo');
}
public function UpdateCliente(){
    $this->view->render('Home/UpdateProfile');
}
public function updateUser(){
if($this->existPOST(['username','name',
'paterno','materno','nacimiento',
'correo','telefono','direccion','idUser','profile'])){

    $username = $this->getPOST('username');
    $name = $this->getPOST('name');
    $paterno =  $this->getPOST('paterno');
    $materno =  $this->getPOST('materno');
    $nacimiento = $this->getPOST('nacimiento');
    $correo = $this->getPOST('correo');
    $telefono = $this->getPOST('telefono');
    $direccion = $this->getPOST('direccion');
    $idUser = $this->getPOST('idUser');
    $img = $this->getPOST('profile');

    if($username = '' || empty($username) ||
    $name = ''|| empty($name)||
    $paterno = '' || empty($paterno) ||
    $materno =''  || empty($materno) ||
    $nacimiento = '' || empty($nacimiento) ||
    $correo = '' || empty($correo) ||	
    $telefono = '' || empty($telefono) ||
    $direccion = '' || empty($direccion)){
        error_log('no has introducido todos los campos requeridos');
    }else{
    $username = $this->getPOST('username');
    $name = $this->getPOST('name');
    $paterno =  $this->getPOST('paterno');
    $materno =  $this->getPOST('materno');
    $nacimiento = $this->getPOST('nacimiento');
    $correo = $this->getPOST('correo');
    $telefono = $this->getPOST('telefono');
    $direccion = $this->getPOST('direccion');
    $img = $this->getPOST('profile');



    $user = new UserModel();
    $user->setId($idUser);
    $user->setNombre($username);
    $user->setProfile($img);
if($user->update()) {
    $data = $user->get($idUser);
    $id = $data[0]['ID_PERSONA'];
    $persona = new PersonaModel();
    $persona->setId($id);
    $persona->setNombre($name);
    $persona->setPaterno($paterno);
    $persona->setMaterno($materno);
    $persona->setTelefono($telefono);
    $persona->setNacimiento($nacimiento);
 if($persona->update()){
    $cliente = new ClienteModel();
    $cl = $cliente->getForPersona($id);
    $id_c = $cl[0]['ID_CLIENTE'];
    $cliente->setId($id_c);
    $cliente->setCorreo($correo);
    $cliente->setDireccion($direccion);
    $cliente->update();
}else{
    
    error_log('no se pudo actualizar el persona');
 }

}else{
    error_log('no se pudo actualizar el usuario');
}

    }
    error_log('updateFunciona');
    
    $this->view->render('Home/myProfile');
}

}

public function update(){
    $this->view->render('admin/section/update/updateProfile');
}
public function updateDataUser(){
    if($this->existPOST(['username','name',
    'paterno','materno','nacimiento',
    'telefono','idUser','profile'])){
    
        $username = $this->getPOST('username');
        $name = $this->getPOST('name');
        $paterno =  $this->getPOST('paterno');
        $materno =  $this->getPOST('materno');
        $nacimiento = $this->getPOST('nacimiento');
        $telefono = $this->getPOST('telefono');
        $idUser = $this->getPOST('idUser');
        $img = $this->getPOST('profile');
    
        if($username = '' || empty($username) ||
        $name = ''|| empty($name)||
        $paterno = '' || empty($paterno) ||
        $materno =''  || empty($materno) ||
        $nacimiento = '' || empty($nacimiento) ||
        $telefono = '' || empty($telefono) ){
            error_log('no has introducido todos los campos requeridos');
        }else{
        $username = $this->getPOST('username');
        $name = $this->getPOST('name');
        $paterno =  $this->getPOST('paterno');
        $materno =  $this->getPOST('materno');
        $nacimiento = $this->getPOST('nacimiento');
        $telefono = $this->getPOST('telefono');
        $img = $this->getPOST('profile');

        $user = new UserModel();
        $user->setId($idUser);
        $user->setNombre($username);
        $user->setProfile($img);
    if($user->update()) {
        $data = $user->get($idUser);
        $id = $data[0]['ID_PERSONA'];
        $persona = new PersonaModel();
        $persona->setId($id);
        $persona->setNombre($name);
        $persona->setPaterno($paterno);
        $persona->setMaterno($materno);
        $persona->setTelefono($telefono);
        $persona->setNacimiento($nacimiento);
     $persona->update();
    }else{
        error_log('no se pudo actualizar el usuario');
    }
        }
    $this->view->render('admin/section/myProfile');
    }
    
    }

}


?>