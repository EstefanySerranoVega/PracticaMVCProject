<?php

Class sectionAlmacen extends SessionController{

    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->view->render('admin/section/Almacen');
    }
    public function addItem(){
        $this->view->render('admin/section/Forms/AddLoteProductos');
    }
    public function AddNewLote(){
        $this->view->render('admin/section/Forms/AddNewLote');
    }
    public function AddLote(){
        error_log('function addLote en ejecución');
        if($this->existPOST(['id','precio','precioVenta','cantidad','proveedor'])){
            
            $id = $this->getPOST('id');
            $precio = $this->getPOST('precio');
            $precioV = $this->getPOST('precioVenta');
            $cantidad = $this->getPOST('cantidad');
            $proveedor = $this->getPOST('proveedor');
            if($id = '' || empty($id)
            || $precio = '' || empty($precio)
            || $precioV = '' || empty($precioV)
            || $cantidad = '' || empty($cantidad)
            || $proveedor = '' || empty($proveedor)) {
                error_log('no has ingresado todos los datos necesarios!');
            }else{

                $id = $this->getPOST('id');
                $precio = $this->getPOST('precio');
                $precioV = $this->getPOST('precioVenta');
                $cantidad = $this->getPOST('cantidad');
                $proveedor = $this->getPOST('proveedor');

                require_once('Models/AlmacenProductoModel.php');
                
                $ap = new AlmacenProductoModel();
                error_log('se creo el objeto almacenProductoModel');
                error_log('contar el producto con el id: '.$id);
                $l = $ap->countProducto($id);
               if($l<10){
                $l++;
                $lote = 'N-000'.$l;
                error_log('el numero de lote es: '.$lote);
                $ap->setLote($lote);
               }else if($l<100){
                $l++;
                $lote = 'N-00'.$l;
                error_log('el numero de lote es: '.$lote);
                $ap->setLote($lote);
               }else if($l<1000){
                $l++;
                $lote = 'N-0'.$l;
                error_log('el numero de lote es: '.$lote);
                $ap->setLote($lote);

               }else{
                error_log('el resultado es: '.$l);
               }
               $ap->setAlmacen($_SESSION['almacen']);
               $ap->setProducto($id);
               $ap->setCompra($precio);
               $ap->setVenta($precioV);
               $ap->setCantidad($cantidad);
               $ap->setProveedor($proveedor);
               $ap->setUsuario($_SESSION['idUser']);
               $ap->setIngreso(Date('Y-m-d H:i:s'));
               $ap->setEstado('AC');
               if($ap->save()){
                error_log('Productos agregados');
                $this->redirect('sectionAlmacen');
               }else{
                error_log('no se pudo agregar, hubo un error');
                $this->redirect('sectionAlmacen');
            }
          
            }

        }else{
            
            
            error_log('no se han podido añadir los productos');
        }
    }

}

?>