
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>profile.css">
</head>
<body>
    <?php require_once('views/header.php'); ?>

    <?php
require_once('Clases/ProfileModel.php');
$profile = new ProfileModel();
if($_SESSION['idUser']){
    $id = $_SESSION['idUser'];
    if($_SESSION['idRol']){
        $rol = $_SESSION['idRol'];
        echo 'el rol es: '.$rol;
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
        <div class="img-profile">
                <?php
                if(empty($p[0]['profile'])){
                    echo'no tienes una foto de perfil establecida';
               ?>
               <input type="file" name="" id="">
               <?php
                }else{?>
<img src="<?php echo URL_RAIZ.AVATAR.$p[0]['profile'];?>" alt="" >
            
                <?php
                }
                ?>
                </div>
            <div class="form-myInformation">
               
                
            <label for="userName">Nombre de Usuario:</label>
            <label for=""><?php echo $p[0]['username']?></label>
            <label for="name">Nombre:</label>
            <label for=""><?php echo $p[0]['nombre']?></label>
            <label for="paterno">Apellido Paterno</label>
            <label for=""><?php echo $p[0]['paterno']?></label>
            <label for="materno">Apellido Materno</label>
            <label for=""><?php echo $p[0]['materno']?></label>
            <label for="nacimiento">Fecha de nacimiento</label>
            <label for=""><?php echo $p[0]['nacimiento']?></label>
            <label for="name">Correo:</label>
            <label for=""><?php echo $p[0]['correo']?></label>
            <label for="paterno">Direccion:</label>
            <label for=""><?php echo $p[0]['direccion']?></label>
         <button>EDITAR MI INFORMACION</button>
            </div>
<form action="" method="post">
<img src="" alt="">
<label for="username"></label>
</form>
        </div>
        <div class="options-cliente">
        <div class="mis-compras">
            <div class="option">
                VER MIS COMPRAS
            </div>
        </div>
        </div>
    </div>
</body>
</html>