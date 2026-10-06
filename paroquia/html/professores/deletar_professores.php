<?php
require_once "../func.php";

$id = $_GET['id_professores'];


deletar_professores($conexao,$id );

header("Location:listar_professores.php");

?>