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
    <div class="menu-esquerda"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets</a>
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
    <p id="check">n</p>
    <div class="sidenav">
        <a href="dashboard.php">Perfil</a>
        <a href="seuspets.php">Pets</a>
        <a href="historico.php">Histórico</a>
        <form action="log.php">
        <button name="sair">Sair</button>
        </form>
        
    </div>

    <div class="bottomnav">
        <a href="dashboard.php">Perfil</a>
        <a href="seuspets.php">Pets</a>
        <a href="historico.php">Histórico</a>
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
                        <h3>Senha atual</h3>     <input type="password" name = "senha_atual">
                    </div>

                    <p></p>

                    <div class="join">
                        <h3>Nova senha</h3>     <input type="password" name = "nova_senha">
                    </div>
                    <div class="join">
                        <h3>Repita a senha</h3>   <input type="password" name = "repetir_senha">
                    </div>
            </div>
               <div class="ajustar-botão">
                   <div class="aj-botão">
                        <a class="voltar-pet" href="dashboard.php">Voltar</a>
                    </div>
                    <div class="aj-botão">
                        <button type="submit" name="btn-alterar" class="botao-alterar">Alterar</button>
                    </div>
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

<div class="custom-shape-divider-bottom-1621127856">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>  

    <script src="script.js"></script>
</body>

</html>