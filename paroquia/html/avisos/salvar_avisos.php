<?php
require_once "../func.php";

if (isset($_GET['id_avisos'])){ 
    $id_avisos = $_GET['id_avisos'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $detalnhes = $_POST['detalhes'];
    $id_secre = $_POST['avisos'];




    atualizar_aviso($conexao,$id_avisos,$nome,$descricao,$detalnhes,$id_secre );
}
    else {
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$detalnhes = $_POST['detalhes'];
$id_secre = $_POST['avisos'];


inserir_aviso($conexao,$nome,$descricao,$detalnhes,$id_secre );

}
    

header("Location:listar_avisos.php");

?>