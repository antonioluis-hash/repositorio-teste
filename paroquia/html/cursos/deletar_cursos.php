<?php
require_once "../func.php";

$id = $_GET['id_cursos'];


deletar_cursos($conexao,$id );

header("Location:listar_cursos.php");

?>