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
            if($this->existPOST(['id-ap','id-producto','precio-producto'])){
                    $ap = $this->getPOST('id-ap');
                    $id = $this->getPOST('id-producto');
                    $precio = $this->getPOST('precio-producto');
                $cantidad =1;
                error_log('is ap: '.$ap);
                error_log('is id: '.$id);
                error_log('is precio: '.$precio);
                $producto= array(
                    'id_ap' => $ap,
                    'id' => $id,
                    'precio' => $precio,
                    'cantidad' => $cantidad);
                    $_SESSION['carrito'][0]= $producto;
                 
            
                  }else{
                error_log('no se encontró el post');
            }
        }else{
            
            error_log('carrito no está vacío');
            $num = count($_SESSION['carrito']);
            error_log('carrito tiene: '.count($_SESSION['carrito']));
            if($this->existPOST(['id-ap',
                'id-producto','precio-producto'])){
                    $ap = $this->getPOST('id-ap');
                    $id = $this->getPOST('id-producto');
                    $precio = $this->getPOST('precio-producto');
                $cantidad =1;
                $producto= array(
                    'id_ap' => $ap,
                    'id' => $id,
                    'precio' => $precio,
                    'cantidad' => $cantidad);
                    $_SESSION['carrito'][$num]= $producto;
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
public function send(){
    
    if($_SESSION['idUser'] != ''){
        if(!empty($_SESSION['carrito'])){
            $this->view->render('Home/Pagar');
        }else{ 
            echo "<script> alert('El carrito está vacío');</script>"; 
       
            $this->view->render('Home/carrito');
            
            error_log('el carrito está vacío');
        }
    }else{
        echo "<script> alert('inicie sesion para comprar');</script>";
        $this->view->render('login/index'); }
}

}

?>