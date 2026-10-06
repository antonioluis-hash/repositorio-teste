<?php

require_once "../func.php";

if (isset($_GET['id_usuarios'])) {

    // Atualizar usuário
    $id_usuarios = $_GET['id_usuarios'];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    atualizar_usuarios(
        $conexao,
        $id_usuarios,
        $nome,
        $email,
        $senha
    );

} else {

    // Inserir novo usuário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    inserir_usuarios(
        $conexao,
        $nome,
        $email,
        $senha
    );
}

header("Location: listar_usuarios.php");
exit;

?>