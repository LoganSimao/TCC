<?php 
    require 'PHPMailer/PHPMailerAutoload.php';

    $email = 'logan_js22@hotmail.com';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'no.replay.idpets@gmail.com';
    $mail->Password = 'otaku1234';
    $mail->Port = 587;
    $mail->isHTML();
    $mail->Subject = 'Hello world';
    $mail->Body = 'A test email!';
    $mail->AddAddress($email);

    $mail->Send(); 
?>