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
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="/tcc/cadastropets.php">Produtos</a></li>
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
    <?php 
        if (isset($_POST['btn-alterar'])) {

            $id_cliente = $_SESSION['id'];
            $nomeCliente = $_POST['nome'];
            $email = $_POST['email'];
            $cep = $_POST['cep'];
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $complemento = $_POST['complemento'];
            $numero = $_POST['numero'];
            $telefone = $_POST['telefone'];
            

            $sql3 = "UPDATE cadastro_cliente SET 
            nome = '$nomeCliente', 
            email = '$email', 
            cep = '$cep', 
            endereco = '$endereco', 
            bairro = '$bairro', 
            cidade = '$cidade', 
            estado = '$estado', 
            complemento = '$complemento', 
            numero = '$numero' , 
            telefone = '$telefone' 
            WHERE id = $id_cliente";

            if(mysqli_query($conn, $sql3)) {
                $_SESSION['mensagem'] = "Alterado com sucesso!";
                exit(header('Location: dashboard.php'));
            }
            else{
                $_SESSION['mensagem'] = "Erro ao alterar.";

                //header('Location: seuspets.php');	
            }
        }
    ?>
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
                <li class="componentes-lista-direita"><a href="Cadastro.php">Cadastro</a></li>
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
        <a href="dashboard.php">Cliente</a>
        <a href="seuspets.php">Pets</a>
        <a href="historico.php">Historico de compra</a>
        <form action="log.php">
        <button name="sair">Sair</button>
        </form>
        
    </div>
      <div class="form-background">
        
        <div class="form-content-perfil2">
            
            <?php 
            include 'conexao.php';
           
            //capturar o id do link
            if(!isset($_SESSION['logado'])){
                header('Location: index.php');
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];

            }
            // passar a logica no banco de dados
            $id_cliente = $_SESSION['id'];

            //usa o id do dono pra consultar qual é na tabela clientes
            $sql1 = "SELECT * from cadastro_cliente where id = $id_cliente";      
            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamentoNomeCliente = mysqli_fetch_array($resultadoCliente);

            
            ?>  
            <div class="form-content-perfil3">
                <h1> Alterar Cadastro </h1>
            </div>
            <div class="content-alterarpet">
            
            <div class="content-alterarcliente-esquerda">   
               <h3>Nome </h3>
               <h3>E-mail </h3>
               <h3>CEP </h3>
               <h3>Endereço </h3>
               <h3>Bairro</h3>
               <h3>Cidade</h3>
               <h3>Estado</h3>
               <h3>Cidade</h3>
               <h3>Complemento</h3>
               <h3>Número</h3>
               <h3>Telefone</h3>
               
               <div class="consulta-pet">
                    <a class="voltar-pet" href="dashboard.php">Voltar</a>
                </div>
           </div>
           <div class="content-pet-direita">
               <form action="alterarclientes.php?id=<?php echo $id_cliente; ?>" method="POST" class="input-altera-cliente">

               <input type="text" name = "nome" value="<?php echo $armazenamentoNomeCliente['nome']; ?>">
               <input type="text" name = "email" value="<?php echo $armazenamentoNomeCliente['email']; ?>">
               <input type="text" name = "cep" value="<?php echo $armazenamentoNomeCliente['cep']; ?>">
               <input type="text" name = "endereco" value="<?php echo $armazenamentoNomeCliente['endereco']; ?>">
               <input type="text" name = "bairro" value="<?php echo $armazenamentoNomeCliente['bairro']; ?>">
               <input type="text" name = "cidade" value="<?php echo $armazenamentoNomeCliente['cidade']; ?>">
               <input type="text" name = "estado" value="<?php echo $armazenamentoNomeCliente['estado']; ?>">
               <input type="text" name = "complemento" value="<?php echo $armazenamentoNomeCliente['complemento']; ?>">
               <input type="text" name = "numero" value="<?php echo $armazenamentoNomeCliente['numero']; ?>">
               <input type="text" name = "telefone" value="<?php echo $armazenamentoNomeCliente['telefone']; ?>">
               <br>
               <button type="submit" name="btn-alterar" class="botao-alterar">Alterar</button>
               </form>
           </div>
       </div>

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