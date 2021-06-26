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
    
</head>

<body>
<!-- 
    Oi!
-->
    <?php include 'log.php'; //pagina onde faz a verificação do login
    session_start();
    
    if(!isset($_SESSION['logado'])){
        $nome1 = "Login";
        $n = " ";        
    }
    else{
        $n = $_SESSION['nome'];
        $arr = explode(' ', trim($n));
        $nome = $arr[0];
        $nome1 = "Olá, ".$nome."!";
    }

    ?>
    <p id="check">s</p>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda" id="ml"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets</a>
        </div>
        <!--
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="dashboard.php">Loja</a></li>
                <li class="componentes-lista-central"><a href="#sess">Sobre</a></li>
            </ul>
        </div> -->
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome1; ?></a>
                <!-- botao logout -->
                <div class="clos-modal" id="clos-modal">
                    <div class="logout" id="logout">
                        <div class="alinhar-logout">
                        <div class="">
                            <h3 id="greet"><?php echo $nome?>!</h3>
                        </div>
                        <div class="ver-sair">
                            <div>
                            <a href="dashboard.php"><p>Meu perfil</p></a>
                            </div><div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <button class="botao-sair" name="sair"><p>Sair</p></button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- botao logout fim-->
                </li>
                </div>
                <div class="wrap-botao-cadastrar" id="botao-cadastro1">
                <li class="componentes-lista-direita" ><a href="cadastro.php">Cadastro</a></li>
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
    <!--fim 2 -->
  </section>
  <section id="s2" class="sessao-2">
  <div class="custom-shape-divider-top-1621129009">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
        </div>
    <div class="caixa2">
        <div class="conteiner-s2">
            
            <div class="wrap-container-s2">
                <div class="content-s2">
                    <h3>Nosso site tem como objetivo ajudar a identificar seu pet,
                        voce pode achar uma maneira criativa de usar o nosso QR code que identifica o seu pet.
                    </h3>
                    <h2>O perfil do seu pet irá conter as informações do proprio junto com informações básicas de contato do seu dono.</h2>
                    <h3>Abaixo um exemplo de como o perfil do seu pet vai ficar disponivel no nosso site sempre que o QR codigo for lido.</h3>
                    <div class="btn-vermais-align">
                        <a href="#s3" class="btn-vermais">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  </section>
  <section id="s3" class="sessao-3">
      <div class="caixa3">
        <div class="wrap-caixa3">
            <div class="container-3">
                <!--<img src="imagens/petsperfil.png">-->
                
                <div class="alinhamento-teste">
                    <div class="join-titulo-form">
                    
                    <div class="formulario-teste">
                        
                        <div class="form-alinhamento">
                        
                            <div class="visualisar-pets">
                            <h2>Preencha os campos abaixo e veja como ficará o perfil do seu pet!</h2>
                                <form >
                                    <input type="text" placeholder="Nome do seu pet"name="pet" id="nomepet">
                                    <input type="text" placeholder="Idade"name="" id="idadepet">
                                    <input type="text" placeholder="Raça" name="" id="raca">
                                    <select id="sexopet"><option value=" ">Sexo</option><option value="Femêa">Femêa</option><option value="Macho">Macho</option></select>
                                    <input type="text" placeholder="Seu nome"name="" id="nome">
                                    <input type="text" placeholder="Número"name="" id="numero">
                                    <input type="text" placeholder="E-mail"name="" id="email">
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="display-teste">
                        <div class="content-wrap">
                            <div class="content-pets">

                                <h1 class="titulo-pet" id="sexopet-form">Você encontrou o </h1><h1 class='nome-pet' id="nomepet-form">Jony </h1>
                                
                                <p class="descricao" id="idadepet-form">o Jony
                                tem 18 anos e
                                é da raça Pinscher!</p>
                                <p class="descricao">Seu dono vai ficar muito feliz de saber que ele foi encontrado!</p>
                                <div class="line"></div>
                                <h2 class="contato">Aqui estão os dados de contato<h2>
                                <h3>Nome </h3><p id="nome-form">*seu Nome aqui</p>
                                <h3>Número </h3><p id="numero-form">*seu Número</p>
                                <h3>E-mail </h3><p id="email-form">*seu E-mail</p>
                                <div class="line"></div>
                                <div class="bt-alinhar">
                                    <a href="#s4"><button class="botao-pet" id="botao-form" >Saber mais sobre</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1621222059">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    
  </section>
  <section id="s4" class="sessao-4">
  <div class="custom-shape-divider-top-1621129009">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
        </div>
        <!--content-->
        <div class="box">
            <div class="box-bg">
                <div class="box-wrap">
                    <h2>Nosso perfil conta com um botão "saber mais sobre o pet" para que se obtenha algumas informações extras.</h2>
                    <p>Ao acessar esta pagina quem leu o QR code tera acesso a um perfil mais completo sobre o pet e
                        acesso a uma observação personalizada do dono do pet contendo informaões adicionais sobre o pet ou algum aviso,
                        por exemplo uma recompensa para quem achar o pet.
                    </p>
                    <div class="al-link-cad">
                        <div class="link-cad">
                            <a href="cadastro.php">Criar conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--content end-->


    <div class="custom-shape-divider-bottom-1624373238">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

  </section>
    <script src="script.js"></script>
    <?php echo $falha; ?>
    
</body>
<footer>
    <div class="footer-mestre">
        <div class="footer">
            <div class="">
                    <h4 class="list-footer">© ID Pets 2021</h4>
            </div>
        </div>
    </div>
</footer>
</html>