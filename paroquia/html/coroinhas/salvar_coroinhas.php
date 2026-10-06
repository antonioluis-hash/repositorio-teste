<?php
require_once "../func.php";

if (isset($_GET['id_coroinhas'])){ 
    $id_coroinhas = $_GET['id_corinhas'];
    $data_nascimento = $_POST['localizacao'];
    $data_iniciacao = $_POST['horario'];
    $usuarios_id = $_POST['usuarios_id'];




    atualizar_coroinha($conexao,$id_coroinhas,$data_nascimento,$data_iniciacao,$usuarios_id );
}
    else {
$data_nascimento = $_POST['data_nascimento'];
$data_iniciacao = $_POST['data_iniciacao'];
$usurios_id = $_POST['usuarios_id'];


inserir_coroinha($conexao,$id_coroinhas,$data_nascimento,$data_iniciacao,$usuarios_id  );

}
    

header("Location:listar_coroinhas.php");

?>