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
    if($this->existPOST(
        ['nombrePersona','paternoPersona',
        'maternoPersona','telefonoPersona',
        'nacPersona','username',
        'password'])){ 

            $nombrePersona = $this->getPOST('nombrePersona');
            error_log('existPOST()->getPOST($nombrePersona)-> '.$nombrePersona);
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
            error_log('Singup::newUser()->empty redirect singup');
           $this->redirect('singup');
            // $this->redirect('singup',['error' => ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY]);
        }else{
            //$nombrePersona = $this->getPOST('nombrePersona');
            error_log('Singup::newUser()->value exist ');
            $nombrePersona = $this->getPOST('nombrePersona');
            error_log('existPOST()->getPOST($nombrePersona)-> '.$nombrePersona);
            $paternoPersona = $this->getPOST('paternoPersona');
            $maternoPersona = $this->getPOST('maternoPersona');
            $telefonoPersona = $this->getPOST('telefonoPersona');
            $nacPersona = $this->getPOST('nacPersona');
            $username  = $this->getPOST('username');
            $password = $this->getPOST('password');
           
            $persona = new PersonaModel();
            $persona->setNombre($nombrePersona);
            $persona->setPaterno($paternoPersona);
            $persona->setMaterno($maternoPersona);
            $persona->setTelefono($telefonoPersona);
            $persona->setNacimiento($nacPersona);
            $persona->setEstado('AC');
            $persona->setCreacion(Date('Y-m-d H:i:s'));
            error_log('persona->getNombre()-> '.$persona->getNombre());
            error_log('persona->getId()-> '.$persona->getId());
            $usuario = new UserModel();
            $usuario->setPersona($persona->getId());
            $usuario->setRoles(2);
            $usuario->setNombre($username);
            $usuario->setEstado('AC');
            $usuario->setCreacion(Date('Y-m-d H:i:s'));
        
            $contrasenia = new ContraseniaModel();
            $contrasenia->setUser($usuario->getId());
            $contrasenia->setNombre($password);
            $contrasenia->setEstado('AC');
            $contrasenia->setModificacion(Date('Y-m-d H:i:s'));
            $contrasenia->setCreacion(Date('Y-m-d H:i:s'));
        
            if($usuario->exist($username)){
                //echo('el nombre de usuario no está disponible');
                error_log('Singup::newUser()->exist() => true');
                $this->redirect('singup');
               //$this->redirect('singup',['error' => ErrorMessages::ERROR_GENERICO]);
            }else if( $persona->save() and $usuario->save() and $contrasenia->save()){
            
                //echo('usuario creado exitosamente');
                error_log('Singup::newUser()->exist()=>false->save()');
                $this->redirect('login');
               //$this->redirect('login',['success' => SuccessMessages::SUCCESS_SINGUP]);
            }else{
                //echo 'ha ocurrido un error';
                error_log('Singup::newUser()->exist()');
                $this->redirect('singup');
                //$this->redirect('singup',['error' => ErrorMessages::ERROR_GENERICO]);
            }
        
        }
        
        
   

    }else{
        //echo 'error al crear usuario';
        error_log('Singup::newUser->false existPOST()');
        $this->redirect('singup',['error' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
    }
}

}


?>  