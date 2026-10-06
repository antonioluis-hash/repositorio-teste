<?php

require_once "../func.php";

if (isset($_GET['id_professores'])) {

    // Atualizar professor
    $id_professores = $_GET['id_professores'];

    $telefone = $_POST['telefone'];
    $usuarios_id = $_POST['usuarios_id'];

    atualizar_professores(
        $conexao,
        $id_professores,
        $telefone,
        $usuarios_id
    );

} else {

    // Inserir novo professor
    $telefone = $_POST['telefone'];
    $usuarios_id = $_POST['usuarios_id'];

    inserir_professores(
        $conexao,
        $telefone,
        $usuarios_id
    );
}

header("Location: listar_professores.php");
exit;

?>