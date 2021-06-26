<?php
include 'conexao.php';

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
    //echo " >".$token." < função rodou";
    $final = $token1.$extratoken;
    echo "primeiro tok: ".$token1.", segundo: ".$extratoken.", juntos:".$final;
}
gerarToken();
/*verificar token no banco de dados */
$query = "SELECT * from pets where token = '$token1'";
$result = mysqli_query($conn,$query);
$rows = mysqli_num_rows($result);
//echo $token1." --- ".$rows;
if($rows > 0){
    echo " - token normal ".$final;
    //token normal >  $token = $token1;
    $token = $final;
}
else{
    echo " - token normal ".$token1;
    //token normal >  $token = $token1;
    $token = $token1;
}

?>