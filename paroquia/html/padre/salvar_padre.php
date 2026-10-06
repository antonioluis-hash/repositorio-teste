<?php
require_once "../func.php";

if (isset($_GET['id_padre'])){ 
    $id_padre = $_GET['id_padre'];
    $telefone = $_POST['telefone'];
    $usuarios_id = $_POST['usuarios_id'];

    atualizar_padre($conexao,$id_padre,$telefone,$usuarios_id );

    } else {
$telefone = $_POST['telefone'];
$usuarios_id = $_POST['usuarios_id'];

inserir_padre($conexao,$telefone,$usuarios_id );

}
    
header("Location:listar_padre.php");

?>