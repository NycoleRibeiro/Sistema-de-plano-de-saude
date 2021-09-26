<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/confirmations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Cadastros</title>
</head>
<body>
    <?php
        function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha) {
            $caminho = "../banco_de_dados/pacientes";
            $nome_pasta = $cpf;
            $caminho_completo = $caminho . "/" . $nome_pasta;
            if (is_dir($caminho_completo)) {
                echo '<div class="error"><a href="../administrador_paciente.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um paciente com esse CPF</h1></div>';
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
                    echo '<div class="ok"><a href="../administrador_paciente.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Paciente cadastrado com sucesso!</h1></div>';
                }
            }
        }

        function cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha) {
            $caminho = "../banco_de_dados/medicos";
            $nome_pasta = $crm;
            $caminho_completo = $caminho . "/" . $nome_pasta;
            if (is_dir($caminho_completo)) {
                echo '<div class="error"><a href="../administrador_med.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um médico com esse CRM</h1></div>';
            } else {
                $pessoa =
                "<?xml version='1.0' encoding='UTF-8'?>
                <medico>
                    <nome></nome>
                    <crm></crm>
                    <especialidade></especialidade>
                    <telefone></telefone>
                    <endereco></endereco>
                    <email></email>
                    <senha></senha>
                </medico>";
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
                    $xml->crm = $crm;
                    $xml->especialidade = $especialidade;
                    $xml->telefone = $telefone;
                    $xml->endereco = $endereco;
                    $xml->email = $email;
                    $xml->senha = $senha;
                    $save = simplexml_import_dom($xml);
                    $save->saveXML($caminho_completo . "/dados.xml");
                    echo '<div class="ok"><a href="../administrador_med.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Médico cadastrado com sucesso!</h1></div>';
                }
            }
        }

        function cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha) {
            $caminho = "../banco_de_dados/laboratorios";
            $nome_pasta = $cnpj;
            $caminho_completo = $caminho . "/" . $nome_pasta;
            if (is_dir($caminho_completo)) {
                echo '<div class="error"><a href="../administrador_lab.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um laboratório com esse CNPJ</h1></div>';
            } else {
                $pessoa =
                "<?xml version='1.0' encoding='UTF-8'?>
                <laboratorio>
                    <nome></nome>
                    <cnpj></cnpj>
                    <tipo_exame></tipo_exame>
                    <telefone></telefone>
                    <endereco></endereco>
                    <email></email>
                    <senha></senha>
                </laboratorio>";
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
                    $xml->cnpj = $cnpj;
                    $xml->tipo_exame = $tipo_exame;
                    $xml->telefone = $telefone;
                    $xml->endereco = $endereco;
                    $xml->email = $email;
                    $xml->senha = $senha;
                    $save = simplexml_import_dom($xml);
                    $save->saveXML($caminho_completo . "/dados.xml");
                    echo '<div class="ok"><a href="../administrador_lab.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Laboratório cadastrado com sucesso!</h1></div>';
                }
            }
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
    ?>
</body>
</html>