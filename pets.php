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
<?php       
            include 'log.php';
            session_start();
            //$_SESSION['idt'] = $_GET['id'];
            //include 'conexao.php';
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

            //capturar o id do link
            //if(isset($_GET['logar'])){
                //n fazer nada
            //}
           
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
                header('Location: index.php');
            }
            
            
            
                // fazer redirecionamento aqui...
            

            // passar a logica no banco de dados
            //$id = $_SESSION['idt'];
            //echo "ID AQUI ".$id;
            $sql = "SELECT * FROM pets WHERE token = '$id'"; //passa toda a tabela pets com o id

            $resultadoPets = mysqli_query($conn, $sql); //passa o banco com o comando
            $armazenamento1 = mysqli_fetch_array($resultadoPets); //recupera em um array o resultado

            $idCliente = $armazenamento1['id_cliente']; //pegando o id do cliente dentro da tabela do pet para pesquisar pelos dados do cliente na sua tabela
            $sql1 = "SELECT * from cadastro_cliente where id = $idCliente"; //usa o id do dono pra consultar qual é na tabela clientes     

            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamento = mysqli_fetch_array($resultadoCliente);
            mysqli_close($conn); // fechamento da conexao com o banco de dados para evitar problemas

            $oa = $armazenamento1['sexo'];

            if($oa == 'Femêa'){
                $a = "a";
                $A = "A";
                $e = "a";
            }
            else{
                $a = "o";
                $A = "O";
                $e = "e";
            }

            ?>
    <p id="check">z</p>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda" id="ml"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets</a>
        </div>
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
            <form action="index.php"  method="post">         
                <h1 class="login-title">Login</h1>
                <input type="text" placeholder="E-mail" id="inp-focus" name="login">
                <input type="password" placeholder="Senha" name="senha" id ="senha">
                <button class="botao-logar" type="submit">Entrar</button>
                <p id="msg"></p>
                <a href="recuperar_senha.php"><h2>Esqueceu a senha ?</h2></a>
                <div class="line"></div>
                <a class="botao-cadastro" >Criar conta</a>
            </form>
        </div>
        </div>
    </div>
    
    <div class="form-background-f">
        <div class="content-wrap">
            <div class="content-pets">

                <h1 class="titulo-pet">Você encontrou <?php echo $a."</h1><h1 class='nome-pet'> ".$armazenamento1['nome']?></h1>
                
                <p class="descricao"><?php echo $A." ".$armazenamento1['nome']?> 
                tem <?php echo $armazenamento1['idade']?> anos e
                é da raça <?php echo $armazenamento1['raca']?>!</p>
                <p class="descricao">Seu dono vai ficar muito feliz de saber que el<?php echo $e;?> foi encontrad<?php echo $a;?>!</p>
                <div class="line"></div>
                <h2 class="contato">Aqui estão os dados de contato<h2>
                
                <h3>Nome </h3><p><?php echo $armazenamento['nome']?></p>
                <h3>Número </h3><p><?php echo $armazenamento['telefone']?></p>
                <h3>E-mail </h3><p><?php echo $armazenamento['email']?></p>
                <div class="line"></div>
                <div class="bt-alinhar">
                    <a href="maispets.php?token=<?php echo $id?>"><button class="botao-pet">Saber mais sobre <?php echo $a." ".$armazenamento1['nome']?></button></a>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1621127856">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <script src="script.js"></script>
    <?php echo $falha; ?>
</body>

</html>