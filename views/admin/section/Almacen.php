<?php
require_once('Clases/sectionProductosModel.php');
require_once('Models/AlmacenProductoModel.php');

$productos = new sectionAlmacenModel(); 
$producto = $productos->getAllProductos();
$p = new AlmacenProductoModel();
$p->countProducto(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>almacen.css">
</head>
<body>
<?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');?>
   
        <div class="container-gral">
        <div class="nav-search">
                <div class="section-search">
                    <div class="search">
                        <input type="search" name="input-search" id="input-search">
                    </div>
                    <div class="btn-filter">
                        <button>FILTER</button>
                    </div>
                </div>
                <div class="btn-new">
                    <a href="<?php echo URL_RAIZ;?>sectionAlmacen/AddNewLote">
                    <button>
                        <div class="icon-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        </div>INGRESAR PRODUCTO
                    </button>
                    </a>
                </div>
            </div>
            <div class="container-shopping">
                <div class="options-shopping">
                    
                <div class="option ultimos-ingresos">
                    Ultimos productos ingresados
                </div>
                <div class="option filter-lotes">
                    Ver por Lotes
                </div> <div class="option ultimos-ingresos">
                    Ultimos productos ingresados
                </div>
                <div class="option agotados">
                    productos agotados
                </div>
                </div>
                <div class="table-container">
                <div class="table-grid">
                    <div class="header-table">
                        <div class="cell-header">Codigo</div>
                        <div class="cell-header">Nombre</div>
                        <div class="cell-header">Categoria</div>
                        <div class="cell-header">Precio</div>
                        <div class="cell-header">Stock</div>
                        <div class="cell-header">Proveedor</div>
                        <div class="cell-header">Action</div>
                    </div>
                    
                    <div class="body-table">
                    <?php
              $res = [];
              for($i=0;$i<count($producto[0]);$i++){
                ?>
                        <div class="row-table">

                            <div class="cell-table">
                                <?php echo $producto[0][$i]['codigo']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $producto[0][$i]['nombre']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $producto[0][$i]['name_cat']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $producto[0][$i]['precio']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $producto[0][$i]['cantidad']; ?>
                            </div>
                            <div class="cell-table">
                            <?php echo $producto[0][$i]['name_proveedor']; ?>
                              </div>
                            <div class="cell-table">
                                <div class="icons-table">
                                    <a href="<?php echo URL_RAIZ;?>sectionProductos/updateItem?id=<?php echo $producto[0][$i]['id_producto']; ?>">
                                    <div class="icon-action" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                    </div>
                                    </a>
                                    <a href="<?php echo URL_RAIZ;?>sectionProductos/deleteItem?id=<?php echo $producto[0][$i]['id_ap']; ?>">
                                    <div class="icon-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                    </div>
                                    </a>
                                    <a href="<?php echo URL_RAIZ;?>sectionAlmacen/addItem?id=<?php echo $producto[0][$i]['id_ap']; ?>">
                                        <div class="icon-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
                

            </div>
        </div>

        </div>
</body>
</html>