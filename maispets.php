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
        
        <div class="form-content-perfil3">
            
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
            $oa = $resultado['sexo'];

            if($oa == 'Femêa'){
                $a = "a";
                $A = "A";
                $e = "a";
                $u = "sua";
            }
            else{
                $a = "o";
                $A = "O";
                $e = "e";
                $u = "seu";
            }

            ?> 
 
            <div class="form-content-perfil3">
                <h1> <?php echo "Est".$e." é ". $u ." pet ".$resultado['nome']; ?> </h1>
            </div>
            <div class="content-alterar-cl">
            

           <div class="content-pet-direita2">

                <div class="join2">
                    <h3>Raça</h3><h3><?php echo $resultado['raca']; ?></h3>
                </div>

                <div class="join2">
                    <h3>Sexo</h3><h3><?php echo $resultado['sexo']; ?></h3>
                </div>

                <div class="join2">
                    <h3>Idade</h3><h3>
                        <?php // Impressão da idade com "ano ou anos".
                            if($resultado['idade'] == 1){
                                echo $resultado['idade']." "."ano"; 
                            }
                            else{
                                echo $resultado['idade']." "."anos"; 
                        }?>
                    </h3>
                </div>

                <div class="join2">
                    <h3>Porte</h3><h3><?php echo $resultado['porte']; ?></h3>
                </div>

                <div class="join2">
                    <h3>Cor</h3><h3><?php echo $resultado['cor']; ?></h3>
                </div>
                
                <div class="join2">
                    <h3>Observação</h3><h3>O dia ta lindo crima insorarado, ajifujugfiji cevejinha i churrasc, poisé essa vida é mto loka né<?php //echo $resultado['observacao']; ?></h3>
                </div>
                <!-- Versão abaixo para quando o site estiver hospedado. 
                    <img src="http://chart.apis.google.com/chart?cht=qr&chl=https://idpets.000webhostapp.com/pets.php?=1&chs=250x250">
                -->

                
                </div>
            <img src="<?php 
                    $url = "http://chart.apis.google.com/chart?cht=qr&chl=http://localhost/New%20folder/TCC/TCC/pets.php?id=".$id."&chs=250x250";
                    
                    echo $url;
                ?>">
            </div>

            <div class="ajustar-botão-pets">
                <div class="aj-botão">
                        <a class="voltar-pet" href="seuspets.php">Voltar</a>
                </div>
                <div class="aj-botão">
                        <a class="voltar-pet" href="pets.php?id=<?php echo $id?>">Ver</a>
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