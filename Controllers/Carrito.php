<?php

Class Carrito extends Controllers{

    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->render('Home/carrito',[]);
    }
public function addProducto(){
    $this->redirect('home');
}


}

?>