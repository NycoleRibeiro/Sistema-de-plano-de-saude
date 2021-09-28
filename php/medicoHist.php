<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/seccoes.css">
    <link rel="stylesheet" href="../style/med.css">
    <title>Médico Histórico</title>
</head>
<body>
<div class="container">
    <header>
        <img src="../images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <?php
        function verHistorico($cpf, $crm) {
            $dir = "../banco_de_dados/pacientes/" . $cpf;
            if (!is_dir($dir)) {
                echo '<div class="error"><h1>Não existe um paciente com esse CPF</h1></div>';
            } else {
                // Lista de consultas
                $listaDir = scandir($dir);
                foreach ($listaDir as $consulta) {
                    if ($consulta != "." && $consulta != ".." && $consulta != "dados.xml") {
                        if ($consulta[0] == "c"){
                            $consultaDir = $dir . "/" . $consulta;
                            $consultaXml = simplexml_load_file($consultaDir);
                            $medico = $consultaXml->medico;
                            if ($medico == $crm) {
                                $data = $consultaXml->data;
                                $paciente = $consultaXml->cpf;
                                $receita = $consultaXml->receita;
                                $observacao = $consultaXml->observacao;
                                echo "<h1>Consulta do dia {$data}</h1>";
                                echo "<table><tr><td>Paciente: {$paciente}</td></tr>";
                                echo "<tr><td>Receita: {$receita}</td></tr>";
                                echo "<tr><td>Observação: {$observacao}</td></tr></table>";
                            }
                        }
                    }
                }
            }
        }

        // Pegando o login atual
        $LoginAtual = fopen("../banco_de_dados/login.txt", "r");
        $crm = fgets($LoginAtual);
        fclose($LoginAtual);
        if (isset($_POST['verHistorico'])) {
            verHistorico($_POST['cpf'], $crm);
        }
        ?>
    </main>

    <aside>
        <nav>
            <ul>
                <a href="../medico_dados.php">
                    <li>Meus Dados</li>
                </a>
                <a href="../medico_consulta.html">
                    <li>Cadastrar Consulta</li>
                </a>
                <a href="../medico_historico.html">
                    <li id ="atual">Histórico Pacientes</li>
                </a>                    
            </ul>
        </nav>
    </aside>
</div>
</body>
</html>