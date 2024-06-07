<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    $to = $email;
    $subject = "Gracias por suscribirse a DulcePan";
    $message = "Gracias por suscribirse a nuestro boletín. Pronto le llegarán más noticias de DulcePan.";
    $headers = "From: tuemail@tudominio.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado correctamente";
    } else {
        echo "Error al enviar el correo";
    }
} else {
    echo "Método no permitido";
}
?>
