
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>sectionClientes.css">
</head>
<body>
<?php
   require_once('helpers/html/header.php') ;
   require_once('helpers/html/menuLateral.php');?>
 
 <div class="container-gral">
    <?php 
require_once('helpers/html/menuDashboard.php'); ?>
            <div class="table-container">
            <?php
    $cliente = new sectionClientesModel(); 
    $c = $cliente->getAllClientes(); 
?>

                <div class="table-grid">
                <div class="header-table">
                        <div class="cell-header">Nombre</div>
                        <div class="cell-header">Paterno</div>
                        <div class="cell-header">Materno</div>
                        <div class="cell-header">Telefono</div>
                        <div class="cell-header">Nombre Usuario</div>
                        <div class="cell-header">Direccion</div>
                        <div class="cell-header">Correo</div>
                        <div class="cell-header">Accion</div>
                    </div>
                    <div class="body-table">
                    <?php
              for($i=0;$i<count($c);$i++){ ?>
                        <div class="row-table">

                            <div class="cell-table">
                                <?php echo $c[$i]['nombre_persona']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $c[$i]['paterno_persona']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $c[$i]['materno_persona']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $c[$i]['telefono_persona']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $c[$i]['nombre_usuario']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $c[$i]['direccion_cliente']; ?>
                            </div> <div class="cell-table">
                                <?php echo $c[$i]['correo_cliente']; ?>
                            </div>
                            <div class="cell-table">
                                <div class="icons-table">
                                    <div class="icon-action" >
                                        <a href="<?php echo URL_RAIZ;?>sectionClientes/update?id=<?php echo $c[$i]['id']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>        
                                        </a>
                                   </div>
                                    <div class="icon-action">
                                        <a href="<?php echo URL_RAIZ;?>sectionClientes/deleteItem?idc=<?php echo $c[$i]['id_c'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
</html>