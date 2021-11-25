<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/pac.css">
    <title>Paciente Consultas</title>
</head>
<body>
<div class="container">
    <header>
        <img src="images/newLogoCurta.png"></img>
        <nav>
            <ul>
                <a href="paciente_dados.php">
                    <li>Meus Dados</li>
                </a>
                <a href="paciente_consultas.php">
                    <li id="atual">Consultas</li>
                </a>
                <a href="paciente_exames.php">
                    <li>Exames</li>
                </a>                   
            </ul>
        </nav>
    </header>

    <main>
        <?php
            $LoginAtual = fopen("banco_de_dados/loginPac.txt", "r");
            $PacienteLogado = fgets($LoginAtual);
            fclose($LoginAtual);
            $dir = "banco_de_dados/pacientes/" . $PacienteLogado;
            // Lista de consultas
            $listaDir = scandir($dir);
            foreach ($listaDir as $consulta) {
                if ($consulta != "." && $consulta != ".." && $consulta != "dados.xml") {
                    if ($consulta[0] == "c"){
                        $consultaDir = $dir . "/" . $consulta;
                        $consultaXml = simplexml_load_file($consultaDir);
                        $data = $consultaXml->data;
                        $paciente = $consultaXml->cpf;
                        $medico = $consultaXml->medico;
                        $receita = $consultaXml->receita;
                        echo "<h1>Consulta do dia {$data}</h1>";
                        echo "<table><tr><td>Paciente: {$paciente}</td></tr>";
                        echo "<tr><td>Médico: {$medico}</td></tr>";
                        echo "<tr><td>Receita: {$receita}</td></tr></table>";
                    }
                }
            }
        ?>
    </main>
</div>
</body>
</html>