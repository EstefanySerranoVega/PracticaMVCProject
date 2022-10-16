

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuesta Ecommerce</title>
    <link rel="stylesheet" href="views/Home/style.css">

</head>

<body>
    <div class="container-page">
        <?php 
  require_once('views/header.php'); ?>
        
    <h2>Selecciona un link: </h2>
    <div class="container">
            <div class="hero">
                <div class="info-producto_hero">
                    <h1>TITULO PUBLICIDAD DEL PRODUCTO!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, expedita! Hic, ullam quasi! Illo, cumque laudantium? Mollitia corporis praesentium consequatur, tenetur ut quia molestiae molestias commodi ratione facere et?
                        Ducimus?
                    </p>
                    <button>Ver producto</button>
                </div>
                <div class="img-producto_hero">
                    <img src="img/banner-gaming.webp" alt="">
                </div>
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
                </div>
            </section>
        </div>
        <footer class="footer"></footer>
    </div>
</body>

</html>