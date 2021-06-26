<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>ID pets</title>

</head>
<body>
<?php
    include 'conexao.php';
    
    $cadastro = "";

    $token = $_GET['token'];
    $email = $_GET['email'];

    if(!isset($_SESSION['logado'])){
        $nome = "Login";
    }
    else{
        $n = $_SESSION['nome'];
        $arr = explode(' ', trim($n));
        $nome = $arr[0];
    }

    if(empty($token)){
        header('Location: index.php');
    }
    else{ // Verifica se o token de solicitação foi aberto.
        $sql2 = "SELECT token FROM cadastro_cliente WHERE email = '$email'";
        $verificarToken = mysqli_query($conn,$sql2);
        $qualquer = mysqli_fetch_array($verificarToken);
        $q = $qualquer['token'];

        // Caso seja 01 significa que o usuário não solicitou redefinição de senha.
        if($q == 1){
            header('Location: index.php');
        }
        else{
            if(isset($_GET['botao-cadastro'])){
                
                $token = $_GET['token'];
                $email = $_GET['email'];
                
                $senha = $_GET['senha'];
                $confirmar_senha = $_GET['confirmar_senha'];
                
                // Verifica se o campo senha não está vazio.
                if(empty($senha)){
                    $cadastro = "Campos não preenchidos!";
                }
                else{

                    // Verifica se as senhas conferem. 
                    if($senha == $confirmar_senha){

                        $hash = password_hash($senha, PASSWORD_DEFAULT);
                        $hashFinal = "'".$hash."'";

                        $sql3 = "UPDATE cadastro_cliente SET senha = $hashFinal WHERE email = '$email'";
                            
                            // Quando alterar a senha o status do token retorna para 01.
                            if(mysqli_query($conn, $sql3)) {
                                $sql4 = "UPDATE cadastro_cliente SET token = 1 WHERE email = '$email'";
                                
                                //Após a mudança de senha o usuario é redirecionado para a pagina inicial. 
                                if(mysqli_query($conn,$sql4)){
                                    $cadastro = "Senha alterada com sucesso.";
                                    header( "refresh:3;url=index.php" );
                                }
                            }
                            else{
                                $cadastro = "Erro ao alterar a senha";
                            }
                    }
                    else{
                        $cadastro = "As senhas são diferentes";
                    }
                }
            }
        }
    }
?>  <p id="check">n</p>
<nav class="menu-navegacao">
<div class="menu-nav-menu">
    <div class="menu-esquerda" id="ml"><img src="imagens/Vectorpaw.png" alt=" "></a>
        <a href="index.php">ID Pets</a>
    </div>
    <div class="menu-direita">
        <ul class="componentes-direita">
            <div class="wrap-botao-login">
            <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome; ?></a></li>
            <!-- botao logout -->
                <div class="clos-modal" id="clos-modal">
                <div class="logout" id="logout">
                    <div class="alinhar-logout">
                    <div class="">
                        <h3><?php echo $n?></h3>
                    </div>
                    <div class="ver-sair">
                        <div>
                            <a href="dashboard.php"><p>Meu perfil</p></a>
                        </div>
                        <div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <button class="botao-sair" name="sair"><p>Sair</p></button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- botao logout fim-->
            </div>
            <div class="wrap-botao-cadastrar" id="botao-cadastro1">
            <li class="componentes-lista-direita"><a href="/tcc/Cadastro.php">Cadastro</a></li>
            </div>
        </ul>
    </div>
</div>
</nav>
<!-- modal login -->
<div id="login" class="login-principal">
    <div class ="login-form" id="login-ani">
    <div class="wrap-login">
        <!--add logo-->
        <span class="close" id="close">&times;</span>
        <form action="index.php"  method="post">         
            <h1 class="login-title">Login</h1>
            <input type="text" placeholder="E-mail" id="inp-focus" name="login">
            <input type="password" placeholder="Senha" name="senha" id ="senhalog">
            <div class="alinhar">
                <div class="ali">
                    <button class="botao-logar" type="submit">Entrar</button>
                </div>
            </div>
            <p id="msg"></p>
            <a href="recuperar_senha.php"><h2>Esqueceu a senha ?</h2></a>
            <div class="line"></div>
            <div class="al-btn-log">
                <a class="botao-cadastro" >Criar conta</a>
            </div>
        </form>
    </div>
    </div>
</div>
    <div class="sss">
        <div class="f-ali">
            <div class="form-background">
                <div class="form-content">
                    <form method="GET" action="nova_senha.php?email=<?php echo $email."&token=".$token;?>">
                        <h1 class="login-title">Insira a nova senha</h1>
                        
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="password" name="senha" placeholder="Nova senha" autofocus>
                        <input type="password" name="confirmar_senha" placeholder="Confirmar senha">
                        
                        <h2><?php echo $cadastro; ?></h2>
                        <div class="line"></div>
                        <div class="bt-pet-cadastro">
                            <button class="botao-cadastro" name="botao-cadastro">Redefinir senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>