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
        <div id="mainWindow">
            <h1><i class="fas fa-align-left"></i>Histórico do Paciente</h1>
            <form action="php/medicoHist.php" method="POST">
                <table>
                    <tr>
                        <td>Digite o CPF do paciente:</td>
                        <td><input type="text" name="cpf" id="cpf"></td>
                    </tr>
                    <tr>
                        <td class="btn" colspan="2"><input name="verHistorico" class="btn_cadastrar" type="submit" value="Buscar"></td>
                    </tr>
                </table>
            </form>
       </div>
    </main>
</div>
</body>
</html>