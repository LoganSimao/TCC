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
include 'conexao.php';
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
    $cadastro = " ";
}



if(isset($_POST['botao-cadastro'])){

    $nomePet = $_POST['nome'];
    $idade = $_POST['idade'];
    $raca = $_POST['raca'];
    $porte = $_POST['porte'];
    $cor = $_POST['cor'];
    $sexo = $_POST['sexo'];
    $observacao = $_POST['observacao'];

    // Verificar se todos os campos foram preenchidos
    if (empty($nomePet) or 
        empty($idade) or 
        empty($raca) or 
        empty($porte) or 
        empty($cor) or 
        empty($sexo)){
        $cadastro = "Preencha todos os campos";
    }
    else{
        function gerarToken(){
            //gerar token para link
            global $token1;
            global $final;
            $arr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'); 
            $arr1 = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789');
            shuffle($arr); // randomizar o array
            shuffle($arr1);
            $arr = array_slice($arr, 0, 20); // pegar os caracteres do array de 0 a 20
            $arr1 = array_slice($arr1, 0, 3);
            $token1 = implode('', $arr); // transforma o array em string novamente
            $extratoken = implode('', $arr1);

            $final = $token1.$extratoken;

        }
        gerarToken();
        /*verificar token no banco de dados */
        $query = "SELECT * from pets where token = '$token1'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            $token = $final;
        }
        else{
            $token = $token1;
        }

        $idCliente = $_SESSION['id'];

        $sql = "INSERT INTO pets (id_cliente,nome,raca,sexo,idade,porte,cor,observacao,token) VALUES(
            $idCliente,
            '$nomePet',
            '$raca',
            '$sexo',
            $idade,
            '$porte',
            '$cor',
            '$observacao',
            '$token'
            )";

        if(mysqli_query($conn,$sql)){
            $cadastro = "Cadastrado com sucesso";
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
        <div class="menu-esquerda"><img src="imagens/Vectorpaw.png" alt=" "></a>
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
        <div class="form-content">
        <div class="form-content-perfil2">
        <form method="POST" action="cadastropets.php">
            <h1 class="l-title">Cadastre seu pet</h1>
            <input type="text" name="nome"placeholder="Nome" id="inp-name" autofocus>
            <input type="text" name="raca"placeholder="Raça">
            <input type="number" name="idade"placeholder="Idade">
            <input type="text" name="porte"placeholder="Porte">
            <input type="text" name="cor"placeholder="Cor">
            <div class="so-pet">
            <select id="sex" name="sexo" class="so-size">
                <option value="Sexo">Sexo</option>
                <option value="Macho">Macho</option>
                <option value="Femêa">Femêa</option>
                </select>
            </div>
            <input type="text" maxlength="100" name="observacao"placeholder="Observação">
            <div class="line"></div>
            <div class="al-msg">
                <div class="msg-content">
                    <h4>
                        <?php echo $cadastro; ?>
                    </h4>
                </div>
            </div>
            <div class="bt-pet-cadastro">
                <button class="botao-cadastro" name="botao-cadastro">Cadastrar</button>
            </div>
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

</body>

</html>