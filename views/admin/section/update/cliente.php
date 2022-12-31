<?php 
if($_GET['id']){
    $id = $_GET['id'];
require_once('Clases/sectionClientesModel.php');
$user = new sectionClientesModel();
$u = $user->getClienteById($id);
}else{
        echo 'no se ha encontrado el usuario solicitado';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>update.css">

</head>
<body>
    <div class="container">
        <div class="cliente">
        <div class="option-form">
    <a href="<?php echo URL_RAIZ; ?>sectionCliente">  
                <div class="icon-back icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M109.3 288L480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288z"/>
                </svg>
                </div>
            </a>
    <a href="<?php echo URL_RAIZ;?>dashboard">
                
                <div class="icon-dashboard icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M290.8 48.6l78.4 29.7L288 109.5 206.8 78.3l78.4-29.7c1.8-.7 3.8-.7 5.7 0zM136 92.5V204.7c-1.3 .4-2.6 .8-3.9 1.3l-96 36.4C14.4 250.6 0 271.5 0 294.7V413.9c0 22.2 13.1 42.3 33.5 51.3l96 42.2c14.4 6.3 30.7 6.3 45.1 0L288 457.5l113.5 49.9c14.4 6.3 30.7 6.3 45.1 0l96-42.2c20.3-8.9 33.5-29.1 33.5-51.3V294.7c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-1.3-.5-2.6-.9-3.9-1.3V92.5c0-23.3-14.4-44.1-36.1-52.4l-96-36.4c-12.8-4.8-26.9-4.8-39.7 0l-96 36.4C150.4 48.4 136 69.3 136 92.5zM392 210.6l-82.4 31.2V152.6L392 121v89.6zM154.8 250.9l78.4 29.7L152 311.7 70.8 280.6l78.4-29.7c1.8-.7 3.8-.7 5.7 0zm18.8 204.4V354.8L256 323.2v95.9l-82.4 36.2zM421.2 250.9c1.8-.7 3.8-.7 5.7 0l78.4 29.7L424 311.7l-81.2-31.1 78.4-29.7zM523.2 421.2l-77.6 34.1V354.8L528 323.2v90.7c0 3.2-1.9 6-4.8 7.3z"/></svg>
                </div>
            </a>
    </div>
        <form action="<?php echo URL_RAIZ;?>sectionClientes/updateItem" method="post">
        <input type="hidden" name="cliente" value="<?php echo $u[0]['id_c'];?>">
        <input type="hidden" name="id" value="<?php echo $u[0]['id_user'];?>">
        <input type="hidden" name="idP" value="<?php echo $u[0]['id_persona'];?>">
           <div class="data">
           <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $u[0]['name'];?>">
            
           </div>
           <div class="data">
            <label for="paterno">Apellido Paterno:</label>
            <input type="text" name="paterno" id="paterno" value="<?php echo $u[0]['paterno'];?>">
        </div>
        <div class="data">
            <label for="materno">Apellido Materno:</label>
            <input type="text" name="materno" id="materno" value="<?php echo $u[0]['materno'];?>">
        </div>
        <div class="data">
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $u[0]['telefono'];?>">
            </div>
        <div class="data">
            <label for="telefono">Direccion:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $u[0]['direccion'];?>">
            </div>
            <div class="data">
        <label for="nacimiento">Nacimiento:</label>
            <input type="text" name="nacimiento" id="nacimiento" value="<?php echo $u[0]['nacimiento'];?>" readonly>
            
        </div>
        <div class="data">
        <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" value="<?php echo $u[0]['correo'];?>" readonly>
        
        </div>
    <div class="data">
    <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $u[0]['username'];?>">
            <input type="text" name="img" id="img" value="<?php echo $u[0]['img'];?>">
          
    </div>   
    <button type="submit" class="button">ACTUALIZAR </button>
        
        
        </form>
        </div>
  
    </div>
</body>
</html>