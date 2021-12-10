<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/med.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Médico Dados</title>
</head>
<body>
<div class="container">
    <?php
        $pdo = require 'pdo/connect.php';
        $arquivo = fopen("pdo/CurrentUser.txt", "r");
        $userLogado = fgets($arquivo);
        fclose($arquivo);

        $sql = "SELECT * FROM medico WHERE crm=$userLogado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $nome = $row['nome'];
            $crm = $row['crm'];
            $especialidade = $row['especialidade'];
            $email = $row['email'];
            $senha = $row['senha'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco'];
        }
    ?>
    <header>
        <div class="userLogado">
            <i class="fas fa-user-md"></i>
            <?php echo $nome; ?>
        </div>
        <img src="images/newLogoCurta.png"></img>
        <nav>
            <ul>
                <a href="medico_dados.php">
                    <li id ="atual">Meus Dados</li>
                </a>
                <a href="medico_consulta.php">
                    <li>Cadastrar Consulta</li>
                </a>
                <a href="medico_historico.php">
                    <li>Histórico Pacientes</li>
                </a>                    
            </ul>
        </nav>
    </header>

    <main>
        <div id="mainWindow">
            <h1>Meus Dados</h1>
            <form action="pdo/medico.php" method="post">
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td id="medName">
                            <input type="text" name="name" value="<?php echo $nome ?>">
                        </td>
                    </tr>
                    <tr>
                        <!-- CRM não pode ser modificado -->
                        <td>CRM:</td>
                        <td id="crm">
                            <?php echo $crm ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Especialidade:</td>
                        <td id="especialidade">
                            <input type="text" name="especialidade" value="<?php echo $especialidade ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td id="email">
                            <input type="email" name="email" value="<?php echo $email ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Senha:</td>
                        <td id="senha">
                            <input type="password" name="password" value="<?php echo $senha ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td id="phone">
                            <input type="tel" name="phone" value="<?php echo $telefone ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Endereço:</td>
                        <td id="adress">
                            <input type="text" name="address" value="<?php echo $endereco ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="btn" colspan="2"><input name="editarDados" class="btn_editar" type="submit" value="Salvar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</div>
</body>
</html>
