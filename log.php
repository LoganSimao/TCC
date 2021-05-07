<?php

include 'conexao.php';


if(isset($_GET['sair'])){
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
}

if(isset($_GET['logar'])){

$login = $_GET['login'];
$senha = $_GET['senha'];
//echo $login;
//echo $senha;

if(empty($login) or empty($senha)){
    $erro = "<p>- Campo de login e senha incompletos!</p>";
}
else{
    $s = "SELECT * FROM cadastro_cliente WHERE email = '$login'";
    $res = mysqli_query($conn,$s);
    $log = mysqli_fetch_array($res);
    $hash = $log['senha'];
    
    //echo $hash;
    if(password_verify($senha, $hash)){
        mysqli_close($conn);

        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $log['id'];
        $_SESSION['nome'] = $log['nome'];
        $id = $log['id'];

        header("Location: dashboard.php?id=$id");
    }
    else{
        echo "  <script type=\"text/javascript\">

                    function myFunction(){
                        var modal = document.getElementById('login');
                        modal.style.display = \"block\";
                        var msg = document.getElementById('msg');
                        msg.innerHTML = \"-Usuário ou senha invalidos\";
                        msg.style.color = \"red\";

                        var ani = document.getElementById('login-ani');
                        ani.style.animation = \"none\";
                    }
                    onload = function(){myFunction()};

                </script>";
        //$erro = "- Usuário e senha não conferem!";
        mysqli_close($conn);
    }
}
}

?>