<?php
require_once('Models/ProductoModel.php');
Class sectionProductos Extends SessionController{

function __construct(){

    parent::__construct();
}

public function render(){
    $this->view->render('admin/section/productos');
}
public function addProducto(){
    $this->view->render('admin/section/Forms/addProducto');
}
public function updateItem(){
    $this->view->render('admin/section/Forms/updateProducto');
}

public function deleteItem(){
    if($this->existGET(['id'])){
        $id = $this->getGET('id');
        error_log('eliminar id: '.$id);
        $producto = new ProductoModel();
        $producto->delete($id);
        $this->view->render('admin/section/productos');
    }else{
        $this->view->render('admin/section/productos');
        error_log('el id del producto no ha sido encontrado');
    }
    
    }

    public function addLote(){
        $this->view->render('admin/section/Forms/addLoteProductos');
    }



}
?>