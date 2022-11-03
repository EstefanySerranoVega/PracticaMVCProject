<?php

Class sectionUsers extends SessionController{

    function __construct(){
    parent::__construct();
    }

public function render(){
    $this->view->render('admin/section/usuarios');
}

}
?>