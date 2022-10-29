<?php

Class ApiCarrito{
    
    private $carrito;
    private $producto;
    private $cantidad;
    function __construct(){
        error_log('constructor de api carrito se ejecutó');
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            error_log('Session::session_start');
        }
    }
    public function setCurrentProducto($producto){
        $_SESSION[$this->carrito][$this->producto]= $producto;
        
        foreach($producto as $item){
            error_log('item es: '.$item);}
    }
    
    public function closeSesionCarrito(){
        error_log('closeSesionCarrito()->execute');
    
        session_unset($_SESSION[$this->carrito]);
        session_destroy($_SESSION[$this->carrito]);
    }
}

?>