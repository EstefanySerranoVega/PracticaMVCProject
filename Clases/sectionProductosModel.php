<?php

require_once('Models/ProductoModel.php');
require_once('Models/ProveedorModel.php');
require_once('Models/CategoriaModel.php');
require_once('Models/UsuarioProductoProveedorModel.php');

Class sectionProductosModel Extends Model {
    function __construct(){

        parent::__construct();
    }
    public function getAllProductos(){
        $productos = new ProductoModel();
        $producto =$productos->getAll();
        $proveedor = new ProveedorModel();
        $provider = $proveedor->getAll();
        $categoria = new CategoriaModel();
        $category = $categoria->getAll();
        $upp = new UsuarioProductoProveedorModel();
        $x = $upp->getAll();
        $items =[] ;
        for($i = 0;$i<Count($x);$i++){
            for($p = 0;$p<Count($producto);$p++){
                if($x[$i]['ID_PRODUCTO']==$producto[$p]['ID_PRODUCTO']){
                    //$pId = $producto[$p]['ID_PRODUCTO'] ;
                    for($c=0;$c<Count($category);$c++){
                        if($producto[$p]['ID_CATEGORIA'] == $category[$c]['ID_CATEGORIA']){
                            for($pv=0;$pv<Count($provider);$pv++){
                                if($x[$i]['ID_PROVEEDOR']==$provider[$pv]['ID_PROVEEDOR']){
                                    $item = array(
                                        'idUPP' =>  $x[$i]['ID_USUARIO_PROVEEDOR_PRODUCTO'],
                                        'id_producto'=> $producto[$p]['ID_PRODUCTO'],
                                        'codigo_producto' => $producto[$p]['CODIGO_PRODUCTO'],
                                        'nombre_producto' => $producto[$p]['NOMBRE_PRODUCTO'],
                                        'categoria_producto' => $category[$c]['NOMBRE_CATEGORIA'],
                                        'precio_producto' => $producto[$p]['PRECIO_VENTA_PRODUCTO'],
                                        'stock_producto' => $producto[$p]['CANTIDAD_PRODUCTO'],
                                        'proveedor_producto' => $provider[$pv]['EMPRESA_PROVEEDOR']
                                    );
                                    array_push($items,$item);
                                }

                            }
                        }
                    }

                }
            }

        }

        return $items;
    }
}

?>