<?php

function gerarToken(){
    //gerar token para link
    $arr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'); // get all the characters into an array
    shuffle($arr); // randomize the array
    $arr = array_slice($arr, 0, 20); // get the first six (random) characters out
    $token = implode('', $arr); // smush them back into a string

    //verificar token no banco de dados
    $query = "SELECT * from pets where token = $token";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        gerarToken();
    }
    else{
        return $token;
    }
}
?>
