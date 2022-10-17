<?php
require_once('libreries/core/Controllers.php');
require_once('Models/CategoriaModel.php');
Class Home Extends Controllers{
    public function __construct(){

        parent::__construct();
      //  $view = new View();
       // $view->render();
    }

    public function render(){
        echo ' RENDER Home funciona ';
        $this->view->render('Home/index',[]);
    }
    //public function reder(){}

}

?>