<?php 
if($_GET['id']){
        $id = $_GET['id'];
        require_once('Clases/sectionCategoryModel.php');
        $category = new sectionCategoryModel();
        $c = $category->getNameCategory($id);
}else{
        echo'no se encontró el item';
}
?>

<link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>formCategoria.css">
<div class="category">

<div class="section-category">
                <div class="categoria">
        <h2>Actualizar CATEGORIA: </h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/updateCategoria" method = "post">
                <input type="text" name="id" id="id" value = "<?php echo $c[0]['id_categoria']?>">
               <label for="nameCategory">Nombre de la categoria: </label>  
                <input type="text" name="nombreCategoria" id="nombreCategoria" value = "<?php echo $c[0]['nombre_categoria']?>">
                <input type="submit" value="GUARDAR" class="button">  
        </form>
                </div>
            </div>

</div>