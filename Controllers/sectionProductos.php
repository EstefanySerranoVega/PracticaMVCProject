<?php

Class sectionProductos Extends SessionController{

function __construct(){

    parent::__construct();
}

public function render(){
    $this->view->render('admin/section/productos');
}
public function addProducto(){
    $this->view->render('admin/section/Forms/addProducto');
}



}
?>