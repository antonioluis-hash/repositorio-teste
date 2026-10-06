<?php

if (isset($_GET['erro'])) {


   $msg = $_GET['erro'];
}
else {
       // avisos não encontrada
       $msg = null;
   }


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - Paróquia Nossa Senhora</title>

    <style>

        /* =====================================================
           VARIÁVEIS
        ====================================================== */

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
                0 15px 40px rgba(16, 45, 104, .15);
        }


        /* =====================================================
           RESET
        ====================================================== */

        * {

            margin: 0;
            padding: 0;

            box-sizing: border-box;

        }

        html,
        body {

            width: 100%;
            min-height: 100%;

        }


        body {

            min-height: 100vh;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 20px;

            font-family:
                "Segoe UI",
                Arial,
                sans-serif;

            color:
                var(--texto);

            background:

                radial-gradient(
                    circle at 10% 10%,
                    rgba(212, 175, 55, .12),
                    transparent 28%
                ),

                radial-gradient(
                    circle at 90% 90%,
                    rgba(28, 74, 158, .10),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #f8fafc,
                    #eaf0fa
                );

        }


        /*conteiner login*/

        .login-container {

            width: 100%;

            max-width: 430px;

            background:
                var(--branco);

            border-radius: 22px;

            box-shadow:
                var(--sombra);

            overflow: hidden;

            border:
                1px solid #e1e6ef;

        }


        /*cabecalho*/


        .login-header {

            padding:
                30px 30px 25px;

            text-align:
                center;

            color:
                white;

            background:

                linear-gradient(
                    135deg,
                    var(--azul-escuro),
                    var(--azul)
                );

            border-bottom:
                3px solid var(--dourado);

        }


        .icone {

            width: 65px;
            height: 65px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin:
                0 auto 15px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.10);

            border:
                2px solid var(--dourado);

            color:
                var(--dourado2);

            font-size:
                30px;

        }


        .login-header h1 {

            font-family:
                Georgia,
                serif;

            font-size:
                28px;

            margin-bottom:
                7px;

        }


        .login-header p {

            color:
                #dce5f8;

            font-size:
                14px;

        }


        /*form*/



        form {

            padding:
                30px;

        }


        .campo {

            margin-bottom:
                20px;

        }


        .campo label {

            display:
                block;

            margin-bottom:
                8px;

            color:
                var(--azul);

            font-size:
                14px;

            font-weight:
                700;

        }


        .campo input {

            width:
                100%;

            padding:
                13px 15px;

            border:
                1px solid #d8deea;

            border-radius:
                10px;

            outline:
                none;

            background:
                #f8fafc;

            color:
                var(--texto);

            font-size:
                15px;

            transition:
                .25s ease;

        }


        .campo input:focus {

            border-color:
                var(--azul2);

            background:
                white;

            box-shadow:
                0 0 0 3px
                rgba(28, 74, 158, .10);

        }


        .campo input::placeholder {

            color:
                #9aa5b5;

        }


        /*   BOTÃO LOGIN  */

        .btn-login {

            width:
                100%;

            padding:
                13px 20px;

            border:
                none;

            border-radius:
                50px;

            cursor:
                pointer;

            background:

                linear-gradient(
                    135deg,
                    var(--dourado2),
                    var(--dourado)
                );

            color:
                var(--azul-escuro);

            font-size:
                15px;

            font-weight:
                800;

            box-shadow:
                0 8px 20px
                rgba(212,175,55,.25);

            transition:
                .25s ease;

        }


        .btn-login:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 12px 25px
                rgba(212,175,55,.35);

        }


        .btn-login:active {

            transform:
                translateY(0);

        }


        /*   RODAPÉ  */

        .login-footer {

            padding:
                0 30px 25px;

            text-align:
                center;

            color:
                var(--cinza);

            font-size:
                13px;

        }


        .login-footer span {

            color:
                var(--dourado);

            font-size:
                16px;

            margin:
                0 5px;

        }


        /*    RESPONSIVO */

        @media (max-width: 500px) {

            body {

                padding:
                    15px;

            }


            .login-container {

                border-radius:
                    18px;

            }


            .login-header {

                padding:
                    25px 20px 22px;

            }


            .login-header h1 {

                font-size:
                    24px;

            }


            form {

                padding:
                    25px 20px;

            }


            .login-footer {

                padding:
                    0 20px 22px;

            }

        }

    </style>

</head>


<body>


    <div class="login-container">
        <div class="login-container">


        <!-- CABEÇALHO -->

        <div class="login-header">

            <div class="icone">
                ✝
            </div>

            <h1>
                Paróquia Nossa Senhora
            </h1>

            <p>
                Acesso ao sistema administrativo
            </p>

        </div>


        <!-- FORMULÁRIO -->

        <form
            action="verificar_login.php"
            method="POST"
        >


            <?php if ($msg == 1): ?>

                <div class="erro">
                    Erro no nome ou na senha.
                </div>

            <?php endif; ?>


            <!-- CAMPO NOME -->

            <div class="campo">

                <label for="nome">
                    Nome
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu nome"
                    required
                >

            </div>


            <!-- CAMPO SENHA -->

            <div class="campo">

                <label for="senha">
                    Senha
                </label>

                <div class="senha-container">

                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                    >

                    <button
                        type="button"
                        id="mostrar"
                        class="btn-mostrar"
                    >
                        Mostrar
                    </button>

                </div>

            </div>


            <!-- BOTÃO ENTRAR -->

            <button
                type="submit"
                name="enviar"
                class="btn-login"
            >
                Entrar
            </button>


        </form>


        <!-- RODAPÉ -->

        <div class="login-footer">

            <span>✦</span>

            Sistema da Paróquia Nossa Senhora

            <span>✦</span>

        </div>


    </div>


    <!-- JAVASCript-->

    <script>

        const campoSenha =
            document.getElementById('senha');

        const botaoMostrar =
            document.getElementById('mostrar');


        botaoMostrar.addEventListener('click', function () {

            if (campoSenha.type === 'password') {

                campoSenha.type = 'text';

                botaoMostrar.textContent =
                    'Ocultar';

            } else {

                campoSenha.type = 'password';

                botaoMostrar.textContent =
                    'Mostrar';

            }

        });

    </script>

</body>

</html>
    </div>
</body>
</html>