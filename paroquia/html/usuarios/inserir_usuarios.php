<?php

require_once "../func.php";

// Verifica se veio um ID de usuário na URL
if (isset($_GET['id_usuarios'])) {

    $id_usuarios = $_GET['id_usuarios'];

    $resultado = buscar_usuarios($conexao, $id_usuarios);

    if ($resultado && ($usuario = mysqli_fetch_assoc($resultado))) {

        $nome = $usuario['nome'];
        $email = $usuario['email'];
        $senha = $usuario['senha'];

    } else {

        // Usuário não encontrado
        $id_usuarios = null;
        $nome = "";
        $email = "";
        $senha = "";
    }

} else {

    // Novo usuário
    $id_usuarios = null;
    $nome = "";
    $email = "";
    $senha = "";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $id_usuarios ? "Editar usuário" : "Cadastrar usuário"; ?>
    </title>
</head>

<body>

    <h1>
        <?php echo $id_usuarios ? "Editar usuário" : "Cadastrar novo usuário"; ?>
    </h1>

    <form
        action="salvar_usuarios.php<?php echo $id_usuarios ? '?id_usuarios=' . $id_usuarios : ''; ?>"
        method="POST"
    >

        <?php if ($id_usuarios): ?>
            <input
                type="hidden"
                name="id_usuarios"
                value="<?php echo htmlspecialchars($id_usuarios); ?>"
            >
        <?php endif; ?>

        <div>
            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($nome); ?>"
                required
            >
        </div>

        <br>

        <div>
            <label for="email">E-mail:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo htmlspecialchars($email); ?>"
                required
            >
        </div>

        <br>

        <div>
            <label for="senha">Senha:</label>
            <input
                type="password"
                id="senha"
                name="senha"
                value="<?php echo htmlspecialchars($senha); ?>"
                required
            >
        </div>

        <br>

        <button type="submit">
            <?php echo $id_usuarios ? "Atualizar" : "Cadastrar"; ?>
        </button>

        <a href="listar_usuarios.php">Cancelar</a>

    </form>

</body>

</html>