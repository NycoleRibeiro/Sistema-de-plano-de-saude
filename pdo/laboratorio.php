<!DOCTYPE html>
<html lang="pt-br">
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
            $pdo = require 'connect.php';

            $sql = "SELECT * FROM laboratorio WHERE cnpj=$cnpj";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if ($result[0]['nome'] != $nome) {
                $sql = "UPDATE laboratorio SET nome='$nome' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['email'] != $email) {
                $sql = "UPDATE laboratorio SET email='$email' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['senha'] != $senha) {
                $sql = "UPDATE laboratorio SET senha='$senha' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['telefone'] != $telefone) {
                $sql = "UPDATE laboratorio SET telefone='$telefone' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['endereco'] != $endereco) {
                $sql = "UPDATE laboratorio SET endereco='$endereco' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['tipo_de_exame'] != $tipo_exame) {
                $sql = "UPDATE laboratorio SET tipo_de_exame='$tipo_exame' WHERE cnpj=$cnpj";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            echo '<div class="ok"><a href="../laboratorio_dados.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Cadastro atualizado com sucesso!</h1></div>';

        }

        function cadastrarExame($data, $cpf, $tipo_exame, $resultado, $cnpj) {
            $pdo = require 'connect.php';

            $sql = "INSERT INTO exame (data, cpf_paciente, tipo_de_exame, resultado, cnpj_laboratorio) VALUES ('$data', '$cpf', '$tipo_exame', '$resultado', '$cnpj')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            echo '<div class="ok"><a href="../laboratorio_exames.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Exame cadastrado com sucesso!</h1></div>';
        }


        $arquivo = fopen("CurrentUser.txt", "r");
        $cnpj = fgets($arquivo);
        fclose($arquivo);

        if (isset($_POST['saveDados'])) {
            $nome = $_POST['name'];
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