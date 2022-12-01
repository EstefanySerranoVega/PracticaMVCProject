<?php
require_once('assets/ApiCarrito.php');

Class Carrito extends Controllers{

private $carrito ;

    function __construct(){
        error_log('constructor de carrito controller se ejecutó');
        parent::__construct();
        $this->carrito = new ApiCarrito();
    }

    public function render(){
        $this->view->render('Home/carrito',[]);
        error_log('render controller carrito se ejecutó');
    }

    public function addCarrito(){

        if(!isset($_SESSION['carrito'])){
            error_log('carrito vacío');
            error_log('se agregará el primer item: ');
            if($this->existPOST(['id-producto'])){
                    
                    $id = $this->getPOST('id-producto');
                $cantidad =1;
                $producto= array(
                    'id' => $id,
                    'cantidad' => $cantidad);
                    $_SESSION['carrito'][0]= $producto;
                    error_log('item: '.$_SESSION['carrito']);
                 
            
                  }else{
                error_log('no se encontró el post');
            }
        }else{
            
            error_log('carrito no está vacío');
            $num = count($_SESSION['carrito']);
            error_log('carrito tiene: ',count($_SESSION['carrito']));
            if($this->existPOST([
                'id-producto'])){
                    $id = $this->getPOST('id-producto');
                $cantidad =1;
                $producto= array(
                    'id' => $id,
                    'cantidad' => $cantidad);
                    $_SESSION['carrito'][$num]= $producto;
                    error_log('item: '.$_SESSION['carrito']);
                }
  
         }
        $this->redirect('carrito');
        /*
        error_log('aquí inicia el carrito');
        $this->initCarrito();
        */
    }
public function getCarrito(){
    return $_SESSION['carrito'];
}
public function deleteItems(){
if($this->existGET(['item'])){
    error_log('item encontrado');
    $id = $this->getGET('item');
    foreach($_SESSION['carrito'] as $index=>$item){
       if($item['id']== $id){
        error_log('se eliminará el item: '.$id);
        unset($_SESSION['carrito'][$index]);
        echo "<script> alert('producto eliminado');</script>";
        
    $this->view->render('Home/carrito');
       }
        
    }
}else{
    $this->view->render('Home/carrito');
}
    
}
}

?>