<?php

    session_start();

    if(isset($_SESSION['Username'])){
        header("location: Perfil.php");
        
    }

?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="EstiloInic.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <title>Inicio de Sesión</title>
    </head>

    <body>
        
        <!--NAVBAR-->
        <header class="header">
            <div class="logo">
                <a href="Index.html"> <img src="LogoL.png" alt="Logo de la marca"> </a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="Index.html"> Inicio </a></li>
                    <li><a href="Bebidas.php">Bebidas</a></li>
                    <li><a href="Pasteles.php">Pasteles</a></li>
                    <li><a href="Panes.php">Panes</a></li>
               </ul>            
            </nav>
            <a class="btn" href="ArchivosPHP/cerrar_sesion.php"><button> Cerrar Sesión </button></a>
        


            <a onclick="openNav()" class="menu" href="#"><button>Menú</button></a>
            <div id="mobile-menu" class="overlay">
                <a onclick="closeNav()" href="" class="close">&times;</a>
                <div class="overlay-content">
                    <a href="Index.html"> Inicio </a>
                    <a href="Bebidas.php">Bebidas</a>
                    <a href="Pasteles.php">Pasteles</a>
                    <a href="Panes.php">Panes</a>
                </div>
            </div>

        </header>

        <script type="text/javascript" src="nav.js"></script>


        <!--Formulario de Inicio de Sesión-->
        <div class="formulario">
            <h1>Inicio de Sesión</h1>
            <form method="POST" action="ArchivosPHP/login_usuario_be.php">
            
                <div class="usuario">
                    <label> Nombre de usuario: </label>
                    <br>
                    <input type="text" name="Username" required>
                </div>

                <div class="usuario">
                    <label> Contraseña: </label>
                    <br>
                    <input type="password" name="Password" required>
                </div>
            
                <div class="inic">
                    <a href="Index.html" target="_blank"><button> Iniciar Sesión </button></a>
                </div>
            
                <br>
                <div class="recordar">
                    <a href="RecordarCont.html"> ¿Olvidó su contraseña? </a>
                </div>

                <div class="registro">
                    ¿No tienes cuenta?  <a href="RegistrarCuenta.php"> Regístrate. </a>
                </div>
                
            </form>
        </div>

    </body>

</html>