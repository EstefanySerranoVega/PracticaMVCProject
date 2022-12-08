<?php
    require_once('Models/ProductoModel.php');
    $producto = new ProductoModel();
    $p = $producto->getAll();
    
require_once('Clases/sectionAdministrarModel.php');
$slider = new sectionAdministrarModel();
$sl = $slider->getDataSlider();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>sectionAdministrar.css">
</head>
<body>
<?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');?>

<div class="container-gral">
<div class="container-administrar">
    <div class="container-editar_slider">
<div class="container-img">
    <div class="header-img">
        <form action="<?php echo URL_RAIZ;?>sectionAdministrar/UpdateImg" method="post" class="form-update_img">
            <label for="image">Cambiar producto:</label>
            <select name="id" id="id">
            <?php   
                  for($i=0; $i<count($p);$i++){
                   ?>
                <option value="<?php echo $p[$i]['ID_PRODUCTO'];?>">
                <?php echo $p[$i]['NOMBRE_PRODUCTO'];?>
                 </option>
               <?php 
               }
                ?>
            </select>
            <button type="submit">GUARDAR</button>
        </form>
    </div>
    <div class="img-producto">
    
<img src="<?php echo URL_RAIZ.IMG.$sl[0]['img']?>" alt="imagen del producto seleccionado">
</div>
</div>
        <div class="descripcion-slider">
            <div class="titulo-slider">
            <h1><?php echo $sl[0]['titulo']?></h1>
            <form action="<?php echo URL_RAIZ;?>sectionAdministrar/UpdateTitulo" method="post" class="form-update_titulo">
                <label for="titulo">Escriba un título nuevo:</label>
                <input type="text" name="titulo" id="titulo">
            <button type="submit">GUARDAR</button>
            </form>
            </div>
            <div class="texto-slider">
            <p><?php echo $sl[0]['texto']?></p>
            <form action="<?php echo URL_RAIZ;?>sectionAdministrar/UpdateTexto" method="post" class="form-update_texto">
                <label for="texto">Escriba una descripcion nueva:</label>
                <textarea type="text" name="texto" id="texto" cols="30" rows="10">
                    
                </textarea>
            <button type="submit">GUARDAR</button>
            </form>
            </div>
        </div>
    </div>
</div>
   </div>
   </div>
</body>
</html>