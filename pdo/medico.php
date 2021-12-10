<!DOCTYPE html>
<html lang="pt-br">
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
        function editarDados($nome, $crm, $especialidade, $email, $senha, $telefone, $endereco) {
            $pdo = require 'connect.php';

            $sql = "SELECT * FROM medico WHERE crm=$crm";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if ($result[0]['nome'] != $nome) {
                $sql = "UPDATE medico SET nome='$nome' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['especialidade'] != $especialidade) {
                $sql = "UPDATE medico SET especialidade='$especialidade' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['email'] != $email) {
                $sql = "UPDATE medico SET email='$email' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['senha'] != $senha) {
                $sql = "UPDATE medico SET senha='$senha' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['telefone'] != $telefone) {
                $sql = "UPDATE medico SET telefone='$telefone' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } if ($result[0]['endereco'] != $endereco) {
                $sql = "UPDATE medico SET endereco='$endereco' WHERE crm=$crm";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            
            echo '<div class="ok"><a href="../medico_dados.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Dados atualizados com sucesso!</h1></div>';
        
        }

        function cadastrarConsulta($data, $cpf, $receita, $observacao, $crm) {
            $pdo = require 'connect.php';

            $sql = "INSERT INTO consulta (data, cpf_paciente, receita, observacao, crm_medico) VALUES ('$data', '$cpf', '$receita', '$observacao', '$crm')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            echo '<div class="ok"><a href="../medico_consulta.php"><i class="fas fa-arrow-circle-left"></i></a> <h1>Consulta cadastrada com sucesso!</h1></div>';
        }


        $arquivo = fopen("CurrentUser.txt", "r");
        $crm = fgets($arquivo);
        fclose($arquivo);

        if (isset($_POST['editarDados'])) {
            $nome = $_POST['name'];
            $especialidade = $_POST['especialidade'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $telefone = $_POST['phone'];
            $endereco = $_POST['address'];
            editarDados($nome, $crm, $especialidade, $email, $senha, $telefone, $endereco);
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