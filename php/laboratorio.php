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
        function editarDados($nome, $email, $senha, $telefone, $endereco, $tipo_exame) {
            $LoginAtual = fopen("../banco_de_dados/login.txt", "r");
            $cnpj = fgets($LoginAtual);
            fclose($LoginAtual);
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

        function cadastrarExame() {

        }

        if (isset($_POST['saveDados'])) {
            $nome = $_POST['labName'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $telefone = $_POST['phone'];
            $endereco = $_POST['address'];
            $tipo_exame = $_POST['examTypes'];
            editarDados($nome, $email, $senha, $telefone, $endereco, $tipo_exame);
        } else if (isset($_POST['cadastrarExam'])) {

        }
    ?>
</body>
</html>