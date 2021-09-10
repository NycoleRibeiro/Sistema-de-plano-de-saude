<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HPS</title>
</head>
<body>
    <header>
        <img src="images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <nav class="nav_tabs">
            <ul>
                <!--- Formulário Paciente -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab1" checked>
                    <label for="tab1">Paciente</label>
                    <div class="content_tabs">
                        <form action="php/paciente.php" method="post">
                            <p>CPF</p>
                            <input type="text" name="cpf">
                            <p>Senha</p>
                            <input type="password" name="senha">
                            <input class="btn_ok" type="submit" value="OK">
                        </form>
                    </div>
                </li>
                <!--- Formulário Médico -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab2">
                    <label for="tab2">Médico</label>
                    <div class="content_tabs">
                        <form action="php/medico.php" method="post">
                            <p>CRM</p>
                            <input type="text" name="crm">
                            <p>Senha</p>
                            <input type="password" name="senha">
                            <input class="btn_ok" type="submit" value="OK">
                        </form>
                    </div>
                </li>
                <!--- Formulário Laboratório -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab3">
                    <label for="tab3">Laborátorio</label>
                    <div class="content_tabs">
                        <form action="php/laboratorio.php" method="post">
                            <p>CNPJ</p>
                            <input type="text" name="cnpj">
                            <p>Senha</p>
                            <input type="password" name="senha">
                            <input class="btn_ok" type="submit" value="OK">
                        </form>
                    </div>
                </li>
                <!--- Formulário Admin -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab4">
                    <label for="tab4">Admin</label>
                    <div class="content_tabs">
                        <form action="php/admin.php" method="get">
                            <p>Login</p>
                            <input type="text" name="login">
                            <p>Senha</p>
                            <input type="password" name="senha">
                            <input class="btn_ok" type="submit" value="OK">
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </main>
</body>
</html>