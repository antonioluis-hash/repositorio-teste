<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avisos</title>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f5f5f5;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }
    </style>
</head>

<body>

<h2>Lista de coroinhas</h2>

<table>

    <tr>
        <th>Localização</th>
        <th>Horário</th>
        <th>Padre</th>
        <th colspan="2" >Ações</th>
    </tr>

    <?php

    require_once "../func.php";

    $coroinhas = listar_coroinhas($conexao);

    while ($coroinhas = mysqli_fetch_assoc($corinhas)) {

        $id = $coroinhas['id_coroinhas'];
        $data_nascimento = $coroinhas['data_nascimento'];
        $data_iniciacao = $coroinhas['data_iniciacao'];
        $usuarios_id = $coroinhas['usuarios_id'];

        echo "<tr>";

        echo "<td>" . $data_nascimento . "</td>";
        echo "<td>" . $data_iniciacao . "</td>";

        echo "<td>";
        echo "<a href='deletar_coroinhas.php?id_coroinhas=" . $id . "'>Deletar</a>";
        echo "</td>";

        echo "<td>";
        echo "<a href='inserir_coroinhas.php?id_coroinhas=" . $id . "'>editar</a>";
        echo "</td>";


        echo "</tr>";
    }

    ?>

    <tr>
        <td colspan="5">
            <a href="inserir_coroinhas.php">Cadastrar novo coroinha</a>
        </td>
    </tr>

</table>

</body>
</html>
