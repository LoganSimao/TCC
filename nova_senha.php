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
    
    $token = $_GET['token'];
    $email = $_GET['email'];

    if(isset($_GET['botao-cadastro'])){
        $token = $_GET['token'];
        $email = $_GET['email'];
        echo $token;

        $senha = $_GET['senha'];
        $confirmar_senha = $_GET['confirmar_senhar'];
        
        if($senha == $confirmar_senha){

            $sql2 = "SELECT token FROM cadastro_cliente WHERE email = '$email'";
            $verificarToken = mysqli_query($conn,$sql2);
            $qualquer = mysqli_fetch_array($verificarToken);
            $q = $qualquer['token'];


            echo $q."<br>".$token;

            if(empty ($token)){
                //header('Location: index.php');
            
                if($q == $token){
                    
                }
                else{
                // header('Location: index.php');

                }
            }
        }
        else{
            echo "senhas diferentes";
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
                <form action="nova_senha.php?email=<?php echo $email."&token=".$token;?>">
                    <h1 class="login-title">Insira a nova senha</h1>
                    <input type="text" name="senha"placeholder="Nova senha" autofocus>
                    <input type="text" name="confirmar_senha"placeholder="Confirmar senha">
                    
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