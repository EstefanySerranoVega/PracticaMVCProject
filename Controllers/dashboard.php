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
        'category','codigoProducto','marca',
        'industria','descripcion',
        'imgProducto'])){


            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $marca = $this->getPOST('marca');
            $industria = $this->getPOST('industria');
            $descripcion = $this->getPOST('descripcion');
            $imgProducto = $this->getPOST('imgProducto');

           // $proveedor;
           //$user = $this->getUser();$almacen;
            if($nameProducto = '' || empty($nameProducto)
            || $catProducto = '' || empty($catProducto)
            || $codProducto = '' || empty($codProducto)
            || $marca ='' || empty($marca)
            || $industria = '' || empty($industria)
            || $descripcion ='' || empty($descripcion)
            ){
            error_log('ingrese todos los valores solicitados, por producto');
        $this->redirect('dashboard');    
        }else{

            $nameProducto = $this->getPOST('nameProducto');
            $catProducto = $this->getPOST('category');
            $codProducto = $this->getPOST('codigoProducto');
            $marca = $this->getPOST('marca');
            $industria = $this->getPOST('industria');
            $descripcion = $this->getPOST('descripcion');
            $imgProducto = $this->getPOST('imgProducto');

        require_once('Models/ProductoModel.php');
       // require_once('Models/ProveedorModel.php');
        
        $producto = new ProductoModel();
        $producto->setCategoria($catProducto);
        $producto->setNombre($nameProducto);
        $producto->setCodigo($codProducto);
        $producto->setMarca($marca);
        $producto->setIndustria($industria);
        $producto->setDescripcion($descripcion);
        $producto->setImg($imgProducto);
        $producto->setEstado('AC');
        
                if($producto->exist($codProducto)){
                    error_log('el producto ya existe');
                    $this->redirect('dashboard');  
                }else if($producto->save()){
                    //$proveedor = new ProveedorModel();
                    //if($proveedor->save()){
                    //}
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
public function updateProducto(){
    if($this->existPOST(['id','nameProducto','category',
    'codigoProducto','marca','industria','descripcion', 'imgProducto'])){
        error_log('success');
        
        $id = $this->getPOST('id');
        $nameProducto = $this->getPOST('nameProducto');
        $catProducto = $this->getPOST('category');
        $codProducto = $this->getPOST('codigoProducto');
        $marca = $this->getPOST('marca');
        $industria = $this->getPOST('industria');
        $descripcion = $this->getPOST('descripcion');
        $imgProducto = $this->getPOST('imgProducto');

       // $proveedor;
       //$user = $this->getUser();$almacen;
        if( $id = '' || empty($id)
        ||    $nameProducto = '' || empty($nameProducto)
        || $catProducto = '' || empty($catProducto)
        || $codProducto = '' || empty($codProducto)
        || $marca ='' || empty($marca)
        || $industria = '' || empty($industria)
        || $descripcion ='' || empty($descripcion)
        ){
        error_log('ingrese todos los valores solicitados, por producto');
    $this->redirect('sectionProductos');    
    }else{
        
        $id = $this->getPOST('id');
        $nameProducto = $this->getPOST('nameProducto');
        $catProducto = $this->getPOST('category');
        $codProducto = $this->getPOST('codigoProducto');
        $marca = $this->getPOST('marca');
        $industria = $this->getPOST('industria');
        $descripcion = $this->getPOST('descripcion');
        $imgProducto = $this->getPOST('imgProducto');

    require_once('Models/ProductoModel.php');
        error_log('id: '.$id);
        error_log('categoria: '.$catProducto);
        error_log('nombre: '.$nameProducto);
        error_log('codigo: '.$codProducto);
        error_log('marca: '.$marca);
        error_log('industria: '.$industria);
        error_log('img: '.$imgProducto);
        error_log('descripcion: '.$descripcion);
    $producto = new ProductoModel();
    $producto->setId($id);
    $producto->setCategoria($catProducto);
    $producto->setNombre($nameProducto);
    $producto->setCodigo($codProducto);
    $producto->setMarca($marca);
    $producto->setIndustria($industria);
    $producto->setDescripcion($descripcion);
    $producto->setImg($imgProducto);
    $producto->setEstado('AC');
    
           if($producto->update()){
                //$proveedor = new ProveedorModel();
                //if($proveedor->save()){
                //}
                error_log('producto Actualizado');
                $this->redirect('sectionProductos');  
            }else{
                error_log('ha ocurrido un error');
                $this->redirect('sectionProductos');  
            }
        }
    }else{
        error_log('no se encontraron los post');
    }
}

public function updateProveedor(){
    if($this->existPOST(['id','empresaProveedor','correoProveedor'])){
        $id = $this->getPOST('id');
        $empresa = $this->getPOST('empresaProveedor');
        $correo = $this->getPOST('correoProveedor');

        if($id = '' || empty($id)
        || $empresa = '' || empty($empresa)
        || $correo = '' || empty($correo)){
            error_log('introduzca todos los datos');
        }else{
            require_once('Models/ProveedorModel.php');
            $id = $this->getPOST('id');
            $empresa = $this->getPOST('empresaProveedor');
            $correo = $this->getPOST('correoProveedor');

            $proveedor = new ProveedorModel();
            $proveedor->setId($id);
            $proveedor->setEmpresa($empresa);
            $proveedor->setCorreo($correo);
            if($proveedor->update()){
                error_log('actualizado correctamente');
                $this->redirect('sectionProvider'); 
            }else{
                error_log('error al actualizar');
                $this->redirect('sectionProvider'); 
            }

        }
    }else{
        error_log('no se encontro el POST');
    }
}
public function updateCategoria(){
    if($this->existPOST(['id','nombreCategoria'])){
        $id = $this->getPOST('id');
    }else{
        error_log('no se ha encontrado el POST');
}

}
}

?>