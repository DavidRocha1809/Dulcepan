<?php
    
    //Mandamos a llamar al documento php donde se encuentra la conexión
    require 'config/database.php';

    //Asignamos variables de las 2 clases de la conexión
    $db = new Database();
    $con = $db->conectar();

    //Ejecuta sentencia cuando la disponibilidad de una bebida == 1 en la BD
    $sql = $con->prepare("SELECT idbebidas, Nombre, Precio FROM bebidas WHERE disponibilidad=1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repostería</title>
    <link rel="stylesheet" href="StyleBebidas.css">
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
                    <h1 class="logo"><a href="../index.html">DulcePan</a></h1>
                </div>

                <div class="contenedor-usuario">

                    <a href="InicioSesion.php"><i class="fa-regular fa-user"></i></a>
                    <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>

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
        <h2>¡Bienvenido a la selección de BEBIDAS!</h2>
    </div>
    
    <!--Tarjetas de los productos-->
    <div class="contenedor">
        
        <?php foreach ($resultado as $row) { ?>
            <div class="tarjeta">
                <?php
                    //busca el id de cada bebida para abrir la carpeta correspondiente a su imagen
                    $id = $row['idbebidas'];
                    $imagen = "Productos_bebidas/" . $id . "/bebida.jpg";

                    //Si el valor id no tiene una carpeta con img, agrega una img "dañada"
                    if(!file_exists($imagen)){
                        $imagen = "Productos_bebidas/no-photo.png";
                    }

                ?>
                <img class="tarjeta-img" src="<?php echo $imagen; ?>" alt="Img Producto">
                <div class="tarjeta-body">
                    <h3 class="tarjeta-title"> <?php echo $row['Nombre']; ?> </h3>
                    <p class="tarjeta-precio"> $<?php echo $row['Precio']; ?> </p>
                    
                    <!--FORMULARIO QUE PERMITE AGREGAR PRODUCTOS AL CARRITO-->
                    <form method="post" action="agregar_carrito.php">
                        <input type="hidden" name="id" value="<?php echo $row['idbebidas']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $row['Nombre']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $row['Precio']; ?>">
                        <input type="hidden" name="cantidad" value="1" class="cantidad">
                        <input type="hidden" name="categoria" value="bebida">
                        <button type="submit" class="tarjeta-agregar">AGREGAR</button>
                    </form>

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
