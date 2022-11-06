<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>shoppins.css">
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
                    <a href="<?php echo URL_RAIZ;?>sectionProductos/addProducto">
                    <button>
                        <div class="icon-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        </div>NUEVO PRODUCTO
                    </button>
                    </a>
                </div>
            </div>
            <div class="container-shopping">
                <div class="options-shopping">
                    
                <div class="option ultimos-ingresos">
                    Ultimos productos ingresados
                </div>
                <div class="option agotados">
                    productos agotados
                </div> <div class="option ultimos-ingresos">
                    Ultimos productos ingresados
                </div>
                <div class="option agotados">
                    productos agotados
                </div>
                </div>
                <div class="table-shopping">
                    <div class="header-table">
                        <div class="cell-header">Codigo</div>
                        <div class="cell-header">Nombre</div>
                        <div class="cell-header">Proveedor</div>
                        <div class="cell-header">Precio </div>
                        <div class="cell-header">Precio de venta</div>
                        <div class="cell-header">Estado</div>
                        <div class="cell-header">STOCK</div>

                    </div>
                    <div class="body-table">
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                        <div class="cell-table"></div>
                    </div>
                </div>
            </div>
        </div>

        </div>
</body>
</html>