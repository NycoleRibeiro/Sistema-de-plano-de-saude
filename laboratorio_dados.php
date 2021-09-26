<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/seccoes.css">
    <link rel="stylesheet" href="style/lab.css">
    <title>Laboratório Dados</title>
</head>
<body>
<div class="container">
    <header>
        <img src="images/logoHpsCompleto.png"></img>
    </header>

    <main>
        <div>
            <h1>Meus Dados</h1>
            <table>
                <tr>
                    <td>Laboratório:</td>
                    <td id="labName"></td>
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td id="cnpj"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td id="email"></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td id="phone"></td>
                </tr>
                <tr>
                    <td>Endereço:</td>
                    <td id="adress"></td>
                </tr>
                <tr>
                    <td>Tipo de Exames:</td>
                    <td id="examTypes"></td>
                </tr>
                <tr>
                    <td class="btn" colspan="2">
                        <a href="laboratorio_edit_dados.html">
                            <input class="btn_editar" type="submit" value="Editar">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </main>

    <aside>
        <nav>
            <ul>
                <a href="laboratorio_dados.html">
                    <li id="atual">Meus Dados</li>
                </a>
                <a href="laboratorio_exames.html">
                    <li>Cadastrar Exames</li>
                </a>                   
            </ul>
        </nav>
    </aside>
</div>
</body>
</html>