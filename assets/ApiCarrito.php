<?php

Class ApiCarrito{
    
    private $carrito = 'carrito';
    private $producto ;
    private $item;
    private $cantidad;
    private $items = [];
    private $new = 'new';
    private $exist;
    private $pos;
    private $count;
    function __construct(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            $_SESSION[$this->carrito] ;
        }
        error_log('constructor de api carrito se ejecutó');

    }

    public function setCurrentProducto($producto){
        $_SESSION[$this->carrito][$this->count] = $producto;
        
   
}

public function getItems(){
    return $this->count;
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