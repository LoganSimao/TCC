<?php
$senha = '1234LOG33Cxz';
$senha2 = '1234LOG33Cxz';

$senhaErro = '1235LOG33Cxz';

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$senhaHash2 = password_hash($senha2, PASSWORD_DEFAULT);

echo $senha.'<br><br>';
echo $senhaHash.'<br><br>';

echo $senha2.'<br><br>';
echo $senhaHash2.'<br><br>';

if(password_verify($senha, $senhaHash)){
    echo '<br> Password Valido';
}
else{
    echo '<br> Password Invalido';
}


if(password_verify($senhaErro, $senhaHash2)){
    echo '<br> Password Valido';
}
else{
    echo '<br> Password Invalido';
}

if(isset($_GET['logar'])){

    $login = mysqli_real_escape_string($_GET['login']);
    $senha = $_GET['senha'];

    if(empty($login) or empty($senha)){
        $erro = "<p>- Campo de login e senha incompletos!</p>";
    }
    else{
        $s = "SELECT senha FROM cadastro_clientes WHERE email = '$login'";
        $res = mysqli_query($conn,$s);

        if($senhaverificada = password_verify($senha, $res)){
            $log = mysqli_fetch_array($res);

            mysqli_close($conn);
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $log['id'];
            $_SESSION['nome'] = $log['nome'];
            $id = $log['id'];

            header('location: dashboard.php?id='$id'');
        }
        else{
            $erro = "<p>- Usuário e senha não conferem!</p>";
        }
    }
    echo $erro;
}


?>