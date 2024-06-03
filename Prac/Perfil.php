<?php
        session_start();

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
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="http://localhost/multimedia/relleno/img-c9.png" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $_SESSION['Username']; ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li>Nombre:  <?php echo htmlspecialchars($_SESSION['Username']); ?></li>
                    <li>Correo:  </li>
                    <li>Tipo:  <?php echo htmlspecialchars($_SESSION['UserType']); ?></li>
                </ul>
                
            </div>
            
        </div>
    </section>
    
    <!--====  CRUD validación  ====-->
    <?php if ($UserType == 'admin') : ?>
        <h2>Sección CRUD: </h2>
        <a href="../yii/paginayii/user" target="_blank"><button>Usuarios</button></a><br>
        <a href="../yii/paginayii/admin" target="_blank"><button>Administradores</button></a>
        <h2> Productos: </h2>
        <a href="../yii/paginayii/panes" target="_blank"><button>Panes</button></a><br>
        <a href="../yii/paginayii/bebidas" target="_blank"><button>Bebidas</button></a><br>
        <a href="../yii/paginayii/pasteles" target="_blank"><button>Pasteles</button></a>
    <?php endif; ?>

    

    


</body>

</html>
