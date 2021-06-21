<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<?php
    $localhost = "localhost";
    $user = "root";
    $senha = "";
    $db = "pet";
    $id = 1;
    $cadastro = "<h2 class='resposta2'> </h2>";
    
    $conexao = mysqli_connect($localhost,$user,$senha,$db);
    
    if(mysqli_connect_errno($conexao)){
        echo "Erro ao tentar se conectar com o banco de dados! Erro: ".mysqli_connect_error();
    }
    //Cadastro Clientes
    else{
        if (isset($_POST['cadastro'])){
            
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $senhaCadastro = $_POST['senha'];
            $cep = $_POST['cep'];
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $numero = $_POST['numero'];
            $telefone = $_POST['telefone'];

            // Verificar se todos os campos foram preenchidos
            if (empty($nome) or 
                empty($cpf) or 
                empty($email) or 
                empty($senhaCadastro) or 
                empty($cep) or 
                empty($endereco) or 
                empty($bairro) or 
                empty($cidade) or 
                empty($estado) or 
                empty($numero) or 
                empty($telefone)){
                $cadastro = "Não preencheu todos os campos";
            }

            else{
            
                $cpf = $_POST['cpf']; // Antes de cadastrar o CPF é consultado no Banco de dados.

                $sql = "SELECT CPF FROM cadastro_cliente WHERE CPF = '$cpf'";
                $result = mysqli_query($conexao,$sql);
                $row = mysqli_fetch_assoc($result);
            
                if($row > 0){ 
                    //Caso a pesquisa consta com verdadeiro o cadastro não seguira em frente.
                    $cadastro = $cpf." já possui cadastro!";
                }
                
                else{
                    $email = $_POST['email'];// Depois de verificar o CPF, o email será verificado

                    $sql = "SELECT EMAIL FROM cadastro_cliente WHERE EMAIL = '$email'";
                    $result2 = mysqli_query($conexao,$sql);
                    $row2= mysqli_fetch_assoc($result2);

                    if($row2 > 0){
                        $cadastro = $email." ja possui cadastro!";
                    }
                    // Caso CPF e Email não constar ja cadastrado, segue com cadastro...
                    else{
                        //captura a senha que foi colocada pelo usuario e encripita
                        $pass = $_POST['senha'];
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $hashFinal = "'".$hash."'";

                        $sql = "SELECT ID FROM cadastro_cliente ORDER BY id DESC LIMIT 1";
                        $consulta = mysqli_query($conexao,$sql);
                        
                        // Geração de ID a partir do ultimo ID registrado no Banco de Dados.
                        while($clientes_array = mysqli_fetch_array($consulta)){
                            $identifica = $clientes_array['ID'];
                            $id = $identifica + 1; 
                        }
                        $confirmar_email = 'Não';
                        $token = 1;

                        $sql = "INSERT INTO cadastro_cliente (id,nome,CPF,email,senha,cep,endereco,bairro,cidade,estado,complemento,numero,telefone,confirmar_email,token) VALUES(
                            $id,
                            '$_POST[nome]',
                            '$_POST[cpf]',
                            '$_POST[email]',
                            $hashFinal,
                            '$_POST[cep]',
                            '$_POST[endereco]',
                            '$_POST[bairro]',
                            '$_POST[cidade]',
                            '$_POST[estado]',
                            '$_POST[complemento]',
                            '$_POST[numero]',
                            '$_POST[telefone]',
                            '$confirmar_email',
                            $token)";

                        if(mysqli_query($conexao,$sql)){
                            $cadastro = "Cadastrado concluido com sucesso";
                            
                            require 'PHPMailer/PHPMailerAutoload.php';
                        
                            $mail = new PHPMailer();
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'tls';
                            $mail->Username = 'no.replay.idpets@gmail.com';
                            $mail->Password = 'otaku1234';
                            $mail->Port = 587;
                            $mail->isHTML();
                            $mail->Subject = 'Confirme seu e-mail';
                            $mail->Body = '<h1>Olá,'.$_POST['nome'].'</H1><P>clique <a href="http://localhost/New%20folder/TCC/TCC/confirmar_email.php?email='.$email.'">aqui</a> para confirmar seu email!</P>';
                            $mail->AddAddress($email);
                        
                            $mail->Send(); 
                        }
                        else{
                            echo "Erro ao inserir cliente! Erro: ".mysqli_error($conexao);
                            $cadastro = "Erro ao cadastrar";
                        }                    
                    }
                }
            }
        }
        mysqli_close($conexao);
    }
?>
<?php include 'log.php'; //pagina onde faz a verificação do login
    session_start();
    
    if(!isset($_SESSION['logado'])){
        $nome = "Login";
        $n = " ";      
    }
    else{
        $n = $_SESSION['nome'];
        $arr = explode(' ', trim($n));
        $nome = $arr[0];
        header('Location: dashboard.php');
    }

    ?>
    <p id="check">n</p>
    <nav class="menu-navegacao">
    <div class="menu-nav-menu">
        <div class="menu-esquerda"><img src="imagens/Vectorpaw.png" alt=" "></a>
            <a href="index.php">ID Pets</a>
        </div>
        <div class="menu-direita">
            <ul class="componentes-direita">
                <div class="wrap-botao-login">
                <li class="componentes-lista-direita"><a id="botao-modal"><?php echo $nome; ?></a>
                <!-- botao logout -->
                <div class="clos-modal" id="clos-modal">
                    <div class="logout" id="logout">
                        <div class="alinhar-logout">
                        <div class="">
                            <h3><?php echo $n?></h3>
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

    <div id="login" class="login-principal">
        <div class ="login-form" id="login-ani">
        <div class="wrap-login">
            <!--add logo-->
            <span class="close" id="close">&times;</span>
            <form action="index.php"  method="post">         
                <h1 class="login-title">Login</h1>
                <input type="text" placeholder="E-mail" id="inp-focus" name="login">
                <input type="password" placeholder="Senha" name="senha" id ="senhalog">
                <div class="alinhar">
                    <div class="ali">
                        <button class="botao-logar" type="submit">Entrar</button>
                    </div>
                </div>
                <p id="msg"></p>
                <a href="recuperar_senha.php"><h2>Esqueceu a senha ?</h2></a>
                <div class="line"></div>
                <a class="botao-cadastro" >Criar conta</a>
            </form>
        </div>
        </div>
    </div>
<body>
<div class="pg-seuspets">
    <div class="form-background-wrap">
      <div class="form-background-cadastro">
        
        <div class="form-content-cadastro">
        <div class="form-content-cadastro2">
            <h1>Cadastre-se</h1>
        </div>
        
            <div class="content-cadastro">
            
            <form name="cadastro" method="POST" action="Cadastro.php">
                <!--<p class="form2">Nome</p> -->
                <input type="text" placeholder="Nome" name="nome"class="form-campo" required>

            
                <!-- <p class="form2">CPF</p> -->
                <input type="text" placeholder="CPF" name="cpf"class="form-campo" oninput="mascara(this)">

                <!-- <p class="form2">E-mail</p> -->
                <input type="email" placeholder="E-mail" name="email"class="form-campo">

                <!-- <p class="form2">Senha</p> -->
                <input type="password" placeholder="Senha" name="senha" id ="senha" class="form-password">

                <input type="password" placeholder="Confirmar senha" name="senha2" id="senha2" class="form-password">

                <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

                <input id="cep" name="cep" type="text" placeholder="CEP" class="form-campo"required/>

                <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-campo" required/>

                <input id="bairro" name="bairro" type="text" 
                placeholder="Bairro" class="form-bairro" required/>
                <!---->
                <div class="cidade-estado">
                    <div class="form-cidade">
                        <input id="cidade" name="cidade" type="text" 
                        placeholder="Cidade"  required/>
                    </div>
                    <div class="form-estado">      
                        <select id="uf" name="estado" >
                        <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP" selected>SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div> 
                <div class="complemento-numero">
                <div class="form-complemento">
                    <input id="complemento" name="complemento" placeholder="Complemento"  type="text"/>
                </div>
                <div class="form-numero">
                    <input id="numero" name="numero" type="text" placeholder="Nº"  required/>
                </div>
                </div>

                <!-- <p class="form2">Telefone</p> -->
                <input type="text" placeholder="Contato" name="telefone" id="telefone" class="form-campo" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" >
                <div class="consulta-pet">
                <a href="index.php" class="voltar-pet"> Voltar</a>

                <p class="resposta">
                    
                <?php echo $cadastro; ?>
                
                </p>

                <button type="submit" value="Cadastrar" class="botao-alterar" name="cadastro" onClick="validarSenha()" id="Cadastrar"style="display:invisible">Cadastrar</button>
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
</body>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="script2.js"></script>
</html>