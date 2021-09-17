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
        <img src="images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <div>
            <h1>Consulta do dia: <span id="diaConsulta"></span></h1>
            <table>
                <tr>
                    <td>Médico:</td>
                    <td id="doctor"></td>
                </tr>
                <tr>
                    <td>Paciente:</td>
                    <td id="paciente"></td>
                </tr>
                <tr>
                    <td>Receita:</td>
                    <td id="receita"></td>
                </tr>
            </table>
        </div>
    </main>

    <aside>
        <nav>
            <ul>
                <a href="paciente_consultas.php">
                    <li id="atual">Consultas</li>
                </a>
                <a href="paciente_exames.php">
                    <li>Exames</li>
                </a>                   
            </ul>
        </nav>
    </aside>
</div>
</body>
</html>