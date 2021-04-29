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
            <a href="">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="http://127.0.0.1:5500/index.html">Home</a></li>
                <li class="componentes-lista-central"><a href="http://127.0.0.1:5500/cadastropets.html">Produtos</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal">Login</a></li>
                </div>
                <div class="wrap-botao-cadastrar">
                <li class="componentes-lista-direita"><a href="https://idpets.000webhostapp.com/Cadastro.php">Cadastro</a></li>
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
    <div class="form-background">
        <div class="">
        <div class="content-pets">
            
            <?php
            
            //abrir conexao com banco
            $localhost = 'localhost';
            $usuario = 'root';
            $senha = '';
            $nomebanco = 'idpets';
           
            $conn = mysqli_connect($localhost,$usuario,$senha,$nomebanco);

            //capturar o id do link
            if(isset($_GET['id'])){
                $s = "SELECT * FROM pets WHERE id = $id";
                $id = $_GET['id'];
                $result = mysli_query($conn,$s);
                $resultfinal = mysqli_num_rows($result);
                echo "ECHO".$resultfinal;
                if($resultfinal == null){
                    header('Location: index.php');
                }
            }
            else{
                // fazer redirecionamento aqui...
                header('Location: index.php');
            }

            // passar a logica no banco de dados

            $sql = "SELECT * FROM pets WHERE id = $id"; //passa toda a tabela pets com o id

            $resultadoPets = mysqli_query($conn, $sql); //passa o banco com o comando
            $armazenamento1 = mysqli_fetch_array($resultadoPets); //recupera em um array o resultado

            $idCliente = $armazenamento1['id_cliente']; //pegando o id do cliente dentro da tabela do pet para pesquisar pelos dados do cliente na sua tabela
            $sql1 = "SELECT * from clientes where id = $idCliente"; //usa o id do dono pra consultar qual é na tabela clientes     

            $resultadoCliente = mysqli_query($conn, $sql1);
            $armazenamento = mysqli_fetch_array($resultadoCliente);
            mysqli_close($conn); // fechamento da conexao com o banco de dados para evitar problemas

            $oa = $armazenamento1['sexo'];

            if($oa == 'Femêa'){//cascata
                $a = "a";
                $A = "A";
            }
            else{
                $a = "o";
                $A = "O";
            }

            ?>

            <h1 class="titulo-pet">Você encontrou <?php echo $a."</h1><h1 class='nome-pet'> ".$armazenamento1['nome']?></h1>
            
            <p class="descricao"><?php echo $A." ".$armazenamento1['nome']?> 
            tem <?php echo $armazenamento1['idade']?> anos e
            é da raça <?php echo $armazenamento1['raca']?>!</p>
            <p class="descricao">Seu dono vai ficar muito feliz de saber que ele foi encontrado!</p>
            <div class="line"></div>
            <h2 class="contato">Aqui estão os dados de contato<h2>
            
            <h3>Nome: </h3><p><?php echo $armazenamento['nome']?></p>
            <h3>Celular: </h3><p><?php echo $armazenamento['celular']?></p>
            <h3>E-mail: </h3><p><?php echo $armazenamento['email']?></p>
            <div class="line"></div>
            <button class="botao-pet">Saber mais sobre o <?php echo $armazenamento1['nome']?></button>
            <!--fazer formato carta // usar a variavel sexo para definir o vulgo do pet... adicionar tipo de pet em cascata -->
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