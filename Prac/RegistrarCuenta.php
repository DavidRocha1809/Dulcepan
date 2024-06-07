<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="EstiloRegis.css" type="text/css">
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
            <a class="btn" href="InicioSesion.php"><button> Iniciar Sesión </button></a>


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
        
        <!--Formulario de Registro-->
        <div class="formulario">
            <h1>Registro</h1>
            <form method="POST" action="ArchivosPHP/registro_usuario_be.php">

                <div class="registro">  
                    <label> Usuario: </label>
                    <br>
                    <input type="text" name="Username" required>
                </div>

                <div class="registro">
                    <label> Correo: </label>
                    <br>
                    <input type="email" name="Email" required>
                </div>

                <div class="registro">
                    <label> Contraseña: </label>
                    <br>
                    <input type="password" name="Password"   required>
                </div>
            
                <div class="inic">
                    <a href="InicioSesion.php" target="_blank"><button> Crear Cuenta </button></a>
                </div><br>
                
            </form>
        </div>

    </body>

</html>