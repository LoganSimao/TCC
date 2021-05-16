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
        <div class="menu-esquerda"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets
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
            <input type="password" placeholder="Senha" name="senha" >
            <button class="botao-logar" name="logar" type="submit" id="enter">Entrar</button>
            <p id="msg"></p>
            <a href="recuperar_senha.php"><h2>Esqueceu a senha ?</h2></a>
            <div class="line"></div>
            <button class="botao-cadastro" >Criar conta</button>

        </form>
        </div>
        
        </div>
    </div>
    <!-- inicio do menu 
    
    <div class="slide-menu">
        <div class="slides">
            -- botoes radio inicio --
            <input type="radio" name="botao-radio" id="radio1">
            <input type="radio" name="botao-radio" id="radio2">
            <input type="radio" name="botao-radio" id="radio3">
            !-- botoes radio fim --
            !-- imagens slide começo --
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
            !-- imagens slide fim --
            !-- navegação automatica começo --
            <div class="navegacao-auto"> 
                <div class="nav-btn1"></div>
                <div class="nav-btn2"></div>
                <div class="nav-btn3"></div>
            </div>           
            !-- navegação automatica fim--
        </div>
        !-- navegação manual começo--
        <div class="navegacao-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        !-- navegação manual fim--
    </div>
    !-- final do menu -->
  <section id="s1" class="sessao-1">
    <div class="caixote">
        <div class="main-alinhamento">
            <div class="main-index">
                <div class="wrap-logo">
                    <div class="main-logo">
                        <img src="svg/Vectorpawsvg.svg">
                    </div>
                    <div>
                        <h3 class="id-logo">ID Pets</h3>
                    </div> 
                </div>
                <div>
                    <h1>Identifique seus pets de um jeito fácil!</h1>
                    <a href="#s2"class="discover" id="discover">Descubra</a>
                </div>
            </div>
            <div class="main-index-2">
                <img src="imagens/diamondshape.png" alt="" class="img-pets">
            </div>
        </div>
        
        <div class="custom-shape-divider-bottom-1621127856">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    
  </section>
  <section id="s2" class="sessao-2">
    <div>
        <h1>Nosso site é feito para dar uma identificação para seu pet, onde ele pode usar com nossa coleira personalizada,
            voce tambem pode achar uma maneira criativa de usar o nosso QR code que identifica o seu pet.
        </h1>
        <h2>O perfil do seu pet irá conter as informações do proprio junto com informações basicas de contato do seus dono</h2>
        <h2>Um exemplo de como o perfil do seu pet vai ficar disponivel sempre que o codigo for lido</h2>
        <img src="">
        <h2>Como mencionamos acima temos uma coleira personalizada que ja vai com o QR code imbutido para voce usar no seu pet</h2>
    </div>
    <div></div>
    <div></div>
    <div class="custom-shape-divider-top-1621129009">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>
  </section>
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