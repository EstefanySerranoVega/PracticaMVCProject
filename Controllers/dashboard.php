<?php

Class Dashboard Extends Controllers{

public function __construct(){
    parent::__construct();
}


public function render(){
    $this->view->render('Dashboard/index',[]);
}

public function newCategoria(){
    
    error_log('EJECUTANDO: Home::newCategoria()');
    if($this->existPOST(['nombreCategoria'])){
        $nameCat = $this->getPOST('nombreCategoria');
        if($nameCat = '' || empty($nameCat)){
            error_log('no hay nombre de categoria');
        }else{
            $nameCat = $this->getPOST('nombreCategoria');

            $categoria = new CategoriaModel();
            $categoria->setNombre($nameCat);
            $categoria->setCreacion(Date('Y-m-d H:i:s'));
            $categoria->setEstado('AC');
            if($categoria->exist($nameCat)){
                error_log('ya existe la categoria');
            }else if($categoria->save()){
                error_log('categoria guardada');
            }else{
                error_log('no se pudo guardar categoria');
            }
            
        }
    }else{
        error_log('no se han recibido parámetros, revise el nombre de los forms');
    }
}

public function newProducto(){

    if($this->existPOST(['nameProducto','category','codigoProducto','cantidadProducto','precioProducto'])){}

}
public function newProveedor(){

}

}

?>