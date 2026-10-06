<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Usuários</title>

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
            margin-right: 10px;
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

    <h2>Lista de usuários</h2>

    <a href="inserir_usuarios.php">Cadastrar novo usuário</a>

    <br><br>

    <table>

        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>

        <?php

        require_once "../func.php";

        $resultado = listar_usuarios($conexao);

        if ($resultado) {

            while ($usuario = mysqli_fetch_assoc($resultado)) {

                $id = $usuario['id_usuarios'];
                $nome = $usuario['nome'];
                $email = $usuario['email'];
                $senha = $usuario['senha'];

                echo "<tr>";

                echo "<td>" . htmlspecialchars($nome) . "</td>";

                echo "<td>" . htmlspecialchars($email) . "</td>";

                echo "<td>" . htmlspecialchars($senha) . "</td>";

                echo "<td>";

                echo "<a class='editar' href='inserir_usuarios.php?id_usuarios=" . $id . "'>";
                echo "Editar";
                echo "</a>";

                echo "<a class='deletar' href='deletar_usuarios.php?id_usuarios=" . $id . "' ";
                echo "onclick=\"return confirm('Tem certeza que deseja deletar este usuário?');\">";
                echo "Deletar";
                echo "</a>";

                echo "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='4'>Nenhum usuário encontrado.</td>";
            echo "</tr>";
        }

        ?>

    </table>

</body>

</html>