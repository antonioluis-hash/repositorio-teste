<?php
require_once "../func.php";

$id = $_GET['id_missa'];


deletar_missas($conexao,$id );

header("Location:listar_missas.php");

?>