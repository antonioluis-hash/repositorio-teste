<?php

require_once "../func.php";

// Verifica se veio um ID de padre na URL
if (isset($_GET['id_padre'])) {

    $id_padre = $_GET['id_padre'];

    $resultado = buscar_padre($conexao, $id_padre);

    if ($resultado && ($padre = mysqli_fetch_assoc($resultado))) {

        $telefone = $padre['telefone'];
        $id_usuarios = $padre['usuarios_id'];

    } else {

        // padre não encontrado
        $id_padre = null;
        $telefone = "";
        $usuarios_id = null;
    }

    } else {

    // Novo padre
     $id_padre = null;
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
        <?php echo $id_padre ? "Editar padre" : "Cadastrar padre"; ?>
    </title>
</head>

<body>

<h1>
        <?php echo $id_padre ? "Editar padre" : "Cadastrar novo padre"; ?>
    </h1>


    <form
        action="salvar_padre.php<?php echo $id_padre ? '?id_padre=' . $id_padre : ''; ?>"
        method="POST"
    >

    <label for="telefone">Telefone:</label>
        <input
            type="text"
            id="telefone"
            name="telefone"
            value="<?php echo htmlspecialchars($telefone); ?>"
            required
        >

        <br><br>

        <!-- USUÁRIO -->
        <label for="usuarios_id">Usuário:</label><br>

        <select name="usuarios_id" id="usuarios_id" required>

            <option value="">Selecione um usuário</option>

            <?php

            $usuarios = listar_usuarios($conexao);

            if ($usuarios) {

                while ($usuario = mysqli_fetch_assoc($usuarios)) {

                    $id = $usuario['id_usuarios'];
                    $nome_usuario = $usuario['nome'];

                    $selected = (
                        $usuarios_id == $id
                    ) ? "selected" : "";

                    echo "<option value='$id' $selected>";
                    echo htmlspecialchars($nome_usuario);
                    echo "</option>";
                }
            }

            ?>

        </select>

        <br><br>


        <button type="submit">
            <?php echo $id_padre ? "Atualizar padre" : "Cadastrar padre"; ?>
        </button>

    </form>

</body>

</html>


