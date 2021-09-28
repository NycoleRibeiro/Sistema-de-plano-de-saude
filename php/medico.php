<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/confirmations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Medico</title>
</head>
<body>
    <?php
        function editarDados($nome, $especialidade, $email, $senha, $telefone, $endereco) {
            $LoginAtual = fopen("../banco_de_dados/login.txt", "r");
            $crm = fgets($LoginAtual);
            fclose($LoginAtual);
            $caminho_completo = "../banco_de_dados/medicos/" . $crm . "/dados.xml";
            $xml = simplexml_load_file($caminho_completo);
            if ($xml === false) {
                echo "Erro ao carregar XML";
                foreach(libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            } else {
                $xml->nome = $nome;
                $xml->especialidade = $especialidade;
                $xml->telefone = $telefone;
                $xml->endereco = $endereco;
                $xml->email = $email;
                $xml->senha = $senha;
                $save = simplexml_import_dom($xml);
                $save->saveXML($caminho_completo);
                echo '<div class="ok"><a href="../medico_dados.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Cadastrado atualizado com sucesso!</h1></div>';
            }
        }

        function cadastrarConsulta($data, $cpf, $receita, $observacao, $crm) {
            $caminho = "../banco_de_dados/pacientes/" . $cpf;
            if (!is_dir($caminho)) {
                echo '<div class="error"><a href="../medico_consulta.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Não existe um paciente com esse CPF</h1></div>';
            } else {
                $consulta = 
                "<?xml version='1.0' encoding='UTF-8'?>
                <consulta>
                    <data></data>
                    <cpf></cpf>
                    <medico></medico>
                    <receita></receita>
                    <observacao></observacao>
                </consulta>";
                $nome_arquivo = "/consulta_do_dia_" . $data . ".xml";
                $arquivo = fopen($caminho . $nome_arquivo, "w");
                fwrite($arquivo, $consulta);
                fclose($arquivo);

                $xml = simplexml_load_file($caminho . $nome_arquivo);
                if ($xml === false) {
                    echo "Erro ao carregar XML";
                    foreach(libxml_get_errors() as $error) {
                        echo "<br>", $error->message;
                    }
                } else {
                    $xml->data = $data;
                    $xml->cpf = $cpf;
                    $xml->medico = $crm;
                    $xml->receita = $receita;
                    $xml->observacao = $observacao;
                    $save = simplexml_import_dom($xml);
                    $save->saveXML($caminho . $nome_arquivo);
                    echo '<div class="ok"><a href="../medico_consulta.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Consulta cadastrada com sucesso!</h1></div>';
                }
            }
        }


        // Pegando o login atual
        $LoginAtual = fopen("../banco_de_dados/login.txt", "r");
        $crm = fgets($LoginAtual);
        fclose($LoginAtual);
        // Pegando os dados do médico
        if (isset($_POST['editarDados'])) {
            $nome = $_POST['name'];
            $especialidade = $_POST['especialidade'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $telefone = $_POST['phone'];
            $endereco = $_POST['address'];
            editarDados($nome, $especialidade, $email, $senha, $telefone, $endereco);
        } else if (isset($_POST['cadastrarConsulta'])) {
            $data = $_POST['data'];
            $cpf = $_POST['cpf'];
            $receita = $_POST['receita'];
            $observacao = $_POST['observacao'];
            cadastrarConsulta($data, $cpf, $receita, $observacao, $crm);
        }
    ?>
</div>
</body>
</html>