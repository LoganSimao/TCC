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
    <!-- FAZER LOGIN, SALVAR SENHA HASH, FOOTER, RESIZING CSS, padding dos botoes
    INPUT FOCUS, MUDAR O REDIRECT DO BOTAO QUANDO TIVER LOGADO E O CONTEUDO-->
</head>
<body>
<?php
    include 'conexao.php';
    
    $cadastro = "";

    $token = $_GET['token'];
    $email = $_GET['email'];

    if(empty($token)){
        header('Location: index.php');
    }
    else{

        $sql2 = "SELECT token FROM cadastro_cliente WHERE email = '$email'";
        $verificarToken = mysqli_query($conn,$sql2);
        $qualquer = mysqli_fetch_array($verificarToken);
        $q = $qualquer['token'];

        if($q == 1){
            header('Location: index.php');
        }
        else{
            if(isset($_GET['botao-cadastro'])){
                
                $token = $_GET['token'];
                $email = $_GET['email'];
                
                $senha = $_GET['senha'];
                $confirmar_senha = $_GET['confirmar_senha'];
                
                if(empty($senha)){
                    $cadastro = "Campos não preenchidos!";
                }
                else{
                
                    if($senha == $confirmar_senha){

                        if($q == $token){

                        $hash = password_hash($senha, PASSWORD_DEFAULT);
                        $hashFinal = "'".$hash."'";

                        $sql3 = "UPDATE cadastro_cliente SET senha = $hashFinal WHERE email = '$email'";

                            if(mysqli_query($conn, $sql3)) {
                                $sql4 = "UPDATE cadastro_cliente SET token = 1 WHERE email = '$email'";
                                
                                if(mysqli_query($conn,$sql4)){
                                    $cadastro = "Senha alterada com sucesso.";
                                    header( "refresh:3;url=index.php" );
                                }
                            }
                            else{
                                $cadastro = "Erro ao alterar a senha";
                            }
                        }
                    }
                    else{
                        $cadastro = "As senhas são diferentes";
                    }
                }
            }
        }
    }
?>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda">
            <a href="">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="cadastropets.php">Produtos</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal"></a></li>
                </div>
                <div class="wrap-botao-cadastrar">
                <li class="componentes-lista-direita"><a href="/Cadastro.php">Cadastro</a></li>
                </div>
            </ul>
        </div>
    </div>
    </nav>
    <div class="form-background">
        <div class="form-content">
            <div class="">
                <form method="GET" action="nova_senha.php">
                    <h1 class="login-title">Insira a nova senha</h1>
                    
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="password" name="senha" placeholder="Nova senha" autofocus>
                    <input type="password" name="confirmar_senha" placeholder="Confirmar senha">
                    
                    <h2><?php echo $cadastro; ?></h2>
                    <div class="line"></div>
                    <button class="botao-cadastro" name="botao-cadastro">Redefinir senha</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
<footer>
    <nav class="footer-mestre">
        <div class="footer">
            <div class="">
                <ul class="">
                    <li class="list-footer">© ID Pets 2021</li>
                </ul>
            </div>
        </div>
</footer>
</html>