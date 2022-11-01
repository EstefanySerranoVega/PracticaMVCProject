<?php

Class ApiCarrito{
    
    private $carrito = 'carrito';
    private $producto ;
    private $item;
    private $cantidad;
    private $lista = [];
    private $new = 'new';
    private $exist;
    private $pos;
    function __construct(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            $_SESSION[$this->carrito] =array();
        }
        error_log('constructor de api carrito se ejecutó');
     /*
        if(isset($_SESSION[$this->carrito])){ 
            error_log('se creó carrito '.Count($_SESSION[$this->carrito]));
            if($_SESSION[$this->carrito]!= 0){

                error_log('ya existe carrito, se valida producto');
               // $this->existItem();
            }
        }else{

            error_log('Session::session_start, se crea carrito');
        }
     */
    }
    private function existItem(){
        error_log('validando existencia');
        error_log('el id buscado es: '.$_SESSION[$this->carrito]['id']);
        for($i=0; $i<Count($_SESSION[$this->carrito]);$i++){
            if($_SESSION[$this->carrito]['id']){
                error_log('el producto ya está en el carrito');
            }else{
                error_log('no se encontró, se agrega');
            }
        }
    }
    public function setCurrentProducto($producto){
        $_SESSION[$this->carrito][0] = $producto;
       $this->defineListProducto();
   
}
    public function defineListProducto(){
        //$_SESSION[$this->new] = $this->producto;
        error_log('executando definicion lista producto');
        //array_push($this->lista,$this->producto);
        $_SESSION[$this->carrito]= $this->producto;

    }
    public function getListProducto(){
        error_log('devuelve definicion lista producto');
       // $_SESSION[$this->carrito] = $_SESSION[$this->new];
        return $_SESSION[$this->carrito];
    }

    public function getCurrentProducto(){
        return $_SESSION[$this->carrito];
    }
    public function closeSesionCarrito(){
        error_log('closeSesionCarrito()->execute');
    
        session_unset($_SESSION[$this->carrito]);
        session_destroy($_SESSION[$this->carrito]);
    }
}

?>