<?php
require_once('libreries/core/Controllers.php');
Class Producto Extends Controllers{
    public function __construct(){

        parent::__construct();
    }

    public function render(){
        echo ' Producto funciona ';
        $this->view->render('Producto/producto');
    }
    //public function reder(){}
}

?>