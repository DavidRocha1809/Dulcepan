<?php
        session_start();

        //si en la sesión no se encontró un usuario activo, mandar mensade de error(NO PERMITIR VER LA PÁGINA)
        if(!isset($_SESSION['Username'])){
            echo '
                <script>
                    alert("Por favor, debes iniciar sesión")
                    window.location = "InicioSesion.php"
                </script>
            ';
            session_destroy();
            die();
        }
        /*
        if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'admin') {
            echo 'Hello world';
        }*/
        //Extracción de tipo de usuario
        $UserType = $_SESSION['UserType'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Inmobiliaria</title>
    <link rel="stylesheet" href="StylePerfil.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
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
                <a href="SobreNosotros.html"> Sobre Nosotros </a>
                <a href="TuUbicacion.html"> Propiedades </a>
                <a href="Asesores.html"> Asesores </a>
            </div>
        </div>

    </header>

    <script type="text/javascript" src="nav.js"></script>


    <!--CREACIÓN DEL PERFIL-->
    <div class="container">
        <div class="card">
            <h2> <?php echo $_SESSION['Username']; ?> </h2>
        </div>
        <div class="card">
            <p><strong>Tipo:</strong> <?php echo htmlspecialchars($_SESSION['UserType']); ?></p>
        </div>
    </div>
    

    <!--====  CRUD validación  ====-->
    <!--====  Si el tipo de usuario es "admin", mostrar lo siguient  ====-->
    <?php if ($UserType == 'admin') : ?>

        <!-- Contenedor de Texto -->
        <div class="container-crud">
            <div class="box">
                    <h2>Sección CRUD: </h2>
            </div>
        </div>
        
        <!-- Contenedor de botones -->
        <div class="container-crud">            
            <div class="box">
                <h3> Gestión de Usuarios: </h3>
                <div class="linksCRUD">
                    <a href="../yii/paginayii/user" target="_blank"><button>Usuarios</button></a><br>
                    <a href="../yii/paginayii/admin" target="_blank"><button>Administradores</button></a>
                </div>
            </div>
            <div class="box">
                <h3> Productos: </h3>
                <div class="linksCRUD">
                    <a href="../yii/paginayii/panes" target="_blank"><button>Panes</button></a><br>
                    <a href="../yii/paginayii/bebidas" target="_blank"><button>Bebidas</button></a><br>
                    <a href="../yii/paginayii/pasteles" target="_blank"><button>Pasteles</button></a>
                </div>
            </div>
        </div>


    <?php endif; ?>

    

    


</body>

</html>
