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
    <div class="form-background">
        <div class="form-content">
        <div class="content-pets">
            <h1 class="login-title">Voce encontrou</h1>
            <h2>Nome do pet</h2><!--centralizar-->
            <div class="line"></div>
            <h3>Nome: <?php $nome?></h3>
            <h3>Raça: <?php $raca?></h3>
            <h3>Sexo: <?php $sexo?></h3>
            <h3>Idade: <?php $idade?></h3>
            <h3>Porte: <?php $porte?></h3>
            <h3>Cor: <?php $cor?></h3>
            <h3>Vacinado: <?php $vacinado?></h3>
            <div class="line"></div>
            <!--<button class="botao-cadastro">Cadastrar</button>-->
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