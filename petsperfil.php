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
        <div class="menu-esquerda"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets</a>
        </div>
        <?php
            include 'log.php';
            session_start();
            if(!isset($_SESSION['logado'])){
                $nome1 = "Login";
                $n = " ";
                header('Location: index.php');
            }
            else{
                $n = $_SESSION['nome'];
                $arr = explode(' ', trim($n));
                $nome = $arr[0];
                $nome1 = "Olá, ".$nome."!";
                
            }
                
            ?>
            <?php 
            include 'conexao.php';
           
            //capturar o id do link
            if(!isset($_SESSION['logado'])){
                header('Location: index.php');
            }

            if(isset($_GET['token'])){
                $id = $_GET['token'];
                $s = "SELECT token FROM pets WHERE token = '$id'";
                $result = mysqli_query($conn,$s);
                $resultfinal = mysqli_num_rows($result);
                
                if($resultfinal == null){
                    header('Location: index.php');
                }
            }
            else{
                header('Location: dashboard.php');
            }

            // passar a logica no banco de dados
            $id_cliente = $_SESSION['id'];

            //usa o id do dono pra consultar qual é na tabela clientes
            $sql1 = "SELECT * from cadastro_cliente where id = $id_cliente";      
            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamentoNomeCliente = mysqli_fetch_array($resultadoCliente);

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
                </li>
                
                </div>
                
            </ul>
        </div>
    </div>
    </nav>
    <!-- modal login -->
    
    <p id="check">x</p>
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
        
        <div class="form-content-perfil4">
            
            
 
            <div class="">
                <h1> <?php echo "Est".$e." é ". $u ." pet ".$resultado['nome']; ?> </h1>
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
                    <h3 class="side-join2">Observação</h3><h3 class="side-join4"><?php echo $resultado['observacao']; ?></h3>
                </div>
                <!-- Versão abaixo para quando o site estiver hospedado. 
                    <img src="http://chart.apis.google.com/chart?cht=qr&chl=https://idpets.000webhostapp.com/pets.php??token=".$id."&chs=200x200">
                -->
                 </div>       
                
                </div>
            </div>
            <img src="<?php 
                    $url = "http://chart.apis.google.com/chart?cht=qr&chl=http://localhost/New%20folder/TCC/TCC/pets.php?token=".$id."&chs=200x200";        
                    echo $url ?>">

            <div class="ajustar-botão-pets">
                <div class="aj-botão">
                        <a class="voltar-pet" href="seuspets.php">Voltar</a>
                </div>
                <div class="aj-botão">
                        <a class="voltar-pet" href="pets.php?token=<?php echo $id;?>">Ver</a>
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