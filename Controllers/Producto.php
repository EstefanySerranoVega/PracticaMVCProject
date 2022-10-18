<?php
require_once('Clases/sessionController.php');

Class Producto Extends sessionController{

    private $user;
    public function __construct(){

        parent::__construct();

       // $this->user->getUserSesionData();
    }
/*

    public function render(){
        echo ' Producto funciona ';
        $productoModel = new ProductoModel();
        $producto = $productoModel->getAll();
        $this->view->render('Producto/index');

        return print_r($producto );
    }*/
}

?>