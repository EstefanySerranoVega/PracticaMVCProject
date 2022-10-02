<?php
echo 'Estás en la vista Home';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propuesta Ecommerce</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.container-page {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
}

header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  height: 5rem;
}

header nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 95%;
}

nav .logo {
  width: 8rem;
  height: 3.5rem;
  border-radius: 1rem;
  background: greenyellow;
}

nav menu {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 40%;
}

menu ul {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  list-style: none;
  color: #000;
}

menu ul li {
  margin: 0 4rem 0 0;
}

a {
  color: #000;
  text-decoration: none;
}

nav .buscador {
  width: 20rem;
  height: 3rem;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.buscador input {
  border-radius: 0.8rem;
  border: none;
  background: #f2f2f2;
  font-size: 1rem;
  height: 2rem;
  width: 98%;
}

.hero {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
}

.hero .info-producto_hero {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 41%;
  padding: 1rem;
  margin: 1rem;
}

.info-producto_hero h1 {
  padding: 1rem;
  margin: 0.8rem;
}

.info-producto_hero p {
  padding: 0.5rem;
  margin: 0.8rem;
}

.info-producto_hero button {
  padding: 0.8rem;
  margin: 0.8rem;
  background: skyblue;
  border-radius: 0.8rem;
  border: none;
}

.hero .img-producto_hero {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 41%;
  overflow: hidden;
  height: 22rem;
  border-radius: 0.8rem;
}

.img-producto_hero img {
  width: 100%;
}

section {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
}

.title-section_destacados {
  width: 90%;
  text-align: center;
  margin: 1rem;
}

.section-productos_destacados {
  width: 90%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0.8rem;
}

.section-productos_destacados .card-producto {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 18rem;
  height: 20rem;
  border-radius: 0.8rem;
  background: red;
}

.section-productos_ultimos {
  width: 90%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0.8rem;
}

.title-section_ultimos {
  width: 90%;
  text-align: center;
  margin: 1rem;
}

.section-productos_ultimos .card-producto {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 22rem;
  height: 18rem;
  border-radius: 0.8rem;
  background: red;
}
    </style>
</head>

<body>
    <div class="container-page">
        <header class="header">
            <nav>
                <div class="logo"></div>
                <menu>
                    <ul>
                        <a href="#">
                            <li>INICIO</li>
                        </a>
                        <a href="#">
                            <li>PRODUCTOS</li>
                        </a>
                        <a href="#">
                            <li>BLOG</li>
                        </a>
                        <a href="#">
                            <li>CONTACTOS</li>
                        </a>
                    </ul>
                </menu>
                <div class="buscador">
                    <input type="text">
                </div>
            </nav>
        </header>
        
    <h1>FUNCIONA, Ahreee </h1>
    <h2>Selecciona un link: </h2>
    <a href="logout.php">Cerrar sesión</a>
    <a href="newUser.php">Registrarse</a>
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