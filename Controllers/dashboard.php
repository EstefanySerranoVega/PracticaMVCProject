<?php
require_once('Clases/sessionController.php');
require_once('Models/ProveedorModel.php'); 
Class Dashboard extends SessionController{

public function __construct(){
    parent::__construct();
}


public function render(){
    $this->view->render('admin/section/dashboard');
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
                $this->redirect('sectionCategory');
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
        'category','codigoProducto','provider',
        'cantidadProducto','precioA',
        'precioVenta','imgProducto'])){


            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $provider = $this->getPOST('provider');
            $cantProducto = $this->getPOST('cantidadProducto');
            $precioUPP = $this->getPOST('precioA');
            $precioProducto = $this->getPOST('precioVenta');
            $imgProducto = $this->getPOST('imgProducto');

           // $proveedor;
           //$user = $this->getUser();$almacen;
            if($nameProducto = '' || empty($nameProducto)
            || $catProducto = '' || empty($catProducto)
            || $codProducto = '' || empty($codProducto)
            || $provider ='' || empty($provider)
            || $cantProducto = '' || empty($cantProducto)
            || $precioUPP ='' || empty($precioUPP)
            || $precioProducto = '' || empty($precioProducto)
            ){
            error_log('ingrese todos los valores solicitados, por producto');
        $this->redirect('dashboard');    
        }else{

            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $provider = $this->getPOST('provider');
            $cantProducto = $this->getPOST('cantidadProducto');
            $precioUPP = $this->getPOST('precioA');
            $precioProducto = $this->getPOST('precioVenta');
            $imgProducto = $this->getPOST('imgProducto');

        require_once('Models/ProductoModel.php');
       // require_once('Models/ProveedorModel.php');
        require_once('Models/UsuarioProductoProveedorModel.php');
            
        $producto = new ProductoModel();
        $producto->setCategoria($catProducto);
        $producto->setNombre($nameProducto);
        $producto->setCodigo($codProducto);
        $producto->setImg($imgProducto);
        $producto->setCantidad($cantProducto);
        $producto->setPrecio($precioProducto);
        $producto->setEstado('AC');
        
                if($producto->exist($codProducto)){
                    error_log('el producto ya existe');
                    $this->redirect('dashboard');  
                }else if($producto->save()){
                    //$proveedor = new ProveedorModel();
                    //if($proveedor->save()){
                    //}
                    $upp = new UsuarioProductoProveedorModel();
                    $upp->setUsuario($_SESSION['idUser']);
                    $upp->setProducto($producto->getId());
                    $upp->setProveedor($provider);
                    $upp->setAlmacen(1);
                    $upp->setEstado('AC');
                    $upp->setPrecio($precioUPP);
                    $upp->setIngreso(Date('Y-m-d H:i:s'));
                    $upp->setCreacion(Date('Y-m-d H:i:s'));
                    $upp->save();
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
if($this->existPOST(['empresaProveedor', 'correoProveedor'])){
    $empresa = $this->getPOST('empresaProveedor');
    $correo = $this->getPOST('correoProveedor');
    $proveedor = new ProveedorModel();
    $proveedor->setEmpresa($empresa);
    $proveedor->setCorreo($correo);
    $proveedor->setEstado('AC');
    $proveedor->setCreacion(Date('Y-m-d H:i:s'));
    $proveedor->save();
    $this->redirect('sectionProvider');

}
}

}

?>