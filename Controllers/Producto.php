<?php
require_once('Clases/sessionController.php');

Class Producto Extends sessionController{

    private $user;
    public function __construct(){

        parent::__construct();

       // $this->user->getUserSesionData();
    }

    public function render(){
        echo ' Producto funciona ';
        $productoModel = new ProductoModel();
        $producto = $productoModel->get(3);
        $this->view->render('Producto/index',[
            $this->user = $producto
        ]);

        return print_r($producto );
    }
}

?>