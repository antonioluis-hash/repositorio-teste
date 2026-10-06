<?php
require_once "../func.php";

$id = $_GET['id_usuarios'];


deletar_usuarios($conexao,$id );

header("Location:listar_usuarios.php");

?>