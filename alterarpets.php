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
                    <?php 
    if (isset($_POST['btn-alterar'])) {
        $id = $_GET['id'];
        $nomePET = $_POST['nome'];
        $raca = $_POST['raca'];
        $sexo = $_POST['sexo'];
        $idade = $_POST['idade'];
        $porte = $_POST['porte'];
        $cor = $_POST['cor'];
        $observacao = $_POST['observacao'];

        $sql3 = "UPDATE pets SET nome = '$nomePET', raca = '$raca', sexo = '$sexo', idade = $idade, porte = '$porte', cor = '$cor', observacao = '$observacao' WHERE id = $id";

        if(mysqli_query($conn, $sql3)) {
            $_SESSION['mensagem'] = "Alterado com sucesso!";
            exit(header('Location: seuspets.php'));
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

            $sql2 = "SELECT * from pets where id = $id";
            $resultadoPET = mysqli_query($conn, $sql2);
            $resultado = mysqli_fetch_array($resultadoPET);
            
            ?>  
            <div class="form-content-perfil3">
                <h1> <?php echo $n ?> </h1>
            </div>
            <div class="content-alterar-cliente">
            

           <div class="content-pet-direita">
               <form action="alterarpets.php?id=<?php echo $id; ?>" method="POST" class="input-altera">
                <div class="h3-input-join">
                    <div class="join">
                    <h3>Nome</h3><input type="text" name = "nome" value="<?php echo $resultado['nome']; ?>">
                    </div>
                    <div class="join">
                    <h3>Raca</h3><input type="text" name = "raca" value="<?php echo $resultado['raca']; ?>">
                    </div>
                    <div class="join">
                    <h3>Sexo</h3><input type="text" name = "sexo" value="<?php echo $resultado['sexo']; ?>">
                    </div>
                    <div class="join">
                    <h3>Idade</h3><input type="number" name = "idade" value="<?php echo $resultado['idade']; ?>">
                    </div>
                    <div class="join">
                    <h3>Porte</h3><input type="text" name = "porte" value="<?php echo $resultado['porte']; ?>">
                    </div>
                    <div class="join">
                    <h3>Cor</h3><input type="text" name = "cor" value="<?php echo $resultado['cor']; ?>">
                    </div>
                    <div class="join">
                    <h3>Observação</h3><textarea maxlength="250" type="text" name="observacao" class="obs" rows="4" cols="20" max><?php echo $resultado['observacao']; ?> </textarea>
                    </div>
                </div>
                <div class="ajustar-botão-pets">
                   <div class="aj-botão">
                        <a class="voltar-pet" href="seuspets.php">Voltar</a>
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
    <div class="custom-shape-divider-bottom-1621127856">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>  
    <script src="script.js"></script>
</body>

</html>