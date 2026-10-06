<?php
require_once "../func.php";

$id = $_GET['id_alunos'];


deletar_alunos($conexao,$id );

header("Location:listar_alunos.php");

?>