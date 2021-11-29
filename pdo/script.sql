CREATE DATABASE hps;
use hps;

CREATE TABLE admin (
    user VARCHAR(5) NOT NULL,
    pass VARCHAR(5) NOT NULL
);
INSERT INTO admin VALUES ('admin', 'admin');
CREATE TABLE paciente (
    nome VARCHAR(255) NOT NULL,
    cpf INT(11) NOT NULL,
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
    crm INT(11) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    PRIMARY KEY (crm)
);
CREATE TABLE laboratorio (
    nome VARCHAR(255) NOT NULL,
    cnpj INT(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    tipo_de_exame VARCHAR(50) NOT NULL,
    PRIMARY KEY (cnpj)
);
CREATE TABLE consulta (
    cod_consulta INT(10) NOT NULL AUTO_INCREMENT,
    data DATE NOT NULL,
    cpf_paciente INT(11) NOT NULL,
    crm_medico INT(11) NOT NULL,
    receita VARCHAR(255) NOT NULL,
    observacao VARCHAR(255) NOT NULL,
    PRIMARY KEY (cod_consulta),
    FOREIGN KEY (cpf_paciente) REFERENCES paciente(cpf),
    FOREIGN KEY (crm_medico) REFERENCES medico(crm)
);
CREATE TABLE exame (
    cod_exame INT(10) NOT NULL AUTO_INCREMENT,
    data DATE NOT NULL,
    cpf_paciente INT(11) NOT NULL,
    cnpj_laboratorio INT(20) NOT NULL,
    tipo_de_exame VARCHAR(255) NOT NULL,
    resultado VARCHAR(255) NOT NULL,
    PRIMARY KEY (cod_exame),
    FOREIGN KEY (cpf_paciente) REFERENCES paciente(cpf),
    FOREIGN KEY (cnpj_laboratorio) REFERENCES laboratorio(cnpj)
);