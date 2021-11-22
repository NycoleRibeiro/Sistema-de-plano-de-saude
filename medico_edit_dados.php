<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/med.css">
    <title>Médico Dados</title>
</head>
<body>
<div class="container">
    <header>
        <img src="images/newLogoCurta.png"></img>
        <nav>
            <ul>
                <a href="medico_dados.php">
                    <li id ="atual">Meus Dados</li>
                </a>
                <a href="medico_consulta.html">
                    <li>Cadastrar Consulta</li>
                </a>
                <a href="medico_historico.html">
                    <li>Histórico Pacientes</li>
                </a>                    
            </ul>
        </nav>
    </header>

    <main>
        <?php
            $LoginAtual = fopen("banco_de_dados/loginMed.txt", "r");
            $MedLogado = fgets($LoginAtual);
            fclose($LoginAtual);

            $caminho = "banco_de_dados/medicos/".$MedLogado;
            $xml = simplexml_load_file($caminho . "/dados.xml");
                if ($xml === false) {
                    echo "Erro ao carregar XML";
                    foreach(libxml_get_errors() as $error) {
                        echo "<br>", $error->message;
                    }
                } else {
                    $medName = $xml->nome;
                    $crm = $xml->crm;
                    $especialidade = $xml->especialidade;
                    $email = $xml->email;
                    $phone = $xml->telefone;
                    $adress = $xml->endereco;
                    $password = $xml->senha;
                }
        ?>
        <div>
            <h1>Meus Dados</h1>
            <form action="php/medico.php" method="post">
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td id="medName">
                            <input type="text" name="name" value="<?php echo $medName ?>">
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
                        <td class="btn" colspan="2"><input name="editarDados" class="btn_editar" type="submit" value="Salvar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</div>
</body>
</html>
