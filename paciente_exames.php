<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Paciente Exames</title>
</head>
<body>
<div class="container">
    <?php
        $pdo = require 'pdo/connect.php';
        $arquivo = fopen("pdo/CurrentUser.txt", "r");
        $userLogado = fgets($arquivo);

        $sql = "SELECT * FROM paciente WHERE cpf=$userLogado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $nome = $row['nome'];
            $cpf = $row['cpf'];
            $sexo = $row['sexo'];
            $nascimento = $row['nascimento'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco'];
        }
    ?>
    <header>
        <div class="userLogado">
            <i class="fas fa-user-injured"></i>
            <?php echo $nome; ?>
        </div>
        <a href="index.php">
            <img src="images/newLogoCurta.png"></img>
        </a>
        <nav>
            <ul>
                <a href="paciente_dados.php">
                    <li>Meus Dados</li>
                </a>
                <a href="paciente_consultas.php">
                    <li>Consultas</li>
                </a>
                <a href="paciente_exames.php">
                    <li id="atual">Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
    <div id="mainWindow">
        <?php
            $sql = "SELECT * FROM exame WHERE cpf_paciente=$userLogado";
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
</body>
</html>
