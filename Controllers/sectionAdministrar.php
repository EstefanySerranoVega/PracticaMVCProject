<?php
require_once('Models/SliderModel.php');
Class sectionAdministrar extends sessionController{

    public function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->render('admin/section/administrar');
    }
    public function updateImg(){
        if($this->existPOST(['id'])){
            $producto = $this->getPOST('id');
        $slider = new SliderModel();
        $slider->setProducto($producto);
        $slider->setId(1);
        $slider->updateProducto();
        $this->view->render('admin/section/administrar');
    
        }
    }
    public function updateTitulo(){
        if($this->existPOST(['titulo'])){
            $titulo = $this->getPOST('titulo');
        $slider = new SliderModel();
        $slider->setTitulo($titulo);
        $slider->setId(1);
        $slider->updateTitulo();
        $this->view->render('admin/section/administrar');
    
        }}
    public function updateTexto(){
        if($this->existPOST(['texto'])){
            $texto = $this->getPOST('texto');
        $slider = new SliderModel();
        $slider->setTexto($texto);
        $slider->setId(1);
        $slider->updateTexto();
        $this->view->render('admin/section/administrar');
    
        }}
}

?>