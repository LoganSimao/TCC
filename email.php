<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'path/to/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tsl';
    $mail->Username = 'no.replay.idpets@gmail.com';
    $mail->Password = 'otaku1234';
    $mail->Port = 587;
    $mail->isHTML();
    $mail->Subject = 'Hello world';
    $mail->Body = 'A test email!';
    $mail->AddAddress('igoralmeida105@gmail.com');

    $mail->Send();
?>