<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Paciente Consultas</title>
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
                    <li id="atual">Meus Dados</li>
                </a>
                <a href="paciente_consultas.php">
                    <li>Consultas</li>
                </a>
                <a href="paciente_exames.php">
                    <li>Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <div id="dadosPacienteWindow">
            <h1><i class="fas fa-user"></i>Meus Dados</h1>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td id="pacName">
                        <?php echo $nome; ?>
                    </td>
                </tr>
                <tr>
                    <td>CPF:</td>
                    <td id="cpf">
                        <?php echo $cpf; ?>
                    </td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td id="sexo">
                        <?php echo $sexo; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nascimento:</td>
                    <td id="nascimento">
                        <?php echo $nascimento; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td id="email">
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td id="phone">
                        <?php echo $telefone; ?>
                    </td>
                </tr>
                <tr>
                    <td>Endere??o:</td>
                    <td id="adress">
                        <?php echo $endereco; ?>
                    </td>
                </tr>
            </table>
        </div>

        <?php
            $cont_anual = 0;
            $cont_mensal = 0;
            $cont_media = 0;
            $hoje = date("Y-m-d");
            $data = explode("-", $hoje);
            $ano = $data[0];
            $mes = $data[1];
            $sql = "SELECT data FROM consulta WHERE cpf_paciente=$userLogado";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $data = explode("-", $row['data']);
                $anoConsulta = $data[0];
                $mesConsulta = $data[1];
                if ($ano == $anoConsulta) {
                    $cont_anual++;;
                } if ($mes == $mesConsulta && $ano == $anoConsulta) {
                    $cont_mensal++;
                }
            }
            $cont_media = ceil($cont_anual/$mes);
        ?>
        <div id="estatisticasConsultasWindow">
            <h1><i class="fas fa-stethoscope"></i>Estat??sticas das Consultas</h1>
            <table>
                <tr>
                    <td>Consultas do M??s:</td>
                    <td>
                        <?php echo $cont_mensal; ?>
                    </td>
                </tr>
                <tr>
                    <td>Consultas do Ano:</td>
                    <td>
                        <?php echo $cont_anual; ?>
                    </td>
                </tr>
                <tr>
                    <td>M??dia Mensal:</td>
                    <td>
                        <?php echo $cont_media; ?>
                    </td>
                </tr>
            </table>
        </div>


        <?php
            $cont_anual = 0;
            $cont_mensal = 0;
            $cont_media = 0;
            $sql = "SELECT data FROM exame WHERE cpf_paciente=$userLogado";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $data = explode("-", $row['data']);
                $anoConsulta = $data[0];
                $mesConsulta = $data[1];
                if ($ano == $anoConsulta) {
                    $cont_anual++;;
                } if ($mes == $mesConsulta && $ano == $anoConsulta) {
                    $cont_mensal++;
                }
            }
            $cont_media = ceil($cont_anual/$mes);
        ?>
        <div id="estatisticasExamesWindow">
            <h1><i class="fas fa-stethoscope"></i>Estat??sticas dos Exames</h1>
            <table>
                <tr>
                    <td>Exames do M??s:</td>
                    <td>
                        <?php echo $cont_mensal; ?>
                    </td>
                </tr>
                <tr>
                    <td>Exames do Ano:</td>
                    <td>
                        <?php echo $cont_anual; ?>
                    </td>
                </tr>
                <tr>
                    <td>M??dia Mensal:</td>
                    <td>
                        <?php echo $cont_media; ?>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</div>
</body>
</html>