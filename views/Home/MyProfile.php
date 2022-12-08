<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>profile.css">
<script src="<?php echo URL_RAIZ.JQUERY;?>"></script>
</head>
<body>
    <?php 
    require_once('views/header.php');
require_once('Clases/ProfileModel.php');
$profile = new ProfileModel();
if($_SESSION['idUser']){
    $id = $_SESSION['idUser'];
    if($_SESSION['idRol']){
        $rol = $_SESSION['idRol'];
    }else{
        echo 'no hay rol';
    }
$p = $profile->getDataCliente($id);
}else{
    echo 'no hay usuario';
}
?>
    <div class="container-gral">
        
    <div class="mi-informacion">
        <form action="<?php echo URL_RAIZ;?>profile/updateCliente">
        <div class="img-profile">
               
               <div class="image">
               <img src="<?php echo URL_RAIZ.AVATAR.$p[0]['profile'];?>" alt="" >
               </div>
        </div>
            <div class="form-myInformation">
            <label class="sub" for="userName">Nombre de Usuario:</label>
            <label for=""><?php echo $p[0]['username']?></label>
            <label class="sub" for="name">Nombre:</label>
            <label for=""><?php echo $p[0]['nombre']?></label>
            <label class="sub" for="paterno">Apellido Paterno</label>
            <label for=""><?php echo $p[0]['paterno']?></label>
            <label class="sub" for="materno">Apellido Materno</label>
            <label for=""><?php echo $p[0]['materno']?></label>
            <label class="sub" for="nacimiento">Fecha de nacimiento</label>
            <label for=""><?php echo $p[0]['nacimiento']?></label>
            <label class="sub" for="name">Correo:</label>
            <label for=""><?php echo $p[0]['correo']?></label>
            <label class="sub" for="telefono">Telefono:</label>
            <label for=""><?php echo $p[0]['telefono']?></label>
            <label class="sub" for="direccion">Direccion:</label>
            <label for=""><?php echo $p[0]['direccion']?></label>
            <a href="<?php echo URL_RAIZ;?>profile/updateCliente">
            <button type="submit" class="btn-editar" id="btn-editar">
      EDITAR MI INFORMACION
        </button></a>    
        
          
            </div>
</form>

        </div>
        <?php
        require_once('Clases/sectionVentaModel.php');
        $venta = new sectionVentaModel();
        $c = $venta->getComprasUser($id);
        ?>
        <div class="options-cliente">
        <div class="mis-compras">
            <div class="option option-compras">
                <h3>Mis compras</h3>

            </div>
            <div class="historial-compras">
<div class="header-historial">
    
<div class="cell-header">Producto</div>
<div class="cell-header">Precio</div>
<div class="cell-header">Cantidad</div>
<div class="cell-header">Total</div>
<div class="cell-header">Fecha</div>
<div class="cell-header">No. Transaccion</div>
<div class="cell-header">Estado</div>
<div class="cell-header">Ver Recibo</div>
</div>
<?php
for($i=0;$i<count($c);$i++){?>
<div class="body-historial">
    <div class="cell-historial"><?php echo $c[$i]['producto']?></div>
    <div class="cell-historial"><?php echo $c[$i]['precio'];?></div>
    <div class="cell-historial"><?php echo $c[$i]['cantidad'];?></div>
    <div class="cell-historial"><?php echo $c[$i]['total'];?></div>
    <div class="cell-historial"><?php echo $c[$i]['fecha']?></div>
    <div class="cell-historial"> <?php echo $c[$i]['transaccion'];?></div>
    <div class="cell-historial">Completado</div>
    <div class="cell-historial">
        <a href="<?php echo URL_RAIZ;?>profile/recibo?txn_id=<?php echo $c[$i]['transaccion']?>">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </div>
        </a>
    </div>
   
</div> <?php 
    }?>
            </div>
        </div>
        </div>
    </div>
</body>
</html>