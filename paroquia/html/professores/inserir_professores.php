<?php

require_once "../func.php";

// Verifica se veio um ID de professor na URL
if (isset($_GET['id_professores'])) {

    $id_professores = $_GET['id_professores'];

    $resultado = buscar_professores($conexao, $id_professores);

    if ($resultado && ($professor = mysqli_fetch_assoc($resultado))) {

        $telefone = $professor['telefone'];
        $usuarios_id = $professor['usuarios_id'];

    } else {

        // Professor não encontrado
        $id_professores = null;
        $telefone = "";
        $usuarios_id = null;
    }

} else {

    // Novo professor
    $id_professores = null;
    $telefone = "";
    $usuarios_id = null;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $id_professores ? "Editar professor" : "Cadastrar professor"; ?>
    </title>
</head>

<body>

    <h1>
        <?php echo $id_professores ? "Editar professor" : "Cadastrar novo professor"; ?>
    </h1>

    <form
        action="salvar_professores.php<?php echo $id_professores ? '?id_professores=' . $id_professores : ''; ?>"
        method="POST"
    >

        <?php if ($id_professores): ?>

            <input
                type="hidden"
                name="id_professores"
                value="<?php echo htmlspecialchars($id_professores); ?>"
            >

        <?php endif; ?>


        <div>
            <label for="telefone">Telefone:</label>

            <input
                type="text"
                id="telefone"
                name="telefone"
                value="<?php echo htmlspecialchars($telefone); ?>"
                required
            >
        </div>

        <br>


        <div>
            <label for="usuarios_id">ID do usuário:</label>

            <input
                type="number"
                id="usuarios_id"
                name="usuarios_id"
                value="<?php echo htmlspecialchars($usuarios_id ?? ''); ?>"
                required
            >
        </div>

        <br>


        <button type="submit">
            <?php echo $id_professores ? "Atualizar" : "Cadastrar"; ?>
        </button>

        <a href="listar_professores.php">
            Cancelar
        </a>

    </form>

</body>

</html>