<?php
require_once "../func.php";

if (isset($_GET['id_cursos'])){ 
    $id_cursos = $_GET['id_cursos'];
    $nome = $_POST['nome'];
    $horario = $_POST['horario'];
    $avisos = $_POST['avisos'];
    $professores_id = $_POST['professores_id'];

    atualizar_cursos($conexao,$id_cursos,$nome,$horario,$avisos,$professores_id );

    } else {
    $nome = $_POST['nome'];
    $horario = $_POST['horario'];
    $avisos = $_POST['avisos'];
    $professores_id = $_POST['professores_id'];

inserir_cursos($conexao,$nome,$horario,$avisos,$professores_id );

}
    

header("Location:listar_cursos.php");

?>