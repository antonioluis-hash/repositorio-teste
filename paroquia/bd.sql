-- =====================================================
-- BANCO DE DADOS - IGREJA
-- MySQL
-- =====================================================

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS;
SET UNIQUE_CHECKS = 0;

SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;

SET @OLD_SQL_MODE = @@SQL_MODE;
SET SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- =====================================================
-- BANCO
-- =====================================================

CREATE DATABASE IF NOT EXISTS Banco
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_unicode_ci;

USE Banco;


-- =====================================================
-- USUÁRIOS
-- =====================================================

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuarios INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(45) NOT NULL DEFAULT 'u',

    PRIMARY KEY (id_usuarios),
    UNIQUE KEY email_UNIQUE (email)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- COROINHAS
-- =====================================================

CREATE TABLE IF NOT EXISTS coroinhas (
    id_coroinhas INT NOT NULL AUTO_INCREMENT,
    data_nascimento DATE NOT NULL,
    data_iniciacao DATE NOT NULL,
    usuarios_id INT NOT NULL,

    PRIMARY KEY (id_coroinhas),

    UNIQUE KEY uq_coroinhas_usuario (usuarios_id),

    CONSTRAINT fk_coroinhas_usuarios
        FOREIGN KEY (usuarios_id)
        REFERENCES usuarios (id_usuarios)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- PADRES
-- =====================================================

CREATE TABLE IF NOT EXISTS padre (
    id_padre INT NOT NULL AUTO_INCREMENT,
    telefone VARCHAR(15) NOT NULL,
    usuarios_id INT NOT NULL,

    PRIMARY KEY (id_padre),

    UNIQUE KEY numero_padre_UNIQUE (telefone),
    UNIQUE KEY uq_padre_usuario (usuarios_id),

    CONSTRAINT fk_padre_usuarios
        FOREIGN KEY (usuarios_id)
        REFERENCES usuarios (id_usuarios)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- PROFESSORES
-- =====================================================

CREATE TABLE IF NOT EXISTS professores (
    id_professores INT NOT NULL AUTO_INCREMENT,
    telefone VARCHAR(15) NOT NULL,
    usuarios_id INT NOT NULL,

    PRIMARY KEY (id_professores),

    UNIQUE KEY numero_professor_UNIQUE (telefone),
    UNIQUE KEY uq_professor_usuario (usuarios_id),

    CONSTRAINT fk_professores_usuarios
        FOREIGN KEY (usuarios_id)
        REFERENCES usuarios (id_usuarios)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- SECRETARIA
-- =====================================================

CREATE TABLE IF NOT EXISTS secretaria (
    id_secretaria INT NOT NULL AUTO_INCREMENT,
    cpf VARCHAR(11) NOT NULL,
    usuarios_id INT NOT NULL,

    PRIMARY KEY (id_secretaria),

    UNIQUE KEY cpf_secretaria_UNIQUE (cpf),
    UNIQUE KEY uq_secretaria_usuario (usuarios_id),

    CONSTRAINT fk_secretaria_usuarios
        FOREIGN KEY (usuarios_id)
        REFERENCES usuarios (id_usuarios)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- ALUNOS
-- =====================================================

CREATE TABLE IF NOT EXISTS alunos (
    id_alunos INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    data_nascimento DATE NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    usuarios_id INT NOT NULL,

    PRIMARY KEY (id_alunos),

    UNIQUE KEY cpf_aluno_UNIQUE (cpf),
    UNIQUE KEY telefone_aluno_UNIQUE (telefone),
    UNIQUE KEY uq_aluno_usuario (usuarios_id),

    CONSTRAINT fk_alunos_usuarios
        FOREIGN KEY (usuarios_id)
        REFERENCES usuarios (id_usuarios)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- CURSOS
-- =====================================================

CREATE TABLE IF NOT EXISTS cursos (
    id_cursos INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    horario DATETIME NOT NULL,
    avisos VARCHAR(255) NOT NULL,
    professores_id INT NOT NULL,

    PRIMARY KEY (id_cursos),

    INDEX idx_cursos_professores (professores_id),

    CONSTRAINT fk_cursos_professores
        FOREIGN KEY (professores_id)
        REFERENCES professores (id_professores)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- ALUNOS DOS CURSOS
-- RELACIONAMENTO N:N
-- =====================================================

CREATE TABLE IF NOT EXISTS alunos_dos_cursos (
    id INT NOT NULL AUTO_INCREMENT,
    alunos_id INT NOT NULL,
    cursos_id INT NOT NULL,

    PRIMARY KEY (id),

    UNIQUE KEY uq_aluno_curso (alunos_id, cursos_id),

    INDEX idx_alunos_cursos_aluno (alunos_id),
    INDEX idx_alunos_cursos_curso (cursos_id),

    CONSTRAINT fk_alunos_cursos_aluno
        FOREIGN KEY (alunos_id)
        REFERENCES alunos (id_alunos)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_alunos_cursos_curso
        FOREIGN KEY (cursos_id)
        REFERENCES cursos (id_cursos)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- MISSAS
-- =====================================================

CREATE TABLE IF NOT EXISTS missas (
    id_missas INT NOT NULL AUTO_INCREMENT,
    localizacao VARCHAR(255) NOT NULL,
    horario VARCHAR(45) NOT NULL,
    padre_ce VARCHAR(45) NOT NULL,
    padre_id INT NOT NULL,

    PRIMARY KEY (id_missas),

    INDEX idx_missas_padre (padre_id),

    CONSTRAINT fk_missas_padre
        FOREIGN KEY (padre_id)
        REFERENCES padre (id_padre)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- AVISOS
-- =====================================================

CREATE TABLE IF NOT EXISTS avisos (
    id_avisos INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    detalhes VARCHAR(255) NOT NULL,
    secretaria_id INT NOT NULL,

    PRIMARY KEY (id_avisos),

    INDEX idx_avisos_secretaria (secretaria_id),

    CONSTRAINT fk_avisos_secretaria
        FOREIGN KEY (secretaria_id)
        REFERENCES secretaria (id_secretaria)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- COROINHAS DAS MISSAS
-- =====================================================

CREATE TABLE IF NOT EXISTS coroinhas_da_missa (
    id INT NOT NULL AUTO_INCREMENT,
    coroinhas_id INT NOT NULL,
    missas_id INT NOT NULL,

    PRIMARY KEY (id),

    UNIQUE KEY uq_coroinha_missa (coroinhas_id, missas_id),

    INDEX idx_coroinhas_missa_coroinha (coroinhas_id),
    INDEX idx_coroinhas_missa_missa (missas_id),

    CONSTRAINT fk_coroinhas_missa_coroinha
        FOREIGN KEY (coroinhas_id)
        REFERENCES coroinhas (id_coroinhas)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_coroinhas_missa_missa
        FOREIGN KEY (missas_id)
        REFERENCES missas (id_missas)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- =====================================================
-- DADOS
-- =====================================================


-- =====================================================
-- USUÁRIOS
-- =====================================================

INSERT INTO usuarios
(id_usuarios, nome, email, senha, tipo)
VALUES
(1, 'Administrador', 'admin@igreja.com', '123456', 'a'),
(2, 'João da Silva', 'joao@igreja.com', '123456', 'u'),
(3, 'Maria Oliveira', 'maria@igreja.com', '123456', 'u'),
(4, 'Padre Carlos', 'padrecarlos@igreja.com', '123456', 'p'),
(5, 'Padre José', 'padrejose@igreja.com', '123456', 'p'),
(6, 'Ana Souza', 'ana@igreja.com', '123456', 'u'),
(7, 'Pedro Santos', 'pedro@igreja.com', '123456', 'u'),
(8, 'Secretaria Igreja', 'secretaria@igreja.com', '123456', 's'),
(9, 'Professor Marcos', 'marcos@igreja.com', '123456', 't');


-- =====================================================
-- PADRES
-- =====================================================

INSERT INTO padre
(id_padre, telefone, usuarios_id)
VALUES
(1, '62999990001', 4),
(2, '62999990002', 5);


-- =====================================================
-- COROINHAS
-- =====================================================

INSERT INTO coroinhas
(id_coroinhas, data_nascimento, data_iniciacao, usuarios_id)
VALUES
(1, '2010-05-12', '2022-08-15', 2),
(2, '2011-03-20', '2023-02-10', 3),
(3, '2009-11-05', '2021-06-20', 6),
(4, '2012-01-18', '2024-03-10', 7);


-- =====================================================
-- PROFESSORES
-- =====================================================

INSERT INTO professores
(id_professores, telefone, usuarios_id)
VALUES
(1, '62988880001', 9);


-- =====================================================
-- SECRETARIA
-- =====================================================

INSERT INTO secretaria
(id_secretaria, cpf, usuarios_id)
VALUES
(1, '12345678901', 8);


-- =====================================================
-- ALUNOS
-- =====================================================

INSERT INTO alunos
(id_alunos, nome, cpf, data_nascimento, cidade, telefone, usuarios_id)
VALUES
(1, 'João da Silva', '44444444444', '2008-04-10', 'Ceres', '62977770001', 2),
(2, 'Maria Oliveira', '55555555555', '2007-09-22', 'Ceres', '62977770002', 3),
(3, 'Ana Souza', '66666666666', '2009-01-15', 'Rialma', '62977770003', 6),
(4, 'Pedro Santos', '77777777777', '2006-12-03', 'Ceres', '62977770004', 7);


-- =====================================================
-- CURSOS
-- =====================================================

INSERT INTO cursos
(id_cursos, nome, horario, avisos, professores_id)
VALUES
(
    1,
    'Catequese',
    '2026-09-16 14:00:00',
    'Levar Bíblia e caderno.',
    1
),
(
    2,
    'Formação de Coroinhas',
    '2026-09-17 15:00:00',
    'Trazer uniforme.',
    1
),
(
    3,
    'Liturgia',
    '2026-09-18 19:00:00',
    'Encontro para ministros e coroinhas.',
    1
);


-- =====================================================
-- ALUNOS DOS CURSOS
-- =====================================================

INSERT INTO alunos_dos_cursos
(id, alunos_id, cursos_id)
VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 3);


-- =====================================================
-- MISSAS
-- =====================================================

INSERT INTO missas
(id_missas, localizacao, horario, padre_ce, padre_id)
VALUES
(
    1,
    'Igreja Matriz',
    'Domingo 19:00',
    'Padre Carlos',
    1
),
(
    2,
    'Capela São José',
    'Sábado 19:00',
    'Padre José',
    2
),
(
    3,
    'Igreja Matriz',
    'Quarta-feira 19:30',
    'Padre Carlos',
    1
),
(
    4,
    'Capela Nossa Senhora',
    'Domingo 08:00',
    'Padre José',
    2
),
(
    5,
    'Igreja Matriz',
    'Sexta-feira 19:00',
    'Padre Carlos',
    1
);


-- =====================================================
-- COROINHAS DAS MISSAS
-- =====================================================

INSERT INTO coroinhas_da_missa
(coroinhas_id, missas_id)
VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(1, 3),
(3, 3),
(2, 4),
(4, 4),
(1, 5),
(2, 5);


-- =====================================================
-- AVISOS
-- =====================================================

INSERT INTO avisos
(id_avisos, nome, descricao, detalhes, secretaria_id)
VALUES
(
    1,
    'Encontro de Coroinhas',
    'Encontro mensal dos coroinhas',
    'O encontro acontecerá no salão paroquial às 15h.',
    1
),
(
    2,
    'Festa da Padroeira',
    'Preparação para a festa da padroeira',
    'Todos os membros da comunidade estão convidados.',
    1
),
(
    3,
    'Reunião da Liturgia',
    'Reunião da equipe de liturgia',
    'A reunião será realizada após a missa de domingo.',
    1
);


-- =====================================================
-- RESTAURAÇÃO DAS CONFIGURAÇÕES
-- =====================================================

SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;