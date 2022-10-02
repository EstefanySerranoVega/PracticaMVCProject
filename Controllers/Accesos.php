<?php
require_once('Clases/sessionController.php');

class Accesos Extends SessionController{

function __construct(){
    parent::__construct();
}
public function render(){
    
    echo ' RENDER Accesos funciona ';
    $this->view->render('Home/index');
}
}
?>