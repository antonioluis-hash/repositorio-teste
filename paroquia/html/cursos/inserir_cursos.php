<?php

require_once "../func.php";

// Verifica se veio um ID de curso na URL
if (isset($_GET['id_cursos'])) {

    $id_cursos = $_GET['id_cursos'];

    $resultado = buscar_cursos($conexao, $id_cursos);

    if ($resultado && ($cursos = mysqli_fetch_assoc($resultado))) {

        $nome = $cursos['nome'];
        $horario = $cursos['horario'];
        $avisos = $cursos['avisos'];
        $professores_id = $cursos['professores_id'];

    } else {

        // curso não encontrado
        $id_cursos = null;
        $nome = "";
        $horario = "";
        $avisos = "";
        $professores_id = null;
    }

} else {

    // Novo curso
    $id_cursos = null;
    $nome = "";
    $horario = "";
    $avisos = "";
    $professores_id = null;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $id_cursos ? "Editar curso" : "Cadastrar curso"; ?>
    </title>
</head>

<body>

    <h1>
        <?php echo $id_cursos ? "Editar curso" : "Cadastrar novo curso"; ?>
    </h1>


    <form
        action="salvar_cursos.php<?php echo $id_cursos ? '?id_cursos=' . $id_cursos : ''; ?>"
        method="POST"
    >

     <label for="nome">Nome do curso:</label>
        <input
            type="text"
            id="nome"
            name="nome"
            value="<?php echo htmlspecialchars($nome); ?>"
            required
        >

        <br><br>

        <label for="horario">Horário:</label>
        <input
            type="text"
            id="horario"
            name="horario"
            value="<?php echo htmlspecialchars($horario); ?>"
            required
        >

        <br><br>

        <label for="avisos">Avisos:</label>
        <textarea
            id="avisos"
            name="avisos"
            rows="5"
            cols="40"
        ><?php echo htmlspecialchars($avisos); ?></textarea>

        <br><br>

        <label for="professores_id">ID do professor:</label>
        <input
            type="number"
            id="professores_id"
            name="professores_id"
            value="<?php echo htmlspecialchars($professores_id ?? ''); ?>"
            required
        >

        <br><br>

        <button type="submit">
            <?php echo $id_cursos ? "Atualizar curso" : "Cadastrar curso"; ?>
        </button>

    </form>

</body>

</html>


