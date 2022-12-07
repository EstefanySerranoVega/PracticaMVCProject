<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>updateProfile.css">
<script src="<?php echo URL_RAIZ.JQUERY;?>"></script>
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
        <form action="<?php echo URL_RAIZ;?>profile/updateUser" class="form-update" method="POST">
        <div class="img-profile">
                
             
               <div class="image">
               <img src="<?php echo URL_RAIZ.AVATAR.$p[0]['profile'];?>" alt="" >
               
        </div>
        <input type="file" name="profile" id="profile">
        </div>
            <div class="form-information">
               
                <input type="text" name="idUser" id="idUser" value = "<?php echo $_SESSION['idUser'];?>">
            <label class="sub" for="userName">Nombre de Usuario:</label>
            <input type="text" name="username" id="username" value="<?php echo $p[0]['username']?>">
            <label class="sub" for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="<?php echo $p[0]['nombre']?>">
            <label class="sub" for="paterno">Apellido Paterno</label>
            <input type="text" name="paterno" id="paterno" value="<?php echo $p[0]['paterno']?>">
            <label class="sub" for="materno">Apellido Materno</label>
            <input type="text" name="materno" id="materno" value="<?php echo $p[0]['materno']?>">
            <label class="sub" for="nacimiento">Fecha de nacimiento</label>
            <input type="date" name="nacimiento" id="nacimiento">
            <label class="sub" for="name">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo $p[0]['correo']?>">
            <label class="sub" for="paterno">Telefono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $p[0]['telefono']?>">
            <label class="sub" for="paterno">Direccion:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $p[0]['direccion']?>">
         <button type="submit" class="btn-editar" id="btn-editar">GUARDAR</button>
         <button >
            <a href="<?php echo URL_RAIZ;?>profile/myProfile">CANCELAR</a>
         </button>
            </div>
</form>

        </div>
    </div>
</body>

</html>