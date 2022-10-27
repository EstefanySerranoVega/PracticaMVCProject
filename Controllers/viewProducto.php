<?php
require_once('Clases/sessionController.php');


Class viewProducto Extends sessionController{

    private $user;
    public function __construct(){

        parent::__construct();

       // $this->user->getUserSesionData();
    }


    public function render(){
        $this->view->render('Home/viewProducto');

        //return print_r($producto );
    }
    
 public function selectProducto(){
    error_log('producto seleccionado');
    $this->render();
}
}

?>