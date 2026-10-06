<?php

require_once "../func.php";

$id_missa = $_GET['id_missa'] ?? null;

// Valores padrão
$localizacao = "";
$horario = "";
$padre_ce = "";
$padre_id = null;

// Se estiver editando
if ($id_missa) {

    $resultado = buscar_missas($conexao, $id_missa);

    if ($resultado && ($missa = mysqli_fetch_assoc($resultado))) {

        $localizacao = $missa['localizacao'];
        $horario = $missa['horario'];
        $padre_ce = $missa['padre_ce'];
        $padre_id = $missa['padre_id'];

    } else {
        // Missa não encontrada
        $id_missa = null;
    }
}

// Lista de padres
$padres = listar_padre($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $id_missa ? "Editar missa" : "Cadastrar missa"; ?>
    </title>

    <style>

        :root {
            --azul: #102d68;
            --azul2: #1c4a9e;
            --dourado: #d4af37;
            --dourado2: #f2d675;
            --fundo: #f4f7fc;
            --texto: #243247;
            --cinza: #697586;
            --branco: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;

            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--texto);

            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(212, 175, 55, .15),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #f8fafc,
                    #eaf0fa
                );
        }

        .login-container {
            width: 100%;
            max-width: 430px;
        }

        .login-card {
            background: rgba(255, 255, 255, .97);
            padding: 42px 38px;
            border-radius: 24px;

            box-shadow:
                0 20px 60px rgba(16, 45, 104, .16);

            border: 1px solid rgba(16, 45, 104, .08);

            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: "";
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 5px;

            background:
                linear-gradient(
                    90deg,
                    var(--azul),
                    var(--dourado),
                    var(--azul)
                );
        }

        .icone {
            width: 70px;
            height: 70px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    var(--azul),
                    var(--azul2)
                );

            color: var(--dourado2);

            font-size: 30px;

            box-shadow:
                0 10px 25px rgba(16, 45, 104, .25);
        }

        h1 {
            text-align: center;

            font-family: Georgia, serif;

            font-size: 32px;

            color: var(--azul);

            margin-bottom: 8px;
        }

        .subtitulo {
            text-align: center;

            color: var(--cinza);

            font-size: 15px;

            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 20px;
        }

        label {
            display: block;

            font-weight: 600;

            color: var(--azul);

            margin-bottom: 7px;

            font-size: 15px;
        }

        input,
        select {
            width: 100%;

            padding: 14px 16px;

            border: 1px solid #d7deea;

            border-radius: 12px;

            outline: none;

            font-size: 16px;

            color: var(--texto);

            background: #fbfcfe;

            transition: .25s ease;
        }

        input:focus,
        select:focus {
            border-color: var(--azul2);

            background: #fff;

            box-shadow:
                0 0 0 4px rgba(28, 74, 158, .10);
        }

        input::placeholder {
            color: #a0a9b8;
        }

        .botao {
            width: 100%;

            border: none;

            padding: 15px;

            margin-top: 8px;

            border-radius: 50px;

            background:
                linear-gradient(
                    135deg,
                    var(--azul),
                    var(--azul2)
                );

            color: white;

            font-size: 16px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(16, 45, 104, .22);

            transition: .3s ease;
        }

        .botao:hover {
            transform: translateY(-3px);

            box-shadow:
                0 15px 30px rgba(16, 45, 104, .30);
        }

        .botao:active {
            transform: translateY(0);
        }

        .rodape {
            text-align: center;

            margin-top: 25px;

            color: var(--cinza);

            font-size: 13px;
        }

        @media (max-width: 480px) {

            body {
                padding: 15px;
            }

            .login-card {
                padding: 35px 24px;
            }

            h1 {
                font-size: 28px;
            }

        }

    </style>

</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="icone">
            ⛪
        </div>

        <h1>
            <?php echo $id_missa ? "Editar missa" : "Cadastrar missa"; ?>
        </h1>

        <p class="subtitulo">
            <?php
                echo $id_missa
                    ? "Atualize os dados da missa"
                    : "Preencha os dados da nova missa";
            ?>
        </p>

        <form
            action="salvar_missa.php<?php
                echo $id_missa
                    ? '?id_missa=' . urlencode($id_missa)
                    : '';
            ?>"
            method="POST"
        >

            <div class="campo">

                <label for="localizacao">
                    Localização
                </label>

                <input
                    type="text"
                    id="localizacao"
                    name="localizacao"
                    value="<?php echo htmlspecialchars($localizacao); ?>"
                    placeholder="Ex: Igreja Matriz"
                    required
                >

            </div>


            <div class="campo">

                <label for="horario">
                    Horário
                </label>

                <input
                    type="text"
                    id="horario"
                    name="horario"
                    value="<?php echo htmlspecialchars($horario); ?>"
                    placeholder="Ex: Domingo às 19:00"
                    required
                >

            </div>


            <div class="campo">

                <label for="padre_ce">
                    Padre CE
                </label>

                <input
                    type="text"
                    id="padre_ce"
                    name="padre_ce"
                    value="<?php echo htmlspecialchars($padre_ce); ?>"
                    placeholder="Digite o padre CE"
                    required
                >

            </div>


            <div class="campo">

                <label for="padre_id">
                    Padre
                </label>

                <select
                    name="padre_id"
                    id="padre_id"
                    required
                >

                    <option value="">
                        Selecione o padre
                    </option>

                    <?php while ($padre = mysqli_fetch_assoc($padres)) { ?>

                        <?php
                            $id = $padre['id_padre'];
                            $telefone = $padre['telefone'];
                        ?>

                        <option
                            value="<?php echo $id; ?>"
                            <?php
                                echo ($padre_id == $id)
                                    ? 'selected'
                                    : '';
                            ?>
                        >

                            <?php echo htmlspecialchars($telefone); ?>

                        </option>

                    <?php } ?>

                </select>

            </div>


            <button type="submit" class="botao">

                <?php
                    echo $id_missa
                        ? "Salvar alterações"
                        : "Cadastrar missa";
                ?>

            </button>

        </form>


        <div class="rodape">
            Sistema de gerenciamento de missas
            <span>✦</span>
        </div>

    </div>

</div>

</body>

</html>