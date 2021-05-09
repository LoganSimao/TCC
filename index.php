<?php ?>

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
    <?php include 'log.php'; //pagina onde faz a verificação do login
    session_start();
    
    if(!isset($_SESSION['logado'])){
        $nome = "Login";
        
    }
    else{
        $n = $_SESSION['nome'];
        $arr = explode(' ', trim($n));
        $nome = $arr[0];
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
                <li class="componentes-lista-central"><a href="dashboard.php">Produtos</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome; ?></a>
                <!-- botao logout -->
                <div class="clos-modal" id="clos-modal">
                    <div class="logout" id="logout">
                        <div class="alinhar-logout">
                        <div class="">
                            <h3><?php echo $n?></h1>
                        </div>
                        <div class="ver-sair">
                            <div>
                            <a href="dashboard.php"><p>Meu perfil</p></a>
                            </div><div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <button class="botao-sair" name="sair"><p>Sair</p></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- botao logout fim-->
                </li>
                </div>
                <div class="wrap-botao-cadastrar">
                <li class="componentes-lista-direita"><a href="cadastro.php">Cadastro</a></li>
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
        
            
        <form action="<?php echo $_SERVER['PHP_SELF'];?>">
            
            <h1 class="login-title">Login</h1>
            <input type="text" placeholder="E-mail" id="inp-focus" name="login">
            <input type="password" placeholder="Senha" name="senha">
            <button class="botao-logar" name="logar" type="submit">Entrar</button>
            <p id="msg"></p>
            <h2>Esqueceu a senha ?</h2>
            <div class="line"></div>
            <button class="botao-cadastro" >Criar conta</button>

        </form>
        </div>
        
        </div>
    </div>
    <!-- inicio do menu -->
    
    <div class="slide-menu">
        <div class="slides">
            <!-- botoes radio inicio -->
            <input type="radio" name="botao-radio" id="radio1">
            <input type="radio" name="botao-radio" id="radio2">
            <input type="radio" name="botao-radio" id="radio3">
            <!-- botoes radio fim -->
            <!-- imagens slide começo -->
            <div class="slide um">
                <img src="imagens/dog1.jpg" alt="">
                <p>pera</p>
            </div>
            <div class="slide">
                <img src="imagens/dog2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="imagens/dog3.jpg" alt="">
            </div>
            <!-- imagens slide fim -->
            <!-- navegação automatica começo -->
            <div class="navegacao-auto"> 
                <div class="nav-btn1"></div>
                <div class="nav-btn2"></div>
                <div class="nav-btn3"></div>
            </div>           
            <!-- navegação automatica fim-->
        </div>
        <!-- navegação manual começo-->
        <div class="navegacao-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        <!-- navegação manual fim-->
    </div>
    <!-- final do menu -->
  
    <script src="script.js"></script>
    <?php echo $falha; ?>
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