<?php

require_once "../func.php";

// Verifica se veio um ID de aluno na URL
if (isset($_GET['id_alunos'])) {

    $id_alunos = $_GET['id_alunos'];
    $id_cursos = $_GET['id_cursos'];

    $resultado = buscar_alunos($conexao, $id_alunos);

    if ($resultado && ($alunos = mysqli_fetch_assoc($resultado))) {

        $nome = $alunos['nome'];
        $cpf = $alunos['cpf'];
        $data_nascimento = $alunos['data_nascimento'];
        $usuarios_id = $alunos['usuarios_id'];

    } else {

        // Aluno não encontrado
        $id_alunos = null;
        $nome = "";
        $cpf = "";
        $data_nascimento = "";
        $usuarios_id = null;
        $id_cursos = null;
    }

} else {

    // Novo aluno
    $id_alunos = null;
    $nome = "";
    $cpf = "";
    $data_nascimento = "";
    $usuarios_id = null;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $id_alunos ? "Editar aluno" : "Cadastrar aluno"; ?>
    </title>
</head>

<body>

    <h1>
        <?php echo $id_alunos ? "Editar aluno" : "Cadastrar novo aluno"; ?>
    </h1>


    <form
    action="salvar_alunos.php"
    method="POST"
>


    <!--
        Se estiver editando,
        envia o ID do aluno.
    -->

    <?php if ($id_alunos) { ?>

        <input
            type="hidden"
            name="id_alunos"
            value="<?php echo $id_alunos; ?>"
        >

    <?php } ?>


    <!--
        Envia o ID do curso.
    -->

    <input
        type="hidden"
        name="id_cursos"
        value="<?php echo $id_cursos; ?>"
    >

        <!-- NOME DO ALUNO -->
        <label for="nome">Nome do aluno:</label><br>

        <input
            type="text"
            id="nome"
            name="nome"
            value="<?php echo htmlspecialchars($nome ?? ''); ?>"
            required
        >

        <br><br>


        <!-- CPF -->
        <label for="cpf">CPF do aluno:</label><br>

        <input
            type="text"
            id="cpf"
            name="cpf"
            value="<?php echo htmlspecialchars($cpf ?? ''); ?>"
            required
        >

        <br><br>


        <!-- DATA DE NASCIMENTO -->
        <label for="data_nascimento">Data de nascimento:</label><br>

        <input
            type="date"
            id="data_nascimento"
            name="data_nascimento"
            value="<?php echo htmlspecialchars($data_nascimento ?? ''); ?>"
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


        <!-- BOTÃO -->
        <input
            type="submit"
            value="<?php echo $id_alunos ? 'Atualizar aluno' : 'Inserir aluno'; ?>"
        >

    </form>

</body>

</html>
