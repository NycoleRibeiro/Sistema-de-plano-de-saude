<?php

function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha) {
        
}

function cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha) {

}

function cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha) {

}


if(isset($_POST['cadastro_lab'])) {
    echo "Cadastro de laboratório";
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $tipo_exame = $_POST['tipo_exame'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha);
}