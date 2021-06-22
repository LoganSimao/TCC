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
                    }
                    else{
                        $n = $_SESSION['nome'];
                        $arr = explode(' ', trim($n));
                        $nome = $arr[0];
                        $nome1 = "Olá, ".$nome."!";
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
        
                <?php 
            include 'conexao.php';
           

            //capturar o id do link
            if(!isset($_SESSION['logado'])){
                header('Location: index.php');
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "DELETE from pets where id = $id";
                if(mysqli_query($conn, $sql)){
                    $_SESSION['mensagem'] = "Pet excluido com sucesso!";
                }

            }
            
                // passar a logica no banco de dados
            $id = $_SESSION['id'];

            $sql2 = "SELECT * from pets where id_cliente = $id";
            $resultado = mysqli_query($conn, $sql2);
            $msg = "";
            if(isset($_SESSION['mensagem'])){
                $msg = $_SESSION['mensagem'];
            }
            
            ?>  
               
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

    <?php
    while($dados = mysqli_fetch_array($resultado)){
    ?>

    <div id="modal<?php echo $dados['id']; ?>" style="display:none;" class="modal-cl">
                              <div class="god-modal">
							    <div class="modal-content">
                                <span class="close-sp" id="close-sp<?php echo $dados['id']; ?>">&times;</span>
                                <div class="modal-wrap">
                                    <h4>Voce está prestes a excluir um cadastro!</h4>
                                    <p>Deseja excluir o cadastro de <?php echo$dados['nome']; ?>?</p>
                                
							    
							    
							      <form action="seuspets.php?id=<?php echo $dados['id'];?>" method="POST">
							      	<input type="hidden" name="IdPet" value="<?php echo $dados['id']; ?>">

							      	<button type="submit" name="btn-excluir" class="btn-excluir">Excluir</button>

							      	<a href="seuspets.php" class="btn-cancel">Cancelar</a>

							      </form>
                                  </div>
							    </div>
							  </div>
                            </div>
                            <?php } ?>
    <div class="pg-seuspets">
    <!--<div class="pg-bg">-->
    <div class="form-background-wrap">
      <div class="form-background">
        
        <div class="form-content-perfil2">
            
            
            <div class="form-content-greeting">
                <h1> Seus pets <?php //echo $nome ?> </h1>
                <!-- <p><?php //echo $msg ?></p> -->
            </div>
                <div class="table-class">
                <table >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Pet</th>
                        </tr>				
                    </thead>
                    <?php  
                    $sql2 = "SELECT * from pets where id_cliente = $id";
                    $resultado = mysqli_query($conn, $sql2);
                    while($dados = mysqli_fetch_array($resultado)){ ?>

                    <tr>
                        <td><?php echo $dados['id']; ?></td>

                        <td><?php echo $dados['nome']; ?></td>

                        <td class="tabelapet"><a href="alterarpets.php?id=<?php echo $dados['id'];?>">
                        <img  class="edi"title="Editar"  src="imagens/edit.png"></a>
                        </td>

                        <td><a id="modaldeletar<?php echo $dados['id'];?>">
                        <img  class="del"title="Excluir"  src="imagens/delete.png"></a>
                        </td>

                        <td><a href="maispets.php?id=<?php echo $dados['id'];?>">
                        <img class="saber"title="Saber mais"  src="imagens/more.png"></a>
                        </td>
                    <!-- Modal Structure in Materializecss -->
                            
							  
                            <!---->
                              <script type="text/javascript">
                                var del = document.getElementById("modaldeletar<?php echo $dados['id']; ?>");
                                var clos = document.getElementById("close-sp<?php echo $dados['id']; ?>");
                                del.onclick = function(){
                                    var m = document.getElementById("modal<?php echo $dados['id']; ?>");
                                    m.style.display = "block";
                                }
                                clos.onclick = function(){
                                    var m = document.getElementById("modal<?php echo $dados['id']; ?>");
                                    m.style.display = "none";
                                }

                                
                              </script>
                    </tr>

                    <?php } ?>
                </table>
                </div>
                <div class="consulta-pet">
                    <a class="cadastrar-pet" href="cadastropets.php">Cadastrar PET</a>
                </div>
            </div>
            </div>
            </div>
    </div>

        </div>
        <!--</div>-->
        </div>
    <div class="custom-shape-divider-bottom-1621127856">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>  
    <script src="script.js"></script>
</body>

</html>