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
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda">
            <a href="">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="http://127.0.0.1:5500/index.html">Home</a></li>
                <li class="componentes-lista-central"><a href="http://127.0.0.1:5500/cadastropets.html">Produtos</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal">Login</a></li>
                </div>
                <div class="wrap-botao-cadastrar">
                <li class="componentes-lista-direita"><a href="https://idpets.000webhostapp.com/Cadastro.php">Cadastro</a></li>
                </div>
            </ul>
        </div>
    </div>
    </nav>
    <!-- modal login -->
    <div id="login" class="login-principal">
        <div class ="login-form">
        <div class="wrap-login">
            <!--add logo-->
            <span class="close" id="close">&times;</span>
        <form action="">
            
            <h1 class="login-title">Login</h1>
            <input type="text" placeholder="E-mail" id="inp-focus">
            <input type="password" placeholder="Senha">
            <button class="botao-logar">Entrar</button>
            <h2>Esqueceu a senha ?</h2>
            <div class="line"></div>
            <button class="botao-cadastro">Criar conta</button>

        </form>
        </div>
        
        </div>
    </div>
    <div class="sidenav">
        <a href="http://idpets.000webhostapp.com/dashboard.php">Cliente</a>
        <a href="http://idpets.000webhostapp.com/seuspets.php">Pets</a>
        <a href="http://idpets.000webhostapp.com/historico.php">Historico de compra</a>
    </div>
      <div class="form-background">
        <div class="form-content-perfil">
        <div class="">
            <?php 
            
            $nome = "Logan";
            $cpf = "435.546.765-54";
            $email = "logan@logan.com";
            $celular = "4002-8922";
            $cep = "04428-010";
            $endereco = "Yervant";
            $numero = "006";
            $complemento = "";
            $bairro = "americanopolis";
            $cidade = "são paulo";
            $estado ="SP";
            ?>
            <div class="perfil">
                <h1>Perfil</h1>
                <h3>Nome: </h3><p><?php echo $nome?></p>
                <h3>CPF: </h3><p><?php echo $cpf?></p>
                <h3>E-Mail: </h3><p><?php echo $email?></p>
                <h3>Celular: </h3><p><?php echo $celular?></p>
                <h3>CEP: </h3><p><?php echo $cep?></p>
                <h3>Endereço: </h3><p><?php echo $endereco?></p>
                <h3>Numero: </h3><p><?php echo $numero?></p>
                <h3>Complemento: </h3><p><?php echo $complemento?></p>
                <h3>Bairro: </h3><p><?php echo $bairro?></p>
                <h3>Cidade: </h3><p><?php echo $cidade?></p>
                <h3>Estado: </h3><p><?php echo $estado?></p>
            </div> 
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