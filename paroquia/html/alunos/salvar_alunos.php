<?php
require_once "../func.php";
$id_cursos = $_POST['id_cursos'];

if (isset($_POST['id_alunos'])){ 
    $id_alunos = $_POST['id_alunos'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $usuarios_id = $_POST['usuarios_id'];

    atualizar_alunos($conexao,$id_alunos,$nome,$cpf,$data_nascimento,$usuarios_id );

    } else {
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$usuarios_id = $_POST['usuarios_id'];


inserir_alunos($conexao,$nome,$cpf,$data_nascimento,$usuarios_id );

}
    

header("Location: listar_alunos.php?id_cursos=" . $id_cursos);
?>