<?php
require_once "../func.php";

if (isset($_GET['id_missas'])){ 
    $id_missas = $_GET['id_missas'];
    $localizacao = $_POST['localizacao'];
    $horario = $_POST['horario'];
    $detalnhes = $_POST['padre_ce'];
    $padre_id = $_POST['padre_id'];




    atualizar_missas($conexao,$id_missas,$localizacao,$horario,$detalnhes,$padre_id );
}
    else {
$localizacao = $_POST['localizacao'];
$horario = $_POST['horario'];
$detalnhes = $_POST['padre_ce'];
$padre_id = $_POST['padre_id'];


inserir_missas($conexao,$localizacao,$horario,$detalnhes,$padre_id );

}
    

header("Location:listar_missas.php");

?>