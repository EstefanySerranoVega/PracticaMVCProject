<?php
require_once('clases/sessionController.php');

Class Login Extends SessionController{

    private $user;
    public function __construct(){
        parent::__construct();
    }
    public function render(){
        echo 'User controller funciona';
        $this->view->render('login/index', []);
    }
}

?>