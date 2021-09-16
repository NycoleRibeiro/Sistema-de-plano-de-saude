<?php

function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha) {
    $caminho = "../banco_de_dados/pacientes";
    $nome_pasta = $cpf;
    $caminho_completo = $caminho . "/" . $nome_pasta;
    if (is_dir($caminho_completo)) {
        echo "Já existe um paciente com esse CPF";
    } else {
        $pessoa = 
        "<?xml version='1.0' encoding='UTF-8'?>
        <paciente>
            <nome></nome>
            <cpf></cpf>
            <sexo></sexo>
            <nascimento></nascimento>
            <telefone></telefone>
            <endereco></endereco>
            <email></email>
            <senha></senha>
        </paciente>";
        mkdir($caminho_completo);
        $arquivo = fopen($caminho_completo . "/dados.xml", "w");
        fwrite($arquivo, $pessoa);
        fclose($arquivo);

        $xml = simplexml_load_file($caminho_completo . "/dados.xml");
        if ($xml === false) {
            echo "Erro ao carregar XML";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            $xml->nome = $nome;
            $xml->cpf = $cpf;
            $xml->sexo = $sexo;
            $xml->nascimento = $data_nasc;
            $xml->telefone = $telefone;
            $xml->endereco = $endereco;
            $xml->email = $email;
            $xml->senha = $senha;
            $save = simplexml_import_dom($xml);
            $save->saveXML($caminho_completo . "/dados.xml");
        }
    }
}

function cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha) {

}

function cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha) {

}


if(isset($_POST['cadastro_lab'])) {
    // Caso o botão clicado seja o de cadastro de laboratório
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $tipo_exame = $_POST['tipo_exame'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha);
} else if(isset($_POST['cadastro_med'])) {
    // Caso o botão clicado seja o de cadastro de médico
    $nome = $_POST['nome'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha);
} else if(isset($_POST['cadastro_pac'])) {
    // Caso o botão clicado seja o de cadastro de paciente
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha);
}