<?php
require_once('Clases/Session.php');
require_once('Clases/ProfileModel.php');
$user = new Session();
$a = $user->exist();
$profile = new ProfileModel();
$p = $profile->getDataUser($_SESSION['idUser']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE; ?>myProfile.css">
</head>
<body>    
    <?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');
   ?>
   
        <div class="container-gral">
            <div class="container-my_profile">
            
                
                <div class="info-update">
            <form action="<?php echo URL_RAIZ;?>profile/updateDataUser" class="form-update" method="post">
            <div class="avatar">
                <h1>Actualizar Perfil</h1>
                <div class="img">
                <img src="<?php echo URL_RAIZ.AVATAR.$p[0]['profile'];?>" alt="">
                </div>
                        
                <label for="profile">SELECCIONE UN ARCHIVO:</label>
                <input type="file" name="profile" id="profile">
            </div>
                   
                    <div class="info-my_profile update">
                    <h1>Editar Información de usuario:</h1>
                    <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['idUser'];?>">
                        <label for="name">Nombre de usuario:</label>
                        <input type="text" id="username" name="username" class="input-text" value="<?php echo $p[0]['username'];?>">
                        <label for="name">Nombre :</label>
                        <input type="text" id="name" name="name" class="input-text" value="<?php echo $p[0]['nombre'];?>">
                        <label for="name">Apellido Paterno:</label>
                        <input type="text" id="paterno" name="paterno" class="input-text" value="<?php echo $p[0]['paterno'];?>">
                        <label for="name">Apellido Materno:</label>
                        <input type="text" id="materno" name="materno" class="input-text" value="<?php echo $p[0]['materno'];?>">
                        <label for="name">Numero de telefono:</label>
                        <input type="num" id="telefono" name="telefono" class="input-text" value="<?php echo $p[0]['telefono'];?>">
                        <label for="name" class="label-date">Fecha de Nacimiento:</label>
                        <input type="date" id="nacimiento" name="nacimiento" class="input-date">
                    </div>
                        <a href="<?php echo URL_RAIZ;?>profile/profile">
                            <div class="btn-cancelar">CANCELAR </div>
                        </a>
                        <button type="submit" class="btn-save">GUARDAR</button>      
            </form>
            
            </div>
                </div>
            </div>
        </div>


        </div>
</body>
</html>