<?php

    
    require 'config/database.php';

    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT idpanes, Nombre, Precio FROM panes WHERE disponibilidad=1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pan Dulce</title>
    <link rel="stylesheet" href="EstiloPan.css">
    <link rel="icon" href="ico/logo.ico">
</head>

<body>

    <script 
    src="https://kit.fontawesome.com/91432b6ee0.js" 
    crossorigin="anonymous">
    </script>

    <!--NAV-->
    <header>
        <div class="contenedor-hero">
            <div class="contenedor hero">
                <div class="contenedor-soporte">
                    <i class="fa-solid fa-headset"></i>
                    <div class="contenido-contenedor-soporte">
                        <span class="texto">Ayuda</span>
                        <span class="numero">+52 56-678-893</span>
                    </div>
                </div>
                <div class="contenedor-logo">
                    <h1 class="logo"><a href="index.html">DulcePan</a></h1>
                </div>

                <div class="contenedor-usuario">

                    <a href="InicioSesion.php"><i class="fa-regular fa-user"></i></a>
                    <i class="fa-solid fa-cart-shopping"></i>

                    <div class="contenedor-carrito">
                        <span class="text">Carrito</span>
                        <span class="number">
                            (0)
                        </span>
                    </div>

                </div>

            </div>
        </div>

        <div class="contenedor-navbar">
            <i class="fa-solid fa-bars"></i>
            <nav class="navbar container">
                <ul class="menu">
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="Blog.html">Blog</a></li>
                    <li><a href="Bebidas.php">Bebidas</a></li>
                    <li><a href="Pasteles.php">Pasteles</a></li>
                    <li><a href="Panes.php">Panes</a></li>
                </ul>

                <form class="busqueda">
                    <input type="search" placeholder="Buscar...">
                    <button class="btn-buscar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </nav>
        </div>
    </header>


        <!--TITULO DEL CONTENIDO PRINCIPAL DEL BODY-->
        <div class="titulo">
            <h2>¡Bienvenido a la selección de PANES!</h2>
        </div>
        
        <!--Tarjetas de los productos-->
        <div class="contenedor">
        <?php foreach ($resultado as $row) { ?>
            <div class="tarjeta">
                <?php
                    $id = $row['idpanes'];
                    $imagen = "Productos_panes/" . $id . "/pan.jpg";

                    if(!file_exists($imagen)){
                        $imagen = "Productos_panes/no-photo.png";
                    }

                ?>
                <img class="tarjeta-img" src="<?php echo $imagen; ?>" alt="Img Producto">
                <div class="tarjeta-body">
                    <h3 class="tarjeta-title"> <?php echo $row['Nombre']; ?> </h3>
                    <p class="tarjeta-precio"> $<?php echo $row['Precio']; ?> </p>
                    <div class="tarjeta-cantidad">
                        <button class="tarjeta-btn">-</button>
                        <span class="tarjeta-num">1</span>
                        <button class="tarjeta-btn">+</button>
                    </div>
                    <button class="tarjeta-agregar">AGREGAR</button>
                </div>
                
            </div>
            <?php } ?>

        </div>

        
    <!--FOOTER-->
    <footer class="footer">
        <div class="container container-footer">
            <div class="menu-footer">
                <div class="contact-info">
                    <p class="title-footer">Informacion de Contacto</p>
                    <ul>
                        <li>Direccion: iztacalco 105</li>
                        <li>Telefono: +52 56-678-893</li>
                        <li>Email: </li>
                    </ul>
                    <div class="social-icons">
                        <span class="Facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </span>
                        <span class="Twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                        <span class="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </span>
                        <span class="Tiktok">
                            <i class="fa-brands fa-tiktok"></i>
                        </span>
                        <span class="Pinterest">
                            <i class="fa-brands fa-pinterest"></i>
                        </span>
                    </div>
                </div>

                <div class="information">
                    <p class="title-footer">Informacion</p>
                    <ul>
                        <li><a href="#">Acerca de Nosotros</a></li>
                        <li><a href="#">Informacion Delivery</a></li>
                        <li><a href="#">Politicas de Privacidad</a></li>
                        <li><a href="#">Terminos y condiciones</a></li>
                        <li><a href="#">Contactanos</a></li>
                    </ul>
                </div>

                <div class="my-account">
                    <p class="title-footer">Mi cuenta</p>
                    <ul>
                        <li><a href="#">Mi cuenta</a></li>
                        <li><a href="#">Historial de ordenes</a></li>
                        <li><a href="#">Lista de deseos</a></li>
                        <li><a href="#">Boletin</a></li>
                        <li><a href="#">Reembolsos</a></li>
                    </ul>
                </div>

                <div class="newaletter">
                    <p class="title-footer">Boletin Informativo</p>
                    <div class="content">
                        <p>
                            Suscribete a nuestros boletines ahora y mantente al
                             dia con nuevas colecciones y ofertas exclusivas
                        </p>
                        <input type="email" placeholder="Ingresa el correo aqui...">
                        <button>Suscribete</button>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>
                    Desarrollado por David Rocha y Joshua Sanchez &copy; 2024
                </p>

                
            </div>
        </div>
    </footer>

   
</body>
</html>
