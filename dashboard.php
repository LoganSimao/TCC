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
            <a href="index.php">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="cadastropets.php">Loja</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <?php
                    include 'log.php';
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

                <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome; ?></a></li>
                </div>
                <div class="wrap-botao-cadastrar">
                
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
    <p id="check">n</p>
    <div class="sidenav">
        <a href="dashboard.php">Perfil</a>
        <a href="seuspets.php">Pets</a>
        <label for="sair"><a >Histórico</a></label>
        <form action="log.php">
        <button class="botao-sair" name="sair">Sair</button>
        </form>
        
    </div>
    <div class="bottomnav">
        <a href="dashboard.php">Perfil</a>
        <a href="seuspets.php">Pets</a>
        <a href="historico.php">Histórico</a>
    </div>
      <div class="pg-seuspets">
        
        <div class="form-content-perfil">
            <?php 
            include 'conexao.php';
           

            //capturar o id do link
            if(!isset($_SESSION['logado'])){
                header('Location: index.php');
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $idsessao = $_SESSION['id'];
                if($id != $idsessao){ 
                    header('Location: lost.html');//forbiden later
                }
            }
            
                // passar a logica no banco de dados
            $id = $_SESSION['id'];
            $sql1 = "SELECT * from cadastro_cliente where id = $id"; //usa o id do dono pra consultar qual é na tabela clientes     
            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamento = mysqli_fetch_array($resultadoCliente);
            mysqli_close($conn); // fechamento da conexao com o banco de dados para evitar problemas
            
            
            ?>  
            <h1>Perfil</h1>
            <div class="content-cliente">
                <div class="content-cliente-wrap">
                 <div class="content-cliente-esquerda">   
                    <h3>Nome </h3>
                    <h3>CPF </h3>
                    <h3>E-Mail </h3>
                    <h3>Contato </h3>
                    <h3>CEP </h3>
                    <h3>Endereço </h3>
                    <h3>Numero </h3>
                    <h3>Complemento </h3>
                    <h3>Bairro </h3>
                    <h3>Cidade </h3>
                    <h3>Estado </h3>
                </div>

                <div class="content-cliente-direita">
                    <!---->
                    <?php echo "<p>".$armazenamento['nome']."</p>";
                    echo "<p>".$armazenamento['CPF']."</p>";
                    echo "<p>".$armazenamento['email']."</p>";
                    echo "<p>".$armazenamento['telefone']."</p>";
                    echo "<p>".$armazenamento['cep']."</p>";
                    echo "<p>".$armazenamento['endereco']."</p>";
                    echo "<p>".$armazenamento['numero']."</p>";
                    echo "<p>".$armazenamento['complemento']."</p>";
                    echo "<p>".$armazenamento['bairro']."</p>";
                    echo "<p>".$armazenamento['cidade']."</p>";
                    echo "<p>".$armazenamento['estado']."</p>";?>
                </div>
                </div>
            </div>
            <div class="ajustar-botão">
                <div class="aj-botão">
                    <a href="alterarclientes.php" class="">Alterar dados</a>
                </div>
                <div class="aj-botão">
                    <a href="alterar_senha.php" class="">Alterar senha</a>
                </div>
            </div>    
        </div>
          
    </div>
    <div class="custom-shape-divider-bottom-1621127856">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
    </div>  
    <script src="script.js"></script>
</body>

</html>