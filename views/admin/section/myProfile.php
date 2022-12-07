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
                <div class="avatar">
                    <div class="icon">
                        <img src="<?php echo URL_RAIZ.AVATAR.$p[0]['profile'];?>" alt="">
                    </div>
                    <div class="option-avatar">
                        <label for="username"><?php echo $p[0]['username'];?></label>
                        <div class="icon update-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                    </svg>
                        </div>
                    </div>
                </div>
                <div class="info-my_profile">
                    <form action="" class="form-data">
                    <h1>Editar Información de usuario:</h1>
                    <label for="username">Nombre de usuario:</label>
                    <label for="username"><?php echo $p[0]['username'];?></label>
                    <label for="name">Nombre :</label>
                    <label for="name"><?php echo $p[0]['nombre'];?></label>
                    <label for="paterno">Apellido Paterno:</label>
                    <label for="paterno"><?php echo $p[0]['paterno'];?></label>
                    <label for="materno">Apellido Materno:</label>
                    <label for="materno"><?php echo $p[0]['materno'];?></label>
                    <label for="telefono">Numero de telefono:</label>
                    <label for="telefono"><?php echo $p[0]['telefono'];?></label>
                    <label for="nacimiento" class="label-date">Fecha de Nacimiento:</label>
                    <label for="nacimiento"><?php echo $p[0]['nacimiento'];?></label>
                    <a href="<?php echo URL_RAIZ;?>profile/update">
                    <div class="btn-save">
                        Actualizar Informacion
                    </div></a>
                    
                </form>
                </div>

            </div>
        </div>


        </div>
</body>
</html>