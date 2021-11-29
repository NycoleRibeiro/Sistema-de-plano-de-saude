<link rel="stylesheet" href="../style/confirmations.css" type="text/css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php
    function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha) {
        $pdo = require 'connect.php';

        // Verifica se o CPF já está cadastrado
        $sql = "SELECT cpf FROM paciente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            if ($row['cpf'] == $cpf) {
                echo '<div class="error"><a href="../administrador_paciente.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um paciente com esse CPF</h1></div>';
                return false;
            }
        }
        // Insere o novo paciente no banco de dados se não houver nenhum CPF igual
        $sql = "INSERT INTO paciente (nome, cpf, data_nasc, sexo, telefone, email, endereco, senha) VALUES (:nome, :cpf, :data_nasc, :sexo, :telefone, :email, :endereco, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        echo '<div class="ok"><a href="../administrador_paciente.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Paciente cadastrado com sucesso!</h1></div>';
        return true;
    
    }

    function cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha) {
        $pdo = require 'connect.php';
        // Verifica se o CRM já está cadastrado
        $sql = "SELECT crm FROM medico";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            if ($row['crm'] == $crm) {
                echo '<div class="error"><a href="../administrador_medico.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um médico com esse CRM</h1></div>';
                return false;
            }
        }
        // Insere o novo médico no banco de dados se não houver nenhum CRM igual
        $sql = "INSERT INTO medico (nome, crm, especialidade, telefone, email, endereco, senha) VALUES (:nome, :crm, :especialidade, :telefone, :email, :endereco, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':crm', $crm);
        $stmt->bindParam(':especialidade', $especialidade);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        echo '<div class="ok"><a href="../administrador_med.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Médico cadastrado com sucesso!</h1></div>';
        return true;
    }

    function cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha) {
        $pdo = require 'connect.php';
        // Verifica se o CNPJ já está cadastrado
        $sql = "SELECT cnpj FROM laboratorio";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            if ($row['cnpj'] == $cnpj) {
                echo '<div class="error"><a href="../administrador_laboratorio.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Já existe um laboratório com esse CNPJ</h1></div>';
                return false;
            }
        }
        // Insere o novo laboratório no banco de dados se não houver nenhum CNPJ igual
        $sql = "INSERT INTO laboratorio (nome, cnpj, tipo_exame, telefone, email, endereco, senha) VALUES (:nome, :cnpj, :tipo_exame, :telefone, :email, :endereco, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':tipo_exame', $tipo_exame);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        echo '<div class="ok"><a href="../administrador_lab.html"><i class="fas fa-arrow-circle-left"></i></a> <h1>Laboratório cadastrado com sucesso!</h1></div>';
    }


    if(isset($_POST['cadastro_lab'])) {
        // Caso o botão clicado seja o de cadastro de laboratório
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $tipo_exame = $_POST['tipo_exame'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        cadastrar_laboratório($nome, $cnpj, $tipo_exame, $telefone, $email, $endereco, $senha);
    } else if(isset($_POST['cadastro_med'])) {
        // Caso o botão clicado seja o de cadastro de médico
        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $especialidade = $_POST['especialidade'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        cadastrar_medico($nome, $crm, $especialidade, $telefone, $email, $endereco, $senha);
    } else if(isset($_POST['cadastro_pac'])) {
        // Caso o botão clicado seja o de cadastro de paciente
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nasc = $_POST['data_nasc'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];
        cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha);
    }
?>
