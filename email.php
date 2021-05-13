<?php 
    require 'mailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'no.replay.idpets@gmail.com';
    $mail->Password = 'otaku1234';
    $mail->Port = 587;
    $mail->isHTML();
    $mail->Subject = 'Hello world';
    $mail->Body = 'A test email!';
    $mail->AddAddress('igoralmeida105@gmail.com');

    $mail->Send();
?>