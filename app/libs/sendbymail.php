<?php
include_once('utils.php');

if (isset($_POST['bEmail'])) {
    $para = "tony3fk@gmail.com"; //aquí mail del registrado

    $asunto = recoge('subject');
    $mensaje = "<hr>";
    $mensaje .= recoge('message') . "<br>" . date('H:i:s--d-m-Y', time());
    $mensaje .= "<hr>";

    // Para enviar correo HTML, la cabecera Content-type debe definirse
    $cabeceras  = "MIME-Version: 1.0\n";
    $cabeceras .= "Content-type: text/html; charset=UTF-8\n";

    // Cabeceras adicionales
    $cabeceras .= "From: " . recoge('name') . "\n";
    $cabeceras .= "To: $para \n";
    $cabeceras .= "Reply-To: " . recoge('email') . "\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Enviarlo
    if (mail($para, $asunto, $mensaje, $cabeceras)) {
        echo '<script>alert("Mensaje enviado");</script>';
        header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=inicio');
    } else {
        header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=error&msg="No se ha podido mandar el email"');
        //return "No se ha podido mandar el email";
    }
}


    
// if (isset($_POST['bEmail'])) {

//     // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
//     $email_to = "tony3fk@gmail.com";
//     $email_subject = "Contacto desde Gestion Inmobiliaria";

//     // Aquí se deberían validar los datos ingresados por el usuario
//     /*if (
//         !isset($_POST['name']) ||
//         !isset($_POST['email']) ||
//         !isset($_POST['subject']) ||
//         !isset($_POST['message'])
//     ) {

//         echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
//         echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
//         die();
//     }*/
//     $email_from = $_POST['email'];
//     $email_message = "Detalles del formulario de contacto:\n\n";
//     $email_message .= "Nombre: " . $_POST['name'] . "\n";
//     $email_message .= "E-mail: " . $_POST['email'] . "\n";
//     $email_message .= "Teléfono: " . $_POST['subject'] . "\n";
//     $email_message .= "Comentarios: " . $_POST['message'] . "\n\n";


//     // Ahora se envía el e-mail usando la función mail() de PHP
//     $headers = 'From: ' . $email_from . "\r\n" .
//         'Reply-To: ' . $email_from . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();
//     mail($email_to, $email_subject, $email_message, $headers);

//     echo "¡El formulario se ha enviado con éxito!";
// }
