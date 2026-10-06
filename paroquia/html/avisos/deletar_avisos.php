<?php
require_once "../func.php";

$id = $_GET['id_avisos'];


deletar_aviso($conexao,$id );

header("Location:listar_avisos.php");

?>