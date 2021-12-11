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
    <header>
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
        <div id="dadosPessoaisWindow">
            <h1><i class="fas fa-user"></i>Meus Dados</h1>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td id="medName"><?php echo $nome ?></td>
                </tr>
                <tr>
                    <td>CRM:</td>
                    <td id="crm"><?php echo $crm ?></td>
                </tr>
                <tr>
                    <td>Especialidade:</td>
                    <td id="especialidade"><?php echo $especialidade ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td id="email"><?php echo $email ?></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td id="phone"><?php echo $telefone ?></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td id="adress"><?php echo $endereco ?></td>
                </tr>
                <tr>
                    <td class="btn" colspan="2">
                        <a href="medico_edit_dados.php">
                            <input class="btn_editar" type="submit" value="Editar">
                        </a>
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
            $sql = "SELECT data FROM consulta WHERE crm_medico=$userLogado";
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
        <div id="estatisticasWindow">
            <h1><i class="fas fa-stethoscope"></i>Estatísticas das Consultas</h1>
            <table>
                <tr>
                    <td>Consultas do Mês:</td>
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
                    <td>Média Mensal:</td>
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
