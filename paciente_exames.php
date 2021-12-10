<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Paciente Exames</title>
</head>
<body>
<div class="container">
    <header>
        <div class="userLogado">
            <i class="fas fa-user-injured"></i>
            Nome do Paciente
        </div>
        <a href="index.php">
            <img src="images/newLogoCurta.png"></img>
        </a>
        <nav>
            <ul>
                <a href="paciente_dados.php">
                    <li>Meus Dados</li>
                </a>
                <a href="paciente_consultas.php">
                    <li>Consultas</li>
                </a>
                <a href="paciente_exames.php">
                    <li id="atual">Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <?php
            // Pega o cpf do paciente logado
            $LoginAtual = fopen("banco_de_dados/loginPac.txt", "r");
            $PacienteLogado = fgets($LoginAtual);
            fclose($LoginAtual);
            $dir = "banco_de_dados/pacientes/" . $PacienteLogado;
            // Lista de exames
            $listaDir = scandir($dir);
            foreach ($listaDir as $exame) {
                if ($exame != "." && $exame != ".." && $exame != "dados.xml") {
                    if ($exame[0] == "e"){
                        $exameDir = $dir . "/" . $exame;
                        $exameXml = simplexml_load_file($exameDir);
                        $data = $exameXml->data;
                        $paciente = $exameXml->cpf;
                        $laboratorio = $exameXml->laboratorio;
                        $tipo_exame = $exameXml->tipo_exame;
                        $resultado = $exameXml->resultado;
                        echo "<h1>{$tipo_exame} do dia {$data}</h1>";
                        echo "<table><tr><td>Paciente: {$paciente}</td></tr>";
                        echo "<tr><td>Laboratório: {$laboratorio}</td></tr>";
                        echo "<tr><td>Resultado: {$resultado}</td></tr></table>";
                    }
                }
            }
        ?>
    </main>
</div>
</body>
</html>
