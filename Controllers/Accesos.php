<?php

class Accesos Extends Controllers{

function __construct(){
    parent::__construct();
}
public function render(){
    
    echo ' RENDER Accesos funciona ';
    $this->view->render('Home/home');
}
}
?>