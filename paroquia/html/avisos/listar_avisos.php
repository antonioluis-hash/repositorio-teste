<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Avisos - Paróquia Nossa Senhora</title>


<style>

/* =========================================================
   VARIÁVEIS
========================================================= */

:root {

    --azul: #102d68;
    --azul2: #1c4a9e;
    --azul-escuro: #091f4d;

    --dourado: #d4af37;
    --dourado2: #f2d675;

    --fundo: #f4f7fc;
    --texto: #243247;
    --cinza: #697586;

    --branco: #ffffff;

    --vermelho: #c0392b;

    --sombra:
        0 10px 30px rgba(16, 45, 104, .10);
}


/* =========================================================
   RESET
========================================================= */

* {

    margin: 0;

    padding: 0;

    box-sizing: border-box;

}


/* =========================================================
   HTML / BODY
========================================================= */

html,
body {

    width: 100%;

    min-height: 100%;

}


body {

    min-height: 100vh;

    font-family:
        "Segoe UI",
        Arial,
        sans-serif;

    color:
        var(--texto);

    background:

        radial-gradient(
            circle at 10% 10%,
            rgba(212, 175, 55, .10),
            transparent 28%
        ),

        linear-gradient(
            135deg,
            #f8fafc,
            #eaf0fa
        );

}


/* =========================================================
   CONTAINER PRINCIPAL
========================================================= */

.container {

    width: 100%;

    min-height: 100vh;

    margin: 0;

}


/* =========================================================
   CABEÇALHO
========================================================= */

.topo {

    width: 100%;

    background:

        linear-gradient(
            135deg,
            var(--azul-escuro),
            var(--azul)
        );

    color: white;

    padding:
        30px 40px;

    border-radius: 0;

    border-bottom:
        3px solid var(--dourado);

    box-shadow:
        var(--sombra);

}


.topo h1 {

    font-family:
        Georgia,
        serif;

    font-size:
        32px;

    margin-bottom:
        5px;

}


.topo p {

    color:
        #dce5f8;

    font-size:
        15px;

}


/* =========================================================
   CONTEÚDO
========================================================= */

.conteudo {

    width: 100%;

    min-height:
        calc(100vh - 110px);

    background:
        rgba(255, 255, 255, .97);

    padding:
        30px 40px;

    border-radius: 0;

    box-shadow: none;

}


/* =========================================================
   TÍTULO
========================================================= */

.titulo {

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    gap:
        20px;

    margin-bottom:
        25px;

}


.titulo h2 {

    color:
        var(--azul);

    font-family:
        Georgia,
        serif;

    font-size:
        27px;

}


/* =========================================================
   BOTÕES
========================================================= */

.btn-novo {

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        8px;

    padding:
        12px 20px;

    border-radius:
        50px;

    background:

        linear-gradient(
            135deg,
            var(--dourado2),
            var(--dourado)
        );

    color:
        var(--azul-escuro);

    text-decoration:
        none;

    font-weight:
        800;

    box-shadow:
        0 8px 20px
        rgba(212, 175, 55, .25);

    transition:
        .25s ease;

}


.btn-novo:hover {

    transform:
        translateY(-3px);

    box-shadow:
        0 12px 25px
        rgba(212, 175, 55, .35);

}


.btn-novo::before {

    content:
        "+";

    font-size:
        20px;

    line-height:
        1;

}


/* =========================================================
   BOTÃO VOLTAR
========================================================= */

.topo > .btn-novo {

    margin-top:
        10px;

}


/* =========================================================
   TABELA
========================================================= */

.tabela-container {

    width:
        100%;

    overflow-x:
        auto;

    border-radius:
        15px;

    border:
        1px solid #e1e6ef;

}


table {

    width:
        100%;

    min-width:
        700px;

    border-collapse:
        collapse;

    background:
        white;

}


th {

    padding:
        17px 15px;

    background:

        linear-gradient(
            135deg,
            var(--azul-escuro),
            var(--azul)
        );

    color:
        white;

    text-align:
        left;

    font-size:
        14px;

    text-transform:
        uppercase;

    letter-spacing:
        .5px;

}


th:first-child {

    border-radius:
        12px 0 0 0;

}


td {

    padding:
        17px 15px;

    border-bottom:
        1px solid #e7ebf2;

    color:
        var(--texto);

    font-size:
        15px;

    vertical-align:
        middle;

}


tbody tr {

    transition:
        .2s ease;

}


tbody tr:hover {

    background:
        #f7f9fd;

}


tbody tr:last-child td {

    border-bottom:
        none;

}


/* =========================================================
   AÇÕES
========================================================= */

.acao {

    display:
        inline-block;

    padding:
        8px 14px;

    border-radius:
        20px;

    text-decoration:
        none;

    font-size:
        13px;

    font-weight:
        700;

    transition:
        .25s ease;

}


/* EDITAR */

.editar {

    background:
        #e9f0ff;

    color:
        var(--azul2);

}


.editar:hover {

    background:
        var(--azul2);

    color:
        white;

    transform:
        translateY(-2px);

}


/* DELETAR */

.deletar {

    background:
        #fdecea;

    color:
        var(--vermelho);

}


.deletar:hover {

    background:
        var(--vermelho);

    color:
        white;

    transform:
        translateY(-2px);

}


/* =========================================================
   RODAPÉ
========================================================= */

.rodape-tabela {

    margin-top:
        30px;

    padding-top:
        20px;

    border-top:
        1px solid #e5e9f0;

    color:
        var(--cinza);

    font-size:
        14px;

    text-align:
        center;

}


/* =========================================================
   RESPONSIVO
========================================================= */

@media (max-width: 700px) {

    .topo {

        padding:
            25px 20px;

    }


    .topo h1 {

        font-size:
            27px;

    }


    .conteudo {

        padding:
            20px 15px;

    }


    .titulo {

        flex-direction:
            column;

        align-items:
            flex-start;

    }


    .titulo .btn-novo {

        width:
            100%;

    }


    .topo > .btn-novo {

        width:
            auto;

    }

}

</style>

</head>


<body>


<div class="container">


    <!-- =====================================================
         CABEÇALHO
    ====================================================== -->

    <div class="topo">

        <h1>
            ✦ Paróquia Nossa Senhora
        </h1>

        <p>
            Gerenciamento de avisos da paróquia
        </p>


        <br>


        <!-- BOTÃO VOLTAR -->

        <a
            class="btn-novo"
            href="../index.php"
        >
            voltar
        </a>

    </div>


    <!-- =====================================================
         CONTEÚDO
    ====================================================== -->

    <div class="conteudo">


        <!-- TÍTULO E BOTÃO -->

        <div class="titulo">

            <h2>
                Lista de Avisos
            </h2>


            <a
                href="inserir_avisos.php"
                class="btn-novo"
            >
                Cadastrar novo aviso
            </a>

        </div>


        <!-- =================================================
             TABELA
        ================================================== -->

        <div class="tabela-container">

            <table>

                <thead>

                    <tr>

                        <th>
                            Localização
                        </th>

                        <th>
                            Horário
                        </th>

                        <th>
                            Padre
                        </th>

                        <th>
                            Ações
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php

                require_once "../func.php";


                $avisos =
                    listar_aviso($conexao);


                while (
                    $aviso =
                    mysqli_fetch_assoc($avisos)
                ) {

                    $id =
                        $aviso['id_avisos'];

                    $nome =
                        $aviso['nome'];

                    $horario =
                        $aviso['descricao'];

                    $detalhes =
                        $aviso['detalhes'];

                    $secretaria_id =
                        $aviso['secretaria_id'];


                    echo "<tr>";


                    echo "<td>"
                        . htmlspecialchars($nome)
                        . "</td>";


                    echo "<td>"
                        . htmlspecialchars($horario)
                        . "</td>";


                    echo "<td>"
                        . htmlspecialchars($detalhes)
                        . "</td>";


                    echo "<td>";


                    echo "
                        <a
                            class='acao deletar'
                            href='deletar_avisos.php?id_avisos="
                            . $id .
                            "'
                            onclick=\"return confirm(
                                'Deseja realmente deletar este aviso?'
                            );\"
                        >
                            Deletar
                        </a>
                    ";


                    echo " ";


                    echo "
                        <a
                            class='acao editar'
                            href='inserir_avisos.php?id_avisos="
                            . $id .
                            "'
                        >
                            Editar
                        </a>
                    ";


                    echo "</td>";


                    echo "</tr>";

                }

                ?>

                </tbody>

            </table>

        </div>


        <!-- =================================================
             RODAPÉ
        ================================================== -->

        <div class="rodape-tabela">

            Gerencie os avisos da comunidade
            de forma simples e organizada.

        </div>


    </div>

</div>


</body>

</html>