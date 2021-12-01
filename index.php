<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <title>HPS</title>
</head>
<body>
    <header>
        <img src="images/newLogoCompleta.png"></img>
    </header>

    <main>
        <?php
            $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
            if ($erro == 1) {
                $error = "* Usuário não encontrado *";
            } else if ($erro == 2) {
                $error = "* Senha inválida *";
            } else {
                $error = "";
            }
        ?>
        <nav class="nav_tabs">
            <ul>
                <!--- Formulário Paciente -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab1" checked>
                    <label for="tab1">Paciente</label>
                    <div class="content_tabs">
                        <form action="pdo/validacao.php" method="post">
                            <p>CPF</p>
                            <input type="text" id="valicpf" name="cpf" placeholder="Digite seu CPF" required>
                            <p>Senha</p>
                            <input type="password" id="senhacpf" name="senha" placeholder="Digite sua senha" required>
                            <?php echo "<p class='loginErro'>$error</p>"?>
                            <input name="login_pac" class="btn_ok" value="OK" type="submit">
                        </form>
                    </div>
                </li>
                <!--- Formulário Médico -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab2">
                    <label for="tab2">Médico</label>
                    <div class="content_tabs">
                        <form action="medico_dados.php" method="get">
                            <p>CRM</p>
                            <input type="text" id="valicrm" name="crm" placeholder="Digite seu CRM" required>
                            <p>Senha</p>
                            <input type="password" id="senhacrm" name="senha" placeholder="Digite sua senha" required>
                            <input class="btn_ok" value="OK" type="button" onclick="validacaomed()">
                        </form>
                    </div>
                </li>
                <!--- Formulário Laboratório -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab3">
                    <label for="tab3">Laboratório</label>
                    <div class="content_tabs">
                        <form action="laboratorio_dados.php" method="get">
                            <p>CNPJ</p>
                            <input type="text" id="valicnpj" name="cnpj" placeholder="Digite seu CNPJ" required>
                            <p>Senha</p>
                            <input type="password" id="senhacnpj" name="senha" placeholder="Digite sua senha" required>
                            <input class="btn_ok" value="OK" type="button" onclick="validacaolab()">
                        </form>
                    </div>
                </li>
                <!--- Formulário Admin -->
                <li>
                    <input type="radio" name="tabs" class="rd_tabs" id="tab4">
                    <label for="tab4">Admin</label>
                    <div class="content_tabs">
                        <form action="administrador_lab.html" method="get">
                            <p>Login</p>
                            <input id="valiadmin" type="text" name="login" placeholder="Digite seu login" required>
                            <p>Senha</p>
                            <input id="senhaadmin" type="password" name="senha" placeholder="Digite sua senha" required>
                            <input class="btn_ok" value="OK" type="button" onclick="validacaoadmin()">
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </main>
</body>
<script src="js/Validacao.js"></script>
</html>
