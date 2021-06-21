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
    $mail->Subject = 'IDPets';
    $mail->Body = '<h1>Olá, </H1><P>clique <a href="http://localhost/New%20folder/TCC/TCC/confirmar_email.php?email='.$email.'">aqui</a> para confirmar seu email!</P>';
    $mail->AddAddress($email);

    $mail->Send(); 
?>