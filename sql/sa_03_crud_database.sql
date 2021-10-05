-- sa_02_crud_db

create table organizacao(
	id INT PRIMARY KEY,
    name VARCHAR(20),
    site VARCHAR(20),
    description VARCHAR(40)
);

create table procedimento(
	id_consulta int not null auto_increment primary key,
	codigo int,
	nome varchar(50),
	valor double,
	genero varchar(10),
	excecao varchar(200),
	data_procedimento date,
	paciente_id_paciente int(5),
	FOREIGN KEY (paciente_id_paciente) REFERENCES tbl_paciente(id_paciente)
);

 CREATE TABLE tbl_especialidade(
     id_cadastro INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     nome_especialidade VARCHAR(50)
 );

CREATE TABLE tbl_paciente(
     id_paciente INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     nome_paciente VARCHAR(50),
     rua VARCHAR(50),
     numero INT(5),
     complemento VARCHAR(50),
     bairro VARCHAR(50),
     cep VARCHAR(9),
     email VARCHAR(50),
     telefone VARCHAR(15)  
  );

create table funcionamento (
	id_funcionamento int(5) primary key auto_increment not null,
	abertura_clinica varchar (6),
	fechamento_clinica VARCHAR(6),
	media_consultas VARCHAR(6),
	dias_funcionamento VARCHAR(20)
);

create table convenios(
	id_convenio int(5) auto_increment primary key,
	nome_fantasia varchar(40),
	nome_empresa varchar(40),
	cnpj char(14),
	email varchar(40),
	nome_cont varchar(40),
	telefone VARCHAR(15),
	celular VARCHAR(16),
	endereco varchar(40),
	numero INT(10),
	complemento varchar(40),
	cidade varchar(40),
	estado varchar(40),
	cep varchar(9)
);

CREATE TABLE medicos (
	id_medico INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_medico VARCHAR(45) NOT NULL,
    rua_medico VARCHAR(45) NOT NULL,
    numero_medico INT(10) NOT NULL,
    complemento_medico VARCHAR(10) NOT NULL,
    bairro_medico VARCHAR(45) NOT NULL,
    cep_medico CHAR(9) NOT NULL,
    email_medico VARCHAR(45) NOT NULL,
    telefone_fixo_medico VARCHAR(15) NOT NULL,
    paciente_id_paciente INT(5),
    FOREIGN KEY (paciente_id_paciente) REFERENCES tbl_paciente(id_paciente)
);

drop table procedimento;