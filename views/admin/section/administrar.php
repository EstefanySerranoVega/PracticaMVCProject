<?php
    require_once('Models/ProductoModel.php');
    $producto = new ProductoModel();
    $p = $producto->getAll();

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

<div class="option-section_administrar">
    <div class="option">Editar slider</div>
    <div class="option">Editar seccion de productos</div>
    <div class="option">Editar categorias</div>
</div>
<div class="container-administrar">
    <div class="container-editar_slider">
        <div class="producto-slider">
<div class="select-producto">
<label for="producto">SELECCIONE UN PRODUCTO:</label>
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
 
</div>
<div class="img-producto">
    
<img src="<?php echo $p[$i]['IMG_PRODUCTO']?>" alt="imagen del producto seleccionado">
</div>
        </div>
        <div class="texto-slider">
            <label for="title">Escriba el Encabezado del Slider</label>
            <input type="text" name="title" id="slider">
            <label for="texto">Escriba el texto del Slider</label>
            <textarea name="txt-slider" id="txt-slider" cols="30" rows="10">

            </textarea>
        </div>
    </div>
</div>
   </div>
   </div>
</body>
</html>