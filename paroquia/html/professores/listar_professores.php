<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Professores</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }

        a {
            text-decoration: none;
        }

        .editar {
            color: blue;
        }

        .deletar {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Lista de professores</h2>

    <a href="inserir_professores.php">
        Cadastrar novo professor
    </a>

    <br><br>

    <table>

        <tr>
            <th>Telefone</th>
            <th>nome</th>
            <th>email</th>
            <th>Deletar</th>
            <th>Editar</th>
        </tr>

        <?php

        require_once "../func.php";

        $resultado = listar_professores($conexao);

        if ($resultado) {

            while ($professor = mysqli_fetch_assoc($resultado)) {

                    $id = $professor['id_professores'];
                    $telefone = $professor['telefone'];
                    $nome = $professor['nome'];
                    $email = $professor['email'];

                    echo "<tr>";


                    echo "<td class='telefone'>"
                        . htmlspecialchars($telefone)
                        . "</td>";


                    echo "<td class='telefone'>"
                        . htmlspecialchars($nome)
                        . "</td>";

                    echo "<td class='telefone'>"
                        . htmlspecialchars($email)
                        . "</td>";

                echo "<td>";
                echo "<a class='deletar' ";
                echo "href='deletar_professores.php?id_professores=" . $id . "' ";
                echo "onclick=\"return confirm('Tem certeza que deseja deletar este professor?');\">";
                echo "Deletar";
                echo "</a>";
                echo "</td>";

                echo "<td>";
                echo "<a class='editar' ";
                echo "href='inserir_professores.php?id_professores=" . $id . "'>";
                echo "Editar";
                echo "</a>";
                echo "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='4'>Nenhum professor encontrado.</td>";
            echo "</tr>";
        }

        ?>

    </table>

</body>

</html>