<?php

    session_start();

    include 'conexion_be.php';
    
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Validar login de usuario
    $validar_login = mysqli_query($conexion, "SELECT * FROM user WHERE Username='$Username' and Password='$Password'");

    // Validar login de administrador
    $validar_loginAd = mysqli_query($conexion, "SELECT * FROM admin WHERE Username='$Username' and Password='$Password'");


    // Buscando usuario
    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['Username'] = $Username;
        $_SESSION['UserType'] = 'user'; // Guardar el tipo de usuario en la sesión
        header("location: ../Index.html");
        exit();
        //Buscando administrador
    } elseif (mysqli_num_rows($validar_loginAd) > 0) {
        $_SESSION['Username'] = $Username;
        $_SESSION['UserType'] = 'admin'; // Guardar el tipo de usuario en la sesión
        header("location: ../Index.html");
        exit();
    } else {
        echo '
            <script>
                alert("El usuario o contraseña son incorrectos, por favor verifique los datos introducidos");
                window.location = "../InicioSesion.php";
            </script>
        ';
        exit();
    }

    


?>