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

        $sql = "SELECT * FROM laboratorio WHERE cnpj=$userLogado";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $nome = $row['nome'];
            $cnpj = $row['cnpj'];
            $email = $row['email'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco'];
            $tipo_exame = $row['tipo_de_exame'];
        }
    ?>
    <header>
        <div class="userLogado">
            <i class="fas fa-flask"></i>
            <?php echo $nome ?>
        </div>
        <a href="index.php">
            <img src="images/newLogoCurta.png"></img>
        </a>
        <nav>
            <ul>
                <a href="laboratorio_dados.php">
                    <li id="atual">Meus Dados</li>
                </a>
                <a href="laboratorio_exames.php">
                    <li>Cadastrar Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <div id="dadosPessoaisWindow">
            <h1><i class="fas fa-user"></i>Meus Dados</h1>
            <table>
                <tr>
                    <td>Laboratório:</td>
                    <td id="labName"><?php echo $nome ?></td>
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
                    <td id="phone"><?php echo $telefone ?></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td id="adress"><?php echo $endereco ?></td>
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

        <?php
            $cont_anual = 0;
            $cont_mensal = 0;
            $cont_media = 0;
            $hoje = date("Y-m-d");
            $data = explode("-", $hoje);
            $ano = $data[0];
            $mes = $data[1];
            $sql = "SELECT data FROM exame WHERE cnpj_laboratorio=$userLogado";
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
            <h1><i class="fas fa-stethoscope"></i>Estatísticas dos Exames</h1>
            <table>
                <tr>
                    <td>Exames do Mês:</td>
                    <td>
                        <?php echo $cont_mensal ?>
                    </td>
                </tr>
                <tr>
                    <td>Exames do Ano:</td>
                    <td>
                        <?php echo $cont_anual ?>
                    </td>
                </tr>
                <tr>
                    <td>Média Mensal:</td>
                    <td>
                        <?php echo $cont_media ?>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</div>
</body>
</html>