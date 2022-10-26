<?php
require_once('Clases/sessionController.php');


Class viewProducto Extends sessionController{

    private $user;
    public function __construct(){

        parent::__construct();

       // $this->user->getUserSesionData();
    }


    public function render(){
        $this->view->render('Home/viewProducto');

        //return print_r($producto );
    }
    
    public function selectProducto(){
       // $producto = new ProductoModel();
    
        error_log('view select producto carga');
        $this->existGET('');
        error_log('la variable get sí es: ');
        //$p = $producto->get($this->id);
        if(isset($_GET['ID_PRODUCTO'])){
            error_log('validando id');
        }else{
            error_log('else validacion id');}
    }
}

?>