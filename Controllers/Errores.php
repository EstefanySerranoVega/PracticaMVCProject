<?php
require_once('libreries/core/Controllers.php');
Class Errores Extends Controllers{
 
    function __construct(){
    parent::__construct();
    $this->view->render('Errores/errores');
    //$this->render();
    }

   
}
?>