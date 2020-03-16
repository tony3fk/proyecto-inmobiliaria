<?php


function enviaMail($email)
{
    $para = $email; //aquí mail del registrado
    $asunto = "Alta repositorio de alimentos";
    $mensaje = "<hr>";
    $mensaje .= "<h2>Bienvenido al repositorio de alimentos </h2><br>";
    $mensaje .= "<hr>";

    // Para enviar correo HTML, la cabecera Content-type debe definirse
    $cabeceras  = "MIME-Version: 1.0\n";
    $cabeceras .= "Content-type: text/html; charset=UTF-8\n";

    // Cabeceras adicionales
    $cabeceras .= "From: Tony <mail@yahoo.es>\n";
    $cabeceras .= "To: <" . $email . ">\n";
    $cabeceras .= "Reply-To: mail@gmail.com\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Enviarlo
    mail($para, $asunto, $mensaje, $cabeceras);
}
