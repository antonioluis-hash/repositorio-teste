<?php

require_once "../func.php";

$id_avisos = $_GET['id_avisos'] ?? null;

// Valores padrão
$nome = "";
$descricao = "";
$detalhes = "";
$secretaria_id = null;

// Se estiver editando
if ($id_avisos) {

    $resultado = buscar_aviso($conexao, $id_avisos);

    if ($resultado && ($avisos = mysqli_fetch_assoc($resultado))) {

        $nome = $avisos['nome'];
        $descricao = $avisos['descricao'];
        $detalhes = $avisos['detalhes'];
        $secretaria_id = $avisos['secretaria_id'];

    } else {
        // avisos não encontrada
        $id_avisos = null;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id_avisos ? "Editar imóvel" : "Cadastrar imóvel"; ?></title>
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

    /* Barra dourada no topo */
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

    input {
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

    input:focus {
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

    .rodape span {
        color: var(--dourado);
        font-size: 16px;
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
   
  
</body>
</html>
<form action="salvar_avisos.php<?php  echo isset($id_avisos) ? '?id_avisos=' . $id_avisos : ''; ?>" method="POST" enctype="multipart/form-data">
  
</form>

<div class="login-container">

    <div class="login-card">

        <div class="icone">
            ✝
        </div>

     <h1><?php echo $id_avisos ? "Editar aviso" : "Cadastrar novo aviso"; ?></h1>

        <p class="subtitulo">
            Acesse sua conta da Paróquia
        </p>

        <form action="verificar_login.php" method="POST">

            <div class="campo">
                <label>nome:</label><br>
    <input type="text" name="nome" value="<?php  echo $nome ?? ''; ?>" required>


            </div>

        <div class="campo">
                  <label>detalhes:</label><br>
    <input type="text" name="detalhes" value="<?php echo $detalhes ?? ''; ?>" required><br><br>

            </div>
            <div class="campo">

    <label>descrição:</label><br>
    <input type="text" name="descricao" value="<?php echo $descricao ?? '' ;?>" required><br><br>
    

            </div>
                        <div class="campo">

    <label>secretaria:</label><br>
      <?php
      
$secre = listar_secretaria($conexao);

echo "secretaria: <br>";
echo "<select name='avisos'>";

while ($secres = mysqli_fetch_assoc($secre)) {
    $id = $secres['id_secretaria'];
    $oi = $secres['cpf'];
    $id_usu = $secres['usuarios_id'];

    echo "<option value='$id'>$oi</option>";
}

echo "</select><br>";

    ?>


            </div>

            <input type="submit" value="novo aviso<?php echo isset($id_avisos) ? 'Salvar Alterações' : 'Cadastrar Imóvel' ?>">

        </form>

        <div class="rodape">
            <span>✦</span>
            Paróquia Nossa Senhora
            <span>✦</span>
        </div>

    </div>

</div>