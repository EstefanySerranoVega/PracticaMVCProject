<div class="proveedor">
                    
    <h2>NUEVO PROVEEDOR:</h2>
     <form action="<?php
                            echo constant('URL_RAIZ');?>Dashboard/newProveedor" method = "post">
                            
                        <label for="prov">Empresa proveedor:</label>
                        <input type="text" name="empresaProveedor" id="empresaProveedor">    
                        <label for="email">Correo proveedor:</label>
                        <input type="email" name="correoProveedor" id="correoProveedor">
                        <input type="submit" value="GUARDAR" class="button">  
                        </form>
                            
</div>