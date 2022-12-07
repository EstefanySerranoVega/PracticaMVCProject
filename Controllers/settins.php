<?php
Class Settins extends SessionController{

function __construct(){
    parent::__construct();
}

function render(){

    $this->view->render('admin/section/settins');
}

public function cliente(){
    $this->view->render('login/singup');
}
public function usuario(){
    $this->view->render('admin/singup');
}
public function admin(){
    $this->view->render('admin/singup');
}

}

?>