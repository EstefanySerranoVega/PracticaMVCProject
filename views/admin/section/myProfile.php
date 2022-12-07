<?php

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
   require_once('helpers/html/menuLateral.php');?>
   
        <div class="container-gral">
            <div class="container-my_profile">
                <div class="avatar">
                    <div class="icon">
                        <img src="<?php echo URL_RAIZ.AVATAR;?>avatar5.png" alt="">
                    </div>
                    <div class="option-avatar">
                        <label for="username">Username</label>
                        <div class="icon update-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                    </svg>
                        </div>
                    </div>
                </div>
                <div class="info-my_profile">
                    <form action="">
                    <h1>Editar Información de usuario:</h1>
                    <label for="name">Nombre de usuario:</label>
                    <input type="text" class="input-text">
                    <label for="name">Nombre :</label>
                    <input type="text" class="input-text">
                    <label for="name">Apellido Paterno:</label>
                    <input type="text" class="input-text">
                    <label for="name">Apellido Materno:</label>
                    <input type="text" class="input-text">
                    <label for="name">Numero de telefono:</label>
                    <input type="text" class="input-text">
                    <label for="name" class="label-date">Fecha de Nacimiento:</label>
                    <input type="date" class="input-date">
                    <label for="name" class="label-role">Rol de Usuario:</label>
                    <input type="text" class="input-role">
                    <label for="name">Cambiar Contraseña:</label>
                    <input type="text" class="input-text">
                    <label for="name">Confirmar contraseña:</label>
                    <input type="text" class="input-text">
                    <input type="submit" class="btn-save" value="Guardar cambios">
                </form>
                </div>
            </div>
        </div>


        </div>
</body>
</html>