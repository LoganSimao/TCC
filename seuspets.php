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
        <a href="/tcc/dashboard.php">Cliente</a>
        <a href="/tcc/seuspets.php">Pets</a>
        <a href="/tcc/historico.php">Historico de compra</a>
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
                $idsessao = $_SESSION['id'];
                if($id != $idsessao){ 
                    header('Location: lost.html');//forbiden later
                }
            }
            
                // passar a logica no banco de dados
            $id = $_SESSION['id'];
            $sql1 = "SELECT * from cadastro_cliente where id = $id"; //usa o id do dono pra consultar qual é na tabela clientes     
            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamentoNomeCliente = mysqli_fetch_array($resultadoCliente);

            $sql2 = "SELECT * from pets where id_cliente = $id";
            $resultado = mysqli_query($conn, $sql2);
           
            
            ?>  
            <div class="form-content-perfil2">
                <h1> <?php echo $armazenamentoNomeCliente['nome'] ?> </h1>
            </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Pet</th>
                        </tr>				
                    </thead>

                    <?php  while($dados = mysqli_fetch_array($resultado)){ ?>

                    <tr>
                        <td><?php echo $dados['id']; ?></td>

                        <td><?php echo $dados['nome']; ?></td>

                        <td><a href="alterarpets.php?id=<?php $dados['id'];?>">
                        <img  style="background-color:grey;" src="imagens/edit.png"></a>
                        </td>

                        <td><a id="modaldeletar<?php echo $dados['id'];?>" href="#modal<?php echo $dados['id'];?>">
                        <img  style="background-color:#f44336;" src="imagens/delete.png"></a>
                        </td>

                        <td><a href="">
                        <img style="background-color:orange;" src="imagens/more.png"></a>
                        </td>
                    <!-- Modal Structure in Materializecss -->
							  <div id="modal<?php echo $dados['IdProd']; ?>" class="modal">
							    <div class="modal-content">
							      <h4>Aviso.</h4>
							      <p>Deseja excluir o Produto?</p>
							    </div>
							    <div class="modal-footer">
							      

							      <form action="php_action/excluir_produto.php" method="POST">
							      	<input type="hidden" name="IdProd" value="<?php echo $dados['IdProd']; ?>">

							      	<button type="submit" name="btn-excluir" class="btn red">Excluir</button>

							      	<a href="#!" class="modal-close waves-effect waves-green btn">Cancelar</a>

							      </form>
							    </div>
							  </div>
                    </tr>

                    <?php } ?>
                </table>
                <div class="consulta-pet">
                    <a class="cadastrar-pet" href="cadastropets.php">Cadastrar PET</a>
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