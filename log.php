<?php

include 'conexao.php';

session_start();

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
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $log['id'];
        $_SESSION['nome'] = $log['nome'];
        $id = $log['id'];
        echo $id;
        header("Location: dashboard.php?id=$id");
    }
    else{
        $erro = "- Usuário e senha não conferem!";
        mysqli_close($conn);
    }
}
}

?>