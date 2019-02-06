-- Criador: Grupo 2
-- Turma: 4º B Informática
-- IFRO/2018

DROP DATABASE IF EXISTS fop_db;
CREATE DATABASE IF NOT EXISTS fop_db;
	USE fop_db;

    SET sql_safe_updates = 0;

###############################################################
########################### TABELAS ###########################
###############################################################
	#Tabela Aluno
	DROP TABLE IF EXISTS aluno;
	CREATE TABLE IF NOT EXISTS aluno (
		alu_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		alu_dataCadastro DATETIME,
		alu_nome VARCHAR(100),
		alu_dataNas VARCHAR(100),
		alu_sexo VARCHAR(100),
		alu_necessidade VARCHAR(100),
		alu_tp_necessidade VARCHAR(100),
		alu_rg VARCHAR(100),
		alu_cpf VARCHAR(100),
		alu_telefone VARCHAR(100),
		alu_celular VARCHAR(100),
		alu_email VARCHAR(100),
		alu_logradouro VARCHAR(100),
		alu_numero VARCHAR(100),
		alu_bairro VARCHAR(100),
		alu_cep VARCHAR(100),
		alu_cidade VARCHAR(100),
		alu_estado VARCHAR(100),
		alu_filiacao1 VARCHAR(100),
		alu_parentesco1 VARCHAR(100),
		alu_telefoneResp1 VARCHAR(100),
		alu_celularResp1 VARCHAR(100),
		alu_emailResp1 VARCHAR(100),
		alu_filiacao2 VARCHAR(100),
		alu_parentesco2 VARCHAR(100),
		alu_telefoneResp2 VARCHAR(100),
		alu_celularResp2 VARCHAR(100),
		alu_emailResp2 VARCHAR(100),
		alu_situacao VARCHAR(100)
	);

	#Tabela Disciplina
	DROP TABLE IF EXISTS disciplina;
	CREATE TABLE IF NOT EXISTS disciplina (
	dis_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			dis_nome VARCHAR(100),
			dis_cargaHoraria VARCHAR(100)
	);

	#Tabela funcionário
	DROP TABLE IF EXISTS funcionario;
	CREATE TABLE IF NOT EXISTS funcionario (
		fun_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		fun_dataCadastro VARCHAR(100),
		fun_nome VARCHAR(100),
		fun_dataNas VARCHAR(100),
		fun_sexo VARCHAR(100),
		fun_rg VARCHAR(100),
		fun_cpf VARCHAR(100),
		fun_telefone VARCHAR(100),
		fun_celular VARCHAR(100),
		fun_email VARCHAR(100),
		fun_logradouro VARCHAR(100),
		fun_numero VARCHAR(100),
		fun_bairro VARCHAR(100),
		fun_cep VARCHAR(100),
		fun_cidade VARCHAR(100),
		fun_estado VARCHAR(100),
		fun_funcao VARCHAR(100),
		fun_cargaHoraria VARCHAR(100),
		fun_login VARCHAR(100),
		fun_senha VARCHAR(100)
  );

	 #Tabela Funcionario_Disciplina
	DROP TABLE IF EXISTS funcionario_disciplina;
	CREATE TABLE IF NOT EXISTS funcionario_disciplina (
		fun_dis_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		fun_cod_fk INT NOT NULL,
		FOREIGN KEY (fun_cod_fk)
			REFERENCES funcionario (fun_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		dis_cod_fk INT NOT NULL,
		FOREIGN KEY (dis_cod_fk)
			REFERENCES disciplina(dis_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE
	);

	#Tabela Turma
	DROP TABLE IF EXISTS turma;
	CREATE TABLE IF NOT EXISTS turma (
		tur_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		tur_ano VARCHAR(100),
		tur_serie_ano VARCHAR(100),
		tur_turno VARCHAR(100),
		tur_tipo VARCHAR(100),
		tur_classe VARCHAR(100),
		tur_nome VARCHAR(100)
	);

	#Tabela Funcionario_Turma
	DROP TABLE IF EXISTS funcionario_turma;
	CREATE TABLE IF NOT EXISTS funcionario_turma (
		fun_dis_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		fun_cod_fk INT NOT NULL,
		FOREIGN KEY (fun_cod_fk)
			REFERENCES funcionario (fun_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		tur_cod_fk INT NOT NULL,
		FOREIGN KEY (tur_cod_fk)
			REFERENCES turma (tur_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE
	);

	#Tabela Matrícula
	DROP TABLE IF EXISTS matricula;
	CREATE TABLE IF NOT EXISTS matricula (
		mat_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		mat_data DATETIME,
		mat_triagem VARCHAR(100),
		mat_responsavel VARCHAR(100),
		mat_celularResp VARCHAR(100),
		mat_observacao VARCHAR(100),
		alu_cod_fk INT NOT NULL,
		FOREIGN KEY (alu_cod_fk)
			REFERENCES aluno (alu_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		tur_cod_fk INT NOT NULL,
		FOREIGN KEY (tur_cod_fk)
			REFERENCES turma (tur_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE
	);

	 #Tabela Notas
	DROP TABLE IF EXISTS notas;
	CREATE TABLE IF NOT EXISTS notas (
		not_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		not_nota1 FLOAT,
		not_nota2 FLOAT,
		not_nota3 FLOAT,
		not_nota4 FLOAT,
		not_media FLOAT,
		alu_cod_fk INT NOT NULL,
		FOREIGN KEY (alu_cod_fk)
			REFERENCES aluno (alu_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		dis_cod_fk INT NOT NULL,
		FOREIGN KEY (dis_cod_fk)
			REFERENCES disciplina (dis_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE
	);

	#Tabela Aula
	DROP TABLE IF EXISTS aula;
	CREATE TABLE IF NOT EXISTS aula (
		aul_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		aul_data DATE,
		aul_hora_inicio TIME,
		aul_hora_fim TIME,
		tur_cod_fk INT NOT NULL,
		FOREIGN KEY (tur_cod_fk)
			REFERENCES turma (tur_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		dis_cod_fk INT NOT NULL,
		FOREIGN KEY (dis_cod_fk)
			REFERENCES disciplina (dis_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE
	);

	#Frequencia
	DROP TABLE IF EXISTS frequencia;
	CREATE TABLE IF NOT EXISTS frequencia (
		fre_cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		fre_presenca VARCHAR(100),
		alu_cod_fk INT NOT NULL,
		FOREIGN KEY (alu_cod_fk)
			REFERENCES aluno (alu_cod)
				ON UPDATE CASCADE
				ON DELETE CASCADE,
		aul_cod_fk INT NOT NULL,
		FOREIGN KEY (aul_cod_fk)
		REFERENCES aula (aul_cod)
			ON UPDATE CASCADE
			ON DELETE CASCADE
	);

###############################################################
################### PROCEDIMENTOS_INSERTS #####################
###############################################################
-- CADASTRA ALUNO
DROP PROCEDURE IF EXISTS cadastra_aluno;
DELIMITER $$
	CREATE PROCEDURE cadastra_aluno (
		alu_cod INT,
        alu_dataCadastro DATETIME,
		alu_nome VARCHAR(100),
		alu_dataNas VARCHAR(100),
		alu_sexo VARCHAR(100),
		alu_necessidade VARCHAR(100),
		alu_tp_necessidade VARCHAR(100),
		alu_rg VARCHAR(100),
		alu_cpf VARCHAR(100),
		alu_telefone VARCHAR(100),
		alu_celular VARCHAR(100),
		alu_email VARCHAR(100),
		alu_logradouro VARCHAR(100),
		alu_numero VARCHAR(100),
		alu_bairro VARCHAR(100),
		alu_cep VARCHAR(100),
		alu_cidade VARCHAR(100),
		alu_estado VARCHAR(100),
		alu_filiacao1 VARCHAR(100),
		alu_parentesco1 VARCHAR(100),
		alu_telefoneResp1 VARCHAR(100),
		alu_celularResp1 VARCHAR(100),
		alu_emailResp1 VARCHAR(100),
		alu_filiacao2 VARCHAR(100),
		alu_parentesco2 VARCHAR(100),
		alu_telefoneResp2 VARCHAR(100),
		alu_celularResp2 VARCHAR(100),
		alu_emailResp2 VARCHAR(100),
		alu_situacao VARCHAR(100)
	)
    BEGIN
		IF ((SELECT alu_cpf FROM aluno WHERE aluno.alu_cpf = alu_cpf) IS NULL) THEN
			INSERT INTO aluno VALUES (
				NULL,
				NOW(),
				alu_nome,
				alu_dataNas,
				alu_sexo,
				alu_necessidade,
				alu_tp_necessidade,
				alu_rg,
				alu_cpf,
				alu_telefone,
				alu_celular,
				alu_email,
				alu_logradouro,
				alu_numero,
				alu_bairro,
				alu_cep,
				alu_cidade,
				alu_estado,
				alu_filiacao1,
				alu_parentesco1,
				alu_telefoneResp1,
				alu_celularResp1,
				alu_emailResp1,
				alu_filiacao2,
				alu_parentesco2,
				alu_telefoneResp2,
				alu_celularResp2,
				alu_emailResp2,
				'Cadastrado'
			);
		ELSE
			SELECT 'Número de CPF invalído, já está cadastrado no sistema';
		END IF;
	END ;
$$ DELIMITER ;

-- CADASTRAR DISCIPLINA
DROP PROCEDURE IF EXISTS cadastrar_disciplina;
DELIMITER $$
	CREATE PROCEDURE cadastrar_disciplina (
		dis_cod INT,
		dis_nome VARCHAR(100),
		dis_cargaHoraria VARCHAR(100)
    )
	BEGIN
		IF((SELECT dis_nome FROM disciplina WHERE disciplina.dis_nome = dis_nome) IS NULL) THEN
			INSERT INTO disciplina VALUES (
				dis_cod,
				dis_nome,
				dis_cargaHoraria
			);
		ELSE
			SELECT 'Disciplina já cadastrada!';
		END IF ;
	END ;
$$ DELIMITER ;

-- CADASTRA FUNCIONARIO
DROP PROCEDURE IF EXISTS cadastra_funcionario;
DELIMITER $$
	CREATE PROCEDURE cadastra_funcionario (
		fun_nome VARCHAR(100),
		fun_dataNas VARCHAR(100),
		fun_sexo VARCHAR(100),
		fun_rg VARCHAR(100),
		fun_cpf VARCHAR(100),
		fun_telefone VARCHAR(100),
		fun_celular VARCHAR(100),
		fun_email VARCHAR(100),
		fun_logradouro VARCHAR(100),
		fun_numero VARCHAR(100),
		fun_bairro VARCHAR(100),
		fun_cep VARCHAR(100),
		fun_cidade VARCHAR(100),
		fun_estado VARCHAR(100),
		fun_funcao VARCHAR(100),
		fun_cargaHoraria VARCHAR(100),
		fun_login VARCHAR(100),
		fun_senha VARCHAR(100)
	)
	BEGIN
		IF ((SELECT fun_cpf FROM funcionario WHERE funcionario.fun_cpf = fun_cpf) IS NULL) THEN
			INSERT INTO funcionario VALUES (
				NULL,
				NOW(),
				fun_nome,
				fun_dataNas,
				fun_sexo,
				fun_rg,
				fun_cpf,
				fun_telefone,
				fun_celular,
				fun_emaiL,
				fun_logradouro,
				fun_numero,
				fun_bairro,
				fun_cep,
				fun_cidade,
				fun_estado,
				fun_funcao,
				fun_cargaHoraria,
				fun_login,
				fun_senha
			);
		ELSE
			SELECT 'Número de CPF invalído, já está cadastrado no sistema';
		END IF;
	END ;
$$ DELIMITER ;

#FUN_DIS

#CADASTRAR TURMA
DROP PROCEDURE IF EXISTS cadastrar_turma;
DELIMITER $$
	CREATE PROCEDURE cadastrar_turma(
		tur_cod INT,
		tur_ano VARCHAR(100),
		tur_serie VARCHAR(100),
		tur_turno VARCHAR(100),
		tur_tipo VARCHAR(100),
		tur_classe VARCHAR(100),
		tur_mome VARCHAR(100)
	)
	BEGIN
			INSERT INTO turma VALUES (
				tur_cod,
				tur_ano,
				tur_serie,
				tur_turno,
				tur_tipo,
				tur_classe,
				tur_mome
			);

	END ;
$$ DELIMITER ;

#FUNCIONARIOA_TURMA
DROP PROCEDURE IF EXISTS cadastrar_funcionarioTurma;
DELIMITER $$
	CREATE PROCEDURE cadastrar_funcionarioTurma(
		dis_fun_cod INT,
        fun_cod_fk INT,
        tur_cod_fk INT
        )
	BEGIN
		IF (((SELECT tur_cod FROM turma WHERE turma.tur_cod = tur_cod)IS NOT NULL) AND ((SELECT fun_cod FROM funcionario WHERE funcionario.fun_cod = fun_cod)IS NOT NULL)) THEN
			INSERT INTO funcionario_turma VALUES (
				dis_fun_cod,
				fun_cod_fk,
				tur_cod_fk
            );
		ELSE
			SELECT 'Funcionario ou Turma não cadastrados';
		END IF;
	END;
$$ DELIMITER ;


-- MATRICULAR
DROP PROCEDURE IF EXISTS matricular;
DELIMITER $$
	CREATE PROCEDURE matricular (
        mat_cod INT,
		mat_data DATETIME,
        alu_nome VARCHAR(100),
		tur_nome VARCHAR(100),
		mat_triagem VARCHAR(100),
		mat_responsavel VARCHAR(100),
		mat_celularResp VARCHAR(100),
		mat_observacao VARCHAR(100)
	)
    BEGIN

    DECLARE id_aluno INT;
    DECLARE id_turma INT;

    SELECT alu_cod FROM aluno WHERE aluno.alu_nome = alu_nome INTO id_aluno;
    SELECT tur_cod FROM turma WHERE turma.tur_nome = tur_nome INTO id_turma;

		INSERT INTO matricula VALUES (
				NULL,
				NOW(),
				mat_triagem,
				mat_responsavel,
				mat_celularResp,
				mat_observacao,
				id_aluno,
                id_turma
			);

		END ;
$$ DELIMITER ;

-- CADASTRAR NOTAS
DROP PROCEDURE IF EXISTS cadastrar_notas;
DELIMITER $$
	CREATE PROCEDURE cadastrar_notas (
		not_cod INT,
		not_nota1 FLOAT,
		not_nota2 FLOAT,
		not_nota3 FLOAT,
		not_nota4 FLOAT,
		not_media FLOAT,
		alu_cod_fk int,
		dis_cod_fk int
	)
	BEGIN
		IF (((SELECT alu_cod FROM aluno WHERE aluno.alu_cod = alu_cod_fk) IS NOT NULL) AND ((SELECT dis_cod FROM disciplina WHERE disciplina.dis_cod = dis_cod_fk) IS NOT NULL)) THEN
			INSERT INTO notas VALUES (
				not_cod,
                not_nota1,
                not_nota2,
                not_nota3,
                not_nota4,
                not_media,
                alu_cod_fk,
                dis_cod_fK
			);
		ELSE
			SELECT 'Aluno ou disciplina inválidos!';
		END IF ;
	END
$$ DELIMITER ;

-- CADASTRA AULA
DROP PROCEDURE IF EXISTS cadastra_aula;
DELIMITER $$
	CREATE PROCEDURE cadastra_aula(
		aul_cod INT,
		aul_data DATE,
        aul_hora_inicio TIME,
        aul_hora_fim TIME,
        tur_cod_fk INT,
        dis_cod_fk INT
    )
	BEGIN
		IF(((SELECT aul_cod FROM aula WHERE aula.aul_cod = aul_cod) IS NOT NULL) AND ((SELECT dis_cod FROM disciplina where disciplina.dis_cod = dis_cod)IS NOT NULL))THEN
			INSERT INTO aula VALUES(
				aul_cod,
				aul_data,
				aul_hora_inicio,
				aul_hora_fim,
				tur_cod_fk,
				dis_cod_fk
			);
		ELSE
			SELECT 'Aluno ou disciplina não cadastrado';
        END IF;
	END ;
$$ DELIMITER ;

#FREQUENCIA
DELIMITER $$
CREATE PROCEDURE cadastrar_frequencia (
	fre_cod INT,
    fre_presenca VARCHAR(5),
	alu_cod_fk INT,
    aul_cod_fk INT
)
	BEGIN
		IF (((SELECT alu_cod FROM aluno WHERE aluno.alu_cod = alu_cod) IS NOT NULL) AND ((SELECT aul_cod FROM aula where aula.aul_cod = aul_cod) IS NOT NULL)) THEN
			INSERT INTO frequencia VALUES (
				fre_cod,
				fre_presenca,
				alu_cod_fk,
				aul_cod_fk
			);
		ELSE
			SELECT 'Aluno ou aula não encontrados!';
		END IF ;
	END;
$$ DELIMITER ;

###############################################################
#################### PROCEDIMENTOS_EDITS ######################
###############################################################
-- ATUALIZA A TABELA ALUNO
DROP PROCEDURE IF EXISTS atualiza_alu;
DELIMITER $$
	CREATE PROCEDURE atualiza_alu (
		alu_cod INT,
		alu_nome VARCHAR(100),
		alu_dataNas VARCHAR(100),
		alu_sexo VARCHAR(100),
		alu_necessidade VARCHAR(100),
		alu_tp_necessidade VARCHAR(100),
		alu_rg VARCHAR(100),
		alu_cpf VARCHAR(100),
		alu_telefone VARCHAR(100),
		alu_celular VARCHAR(100),
		alu_email VARCHAR(100),
		alu_logradouro VARCHAR(100),
		alu_numero VARCHAR(100),
		alu_bairro VARCHAR(100),
		alu_cep VARCHAR(100),
		alu_cidade VARCHAR(100),
		alu_estado VARCHAR(100),
		alu_filiacao1 VARCHAR(100),
		alu_parentesco1 VARCHAR(100),
		alu_telefoneResp1 VARCHAR(100),
		alu_celularResp1 VARCHAR(100),
		alu_emailResp1 VARCHAR(100),
		alu_filiacao2 VARCHAR(100),
		alu_parentesco2 VARCHAR(100),
		alu_telefoneResp2 VARCHAR(100),
		alu_celularResp2 VARCHAR(100),
		alu_emailResp2 VARCHAR(100)
	)
	BEGIN
		UPDATE aluno SET
			aluno.alu_cod = alu_cod,
			aluno.alu_nome = alu_nome,
			aluno.alu_dataNas = alu_dataNas,
			aluno.alu_sexo = alu_sexo,
			aluno.alu_necessidade = alu_necessidade,
			aluno.alu_tp_necessidade = alu_tp_necessidade,
			aluno.alu_rg = alu_rg,
			aluno.alu_cpf = alu_cpf,
			aluno.alu_telefone = alu_telefone,
			aluno.alu_celular = alu_celular,
			aluno.alu_email = alu_email,
			aluno.alu_logradouro = alu_logradouro,
			aluno.alu_numero = alu_numero,
			aluno.alu_bairro = alu_bairro,
			aluno.alu_cep = alu_cep,
			aluno.alu_cidade = alu_cidade,
			aluno.alu_estado = alu_estado,
			aluno.alu_filiacao1 = alu_filiacao1,
			aluno.alu_parentesco1 = alu_parentesco1,
			aluno.alu_telefoneResp1 = alu_telefoneResp1,
			aluno.alu_celularResp1 = alu_celularResp1,
			aluno.alu_emailResp1 = alu_emailResp1,
			aluno.alu_filiacao2 = alu_filiacao2,
			aluno.alu_parentesco2 = alu_parentesco2,
			aluno.alu_telefoneResp2 = alu_telefoneResp2,
			aluno.alu_celularResp2 = alu_celularResp2,
			aluno.alu_emailResp2 = alu_emailResp2
		WHERE
			aluno.alu_cod = alu_cod;
	END ;
$$ DELIMITER ;

-- ATUALIZA A TABELA FUNCIONÁRIO
DROP PROCEDURE IF EXISTS atualiza_fun;
DELIMITER $$
	CREATE PROCEDURE atualiza_fun (
		fun_cod INT,
		fun_nome VARCHAR(100),
		fun_dataNas VARCHAR(100),
		fun_sexo VARCHAR(100),
		fun_rg VARCHAR(100),
		fun_cpf VARCHAR(100),
		fun_telefone VARCHAR(100),
		fun_celular VARCHAR(100),
		fun_email VARCHAR(100),
		fun_logradouro VARCHAR(100),
		fun_numero VARCHAR(100),
		fun_bairro VARCHAR(100),
		fun_cep VARCHAR(100),
		fun_cidade VARCHAR(100),
		fun_estado VARCHAR(100),
		fun_funcao VARCHAR(100),
		fun_cargaHoraria VARCHAR(100),
		fun_login VARCHAR(100),
		fun_senha VARCHAR(100)
	)
	BEGIN
		UPDATE funcionario SET
			funcionario.fun_nome = fun_nome,
			funcionario.fun_dataNas = fun_dataNas,
			funcionario.fun_sexo = fun_sexo,
			funcionario.fun_rg = fun_rg,
			funcionario.fun_cpf = fun_cpf,
			funcionario.fun_telefone = fun_telefone,
			funcionario.fun_celular = fun_celular,
			funcionario.fun_email = fun_email,
			funcionario.fun_logradouro = fun_logradouro,
			funcionario.fun_numero = fun_numero,
			funcionario.fun_bairro = fun_bairro,
			funcionario.fun_cep = fun_cep,
			funcionario.fun_cidade = fun_cidade,
			funcionario.fun_estado = fun_estado,
            funcionario.fun_funcao = fun_funcao,
			funcionario.fun_cargaHoraria = fun_cargaHoraria,
			funcionario.fun_login = fun_login,
			funcionario.fun_senha = fun_senha
		WHERE
			funcionario.fun_cod = fun_cod;
	END ;
$$ DELIMITER ;

###############################################################
################### PROCEDIMENTOS_SELECTS #####################
###############################################################
-- SELECIONA FUNCIONÁRIOS, EXCETO ADMIN
DROP PROCEDURE IF EXISTS select_fun;
DELIMITER $$
	CREATE PROCEDURE select_fun()
	BEGIN
		SELECT
			*
		FROM
			funcionario
		WHERE
			funcionario.fun_cod <> 1;
	END;
$$ DELIMITER ;

-- SELECIONA ALUNOS CADASTRADOS
DROP PROCEDURE IF EXISTS select_alu_cad;
DELIMITER $$
	CREATE PROCEDURE select_alu_cad()
	BEGIN
		SELECT
			*
		FROM
			aluno;
	END;
$$ DELIMITER ;

###############################################################
################### PROCEDIMENTOS_DELETE ######################
###############################################################
-- DELETA FUNCIONÁRIO
DROP PROCEDURE IF EXISTS delete_fun;
DELIMITER $$
	CREATE PROCEDURE delete_fun (fun_cod INT)
    BEGIN
		DELETE
		FROM
			funcionario
		WHERE
			funcionario.fun_cod = fun_cod;
	END;
$$ DELIMITER ;

-- DELETA ALUNO
DROP PROCEDURE IF EXISTS delete_alu;
DELIMITER $$
	CREATE PROCEDURE delete_alu (alu_cod INT)
    BEGIN
		DELETE
		FROM
			aluno
		WHERE
			aluno.alu_cod = alu_cod;
	END;
$$ DELIMITER ;
###############################################################
########################## GATILHOS ###########################
###############################################################
--
DELIMITER $$
	CREATE TRIGGER disciplinas AFTER INSERT ON funcionario FOR EACH ROW
	BEGIN
		DECLARE cont INT;
		SET cont = 1;
		WHILE (cont <= (SELECT COUNT(dis_cod) FROM disciplina)) DO
			INSERT INTO funcionario_disciplina VALUES(NULL,  NEW.fun_cod, cont);
			SET cont = cont + 1;
		END WHILE;
	END
$$ DELIMITER ;

--
DELIMITER $$
CREATE TRIGGER turma AFTER INSERT ON funcionario FOR EACH ROW
BEGIN
		DECLARE cont INT;
		SET cont = 1;
		WHILE(cont <= (SELECT COUNT(tur_cod) FROM turma)) DO
			INSERT INTO  funcionario_turma VALUES(NULL,  NEW.fun_cod, cont);
			SET cont = cont + 1;
		END WHILE;
	END ;
$$ DELIMITER ;

--
DELIMITER $$
CREATE TRIGGER situacao AFTER INSERT ON matricula FOR EACH ROW
	BEGIN
		UPDATE aluno SET alu_situacao = 'Matriculado' WHERE aluno.alu_cod = NEW.alu_cod_fk;
	END ;
$$ DELIMITER ;

--
#DELIMITER $$
#CREATE TRIGGER atualiza_nota AFTER INSERT ON notas FOR EACH ROW
#	BEGIN
#		UPDATE notas SET not_media = ((not_nota1 + not_nota2 + not_nota3 + not_nota4)/4) WHERE aluno.alu_cod = NEW.alu_cod_fk;
#	END ;
#$$ DELIMITER ;

select * from notas;
###############################################################
########################### INSERTS ###########################
###############################################################
-- Aluno
CALL cadastra_aluno (NULL, NOW(), 'Samuel Henrique Santos', '11/09/1996', 'Masculino','Nao', 'Nenhuma', '13.426.350-9 SSP/RO', '256.883.490-00', '(69) 4002-8922', '(69)99280-7070', 'admin@gmail.com', 'Rua Gamboara', '1469', 'Vilar Grande', '89.700-682', 'Japeri','RJ', 'Nina Sophia Isabelly', 'Mae', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmail.com', 'Benício Leonardo Caleb Santos', 'Pai', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmai2.com', NULL);
CALL cadastra_aluno (NULL, NOW(), 'Samuel Felipe Almeida', '11/09/1994', 'Masculino','Sim', 'Cego', '13.326.350-9 SSP/RO', '256.983.490-00', '(69) 4002-8922', '(69)99280-7070', 'admin@gmail.com', 'Rua Gamboara', '1469', 'Vilar Grande', '89.700-682', 'Japeri','RJ', 'Nina Sophia Isabelly', 'Mae', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmail.com', 'Benício Leonardo Caleb Santos', 'Pai', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmai2.com', NULL);
CALL cadastra_aluno (NULL, NULL, 'Renata Amanda Gabrielly Silva', '05/10/1996', 'Feminio','Sim', 'Tetraplegico', '78213466 SSP/SP', '987.654.321-00', '(69) 4002-8922', '(69)99280-7070', 'renataamandagabriellysilva__renataamandagabriellysilva@daou.com.br', 'Rua Primavera', '1469', 'Bairro Primavera', '65911-745', 'Jipa-City','RO', 'Stefany Andrea', 'Mae', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmail.com', 'Diogo Bento Carlos Silva', 'Pai', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmai2.com', NULL);
CALL cadastra_aluno (NULL, NULL, 'Brenda Nina Dias', '16/09/2000', 'Masculino','Sim', 'Tetraplegico', '78213466 SSP/SP', '987.654.331-00', '(69) 4002-8922', '(69)99280-7070', 'admin@gmail.com', 'Rua Elispanha', '1469', 'Bairro Primavera', '89.700-682', 'Jipa-City','RO', 'Fran', 'Mae', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmail.com', 'Leonardo', 'Pai', '(69) 4002-8922', '(69)99280-7070', 'resp1@gmai2.com', NULL);

-- DISCIPLLINA
CALL cadastrar_disciplina (NULL, 'História',  '80h');
CALL cadastrar_disciplina (NULL, 'Matematica',  '120h');

-- TURMA
CALL cadastrar_turma(NULL, '2018', '1°', 'Matutino', 'Infantil', 'B', '1°B Inf Mat 2018');
CALL cadastrar_turma(NULL, '2018', '2°', 'Matutino', 'Infantil', 'B', '2°B Inf Mat 2018');
CALL cadastrar_turma(NULL, '2018', '3°', 'Matutino', 'Infantil', 'A', '3°A Inf Mat 2018');
CALL cadastrar_turma(NULL, '2018', '3°', 'Matutino', 'Infantil', 'B', '3°B Inf Mat 2018');
CALL cadastrar_turma(NULL, '2018', '5°', 'Matutino', 'Infantil', 'B', '5°B Inf Mat 2018');

-- FUNCIONARIO
CALL cadastra_funcionario ('ROOT', '00/00/0000', 'Masculino', '0000000 SSP/**', '000.000.000-00', '(00) 0000-0000', '(00) 0.0000-0000', 'admin', 'Rua Null', '0000', 'Residencial', '00.000-000', 'Jaru','RR', 'Administrador', '24/7', 'admin', 'admin');
CALL cadastra_funcionario ('EisenFonseca', '25/09/2000', 'Masculino', '1014684 SSP/RO', '763.132.552.91', '(69) 3422-8778', '(69) 9.9267-2897', 'eisen.fonseca@gmail.com', 'Rua Pitangueira', '071', 'Green Park', '79.901-870', 'Ji-Parana','RO', 'TI', '24/7', 'eisen', '2509');
CALL cadastra_funcionario ('Jaoz', '30/10/1997', 'Masculino', '1231231 SSP/**', '123.456.1das23-90', '(69) 9999-9999', '(69) 9.9287-7854', 'jao@gmail.com', 'Rua Flores', '123', 'Residencial', '12.123-312', 'JipaCity','RO', 'Professor', '40h', 'jao', '12345');

-- MATRÍCULA
CALL matricular (NULL, NULL, 'Brenda Nina Dias', '5°B Inf Mat 2018', 'Aprovado', 'Felipe Lima', '(69)99280-7070', 'Chora muito!');

-- NOTAS
CALL cadastrar_notas (NULL, 10,9,8,7, NULL, 1, 1);
CALL cadastrar_notas (NULL, 7,8,9,10, NULL, 2, 1);
CALL cadastrar_notas (NULL, 7,8,9,10, NULL, 1, 2);
CALL cadastrar_notas (NULL, 10,9,8,7, NULL, 2, 2);

-- AULA
CALL cadastra_aula (NULL, '12/12/12', '13:00:00', '13:50:00', 1, 1);

-- FREQUENCIA
#CALL cadastrar_frequencia(NULL, 'Presente', 1, 1);

###############################################################
########################## ATUALIZA ###########################
###############################################################
-- FUNCIONARIO
CALL atualiza_fun (3, 'Bacon123', '20/10/1997', 'Masculino', '1231231 SSP/**', '123.456.768-90', '(69) 9999-9999', '(69) 9.9287-7854', 'jao@gmail.com', 'Rua Flores', '123', 'Residencial', '12.123-312', 'JipaCity','RO', 'Professor', '40h', 'jao', '12345');

###############################################################
########################### VIEWS #############################
###############################################################
-- Notas
CREATE VIEW Notas_do_aluno AS
SELECT
	(SELECT alu_nome FROM aluno WHERE notas.alu_cod_fk=aluno.alu_cod) AS 'Aluno',
	not_nota1 AS '1° Bimestre',
	not_nota2 AS '2° Bimestre',
	not_nota3 AS '3° Bimestre',
	not_nota4 AS '4° Bimestre',
	not_media AS 'Media Final',
	(SELECT dis_nome FROM disciplina WHERE notas.dis_cod_fk = disciplina.dis_cod) AS 'Disciplina'
FROM notas;

-- Matriculas
DROP VIEW IF EXISTS Matricula_do_Aluno;
CREATE VIEW Matricula_do_Aluno AS
SELECT
	(SELECT alu_cod FROM aluno WHERE alu_Cod = alu_cod_fk) AS 'Cod',
	(SELECT alu_nome FROM aluno WHERE alu_Cod = alu_cod_fk) AS 'Aluno',
	(SELECT tur_nome FROM turma WHERE tur_Cod = tur_cod_fk) AS 'Turma',
	mat_responsavel AS 'Responsavel',
	mat_celularResp AS 'Celular_Responsavel',
	mat_triagem AS 'Triagem',
    mat_observacao as 'Observacoes',
	mat_data AS 'Data_Matricula'
FROM matricula;

-- Disciplinas
CREATE VIEW Disciplinas_do_Professor AS
SELECT
	funcionario.fun_nome AS 'Nome Funcionario',
	funcionario.fun_funcao AS 'Função do Funcionario',
	disciplina.dis_nome AS 'Disciplina'
FROM funcionario INNER JOIN funcionario_disciplina ON funcionario.fun_cod = funcionario_disciplina.fun_cod_fk
	INNER JOIN disciplina ON disciplina.dis_cod = funcionario_disciplina.dis_cod_fk ORDER BY disciplina.dis_nome;

-- Alunos Matriculados
CREATE VIEW alunos_matriculados_por_turma AS
SELECT
	aluno.alu_nome AS 'Nome do Aluno',
	turma.tur_nome AS 'Turma'
FROM aluno INNER JOIN matricula ON aluno.alu_cod = matricula.alu_cod_fk
	INNER JOIN turma ON turma.tur_cod = matricula.tur_cod_fk;

###############################################################
####################### SELECT VIEWS ##########################
###############################################################
SELECT * from Notas_do_aluno;
SELECT * from Matricula_do_Aluno;
SELECT * from Disciplinas_do_Professor;
SELECT * FROM alunos_matriculados_por_turma;

###############################################################
###################### SELECTS TESTE ##########################
###############################################################
SELECT * FROM aluno;
SELECT * FROM disciplina;
SELECT * FROM funcionario;
SELECT * FROM funcionario_disciplina;
SELECT * FROM turma;
SELECT * FROM funcionario_turma;
SELECT * FROM matricula;
SELECT * FROM notas;
SELECT * FROM aula;
SELECT * FROM frequencia;
