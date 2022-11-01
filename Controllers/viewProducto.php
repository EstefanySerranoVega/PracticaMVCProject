<?php
require_once('libreries/Controllers.php');
require_once('Models/ProductoModel.php');


Class viewProducto Extends Controllers{

    private $user;
    private $model;
    private $producto;
    public function __construct(){

        parent::__construct();
       // $this->user->getUserSesionData();
    }

    public function render(){
        $this->view->render('Home/viewProducto');
        error_log('la vista se cargó exitosamente');

        //return print_r($producto );
    }
    

}

?>