<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/lab.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Laboratório Exames</title>
</head>
<body>
<div class="container">
    <?php
        $pdo = require 'pdo/connect.php';
        $arquivo = fopen("pdo/CurrentUser.txt", "r");
        $userLogado = fgets($arquivo);
        fclose($arquivo);

        $sql = "SELECT * FROM laboratorio WHERE cnpj=$userLogado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $nome = $row['nome'];
            $cnpj = $row['cnpj'];
        }
    ?>
    <header>
        <div class="userLogado">
            <i class="fas fa-flask"></i>
            <?php echo $nome; ?>
        </div>
        <a href="index.php">
            <img src="images/newLogoCurta.png"></img>
        </a>
        <nav>
            <ul>
                <a href="laboratorio_dados.php">
                    <li>Meus Dados</li>
                </a>
                <a href="laboratorio_exames.php">
                    <li id="atual">Cadastrar Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <div id="mainWindow">
            <h1>Cadastro de Exames</h1>
            <form action="pdo/laboratorio.php" method="post">
                <table>
                    <tr>
                        <td>Data:</td>
                        <td><input type="date" name="data" required></td>
                    </tr>
                    <tr>
                        <td>CPF do Paciente:</td>
                        <td><input type="text" name="cpf" required></td>
                    </tr>
                    <tr>
                        <td>Tipo de Exame:</td>
                        <td><input type="text" name="exame" required></td>
                    </tr>
                    <tr class="result">
                        <td>Resultado:</td>
                        <td>
                            <textarea name="resultado" rows="10" cols="50" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="btn" colspan="2"><input class="btn_cadastrar" name="cadastrarExame" type="submit" value="Cadastrar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</div>
</body>
</html>