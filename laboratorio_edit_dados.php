<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/lab.css">
    <title>Laboratório Dados</title>
</head>
<body>
<div class="container">
    <header>
        <img src="images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <?php
            $LoginAtual = fopen("banco_de_dados/login.txt", "r");
            $LabLogado = fgets($LoginAtual);
            fclose($LoginAtual);

            $caminho = "banco_de_dados/laboratorios/".$LabLogado;
            $xml = simplexml_load_file($caminho . "/dados.xml");
                if ($xml === false) {
                    echo "Erro ao carregar XML";
                    foreach(libxml_get_errors() as $error) {
                        echo "<br>", $error->message;
                    }
                } else {
                    $labName = $xml->nome;
                    $cnpj = $xml->cnpj;
                    $tipo_exame = $xml->tipo_exame;
                    $email = $xml->email;
                    $phone = $xml->telefone;
                    $adress = $xml->endereco;
                    $password = $xml->senha;
                }
        ?>
        <div>
            <h1>Meus Dados</h1>
            <form action="php/laboratorio.php" method="post">
                <table>
                    <tr>
                        <td>Laboratório:</td>
                        <td id="labName">
                            <input type="text" name="labName" value="<?php echo $labName ?>">
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
                            <input type="password" name="password" value="<?php echo $password ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td id="phone">
                            <input type="tel" name="phone" value="<?php echo $phone ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Endereço:</td>
                        <td id="adress">
                            <input type="text" name="address" value="<?php echo $adress ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo de Exames:</td>
                        <td id="examTypes">
                            <input type="text" name="examTypes" value="<?php echo $tipo_exame ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="btn" colspan="2"><input class="btn_editar" type="submit" value="Salvar" name="saveDados"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>

    <aside>
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
    </aside>
</div>
</body>
</html>