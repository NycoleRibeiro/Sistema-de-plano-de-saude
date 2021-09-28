<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/confirmations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Laboratorio</title>
</head>
<body>
    <?php
        function editarDados($nome, $email, $senha, $telefone, $endereco, $tipo_exame, $cnpj) {
            
            $caminho_completo = "../banco_de_dados/laboratorios/" . $cnpj . "/dados.xml";
            $xml = simplexml_load_file($caminho_completo);
            if ($xml === false) {
                echo "Erro ao carregar XML";
                foreach(libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            } else {
                $xml->nome = $nome;
                $xml->email = $email;
                $xml->senha = $senha;
                $xml->telefone = $telefone;
                $xml->endereco = $endereco;
                $xml->tipo_exame = $tipo_exame;
                $save = simplexml_import_dom($xml);
                $save->saveXML($caminho_completo);
                echo '<div class="ok"><a href="../laboratorio_dados.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Cadastrado atualizado com sucesso!</h1></div>';
            }
        }

        function cadastrarExame($data, $cpf, $tipo_exame, $resultado, $cnpj) {
            $caminho = "../banco_de_dados/pacientes/" . $cpf;
            if (!is_dir($caminho)) {
                echo '<div class="error"><a href="../laboratorio_exames.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Não existe um paciente com esse CPF</h1></div>';
            } else {
                $exame = 
                "<?xml version='1.0' encoding='UTF-8'?>
                <exame>
                    <data></data>
                    <laboratorio></laboratorio>
                    <cpf></cpf>
                    <tipo_exame></tipo_exame>
                    <resultado></resultado>
                </exame>";
                $nome_arquivo = "/exame_de_" . $tipo_exame . "_" . $data . ".xml";
                $arquivo = fopen($caminho . $nome_arquivo, "w");
                fwrite($arquivo, $exame);
                fclose($arquivo);

                $xml = simplexml_load_file($caminho . $nome_arquivo);
                if ($xml === false) {
                    echo "Erro ao carregar XML";
                    foreach(libxml_get_errors() as $error) {
                        echo "<br>", $error->message;
                    }
                } else {
                    $xml->data = $data;
                    $xml->laboratorio = $cnpj;
                    $xml->cpf = $cpf;
                    $xml->tipo_exame = $tipo_exame;
                    $xml->resultado = $resultado;
                    $save = simplexml_import_dom($xml);
                    $save->saveXML($caminho . $nome_arquivo);
                    echo '<div class="ok"><a href="../laboratorio_exames.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Exame cadastrado com sucesso!</h1></div>';
                }
            }
        }


        // Pegando o login atual
        $LoginAtual = fopen("../banco_de_dados/loginLab.txt", "r");
        $cnpj = fgets($LoginAtual);
        fclose($LoginAtual);
        // Pegando os dados do laboratorio
        if (isset($_POST['saveDados'])) {
            $nome = $_POST['labName'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $telefone = $_POST['phone'];
            $endereco = $_POST['address'];
            $tipo_exame = $_POST['examTypes'];
            editarDados($nome, $email, $senha, $telefone, $endereco, $tipo_exame, $cnpj);
        } else if (isset($_POST['cadastrarExame'])) {
            $data = $_POST['data'];
            $cpf = $_POST['cpf'];
            $tipo_exame = $_POST['exame'];
            $resultado = $_POST['resultado'];
            cadastrarExame($data, $cpf, $tipo_exame, $resultado, $cnpj);
        }
    ?>
</body>
</html>