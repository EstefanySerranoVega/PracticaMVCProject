<?php 

require_once('Models/AlmacenProductoModel.php');
require_once('Models/ClienteProductoModel.php');
require_once('Models/VentaModel.php');

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

    public function success(){
        echo "<script> alert('Compra exitosa! ');</script>";
        
        if($this->existGET(['payer_id','payer_status',
        'first_name','last_name','address_street','verify_sign','receiver_id','txn_id'])){
            //get
            $payer = $this->getGET('payer_id');
            $status = $this->getGET('payer_status');
            $verify_sign = $this->getGET('verify_sign');
            $recibo = $this->getGET('receiver_id');
            $txn = $this->getGET('txn_id');
            error_log('verify_sign: '.$verify_sign);
            error_log('recibo: '.$recibo);
            error_log('txn: '.$txn);
            
            $user = $_SESSION['idUser'];
            $almacen = $_SESSION['almacen'];
            error_log('payer: '.$payer);
            if($status =='VERIFIED'){
                echo "<script> alert('pago existoso! ');</script>";

                foreach($_SESSION['carrito'] as $index=>$item){
                    $ap = new AlmacenProductoModel();
                    $a = $ap->getProductoAndDate($item['id']);
                    $cantidadAlmacen = $a[0]['CANTIDAD_AP'];
                    $precio = $a[0]['PVENTA_AP'];
                    $cantidad = $item['cantidad'];

                   $cp = new ClienteProductoModel();
                    $cp->setCliente($_SESSION['idUser']);
                    $cp->setAP($item['id_ap']);
                    $cp->setTipoPago(1);
                    $cp->setCantidad($cantidad);
                    $cp->setPrecio($precio);
                    $cp->setTotal($precio * $cantidad);
                    $cp->setEstado("AC");
                    $cp->setCreacion(Date('Y-m-d H:i:s'));
                    if($cp->save()) {


                echo "<script> alert('Venta guardada');</script>";
                $cant = $cantidadAlmacen - $cantidad;
                if($cant>0){
                    $ap->setCantidad($cant);
                    $ap->setProducto($item['id']);
                    $ap->updateCantidad();

                    $venta = new  VentaModel();
                    $venta->setCP($cp->getId());
                    $venta->setTransaccion($txn);
                    $venta->setFecha(Date('Y-m-d H:i:s'));
                    $venta->setEstado('AC');
                    $venta->save();
                    
                }else{
                    
                    $ap->delete($item['id_ap']);

                    $venta = new  VentaModel();
                    $venta->setCP($cp->getId());
                    $venta->setTransaccion($txn);
                    $venta->setFecha(Date('Y-m-d H:i:s'));
                    $venta->setEstado('AC');
                    $venta->save();
                }
                    }else{
                        echo "<script> alert('Ha ocurrido un error!');</script>";}

                }
                
                $this->view->render('Home/recibo');
            }else{
                echo "<script> alert('error al pagar');</script>";
                error_log('error al completar el pago');
            }
  
        }
          
    }
    public function cancelar(){
        echo "<script> alert('pago cancelado');</script>";
        $this->redirect('home');
          
    }

   
}

?>