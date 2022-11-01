<?php
require_once('libreries/Controllers.php');
Class Errores Extends Controllers{
 
    function __construct(){
    parent::__construct();
    
    $this->view->render('Errores/index');
    //$this->render();
    }

   
}
?>