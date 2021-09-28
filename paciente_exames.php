<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/pac.css">
    <title>Paciente Exames</title>
</head>
<body>
<div class="container">
    <header>
        <img src="images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <?php
            $LoginAtual = fopen("banco_de_dados/login.txt", "r");
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
    <aside>
        <nav>
            <ul>
                <a href="paciente_consultas.html">
                    <li>Consultas</li>
                </a>
                <a href="paciente_exames.html">
                    <li id="atual">Exames</li>
                </a>                   
            </ul>
        </nav>
    </aside>
</div>
</body>
</html>
