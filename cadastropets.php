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
<?php
include 'conexao.php';
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

if(isset($_POST['botao-cadastro'])){

    $nomePet = $_POST['nome'];
    $idade = $_POST['idade'];
    $raca = $_POST['raca'];
    $porte = $_POST['porte'];
    $cor = $_POST['cor'];
    $sexo = $_POST['sexo'];

    // Verificar se todos os campos foram preenchidos
    if (empty($nomePet) or 
        empty($idade) or 
        empty($raca) or 
        empty($porte) or 
        empty($cor) or 
        empty($sexo)){
        $cadastro = "Não preencheu todos os campos";
    }
    else{
        $token = 1;
        //function gerarToken(){
            //gerar token para link
            $arr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'); 
            // get all the characters into an array
            shuffle($arr); // randomizar o array
            $arr = array_slice($arr, 0, 20); // pegar os caracteres do array de 0 a 20
            $token = implode('', $arr); // transforma o array em string novamente
        
            /*verificar token no banco de dados
            $query = "SELECT * from pets where token = '$token'";
            $result = mysqli_query($conn,$query);
            $rows = mysqli_num_rows($result);
            if($rows > 0){
                gerarToken();//+1
            }
            else{
                return $token;
            } */
       // } 
        echo $token.'<br><br>';
        echo $_SESSION['id'];
        $idCliente = $_SESSION['id'];

        $sql = "INSERT INTO pets (id_cliente,nome,raca,sexo,idade,porte,cor,token) VALUES(
            $idCliente,
            '$nomePet',
            '$raca',
            '$sexo',
            $idade,
            '$porte',
            '$cor',
            '$token'
            )";

        if(mysqli_query($conn,$sql)){
            $cadastro = "Cadastrado concluido com sucesso";
        }
        else{
            echo "Erro ao inserir o animal! Erro: ".mysqli_error($conn);
            $cadastro = "Erro ao cadastrar";
        }
    }
}
?>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda">
            <a href="">ID pets</a>
        </div>
        <div class="menu-central">
            <ul class="componentes-central">
                <li class="componentes-lista-central"><a href="index.php">Home</a></li>
                <li class="componentes-lista-central"><a href="cadastropets.php">Produtos</a></li>
                <li class="componentes-lista-central"><a href="#">Sobre</a></li>
            </ul>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome; ?></a></li>
                </div>
                <div class="wrap-botao-cadastrar">
                <li class="componentes-lista-direita"><a href="/Cadastro.php">Cadastro</a></li>
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
            <form action="<?php echo $_SERVER['PHP_SELF'];?>">
            
            <h1 class="login-title">Login</h1>
            <input type="text" placeholder="E-mail" id="inp-focus" name="login">
            <input type="password" placeholder="Senha" name="senha">
            <button class="botao-logar" name="logar" type="submit">Entrar</button>
            <p id="msg"></p>
            <h2>Esqueceu a senha ?</h2>
            <div class="line"></div>
            <button class="botao-cadastro" >Criar conta</button>

        </form>
        </div>
        
        </div>
    </div>
    <div class="pg-seuspets">
    <div class="form-background-wrap">
    <div class="form-background">
        <div class="form-content">
        <div class="form-content-perfil2">
        <form method="POST" action="cadastropets.php">
            <h1 class="login-title">Cadastre seu pet</h1>
            <input type="text" name="nome"placeholder="Nome" id="inp-name" autofocus>
            <input type="text" name="raca"placeholder="Raça">
            <input type="number" name="idade"placeholder="Idade">
            <input type="text" name="porte"placeholder="Porte">
            <input type="text" name="cor"placeholder="Cor">
            Sexo
            <select id="sex" name="sexo" class="">
                <option value="Macho">Macho</option>
                <option value="Femêa">Femêa</option>
                </select>
            <div class="line"></div>
            <button class="botao-cadastro" name="botao-cadastro">Cadastrar</button>
        </form>
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
    <?php echo $falha ?>
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