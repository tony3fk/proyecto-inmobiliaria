<?php
include_once('utils.php');



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tony3fk@gmail.com';                     // SMTP username
    $mail->Password   = 'noralucia';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('tony3fk@gmail.com', 'Mailer');
    $mail->addAddress('', '');     // Add a recipient
    $mail->addAddress('');               // Name is optional
    $mail->addReplyTo(recoge('email'), recoge('name'));
    $mail->addCC('');
    $mail->addBCC('');

    // Attachments
    $mail->addAttachment('');         // Add attachments
    $mail->addAttachment('');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = recoge('subject');
    $mail->Body    = recoge('mensaje');
    $mail->AltBody = '';

    $mail->send();

    header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=inicio');
} catch (Exception $e) {
    header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=error&msg=' . $mail->ErrorInfo);
}

// if (isset($_POST['bEmail'])) {
//     $para = "tony3fk@gmail.com"; //aquí mail del registrado

//     $asunto = recoge('subject');
//     $mensaje = "<hr>";
//     $mensaje .= recoge('message') . "<br>" . date('H:i:s--d-m-Y', time());
//     $mensaje .= "<hr>";

//     // Para enviar correo HTML, la cabecera Content-type debe definirse
//     $cabeceras  = "MIME-Version: 1.0\n";
//     $cabeceras .= "Content-type: text/html; charset=UTF-8\n";

//     // Cabeceras adicionales
//     $cabeceras .= "From: " . recoge('name') . "\n";
//     $cabeceras .= "To: $para \n";
//     $cabeceras .= "Reply-To: " . recoge('email') . "\n";
//     $cabeceras .= "X-Mailer: PHP/" . phpversion();

//     // Enviarlo
//     if (mail($para, $asunto, $mensaje, $cabeceras)) {
//         echo '<script>alert("Mensaje enviado");</script>';
//         header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=inicio');
//     } else {
//         header('Location: https://gestioninmobiliaria.herokuapp.com/index.php?ctl=error&msg="No se ha podido mandar el email"');
//         //return "No se ha podido mandar el email";
//     }
// }


    
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
