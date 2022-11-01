<?php
require_once('libreries/Controllers.php');
require_once('Models/CategoriaModel.php');
Class Home Extends controllers{
    private $session;
    public function __construct(){

       parent::__construct();
      //  $view = new View();
       // $view->render();
    }

    public function render(){
        if (!isset($_SESSION['name'])) {
            //session_start();
        }else{
            
        error_log('session name existe Home '.$_SESSION['name']);
        }
        $this->view->render('Home/index',[]);

  
    }
    //public function reder(){}

 
}

?>