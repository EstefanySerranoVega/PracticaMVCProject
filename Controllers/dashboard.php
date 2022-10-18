<?php

Class Dashboard Extends Controllers{

public function __construct(){
    parent::__construct();
}


public function render(){
    $this->view->render('Dashboard/index',[]);
}

public function newCategoria(){
    
    error_log('EJECUTANDO: dashboard::newCategoria()');
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
            $categoria->exist($nameCat);

            if($categoria->exist($nameCat)){
                error_log('ya existe la categoria');
                $this->redirect('dashboard');
            }else if($categoria->save()){
                error_log('categoria guardada');
                $this->redirect('dashboard');
            }else{
                error_log('no se pudo guardar categoria');
                $this->redirect('dashboard');
            }
            
        }
    }else{
        error_log('no se han recibido parámetros, revise el nombre de los forms');
    }
}

public function newProducto(){

    if($this->existPOST(['nameProducto',
        'category','codigoProducto',
        'cantidadProducto','precioVenta','imgProducto'])){


            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $cantProducto = $this->getPOST('cantidadProducto');
            $precioProducto = $this->getPOST('precioVenta');
            $imgProducto = $this->getPOST('imgProducto');

            if($nameProducto = '' || empty($nameProducto)
            || $catProducto = '' || empty($catProducto)
            || $codProducto = '' || empty($codProducto)
            || $cantProducto = '' || empty($cantProducto)
            || $precioProducto = '' || empty($precioProducto)
            ){
            error_log('ingrese todos los valores solicitados, for producto');
        $this->redirect('dashboard');    
        }else{

            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $cantProducto = $this->getPOST('cantidadProducto');
            $precioProducto = $this->getPOST('precioVenta');
require_once('Models/ProductoModel.php');
        $producto = new ProductoModel();
        $producto->setCategoria($catProducto);
        $producto->setNombre($nameProducto);
        $producto->setCodigo($codProducto);
        $producto->setImg($imgProducto);
        $producto->setCantidad($cantProducto);
        $producto->setPrecio($precioProducto);
        $producto->setEstado('AC');
        
                if($producto->exist($nameProducto)){
                    error_log('el producto ya existe');
                    $this->redirect('dashboard');  
                }else if($producto->save()){
                    error_log('producto guardado');
                    $this->redirect('dashboard');  
                }else{
                    error_log('ha ocurrido un error');
                    $this->redirect('dashboard');  
                }

            }

    }else{
        error_log('error, revise el nombre del form');
        $this->redirect('dashboard');  
    }

}
public function newProveedor(){

}

}

?>