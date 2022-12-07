<?php

Class sectionVentaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getAllVentas(){
        try{
            $items = [];
            $query = $this->query(
                'SELECT v.id_venta as id_v,
                v.nro_transaccion as transaccion,
                v.fecha_venta as fecha,
                cp.id_usuario as id_user,
                cp.id_Ap as id_ap,
                producto.ID_PRODUCTO,
                producto.NOMBRE_PRODUCTO as producto,
                cp.cantidad_cp as cantidad,
                cp.precio_cp as precio,
                cp.total_cp as total,
                c.correo_cliente as correo,
                c.direccion_cliente as cliente,
                p.id_persona as id_persona,
                p.nombre_persona as nombre,
                p.paterno_persona as paterno,
                p.materno_persona as materno,
                p.telefono_persona as telefono 
                FROM venta v 
                INNER JOIN cliente_producto cp 
                ON v.id_cliente_producto = cp.id_cliente_producto
                INNER JOIN almacen_producto ap
                ON cp.ID_AP = ap.ID_AP
				INNER JOIN producto
				ON producto.ID_PRODUCTO = ap.ID_PRODUCTO
				INNER JOIN usuario u 
                ON u.ID_USUARIO = cp.id_usuario 
                INNER JOIN persona p 
                ON u.id_persona = p.id_persona 
                INNER JOIN cliente c 
                ON c.id_persona = p.id_persona 
                WHERE estado_venta = "AC"');
                      $query->execute();

                      while($item = $query->fetch(PDO::FETCH_ASSOC)){
                          array_push($items,$item);
                      }
                      return $items;
        }catch(PDOException $e){
            error_log('ERROR=> '.$e);        }
    }
    public function getComprasUser($id){
        try{
            $items = [];
            $query = $this->query(
                'SELECT v.id_venta as id_v,
                v.nro_transaccion as transaccion,
                v.fecha_venta as fecha,
                cp.id_usuario as id_user,
                cp.id_Ap as id_ap,
                producto.ID_PRODUCTO,
                producto.NOMBRE_PRODUCTO as producto,
                cp.cantidad_cp as cantidad,
                cp.precio_cp as precio,
                cp.total_cp as total,
                c.correo_cliente as correo,
                c.direccion_cliente as cliente,
                p.id_persona as id_persona,
                p.nombre_persona as nombre,
                p.paterno_persona as paterno,
                p.materno_persona as materno,
                p.telefono_persona as telefono 
                FROM venta v 
                INNER JOIN cliente_producto cp 
                ON v.id_cliente_producto = cp.id_cliente_producto
                INNER JOIN almacen_producto ap
                ON cp.ID_AP = ap.ID_AP
				INNER JOIN producto
				ON producto.ID_PRODUCTO = ap.ID_PRODUCTO
				INNER JOIN usuario u 
                ON u.ID_USUARIO = cp.id_usuario 
                INNER JOIN persona p 
                ON u.id_persona = p.id_persona 
                INNER JOIN cliente c 
                ON c.id_persona = p.id_persona 
                WHERE estado_venta = "AC"
                AND u.id_usuario = '.$id);
                      $query->execute();

                      while($item = $query->fetch(PDO::FETCH_ASSOC)){
                          array_push($items,$item);
                      }
                      return $items;
        }catch(PDOException $e){
            error_log('ERROR=> '.$e);       
        }

    }
}
?>