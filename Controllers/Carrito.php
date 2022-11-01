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



    public function initCarrito(){
        if($this->existPOST([
            'id-producto',
            'categoria-producto',
            'nombre-producto',
            'codigo-producto',
            'precio-producto'])){
                $id = $this->getPOST('id-producto');
            $categoria = $this->getPOST('categoria-producto');
            $name = $this->getPOST('nombre-producto');
            $codigo = $this->getPOST('codigo-producto');
            $precio = $this->getPOST('precio-producto');
            $cantidad =1;
            $producto= array(
                'id' => $id,
                'categoria' => $categoria,
                'name' => $name,
                'codigo' => $codigo,
                'cantidad' => $cantidad,
                'precio' => $precio );
                //$lista = $producto.$lista;
                //array_push($lista,$producto);
           $this->carrito->setCurrentProducto($producto);
           //$this->carrito->defineListProducto($lista);
        }else{
            error_log('no se encontró el post');
        }
        
        
    }
    public function addCarrito(){
        $this->redirect('');
        $this->initCarrito();
         error_log('add carrito de controller se ejecutó exitosamente');
         
        /*
        error_log('aquí inicia el carrito');
        $this->initCarrito();
        */
    }

public function deleteItems(){
    $this->carrito->closeSesionCarrito();
}
}

?>