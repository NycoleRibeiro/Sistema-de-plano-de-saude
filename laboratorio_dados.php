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
    <header>
        <div class="userLogado">
            <i class="fas fa-flask"></i>
            Nome do Laboratório
        </div>
        <img src="images/newLogoCurta.png"></img>
    </header>

    <main>
        <?php
            $LoginAtual = fopen("banco_de_dados/loginLab.txt", "r");
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
                }
        ?>
        <div id="dadosPessoaisWindow">
            <h1><i class="fas fa-user"></i>Meus Dados</h1>
            <table>
                <tr>
                    <td>Laboratório:</td>
                    <td id="labName"><?php echo $labName ?></td>
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td id="cnpj"><?php echo $cnpj ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td id="email"><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td id="phone"><?php echo $phone ?></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td id="adress"><?php echo $adress ?></td>
                </tr>
                <tr>
                    <td>Tipo de Exames:</td>
                    <td id="examTypes"><?php echo $tipo_exame ?></td>
                </tr>
                <tr>
                    <td class="btn" colspan="2">
                        <a href="laboratorio_edit_dados.php">
                            <input class="btn_editar" type="submit" value="Editar">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div id="estatisticasWindow">
            <h1><i class="fas fa-stethoscope"></i>Estatísticas dos Exames</h1>
            <table>
                <tr>
                    <td>Exames do Mês:</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>Exames do Ano:</td>
                    <td>642</td>
                </tr>
                <tr>
                    <td>Média Mensal:</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </main>

    <aside>
        <nav>
            <ul>
                <a href="laboratorio_dados.php">
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