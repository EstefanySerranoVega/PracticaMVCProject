<?php
require_once('clases/sessionController.php');

Class Login Extends SessionController{

    private $user;
    public function __construct(){
        parent::__construct();
    }
    public function render(){
        echo 'User controller funciona';
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if($this->existPOST('username','password')){
            $username = $this->getPOST('username');
            $password = $this->getPOST('password');

            if($username == '' || empty($username) 
            || $password == '' || empty($password)){
                error_log('Login::authenticate() => empty');
                return ;
            }

            $user = $this->model->login($username,$password);

            if($user != NULL){
                error_log('Login::authenticate() passed');
                $this->initialize($user);
            }else{
                error_log('Login::authenticate() error params authenticate');
                $this->redirect('',['error' => ErrorMessages::ERROR_GENERICO]);
            }

        }else{
            error_log('Login::authenticate() error whith params');
            $this->redirect('',['error' => ErrorMessages::ERROR_GENERICO]);
            return ;
        }
}
 
}
?>