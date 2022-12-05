<?php 

Class Pagar extends SessionController{
    public function __construct(){
        parent::__construct();
    }
    public function procesar(){
        if($this->existPOST(['total','correo','direccion'])){
            $total = $this->getPOST('total');
            $correo = $this->getPOST('correo');
            $direccion = $this->getPOST('direccion');
            $user = $_SESSION['idUser'];
            error_log('total: '.$total);
            error_log('correo: '.$correo);
            error_log('direccion: '.$direccion);
            if($total = '' || empty($total)
            || $correo = '' || empty($correo)
            || $direccion = '' || empty($direccion)
            || $user = '' || empty($user)){
                error_log('uno de los campos está vacío');
            }else{
                
            $id_s = Session_id();
            $total = $this->getPOST('total');
            $correo = $this->getPOST('correo');
            $direccion = $this->getPOST('direccion');
            $user = $_SESSION['idUser'];
            $datosPaypal = '';
            $claveTransaccion = '';
            error_log('procesar se está ejecutando...');
            echo "<script> alert('pagar producto ".$total."');</script>";
            //$this->view->render('Home/recibo');
        }
        }else{
            error_log('hubo un error al buscar los POST');
        }
    }
   
}

?>