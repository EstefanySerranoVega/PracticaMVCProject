<?php 

Class PagarModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getDataUser(){
        $items = [];
        $query = $this->query(
            'SELECT persona.id_persona as id_p,
            persona.nombre_persona as nombre,
            persona.paterno_persona as paterno,
            persona.materno_persona as materno,
            persona.telefono_persona as telefono,
            cliente.id_cliente as id_c,
            cliente.correo_cliente as correo,
            cliente.direccion_cliente as direccion
            FROM persona
            INNER JOIN cliente 
            ON persona.id_persona = cliente.id_persona
            INNER JOIN usuario ON
            usuario.id_persona = persona.ID_PERSONA
            WHERE usuario.id_usuario ='.$_SESSION['idUser'] );
            error_log($_SESSION['idUser'] );
            $query->execute();
            while($item = $query->fetch(PDO::FETCH_ASSOC)){
                array_push($items,$item);
            }
            return $items;
    }
    public function getTotalCarrito(){
        $total = 0;
        foreach($_SESSION['carrito'] as $index => $item){
            require_once('Clases/sectionAlmacenModel.php');
            $almacen = new sectionAlmacenModel();
            $p = $almacen->getItem($item['id_ap']);
            $total = $total + ($p[0]['precio_v'] * $item['cantidad']);
            error_log('total l 39'.$total);
        }
        return $total;
    }
}

?>