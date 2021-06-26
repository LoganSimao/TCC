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
        <?php
            include 'log.php';
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
                $_SESSION['mensagem'] = "- Alterado com sucesso!";
                exit(header('Location: dashboard.php'));
            }
            else{
                $_SESSION['mensagem'] = "- Erro ao alterar.";

                //header('Location: seuspets.php');	
            }
        }
    ?>

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
                
            </ul>
        </div>
    </div>
    </nav>
    <!-- modal login -->

        
        </div>
    </div>
    <p id="check">n</p>
    <div class="sidenav">
            <div class="wrap-side">
                <div class="svgs-icones">
                    <img src="svg/u.svg" id="svg-us">
                </div>
                <div class="links-side" id="us">
                    <a href="dashboard.php">Perfil</a>
                </div>
            </div>
            <div class="wrap-side">
                <div class="svgs-icones">
                    <img src="svg/p.svg" id="svg-pe">
                </div>
                <div class="links-side" id="pe">
                    <a href="seuspets.php">Pets</a>
                </div>
            </div>
            <div class="wrap-side">
                <div class="svgs-icones">
                    <img src="svg/deslogar.svg" id="svg-des">
                </div>
                <div class="links-side" id="des">
                    <form action="log.php">
                        <button class="botao-sair-side" name="sair">Sair</button>
                    </form>
                </div>
            </div>
    </div>
    <div class="bottomnav">
        <div class="wrap-bot">
            <div class="svgs-icones-b">
                <img src="svg/u.svg" id="svg-us-b">
            </div>
            <div class="links-bot" id="us-b">
                <a href="dashboard.php">Perfil</a>
            </div>
        </div>
        <div class="wrap-bot">
            <div class="svgs-icones-b">
                <img src="svg/p.svg" id="svg-pe-b">
            </div>
            <div class="links-bot" id="pe-b">
                <a href="seuspets.php">Pets</a>
            </div>
        </div>
        <div class="wrap-bot">
            <div class="svgs-icones-b">
                <img src="svg/deslogar.svg" id="svg-des-b">
            </div>
            <div class="links-bot" id="des-b">
                <form action="log.php">
                    <button class="botao-sair-bot" name="sair">Sair</button>
                </form>
            </div>
        </div>
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

            
            ?>  
            <div class="form-content-perfil3">
                <h1> Alterar seus dados </h1>
            </div>
            <div class="content-alterar-cliente">
            

           <div class="content-pet-direita">
               <form action="alterarclientes.php?id=<?php echo $id_cliente; ?>" method="POST" class="input-altera-cliente">
               <div class="h3-input-join">
                <div class="join">
                <h3>Nome </h3>     <input type="text" name = "nome" value="<?php echo $armazenamentoNomeCliente['nome']; ?>">
                </div>
                <div class="join">
                <h3>E-mail </h3>   <input type="text" name = "email" value="<?php echo $armazenamentoNomeCliente['email']; ?>">
                </div>
                <div class="join">
                <h3>CEP</h3>       <input type="text" name = "cep" value="<?php echo $armazenamentoNomeCliente['cep']; ?>">
                </div>
                <div class="join">
                <h3>Endereço</h3>  <input type="text" name = "endereco" value="<?php echo $armazenamentoNomeCliente['endereco']; ?>">
                </div>
                <div class="join">
                <h3>Bairro</h3>    <input type="text" name = "bairro" value="<?php echo $armazenamentoNomeCliente['bairro']; ?>">
                </div>
                <div class="join">
                <h3>Cidade</h3>    <input type="text" name = "cidade" value="<?php echo $armazenamentoNomeCliente['cidade']; ?>">
                </div>
                <div class="join">
                <h3>Estado</h3>    <input type="text" name = "estado" value="<?php echo $armazenamentoNomeCliente['estado']; ?>">
                </div>
                <div class="join">
                <h3>Complemento</h3> <input type="text" name = "complemento" value="<?php echo $armazenamentoNomeCliente['complemento']; ?>">
                </div>
                <div class="join">
                <h3>Número</h3>    <input type="text" name = "numero" value="<?php echo $armazenamentoNomeCliente['numero']; ?>">
                </div>
                <div class="join">
                <h3>Telefone</h3>  <input type="text" name = "telefone" value="<?php echo $armazenamentoNomeCliente['telefone']; ?>">
                </div>
            </div>
               <div class="ajustar-botão-alt">
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