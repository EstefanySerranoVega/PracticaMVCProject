<?php
require_once('Models/AlmacenProductoModel.php');
require_once('Clases/pagarModel.php');
require_once('Clases/sectionVentaModel.php');
require_once('helpers/html/require.php');

if($_GET['txn_id']){
    $id = $_GET['txn_id'];

    $v = new sectionVentaModel();
    $r = $v->getRecibo($id);

}else{
    echo 'no se encontro el get';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>recibo.css">
</head>
<body>

    <div class="recibo">
        <div class="recibo-header">
<h1>RECIBO:<small> <?php echo $r[0]['transaccion']?> </small></h1>

        </div>
        <div class="data-user">
            <div class="data">
            <label  class="sub" for="fecha">Fecha de Compra:</label>
            <label for="fecha"><?php echo $r[0]['fecha']?></label>
        </div>
            <div class="data"> 
            <label  class="sub" for="cliente">Cliente:</label>
            <label for="cliente"><?php echo $r[0]['nombre'].' '.$r[0]['paterno'].' '.$r[0]['materno'];?></label>
           </div>
            <div class="data">
           <label class="sub"  for="telefono">Telefono:</label>
            <label for="telefono"><?php echo $r[0]['telefono']?></label>
        </div>
        
        <div class="data">

<label  class="sub" for="correo">Correo:</label>
<label for="correo"><?php echo $r[0]['correo']?></label>
</div>
        </div>
        <?php
        $total =0;
        for($i=0;$i<count($r);$i++) {
            ?>

       
        <div class="recibo-container">
            <div class="img">
                <img src="<?php echo URL_RAIZ.IMG.$r[$i]['img'];?>" alt="">
            </div>
            <div class="data-recibo">
                <div class="data producto-name">
            <label class="sub" for="producto">Producto:</label>
            <label for="producto"><?php echo $r[$i]['producto']?></label>
        </div>
                <div class="data">
            <label class="sub" for="precio">Precio:</label>
            <label for="precio"><?php echo $r[$i]['precio'];?></label>
        </div>
                <div class="data">
            <label class="sub"  for="cantidad">Cantidad:</label>
            <label for="cantidad"><?php echo $r[$i]['cantidad'];?></label>
        </div>
                <div class="data">
            <label class="sub"  for="total">Total:</label>
            <label for="total"><?php echo $r[$i]['total'];?>Bs.</label>
        </div>
            </div>
            
            
        <?php 
    $total = $total +$r[$i]['total'];    
    }
        ?>
        <div class="total">
            
        <h2>Total:<small> <?php echo $total;?>Bs.</small></h2> 
      
        </div>  </div>
        <div class="button">
            <a href="<?php echo URL_RAIZ;?>profile/MyProfile">REGRESAR</a>
        </div>
        <div class="button">
            <a href="<?php echo URL_RAIZ;?>">Ir al Home</a>
    </div>
</body>
</html>