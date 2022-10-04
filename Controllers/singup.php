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
    if($this->existPOST(['username','password'])){ 
        $username  = $this->getPOST('username');
        $password = $this->getPOST('password');

        if($username = '' || empty($username || $password = '' || empty($password)) ){
            $this->redirect('singup',[ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY]);
        }
    }else{
        $this->redirect('singup',['errores' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
    }
}

}


?>