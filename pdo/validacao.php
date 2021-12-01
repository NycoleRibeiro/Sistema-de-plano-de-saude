<link rel="stylesheet" href="../style/confirmations.css" type="text/css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php
    function login_paciente($cpf, $senha) {
        $pdo = require 'connect.php';

        // Verifica se o CPF já está cadastrado
        $sql = "SELECT senha FROM paciente WHERE cpf=$cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) == 0) {
            header("Location: ../index.php?erro=1");
            return false;
        } else if ($result[0]['senha'] == $senha) {
            header("Location: ../paciente_dados.php");
            return true;
        } else {
            header("Location: ../index.php?erro=2");
            return false;
        }
    }

    function login_medico($crm, $senha) {
        
    }

    function login_laboratório($cnpj, $senha) {
        
    }

    function login_admin($login, $senha) {
        
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