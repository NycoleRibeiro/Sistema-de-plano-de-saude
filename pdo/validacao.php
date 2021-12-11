<link rel="stylesheet" href="../style/confirmations.css" type="text/css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php
    function login_paciente($cpf, $senha) {
        $pdo = require 'connect.php';

        $sql = "SELECT senha FROM paciente WHERE cpf=$cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Se o $result for vazio, o usuário não existe
        if (count($result) == 0) {
            header("Location: ../index.php?erro=1");
            return false;
        } else if ($result[0]['senha'] == $senha) {
            $login = fopen("CurrentUser.txt", "w");
            fwrite($login, $cpf);
            fclose($login);
            header("Location: ../paciente_dados.php");
            return true;
        } else {
            header("Location: ../index.php?erro=2");
            return false;
        }
    }

    function login_medico($crm, $senha) {
        $pdo = require 'connect.php';

        $sql = "SELECT senha FROM medico WHERE crm=$crm";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Se o $result for vazio, o usuário não existe
        if (count($result) == 0) {
            header("Location: ../index.php?erro=1");
            return false;
        } else if ($result[0]['senha'] == $senha) {
            $login = fopen("CurrentUser.txt", "w");
            fwrite($login, $crm);
            fclose($login);
            header("Location: ../medico_dados.php");
            return true;
        } else {
            header("Location: ../index.php?erro=2");
            return false;
        }
    }

    function login_laboratório($cnpj, $senha) {
        $pdo = require 'connect.php';

        $sql = "SELECT senha FROM laboratorio WHERE cnpj=$cnpj";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        // Se o $result for vazio, o usuário não existe
        if (count($result) == 0) {
            header("Location: ../index.php?erro=1");
            return false;
        } else if ($result[0]['senha'] == $senha) {
            $login = fopen("CurrentUser.txt", "w");
            fwrite($login, $cnpj);
            fclose($login);
            header("Location: ../laboratorio_dados.php");
            return true;
        } else {
            header("Location: ../index.php?erro=2");
            return false;
        }
    }

    function login_admin($user, $senha) {
        if($user == "admin" && $senha == "admin") {
            $login = fopen("CurrentUser.txt", "w");
            fwrite($login, $user);
            fclose($login);
            header("Location: ../administrador_paciente.html");
            return true;
        } else {
            header("Location: ../index.php?erro=2");
            return false;
        }
    }


    if(isset($_POST['login_lab'])) {
        // Caso o botão clicado seja o de login do laboratório
        $cnpj = $_POST['cnpj'];
        $senha = $_POST['senha'];
        login_laboratório($cnpj, $senha);
    } else if(isset($_POST['login_med'])) {
        // Caso o botão clicado seja o de login do médico
        $crm = $_POST['crm'];
        $senha = $_POST['senha'];
        login_medico($crm, $senha);
    } else if(isset($_POST['login_pac'])) {
        // Caso o botão clicado seja o de login do paciente
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        login_paciente($cpf, $senha);
    } else if(isset($_POST['login_admin'])) {
        // Caso o botão clicado seja o de login do administrador
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        login_admin($login, $senha);
    }
?>