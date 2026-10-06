<?php

$host = "mysql_lab";
$user = "root";
$password = "123";
$bd = "Banco";

$conexao = new mysqli($host, $user, $password, $bd);

if($conexao->connect_error){
    die("erro na conexão" . $conexao->connect_error);

}



?>