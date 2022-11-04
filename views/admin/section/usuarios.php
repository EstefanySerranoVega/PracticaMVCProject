  <?php
    $users = new sectionUsersModel(); 
    $u = $users->getAllUsers(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>sectionUsuarios.css">
</head>
<body>
<?php
   require_once('views/admin/section/header.php') ;
   require_once('views/admin/section/menuLateral.php') ;?>
 
 <div class="container-gral">
            <div class="nav-search">
                <div class="section-search">
                    <div class="search">
                        <input type="search" name="input-search" id="input-search">
                    </div>
                    <div class="btn-filter">
                        <button>FILTER</button>
                    </div>
                </div>
                <div class="btn-new">
                    <button>
                        <div class="icon-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        </div>NUEVO PRODUCTO</button>
                </div>
            </div>
            <div class="table-container">
                <div class="table-grid">
                    <div class="header-table">
                        <div class="cell-header">Nombre</div>
                        <div class="cell-header">Paterno</div>
                        <div class="cell-header">Rol</div>
                        <div class="cell-header">Telefono</div>
                        <div class="cell-header">nombre usuario</div>
                        <div class="cell-header">estado</div>
                        <div class="cell-header">accion</div>
                    </div>
                    <div class="body-table">
                    <?php
              for($i=0;$i<count($u);$i++){ 
                ?>
                        <div class="row-table">

                            <div class="cell-table">
                                <?php echo $u[$i]['name']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $u[$i]['paterno']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $u[$i]['rol']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $u[$i]['telefono']; ?> 
                            </div>
                            <div class="cell-table">
                                <?php echo $u[$i]['username']; ?>
                            </div>
                            <div class="cell-table">
                                <?php echo $u[$i]['estado']; ?>
                            </div>
                            <div class="cell-table">
                                <div class="icons-table">
                                    <div class="icon-action" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                    </div>
                                    <div class="icon-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
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