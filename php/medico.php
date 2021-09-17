<?php

function editarDados($nome, $crm, $especialidade, $email, $telefone, $endereco) {

}

function cadastrarConsulta($data, $paciente, $receita, $observacao, $medico) {

}

function verHistorico($cpf) {

}

if (isset($_POST['editarDados'])) {
    editarDados($_POST['nome'], $_POST['crm'], $_POST['especialidade'], $_POST['email'], $_POST['telefone'], $_POST['endereco']);
} else if (isset($_POST['cadastrarConsulta'])) {
    cadastrarConsulta($_POST['data'], $_POST['paciente'], $_POST['receita'], $_POST['observacao'], $_POST['medico']);
    
} else if (isset($_POST['verHistorico'])) {
    verHistorico($_POST['cpf']);
}