<div class="categoria">
        <h2>NUEVA CATEGORIA: </h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/newCategoria" method = "post">
                <label for="nameCategory">Nombre de la categoria: </label>  
                <input type="text" name="nombreCategoria" id="nonmbreCategoria">
                <input type="submit" value="GUARDAR" class="button">  
        </form>
 </div>