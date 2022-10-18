<div class="producto">
        <h2>NUEVO PRODUCTO: </h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/newProducto" method = "post">
              
            <label for="nameProducto">Nombre del Producto: </label>
            <input type="text" name="nameProducto" id="nameProducto">
            <label for="selectCat" id="selectCat">Categoria: </label>
            
            <select name="category" id="category">
                <?php 
                $Dashboard = new DashboardModel(); 
                $category = $Dashboard->getAllCategory();
                $res = [];
                for($i=0;$i<count($category);$i++){
                  array_push($res,$category[$i][1]); ?>
                  
       <option value="<?php echo $category[$i][0] ?>">
                <?php echo $category[$i][1]?>
                 </option>
               <?php }
                ?>
        
            </select>
            <label for="cod" id="codigoProducto">Codigo: </label>
            <input type="text" name="codigoProducto" id="codigoProducto">
            <label for="cant" id="cant">Cantidad Producto: </label>
            <input type="number" name="cantidadProducto" id="cantidadProducto">
            <label for="precio" id="precio">Precio de venta: </label>
            <input type="number" name="precioVenta" id="precioVenta">
            <input type="file" name="imgProducto" id="imgProducto">
            <input type="submit" value="GUARDAR">  
        </form>
        </div>