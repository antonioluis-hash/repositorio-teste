<?php

require_once "../func.php";

// 🔹 Verifica se veio um ID de coroinha na URL (edição)
if (isset($_GET['id_coroinhas'])) 
    $ID_coroinhas = $_GET['id_coroinhas'];
    buscar_coroinhas($conexao,$id_coroinhas);
    
$resultado = buscar_coroinhas($conexao, $id_coroinhas);

if ($resultado && ($coroinhas = mysqli_fetch_assoc($resultado))) {

        $data_nascimento = $coroinhas['data_nascimento'];
        $data_iniciacao = $coroinhas['data_iniciacao'];
        $id_usuario = $$coroinhas['id_usuario'];



} else {
    // 🔹 Se não veio ID → novo coroinha
    $id_coroinhas = null;
    $data_nascimento = "";
    $data_iniciacao = "";
    $id_usuario = null;

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id_coroinhas ? "Editar coroinha" : "Cadastrar coroinha"; ?></title>
</head>
<body>
    <h1><?php echo $id_coroinhas ? "Editar coroinha" : "Cadastrar novo coroinha"; ?></h1>
  
</body>
</html>
<form action="salvar_coroinhas.php<?php  echo isset($id_coroinhas) ? '?id_missas=' . $id_coroinhas : ''; ?>" method="POST" enctype="multipart/form-data">


    <label>dia do nascimento:</label><br>
    <input type="text" name="data_nacimento" value="<?php  echo $data_nascimento ?? ''; ?>" required><br><br>

    <label>dia que comecou:</label><br>
    <input type="text" name="data_iniciacao" value="<?php echo $data_iniciacao ?? '' ;?>" required><br><br>

      <?php
      
$padres = listar_usuarios($conexao);

echo "usuarios: <br>";
echo "<select name='coroinhas'>";

while ($id_usuarios = mysqli_fetch_assoc($id_usuarios)) {
    $id = $usuarios['id_usuarios'];
    $oi = $usuarios['nome'];
    $oi = $usuarios['email'];
    $oi = $usuarios['senha'];


    echo "<option value='$id'>$oi</option>";
}

echo "</select><br>";

    ?>



    <input type="submit" value="novo coroinha<?php echo isset($id_coroinhas) 'Cadastrar coroinha' ?>">
</form>