<?php
require_once('Clases/sessionController.php');

Class Producto Extends sessionController{

    private $user;
    public function __construct(){

        parent::__construct();

       // $this->user->getUserSesionData();
    }


    public function render(){
        $this->view->render('Home/producto');

        //return print_r($producto );
    }
}

?>