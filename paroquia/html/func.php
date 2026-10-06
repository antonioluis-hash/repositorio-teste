<?php
require_once "conexao.php";

function verificarLogin(){
    // return isset($_SESSION['usuario']);
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../login.php");
    exit;
    }
}
function verificarAdmin(){
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 's'){
        header("Location: secretaria/inicio_s.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}

function logout(){
    session_unset();   // Limpa todas as variáveis da sessão
    session_destroy(); // Destrói a sessão no servidor

    header("Location: login.php");
    exit;
}
function login($conexao, $nome, $senha){
    $sql = "SELECT * FROM usuarios WHERE nome = ? and senha = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    
    if(!$stmt->execute()){
        return "erro";
    }

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        $usuario = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['id'] = $usuario['id_usuarios'];
        $_SESSION['tipo'] = $usuario['tipo'];

        return true;
    }

    return false;
}
/* =========================================================
   USUÁRIOS
========================================================= */

function inserir_usuarios($conexao, $nome, $email, $senha) {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    return $stmt->execute();
}


function listar_usuarios($conexao) {
    return $conexao->query("SELECT * FROM usuarios");
}


function buscar_usuarios($conexao, $id) {
    $sql = "SELECT * FROM usuarios WHERE id_usuarios = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result();
}


function buscar_usuarios_pornome($conexao, $nome) {
    $sql = "SELECT * FROM usuarios WHERE nome LIKE ?";
    $stmt = $conexao->prepare($sql);
    $nome_busca = "%" . $nome . "%";
    $stmt->bind_param("s", $nome_busca);
    $stmt->execute();

    return $stmt->get_result();
}


function atualizar_usuarios($conexao, $id, $nome, $email, $senha) {
    $sql = "UPDATE usuarios 
            SET nome = ?, email = ?, senha = ? 
            WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $senha, $id);

    return $stmt->execute();
}


function deletar_usuarios($conexao, $id) {
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}



/* =========================================================
   ALUNOS
========================================================= */



function inserir_alunos($conexao, $nome, $cpf, $data_nascimento, $usuarios_id){
    $sql = "INSERT INTO alunos (nome, cpf, data_nascimento, usuarios_id)
            VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssi", $nome, $cpf, $data_nascimento, $usuarios_id);

   // return $stmt->execute();
}

function listar_alunos($conexao){
    return $conexao->query("SELECT * FROM alunos");
}

function buscar_alunos($conexao, $id){
    $sql = "SELECT * FROM alunos WHERE id_alunos = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result();
}
function listar_alunos_curso($conexao, $id_curso) {
    $sql = " SELECT
            alunos.id_alunos,
            alunos.nome,
            alunos.cpf,
            alunos.data_nascimento,
            alunos_dos_cursos.cursos_id
        FROM alunos
        INNER JOIN alunos_dos_cursos
            ON alunos.id_alunos = alunos_dos_cursos.alunos_id
        WHERE alunos_dos_cursos.cursos_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_cursos);
    $stmt->execute();
}


function buscar_alunos_pornome($conexao, $nome){
    $sql = "SELECT * FROM alunos WHERE nome LIKE ?";
    $stmt = $conexao->prepare($sql);
    $nome_busca = "%" . $nome . "%";
    $stmt->bind_param("s", $nome_busca);
    $stmt->execute();

    return $stmt->get_result();
}

function atualizar_alunos($conexao, $id, $nome, $cpf, $data_nascimento, $usuarios_id){
    $sql = "UPDATE alunos
            SET nome = ?, cpf = ?, data_nascimento = ?, usuarios_id = ?
            WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssii", $nome, $cpf, $data_nascimento, $usuarios_id, $id);

    return $stmt->execute();
}

function deletar_alunos($conexao, $id){
    $sql = "DELETE FROM alunos WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}
/* =========================================================
   PROFESSORES
========================================================= */

function inserir_professores($conexao, $telefone) {
    $sql = "INSERT INTO professores (telefone) VALUES (?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $telefone);

   // return $stmt->execute();
}


function listar_professores($conexao) {
    return $conexao->query("SELECT
    professores.id_professores,
    usuarios.nome,
    usuarios.email,
    professores.telefone
FROM professores
INNER JOIN usuarios
    ON professores.usuarios_id = usuarios.id_usuarios;");
}


function buscar_professores($conexao, $id) {
    $sql = "SELECT * FROM professores WHERE id_professores = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result();
}


function buscar_professores_portelefone($conexao, $telefone) {
    $sql = "SELECT * FROM professores WHERE telefone LIKE ?";
    $stmt = $conexao->prepare($sql);
    $telefone_busca = "%" . $telefone . "%";
    $stmt->bind_param("s", $telefone_busca);
    $stmt->execute();

    return $stmt->get_result();
}


function atualizar_professores($conexao, $id, $telefone) {
    $sql = "UPDATE professores SET telefone = ? WHERE id_professores = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("si", $telefone, $id);

    //return $stmt->execute();
}


function deletar_professores($conexao, $id) {
    $sql = "DELETE FROM professores WHERE id_professores = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    //return $stmt->execute();
}


/* =========================================================
   SECRETARIA
========================================================= */

function inserir_secretaria($conexão, $nome){
    $sql = "INSERT INTO secretaria(nome) VALUES (?)";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("s", $nome);
    return $smt->execute();
}

function atualizar_secretaria($conexão,$id, $nome){
    $sql = "UPDATE secretaria set nome = ? WHERE id = ?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("s", $nome);
    return $smt->execute();
}
    function listar_secretaria($conexão){
    return $conexão->query("SELECT * FROM secretaria");
}

function deletar_secretaria($conexão,$id){
$sql = "DELETE FROM secretaria WHERE id =?";
$smt = $conexão->prepare($sql);
$smt->bind_param("i",$id);
return $smt->execute();
}

/* ============================================================
    PADRE
=============================================================== */

function inserir_padre($conexão,$telefone, $usuario_id) {
    
    $sql = "INSERT INTO padre() VALUES (?,?,?)";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("ss", $telefone, $usuario_id);
    return $smt->execute();

}

function listar_padre($conexão){
    return $conexão->query("SELECT
    padre.id_padre,
    usuarios.nome,
    usuarios.email,
    padre.telefone
FROM padre
INNER JOIN usuarios
    ON padre.usuarios_id = usuarios.id_usuarios;");
}
function buscar_padre($conexão,$id){
    $sql = "SELECT
    padre.id_padre,
    usuarios.nome,
    usuarios.email,
    padre.telefone
FROM padre
INNER JOIN usuarios
    ON padre.usuarios_id = usuarios.id_usuarios
     WHERE id_padre = ?;";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("i", $id);
    $smt->execute();
    return $smt->get_result();

}

function buscar_padre_por_telefone($conexão,$telefone){
    $sql = "SELECT * FROM padre WHERE telefone like ?";
    $smt = $conexão->prepare($sql);
    $telefone_busca = "%".$telefone."%";
    $smt->bind_param("s", $telefone_busca);
    $smt->execute();
    return $smt->get_result();
}

function atualizar_padre($conexão,$id, $telefone, $usuario_id){
    $sql = "UPDATE padre set telefone = ? , usuario_id = ? WHERE id = ?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("sssi", $telefone, $usuario_id, $id);
    return $smt->execute();
}   

function deletar_padre($conexão,$id){
    $sql = "DELETE FROM  padre WHERE id_padre =?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("i",$id);
    return $smt->execute();
}

/* =========================================================
   missas
========================================================= */

function inserir_missas($conexao, $localizacao, $horario, $padre_ce ,$padre_id){

    $sql = "INSERT INTO missas (localizacao, horario, padre_ce, padre_id)
            VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssi", $localizacao, $horario, $padre_ce ,$padre_id);

    return $stmt->execute();
}

function listar_missas($conexao){
    return $conexao->query("SELECT * FROM missas ");
}

function buscar_missas($conexao, $id){
    $sql = "SELECT * FROM missas  WHERE id_missas = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result(); 
}

function buscar_por_localizacao($conexao, $localizacao){
    $sql = "SELECT * FROM missas WHERE localizacao LIKE ?";
    $stmt = $conexao->prepare($sql);
    $localizacao_busca = "%" . $localizacao . "%";
    $stmt->bind_param("s", $localizacao_busca);
    $stmt->execute();

    return $stmt->get_result();
}

function atualizar_missas($conexao, $id, $localizacao, $horario, $padre_ce ,$padre_id){
    $sql = "UPDATE missas
            SET localizacao = ?, horario = ?, padre_ce = ? ,padre_id = ?
            WHERE id_missas= ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssii", $localizacao, $horario, $padre_ce ,$padre_id, $id);
    return $stmt->execute();
}

function deletar_missas($conexao, $id_missa)
{
    // Primeiro remove os relacionamentos
    $sql = "DELETE FROM coroinhas_da_missa WHERE missas_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_missa);
    $stmt->execute();
    $stmt->close();


    // Depois remove a missa
    $sql = "DELETE FROM missas WHERE id_missas = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_missa);
    $stmt->execute();
    $stmt->close();
}

/* =========================================================
   avisos
========================================================= */

function inserir_aviso($conexão, $nome, $descricao, $detalhes, $secretaria_id) {
    
    $sql = "INSERT INTO avisos (nome, descricao, detalhes, secretaria_id)
            VALUES (?, ?, ?, ?)";
    
    $smt = $conexão->prepare($sql);
    $smt->bind_param("sssi", $nome, $descricao, $detalhes, $secretaria_id);
    
    return $smt->execute();
}


function listar_aviso($conexão){
    return $conexão->query("SELECT * FROM avisos");
}

function buscar_aviso($conexão,$id){
    $sql = "SELECT * FROM avisos WHERE id_avisos = ?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("i",$id);
    $smt->execute();
    return $smt->get_result();
}

function buscar_aviso_por_nome($conexão,$nome){
    $sql = "SELECT * FROM avisos WHERE nome like ?";
    $smt = $conexão->prepare($sql);
    $nome_busca = "%".$nome."%";
    $smt->bind_param("s", $nome_busca);
    $smt->execute();
    return $smt->get_result();
}

function atualizar_aviso($conexão,$id, $nome, $descricao, $detalhes, $secretaria_id){
    $sql = "UPDATE avisos set nome = ? ,descricao = ?, detalhes = ?,  secretaria_id = ? WHERE id_avisos= ?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("sssii", $nome, $descricao, $detalhes, $secretaria_id, $id);
    return $smt->execute();
}   

function deletar_aviso($conexão,$id){
    $sql = "DELETE FROM  avisos WHERE id_avisos = ?";
    $smt = $conexão->prepare($sql);
    $smt->bind_param("i",$id);
    return $smt->execute();
}

/* =========================================================
   cursos
========================================================= */

function inserir_cursos($conexao, $nome, $horario, $avisos, $professores_id){
   $sql = "INSERT INTO cursos (nome, horario, avisos, professores_id)
           VALUES (?, ?, ?, ?)";
   $stmt = $conexao->prepare($sql);
   $stmt->bind_param("sssi", $nome, $horario, $avisos, $professores_id);


  // return $stmt->execute();
}

function listar_cursos($conexao){
   return $conexao->query("SELECT * FROM cursos");
}


function buscar_cursos($conexao, $id){
   $sql = "SELECT * FROM cursos WHERE id_cursos = ?";
    $stmt = $conexao->prepare($sql);
   $stmt->bind_param("i", $id);
   $stmt->execute();

   return $stmt->get_result();
}


function buscar_cursos_pornome($conexao, $nome){
   $sql = "SELECT * FROM cursos WHERE nome LIKE ?";
   $stmt = $conexao->prepare($sql);
   $nome_busca = "%" . $nome . "%";
   $stmt->bind_param("s", $nome_busca);
   $stmt->execute();

   return $stmt->get_result();
}


function atualizar_cursos($conexao, $id, $nome, $horario, $avisos, $professores_id){
   $sql = "UPDATE cursos
           SET nome = ?, horario = ?, avisos = ?, professores_id = ?
           WHERE id_cursos = ?";
   $stmt = $conexao->prepare($sql);
   $stmt->bind_param("sssii", $nome, $horario, $avisos, $professores_id, $id);
   return $stmt->execute();
}


function deletar_cursos($conexao, $id)
{
    $sql = "DELETE FROM alunos_dos_cursosos WHERE cursos_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $sql = "DELETE FROM cursos WHERE id_cursos = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}


/* =========================================================
   coroinhas
========================================================= */

function inserir_coroinhas($conexao, $data_nascimento, $data_iniciacao, $usuarios_id){
   $sql = "INSERT INTO coroinhas (data_nascimento, data_iniciacao, usuarios_id)
           VALUES (?, ?, ?)";
   $stmt = $conexao->prepare($sql);
   $stmt->bind_param("sssi", $data_nascimento, $data_iniciacao, $usuarios_id);


  // return $stmt->execute();
}

function listar_coroinhas($conexao){
   return $conexao->query("SELECT * FROM coroinhas");
}


function buscar_coroinhas($conexao, $id){
   $sql = "SELECT * FROM coroinhas WHERE id_coroinhas = ?";
    $stmt = $conexao->prepare($sql);
   $stmt->bind_param("i", $id);
   $stmt->execute();

   return $stmt->get_result();
}


function atualizar_coroinhas($conexao, $id, $data_nascimento, $data_iniciacao, $usuarios_id){
   $sql = "UPDATE coroinhas
           SET data_nascimentos = ?, data_iniciacao = ?, usuarios_id = ?
           WHERE id_coroinhas = ?";
   $stmt = $conexao->prepare($sql);
   $stmt->bind_param("sssii", $data_nascimento, $data_iniciacao, $usuarios_id, $id);
   return $stmt->execute();
}


function deletar_coroinhas($conexao, $id){
   $sql = "DELETE FROM coroinhas WHERE id_coroinhas = ?";
   $stmt = $conexao->prepare($sql);
   $stmt->bind_param("i", $id);

   return $stmt->execute();
}
?>