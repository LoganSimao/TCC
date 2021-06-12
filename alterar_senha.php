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
    <p id="check">n</p>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda">
            <a href="index.php">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="/tcc/cadastropets.php">Loja</a></li>
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
    <div class="pg-seuspets">
    <div class="form-background-wrap">
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
            $hash = $armazenamentoNomeCliente['senha'];
            
            if (isset($_POST['btn-alterar'])){
            
            $senha = $_POST['senha_atual'];
            $nova_senha = $_POST['nova_senha'];
            $confirmar_senha = $_POST['repetir_senha'];
                
                //Verifica se a senha atual está correta.
                if(password_verify($senha, $hash)){
                    
                    //Verifica se o campo da nova senha não está vazio.
                    if(empty($nova_senha)){
                        echo "Não inseriu a nova senha.";
                    }
                    //Verifica se a nova senha e a confirmação da senha confere.
                    elseif($nova_senha == $confirmar_senha){
                        echo "senhas conferem";
                        $hash2 = password_hash($nova_senha, PASSWORD_DEFAULT);
                        $hashFinal = "'".$hash2."'";

                        $sql3 = "UPDATE cadastro_cliente SET senha = $hashFinal WHERE id = '$id_cliente'";
                        
                            if(mysqli_query($conn,$sql3)){
                                echo "senha alterada com sucesso!";
                            }
                    }
                    else {
                        echo "senhas não conferem";
                    }
                }
                else {
                    echo "Senha incorreta";
                }
            }
            ?>  
            <div class="form-content-perfil3">
                <h1>Alterar senha</h1>
            </div>
            <div class="content-alterar-cliente">
            

           <div class="content-pet-direita">
               <form action="alterar_senha.php?id=<?php echo $id_cliente; ?>" method="POST" class="input-altera-cliente">
               <div class="h3-input-join">
                    <div class="join">
                        <h3>Senha atual</h3>     <input type="text" name = "senha_atual">
                    </div>

                    <p></p>

                    <div class="join">
                        <h3>Nova senha</h3>     <input type="text" name = "nova_senha">
                    </div>
                    <div class="join">
                        <h3>Repita a senha</h3>   <input type="text" name = "repetir_senha">
                    </div>
            </div>
               <div class="consulta-pet">
                    <a class="voltar-pet" href="dashboard.php">Voltar</a>
                    <button type="submit" name="btn-alterar" class="botao-alterar">Alterar</button>
                </div>
               
               </form>
           </div>
       </div>

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