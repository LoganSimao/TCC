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
        <div class="menu-esquerda" id="ml"><img src="imagens/Vectorpaw.png" alt=" "></a>
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

                    if(isset($_GET['token'])){
                        $id = $_GET['token'];
        
                    }
                    else{
                        header('Location: index.php');
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
                </div>
                    <div class="wrap-botao-cadastrar" id="botao-cadastro1">
                    <li class="componentes-lista-direita"><a href="/tcc/Cadastro.php">Cadastro</a></li>
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
            <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">         
                <h1 class="login-title">Login</h1>
                <input type="text" placeholder="E-mail" id="inp-focus" name="login">
                <input type="password" placeholder="Senha" name="senha" id ="senhalog">
                <button class="botao-logar" type="submit">Entrar</button>
                <p id="msg"></p>
                <a href="recuperar_senha.php"><h2>Esqueceu a senha ?</h2></a>
                <div class="line"></div>
                <a class="botao-cadastro" >Criar conta</a>
            </form>
        </div>
        </div>
    </div>
    <p id="check">z</p>
    
    
    <div class="pg-seuspets">
    <div class="form-background-wrap">
      <div class="form-background">
        
        <div class="form-content-perfil4">
            
            <?php 
            include 'conexao.php';
           
            //capturar o id do link

            $sql2 = "SELECT * from pets where token = '$id'";
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
 
            <div class="">
                <h1> <?php echo "Est".$e." é ". $a ." ".$resultado['nome']; ?> </h1>
            </div>
            <div class="content-mais">
            

           <div class="content-pet-direita2">
                <div class="join-master2">
                <div class="join2">
                    <h3 class="side-join2">Raça</h3><h3 class="side-join3"><?php echo $resultado['raca']; ?></h3>
                </div>

                <div class="join2">
                    <h3 class="side-join2">Sexo</h3><h3 class="side-join3"><?php echo $resultado['sexo']; ?></h3>
                </div>

                <div class="join2">
                    <h3 class="side-join2">Idade</h3><h3 class="side-join3">
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
                    <h3 class="side-join2">Porte</h3><h3 class="side-join3"><?php echo $resultado['porte']; ?></h3>
                </div>

                <div class="join2">
                    <h3 class="side-join2">Cor</h3><h3 class="side-join3"><?php echo $resultado['cor']; ?></h3>
                </div>
                
                <div class="join2">
                    <h2 class="side-j">Observação</h2>
                </div>
                <div class="join2">
                    <h3 class="side-j1"><?php echo $resultado['observacao']; ?></h3>
                </div>
                <!-- Versão abaixo para quando o site estiver hospedado. 
                    <img src="http://chart.apis.google.com/chart?cht=qr&chl=https://idpets.000webhostapp.com/pets.php?=1&chs=250x250">
                -->
                 </div>       
                
                </div>
            </div>
  

            <div class="ajustar-botão-pets">
                <div class="aj-botão">
                        <a class="voltar-pet" href="pets.php?token=<?php echo $id?>">Voltar</a>
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