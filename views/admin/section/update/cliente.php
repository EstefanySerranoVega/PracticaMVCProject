<?php 
if($_GET['id']){
    $id = $_GET['id'];
    echo $id;
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
</head>
<body>
    <div class="container">
        <form action="<?php echo URL_RAIZ;?>sectionUsers/updateItem" method="post">
        <input type="hidden" name="id" value="<?php echo $u[0]['id_user'];?>">
        <input type="hidden" name="idP" value="<?php echo $u[0]['id_persona'];?>">
           <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $u[0]['name'];?>">
            <label for="paterno">Apellido Paterno:</label>
            <input type="text" name="paterno" id="paterno" value="<?php echo $u[0]['paterno'];?>">
        
            <label for="materno">Apellido Materno:</label>
            <input type="text" name="materno" id="materno" value="<?php echo $u[0]['materno'];?>">
        
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $u[0]['telefono'];?>">
            <label for="nacimiento">Nacimiento:</label>
            <input type="text" name="nacimiento" id="nacimiento" value="<?php echo $u[0]['nacimiento'];?>" readonly>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" value="<?php echo $u[0]['correo'];?>" readonly>
        
            <label for="username">Nombre de Usuario:</label>
            <input type="text" name="username" id="username" value="<?php echo $u[0]['username'];?>">
        <input type="submit" value="ACTUALIZAR">
        </form>
    </div>
</body>
</html>