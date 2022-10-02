<?php
require_once('libreries/core/Controllers.php');
Class Producto Extends Controllers{

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