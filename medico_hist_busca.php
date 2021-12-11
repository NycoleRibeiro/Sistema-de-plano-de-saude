<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/med.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Médico Histórico</title>
</head>
<body>
<div class="container">
<header>
    <?php
        $pdo = require 'pdo/connect.php';
        $arquivo = fopen("pdo/CurrentUser.txt", "r");
        $userLogado = fgets($arquivo);

        $sql = "SELECT * FROM medico WHERE crm=$userLogado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $nome = $row['nome'];
            $crm = $row['crm'];
            $especialidade = $row['especialidade'];
            $email = $row['email'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco'];
        }
    ?>
        <div class="userLogado">
            <i class="fas fa-user-md"></i>
            <?php echo $nome; ?>
        </div>
        <a href="index.php">
            <img src="images/newLogoCurta.png"></img>
        </a>
        <nav>
            <ul>
                <a href="medico_dados.php">
                    <li >Meus Dados</li>
                </a>
                <a href="medico_consulta.php">
                    <li>Cadastrar Consulta</li>
                </a>
                <a href="medico_historico.php">
                    <li id ="atual">Histórico Pacientes</li>
                </a>                    
            </ul>
        </nav>
    </header>

    <main>
        <div id="ConsultasWindow">
        <h1 class="mainTitle">Histórico de Consultas</h1>
        <?php
            $paciente = $_POST['cpf'];
            $sql = "SELECT * FROM consulta WHERE crm_medico=$userLogado AND cpf_paciente=$paciente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $data = $row['data'];
                $medico = $row['crm_medico'];
                $receita = $row['receita'];
                $observacao = $row['observacao'];
                echo "<h1>Consulta do dia $data</h1>
                      <p>Médico: $medico</p>
                      <p>Receita: $receita</p>
                      <p>Observação: $observacao</p>";
            }
        ?>
        </div>

        <div id="ExamesWindow">
        <h1 class="mainTitle">Histórico de Exames</h1>
        <?php
            $sql = "SELECT * FROM exame WHERE cpf_paciente=$paciente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $data = $row['data'];
                $laboratorio = $row['cnpj_laboratorio'];
                $resultado = $row['resultado'];
                $tipo_de_exame = $row['tipo_de_exame'];
                echo "<h1>$tipo_de_exame</h1>
                      <p>Data: $data</p>
                      <p>Laboratório: $laboratorio</p>
                      <p>Resultado: $resultado</p>";
            }
        ?>
        </div>
    </main>
</div>
</body>
</html>