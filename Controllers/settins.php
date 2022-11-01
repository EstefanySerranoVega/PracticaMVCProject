<?php
Class Settins extends SessionController{

function __construct(){
    parent::__construct();
}

function render(){

    $this->view->render('admin/section/settins');
}
}

?>