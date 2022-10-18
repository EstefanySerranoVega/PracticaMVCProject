

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuesta Ecommerce</title>
    <link rel="stylesheet" href="<?php echo URL_RAIZ.STYLE;?>home.css">

</head>

<body>
    <div class="container-page">
        <?php 
  require_once('views/header.php'); ?>
        
    <div class="container-gral">
            <div class="hero">
                <div class="img-producto_hero">
                    <img src="<?php echo URL_RAIZ.IMG;?>audifonos.webp" alt="">
                </div>

                <div class="info-producto_hero">
                    <h1>TITULO PUBLICIDAD DEL PRODUCTO!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, expedita! Hic, ullam quasi! Illo, cumque laudantium? Mollitia corporis praesentium consequatur, tenetur ut quia molestiae molestias commodi ratione facere et?
                        Ducimus?
                    </p>
                    <button>Ver producto</button>
                </div>
            </div>
            <div class="container">
                <div class="section-category">
                    <div class="category"></div>
                    <div class="category"></div>
                    <div class="category"></div>
                    <div class="category"></div>
                    <div class="category"></div>
                    <div class="category"></div>
                </div>
            <section class="section-destacados">
                <div class="title-section_destacados">
                    <h1>Productos destacados</h1>
                </div>
                <div class="section-productos_destacados">
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                </div>
            </section>
            <section class="section-ultimos">
                <div class="title-section_ultimos">
                    <h1>Ultimos productos</h1>
                </div>
                <div class="section-productos_ultimos">
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                    <div class="card-producto"></div>
                </div>
            </section>
            </div>
         
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>