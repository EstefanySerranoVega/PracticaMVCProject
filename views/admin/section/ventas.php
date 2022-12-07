<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>venta.css">
</head>
<body>
<?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');?>
   
        <div class="container-gral">    
            
            <div class="container-shopping">
                
                <div class="table-container">
                <div class="table-grid">
                    <div class="header-table">
                        <div class="cell-header">Cliente</div>
                        <div class="cell-header">Producto</div>
                        <div class="cell-header">Precio</div>
                        <div class="cell-header">Cantidad</div>
                        <div class="cell-header">Total</div>
                        <div class="cell-header">Fecha</div>
                        <div class="cell-header">No. Transaccion</div>
                        <div class="cell-header">Estado</div>
                    </div>
                    
                    <div class="body-table">
                    <?php
              $res = [];
              require_once('Clases/sectionVentaModel.php');
              $cp = new sectionVentaModel();
              $p = $cp->getAllVentas();
              if(!empty($p)){
                
                for($i=0;$i<count($p);$i++){
                    ?>
                            <div class="row-table">
    
                                <div class="cell-table">
                                    <?php echo $p[$i]['nombre'].' '.$p[$i]['paterno'].' '.$p[$i]['materno']; ?>
                                </div>
                                <div class="cell-table">
                                    <?php echo $p[$i]['producto']; ?>
                                </div>
                                <div class="cell-table">
                                    <?php echo $p[$i]['precio'];?> 
                                </div>
                                <div class="cell-table">
                                    <?php  echo $p[$i]['cantidad'];?> 
                                </div>
                                <?php $total = $p[$i]['precio'] *$p[$i]['cantidad'];?>
                                <div class="cell-table">
                                    <?php  echo $total;?>
                                </div>
                                <div class="cell-table">
                                    <?php  echo $p[$i]['fecha'];?>
                                </div>
                                <div class="cell-table">
                                    <?php  echo $p[$i]['transaccion'];?>
                                </div>
                                <div class="cell-table">
                          enviado
                                </div>
                            </div>
                            
                            <?php } ?>
            <?php  }else{
                echo 'no hay ventas';
              }
          ?>
                    </div>
                </div>
            </div>
                

            </div>
        </div>


        </div>
        </div>
</body>
</html>