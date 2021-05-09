<?php

include 'conexao.php';

$falha = "";
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
    $falha = "  <script type=\"text/javascript\">

        function myFunction(){
            var ani = document.getElementById('login-ani');
            ani.style.animation = \"none\";
            var modal = document.getElementById('login');
            modal.style.display = \"block\";
            var msg = document.getElementById('msg');
            msg.innerHTML = \"- Campo de Login ou Senha vazio\";
            msg.style.color = \"red\";
            msg.style.fontFamily = 'Noto Sans';

            document.getElementById(\"inp-focus\").focus();
            var span = document.getElementById(\"close\");
   var botao = document.getElementById(\"botao-modal\");
  
   botao.onclick = function(){
     modal.style.display = \"block\";
     document.getElementById(\"inp-focus\").focus();
     modal.style.transition = \"2s\"; //transitioncheckout
   }
  
   span.onclick = function(){
    modal.style.display = \"none\";
    
  }
  
   window.onclick = function (event) {
     if(event.target == modal){
       modal.style.display = \"none\";
     }
   }
  }
  
            

        onload = function(){myFunction()};

    </script>";
    // echo $falha;
        //$erro = "- Usuário e senha não conferem!";
        mysqli_close($conn);
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
        $falha = "  <script type=\"text/javascript\">

        function myFunction(){
            var modal = document.getElementById('login');
            modal.style.display = \"block\";
            var msg = document.getElementById('msg');
            msg.innerHTML = \"- Usuário ou senha inválidos\";
            msg.style.color = \"red\";
            msg.style.fontFamily = 'Noto Sans';
            var ani = document.getElementById('login-ani');
            ani.style.animation = \"none\";
            document.getElementById(\"inp-focus\").focus();
            var span = document.getElementById(\"close\");
   var botao = document.getElementById(\"botao-modal\");
  
   botao.onclick = function(){
     modal.style.display = \"block\";
     document.getElementById(\"inp-focus\").focus();
     modal.style.transition = \"2s\"; //transitioncheckout
   }
  
   span.onclick = function(){
    modal.style.display = \"none\";
    
  }
  
   window.onclick = function (event) {
     if(event.target == modal){
       modal.style.display = \"none\";
     }
   }
   console.log('ue');
  }
  
            

        onload = function(){myFunction()};
        console.log('2');

    </script>";
    // echo $falha;
        //$erro = "- Usuário e senha não conferem!";
        mysqli_close($conn);
    }
}
}

?>