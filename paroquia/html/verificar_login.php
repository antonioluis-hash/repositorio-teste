<?php
session_start();
require_once "func.php";

if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sucesso = login($conexao, $nome, $senha);

    if ($sucesso === true) {

        $su = verificarAdmin();

        if ($su === true) {
            header("Location: secretaria/inicio_s.php");
            exit;
        } elseif ($su === false) {
            header("Location: index.php");
            exit;
        }

    } elseif ($sucesso === false) {

       header("Location: login.php?erro=1");

}}
?>