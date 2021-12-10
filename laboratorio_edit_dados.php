<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/lab.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Laboratório Dados</title>
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
            $email = $row['email'];
            $senha = $row['senha'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco'];
            $tipo_de_exame = $row['tipo_de_exame'];
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
                <a href="laboratorio_dados.html">
                    <li id="atual">Meus Dados</li>
                </a>
                <a href="laboratorio_exames.html">
                    <li>Cadastrar Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <div id="mainWindow">
            <h1>Meus Dados</h1>
            <form action="pdo/laboratorio.php" method="post">
                <table>
                    <tr>
                        <td>Laboratório:</td>
                        <td id="labName">
                            <input type="text" name="name" value="<?php echo $nome ?>">
                        </td>
                    </tr>
                    <tr>
                        <!--CNPJ não é editavel-->
                        <td>CNPJ:</td>
                        <td id="cnpj">
                            <?php echo $cnpj ?>
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
                        <td>Tipo de Exames:</td>
                        <td id="examTypes">
                            <input type="text" name="examTypes" value="<?php echo $tipo_de_exame ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="btn" colspan="2"><input class="btn_editar" type="submit" value="Salvar" name="saveDados"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</div>
</body>
</html>