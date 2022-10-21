<?php
require_once('Clases/sessionController.php');
require_once('Clases/MessagesManager.php');
require_once('Clases/SuccessMessages.php');
require_once('Clases/ErrorMessages.php');
require_once('Models/PersonaModel.php');
require_once('Models/UserModel.php');
require_once('Models/ContraseniaModel.php');
require_once('libreries/core/View.php');

Class singup Extends sessionController{
    
function __construct(){
    parent::__construct(); 
    
}
public function render(){
    //$this->view->ErrorMessages ='';
    $this->view->render('login/singup',[]);
}

function newUser(){
    error_log('EJECUTANDO: singup::newUser()');
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
            $username  = $this->getPOST('username');
            $password = $this->getPOST('password');
            error_log('singup::newUser()=>existPOST()-> true ');
           

        if( $nombrePersona = '' || empty($nombrePersona)
        || $paternoPersona = '' || empty($paternoPersona)
        || $maternoPersona = '' || empty($maternoPersona)
        || $telefonoPersona = '' || empty($telefonoPersona)
        || $nacPersona = '' || empty($nacPersona)
        || $username = '' || empty($username) 
        || $password = '' || empty($password)){
            error_log('Singup::newUser()->empty ');
           $this->redirect('singup');
            // $this->redirect('singup',['error' => ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY]);
        }else{
            //$nombrePersona = $this->getPOST('nombrePersona');
            $nombrePersona = $this->getPOST('nombrePersona');
            $paternoPersona = $this->getPOST('paternoPersona');
            $maternoPersona = $this->getPOST('maternoPersona');
            $telefonoPersona = $this->getPOST('telefonoPersona');
            $nacPersona = $this->getPOST('nacPersona');
            $username  = $this->getPOST('username');
            $password = $this->getPOST('password');
            
            error_log('personaModel create ');
            $persona = new PersonaModel();
            $persona->setNombre($nombrePersona);
            $persona->setPaterno($paternoPersona);
            $persona->setMaterno($maternoPersona);
            $persona->setTelefono($telefonoPersona);
            $persona->setNacimiento($nacPersona);
            $persona->setEstado('AC');
            $persona->setCreacion(Date('Y-m-d H:i:s'));
            

            error_log('UserModel() create ');
            $usuario = new UserModel();
            if($usuario->exist($username)){
                //echo('el nombre de usuario no está disponible');
                error_log('Singup::newUser()->exist() => true');
                $this->redirect('singup');
               //$this->redirect('singup',['error' => ErrorMessages::ERROR_GENERICO]);
            }else if( $persona->save() ){
            
                $usuario->setPersona($persona->getId());
                //$usuario->setPersona(23);
                $usuario->setRoles(1);
                $usuario->setNombre($username);
                $usuario->setEstado('AC');
                $usuario->setCreacion(Date('Y-m-d H:i:s'));
    
    if($usuario->save()){
        
        error_log('ContraseniaModel() create ');
        $contrasenia = new ContraseniaModel();
        $contrasenia->setUser($usuario->getId());
        $contrasenia->setNombre($password);
        $contrasenia->setEstado('AC');
        $contrasenia->setModificacion(Date('Y-m-d H:i:s'));
        $contrasenia->setCreacion(Date('Y-m-d H:i:s'));
if($contrasenia->save()){
    error_log('save contrasenia is true');
}
       

    } 
                //echo('usuario creado exitosamente');
                error_log('Singup::newUser()->exist()=>false->save() true');
                $this->redirect('login');
               //$this->redirect('login',['success' => SuccessMessages::SUCCESS_SINGUP]);
            }else{
                //echo 'ha ocurrido un error';
                error_log('Singup::newUser()->save() false');
                $this->redirect('singup');
                //$this->redirect('singup',['error' => ErrorMessages::ERROR_GENERICO]);
            }
        
        }
        
        
   

    }else{
        //echo 'error al crear usuario';
        error_log('Singup::newUser->false existPOST() ha ocurrido un error');
        //$this->redirect('singup',['error' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
    }
}

}


?>  