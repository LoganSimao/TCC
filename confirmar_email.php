<?php 
    include 'conexao.php';

    $email = $_GET['email'];
    $confirmar = "Sim";

    $sql = "UPDATE cadastro_cliente SET confirmar_email = '$confirmar' WHERE email = '$email'";

    if(mysqli_query($conn, $sql)) {
        $confirmar = "Email confirmado com sucesso!";
        //echo "Email confirmado com sucesso!";
    }
    else{
        $confirmar = "Erro ao confirmar o email!";
        //echo "Erro ao confirmar o email";

        //header('Location: seuspets.php');	
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmação</title>
</head>
<body>
    <div class="bg">
    <div class="conf">
        <div class="conf1">
            <h1><?php echo $confirmar ;?></h1>
            <a href="index.php" class="lin">Voltar ao site</a>
        </div>
    </div>
    <div class="wrap-logo">
                    <div class="main-logo">
                        <img src="svg/Vectorpawsvg.svg">
                    </div>
                    <div>
                        <h3 class="id-logo">ID Pets</h3>
                    </div> 
            </div>
    </div>
    <style>
        .wrap-logo{
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Sans-serif;
            font-weight: bold;
            color: #e75f17;

        }
        .main-logo img{
            width: 4vw;
            right: 1rem;
            position: relative;

        }
        .id-logo{
            font-size: 2.5vw;
            left: 1rem;
            position: relative;
        }
        .bg{
            width: 98vw;
            height:100vh;
            background-color: #fdfdf2;
        }
        .conf{
            font-family: Sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50%;
            
        }
        .conf1{
            position: relative;
            width: 50%;
            height:50%;
            text-align: center;
            top: 10rem;
        }
        .conf1 h1{
            color: grey;
            margin-bottom: 3rem;
        }
        .lin{
            
            text-decoration: none;
            font-weight: bold;
            color: white;
            padding: 1rem 3rem;
            background-color: #69C36A;
            border-radius: 5px;
            
        }
        .lin:hover{
            background-color: #468847;
        }
    </style>
</body>
</html>
