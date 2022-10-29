<?php
require_once('assets/ApiCarrito.php');

Class Carrito extends Controllers{

private $carrito ;

    function __construct(){
        error_log('constructor de carrito controller se ejecutó');
        parent::__construct();
        $this->initCarrito();
    }

    public function render(){
        $this->view->render('Home/carrito',[]);
        error_log('render controller carrito se ejecutó');
    }

    public function initCarrito(){
        $this->carrito = new ApiCarrito();
        error_log('aquí inicia el carrito');
    
        if($this->existPOST([
            'categoria-producto',
            'nombre-producto',
            'codigo-producto',
            'precio-producto'])){
            $categoria = $this->getPOST('categoria-producto');
            $name = $this->getPOST('nombre-producto');
            $codigo = $this->getPOST('codigo-producto');
            $precio = $this->getPOST('precio-producto');
            $producto = array(
                'categoria' => $categoria,
                'name' => $name,
                'codigo' => $codigo,
                'precio' => $precio );
            $this->carrito->setCurrentProducto($producto);
        }else{
            error_log('no se encontró el post');
        }
        
        
    }
    public function addCarrito(){
        error_log('add carrito de controller se ejecutó exitosamente');
    }

public function deleteItems(){
    $this->carrito->closeSesionCarrito();
}
}

?>