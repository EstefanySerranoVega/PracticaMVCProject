<?php

Class sectionAlmacen extends SessionController{

    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->render('admin/section/Almacen');
    }
    public function addItem(){
        $this->view->render('admin/section/Forms/AddLoteProductos');
    }

}

?>