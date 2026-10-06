<?php
require_once "../func.php";

$id = $_GET['id_coroinhas'];


deletar_coroinha($conexao,$id );

header("Location:listar_coroinhas.php");

?>