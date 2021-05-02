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

if(isset($_GET['login'])){
    $erro = array();

    $login = mysqli_real_escape_string($_GET['login']);
    $senha = $_GET['senha'];

    if(empty($login) or empty($senha)){
        $erro[] = "<p>- Campo de login e senha incompletos!</p>";
    }
    else{
        $sql = "SELECT loginFunc FROM db_funcionarios WHERE loginFunc = '$login'";

        $resultado = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($resultado);

        if($rows > 0){
            $sql = "SELECT * FROM db_funcionarios WHERE loginFunc = '$login' AND senhaFunc = '$senha'";
            $resultado = mysqli_query($conn,$sql);
            $rows = mysqli_num_rows($resultado);

            if($rows == 1){
                $log = mysqli_fetch_array($resultado);

                mysqli_close($conn);
                $_SESSION['logado'] = true;
                $_SESSION['codFunc'] = $log['codFunc'];

                header('location: AT06_consulta.php');
            }
            else{
                $erro[] = "<p>- Usuário e senha não conferem!</p>";
            }
        }
        else{
            $erro[] = "<p>- Usuário inexistente!</p>";
        }
    }
}
}
}
?>