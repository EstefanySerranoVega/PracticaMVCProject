<?php
if($_GET['id']){
    $id = $_GET['id'];
    require_once('Clases/sectionProviderModel.php');
    $provider = new sectionProviderModel();
    $p = $provider->getDataProvider($id);
}else{
    echo 'El proveedor no ha sido encontrado';
}
?>

<link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>updateProvider.css">
<body class="body-formprovider">
<div class="provider">
<div class="section-provider">
                <div class="proveedor">
                    
        <h2>UPDATE PROVEEDOR:</h2>
        <form action="<?php
                echo constant('URL_RAIZ');?>Dashboard/updateProveedor" method = "post">
               <input type="hidden" name="id" id="id" value = "<?php echo $p[0]['id_proveedor'];?>">    
              
            <label for="prov">Empresa proveedor:</label>
            <input type="text" name="empresaProveedor" id="empresaProveedor" value = "<?php echo $p[0]['empresa_proveedor'];?>">    
            <label for="email">Correo proveedor:</label>
            <input type="email" name="correoProveedor" id="correoProveedor" value = "<?php echo $p[0]['correo_proveedor'];?>">
            <input type="submit" value="GUARDAR" class="button">  
            </form> 
                </div>
            </div>

</div>
</body>
