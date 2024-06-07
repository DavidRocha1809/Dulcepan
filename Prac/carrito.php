<?php

    session_start();
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="Style_Carrito.css">
    <style>
        
    </style>
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
                    <a href="carrito.php"><a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a></a>
                    
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

    <!--    CONTENIDO PRINCIPAAAALLLLLLL    -->
    <div class="contenedor-carrito-real">   
        <div class="carrito">
            <h1>Carrito de Compras</h1>
            <p>Revisa y completa tu pedido.</p>
            <?php if (empty($_SESSION['carrito'])) { ?>
                <p>Tu carrito está vacío.</p>
            <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $subtotal = 0;
                        foreach ($_SESSION['carrito'] as $index => $item) {
                            $total_producto = $item['precio'] * $item['cantidad'];
                            $subtotal += $total_producto;
                    ?>
                    <tr>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo ucfirst($item['categoria']); ?></td> <!-- Mostrar la categoría -->
                        <td><?php echo $item['cantidad']; ?></td>
                        <td><?php echo '$' . number_format($total_producto, 2); ?></td>
                        <td>
                            <form method="post" action="eliminar_carrito.php">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit" class="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="resumen">
                <h2>Resumen del Pedido</h2>
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td><?php echo '$' . number_format($subtotal, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Envío</td>
                        <td>Gratis</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?php echo '$' . number_format($subtotal, 2); ?></td>
                    </tr>
                </table>
            </div>
            <div class="pagar">
                <form method="post" action="verificar_sesion.php">
                    <button type="submit">Proceder al Checkout</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>


</body>
</html>