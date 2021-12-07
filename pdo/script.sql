CREATE DATABASE hps;
use hps;

CREATE TABLE administrador (
    usuario VARCHAR(5) NOT NULL,
    senha VARCHAR(5) NOT NULL,
    PRIMARY KEY (usuario)
);
INSERT INTO administrador VALUES ('admin', 'admin');
CREATE TABLE paciente (
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    sexo VARCHAR(1) NOT NULL,
    nascimento DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (cpf)
);
CREATE TABLE medico (
    nome VARCHAR(255) NOT NULL,
    crm VARCHAR(11) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (crm)
);
CREATE TABLE laboratorio (
    nome VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    tipo_de_exame VARCHAR(50) NOT NULL,
    PRIMARY KEY (cnpj)
);
CREATE TABLE consulta (
    cod_consulta BIGINT(10) NOT NULL AUTO_INCREMENT,
    data DATE NOT NULL,
    cpf_paciente VARCHAR(11) NOT NULL,
    crm_medico VARCHAR(11) NOT NULL,
    receita VARCHAR(255) NOT NULL,
    observacao VARCHAR(255) NOT NULL,
    PRIMARY KEY (cod_consulta),
    FOREIGN KEY (cpf_paciente) REFERENCES paciente(cpf),
    FOREIGN KEY (crm_medico) REFERENCES medico(crm)
);
CREATE TABLE exame (
    cod_exame BIGINT(10) NOT NULL AUTO_INCREMENT,
    data DATE NOT NULL,
    cpf_paciente VARCHAR(11) NOT NULL,
    cnpj_laboratorio VARCHAR(20) NOT NULL,
    tipo_de_exame VARCHAR(255) NOT NULL,
    resultado VARCHAR(255) NOT NULL,
    PRIMARY KEY (cod_exame),
    FOREIGN KEY (cpf_paciente) REFERENCES paciente(cpf),
    FOREIGN KEY (cnpj_laboratorio) REFERENCES laboratorio(cnpj)
);