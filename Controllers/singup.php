<?php
require_once('Clases/sessionController.php');

Class singup Extends sessionController{

function __construct(){
    parent::__construct();    
}
public function render(){
    $this->view->render('login/singup',[]);
}

function newUser(){
    if($this->existPOST(
        ['nombrePersona','paternoPersona',
        'maternoPersona','telefonoPersona',
        'nacPersona','username',
        'password'])){ 
            $nombrePersona = $this->getPOST('nombrePersona');
            $paternoPersona = $this->getPOST('paternoPersona');
            $maternoPersona = $this->getPOST('maternoPersona');
            $telefonoPersona = $this->getPOST('telefonoPersona');
            $nacPersona = $this->getPOST('nacPersona');
            $idRoles = $this->getPOST('idRoles');
            $username  = $this->getPOST('username');
            $password = $this->getPOST('password');

        if( $nombrePersona = '' || empty($nombrePersona)
        || $paternoPersona = '' || empty($paternoPersona)
        || $maternoPersona = '' || empty($maternoPersona)
        || $telefonoPersona = '' || empty($telefonoPersona)
        || $nacPersona = '' || empty($nacPersona)
        || $idRoles = '' || empty($idRoles)  
        || $username = '' || empty($username) 
        || $password = '' || empty($password)){
            $this->redirect('singup',[ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY]);
        }
        
    $persona = new PersonaModel();
    $persona->setNombre($nombrePersona);
    $persona->setPaterno($paternoPersona);
    $persona->setMaterno($maternoPersona);
    $persona->setTelefono($telefonoPersona);
    $persona->setNacimiento($nacPersona);
    $persona->setEstado('AC');
    $persona->setCreacion(Date('Y-m-d H:i:s'));

    $usuario = new UserModel();
    $usuario->setPersona($this->idPersona);
    $usuario->setRoles($this->idRole);
    $usuario->setNombre($username);
    $usuario->setEstado('AC');
    $usuario->setCreacion(Date('Y-m-d H:i:s'));

    $contrasenia = new ContraseniaModel();
    $contrasenia->setUser($this->idUsuario);
    $contrasenia->setNombre($password);
    $contrasenia->setEstado('AC');
    $contrasenia->setModificacion(Date('Y-m-d H:i:s'));
    $contrasenia->setCreacion(Date('Y-m-d H:i:s'));

    if($usuario->exist($username)){
        $this->redirect('singup',[]);
    }else if($usuario->save()){
        $this->redirect('',[SuccessMessages::SUCCESS_SINGUP]);
    }else{
        $this->redirect('singup','Error al registrar el usuario, intentelo más tarde');
    }

    }else{
        $this->redirect('singup',['errores' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
    }
}

}


?>  