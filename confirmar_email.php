<?php 
    include 'conexao.php';

    $email = $_GET['email'];
    $confirmar = "Sim";

    $sql = "UPDATE cadastro_cliente SET confirmar_email = '$confirmar' WHERE email = '$email'";

    if(mysqli_query($conn, $sql)) {
        echo "Email confirmado com sucesso!";
    }
    else{
        echo "Erro ao confirmar o email";

        //header('Location: seuspets.php');	
    }
?>