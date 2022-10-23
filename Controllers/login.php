<?php
require_once('clases/sessionController.php');

Class Login Extends SessionController{

    public function __construct(){
        parent::__construct();
    }
    public function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if($this->existPOST(['username','password'])){
            $username = $this->getPOST('username');
            $password = $this->getPOST('password');

            if($username == '' || empty($username) 
            || $password == '' || empty($password)){
                error_log('Login::authenticate() => empty');
               $this->redirect('login');
            }
                error_log('username: '.$username);
                error_log('password: '.$password);

            $user = $this->model->login($username,$password);

            if($user != NULL){
                error_log('Login::authenticate() passed');
                $this->initialize($user);
                $this->redirect('home');
            }else{
                error_log('Login::authenticate() error params authenticate');
                //$this->redirect('',['error' => ErrorMessages::ERROR_GENERICO]);
                $this->redirect('login');
            }

        }else{
            error_log('Login::authenticate() error whith params');
            $this->redirect('',['error' => ErrorMessages::ERROR_GENERICO]);
            return ;
        }
}
public function closeSesion(){
    $user = $this->model->logout();
}
 
}
?>