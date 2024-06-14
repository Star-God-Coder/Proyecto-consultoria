<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'd41622644@gmail.com'; // Cambia esto a tu correo de Gmail
        $mail->Password = 'aa1234aa'; // Cambia esto a tu contraseña de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom($email, $name);
        $mail->addAddress('ygr.eduardo@yahoo.es'); // Cambia esto al correo del dueño del sitio
        $mail->Subject = 'Nueva pregunta de ' . $name;
        $mail->Body = "Nombre: " . $name . "\nCorreo Electrónico: " . $email . "\n\n" . $message;

        $mail->send();
        echo 'Mensaje enviado correctamente.';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje. Error: {$mail->ErrorInfo}";
    }
}
?>