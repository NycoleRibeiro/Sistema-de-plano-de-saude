<?php

class Admin {
    public $login = 'admin';
    private $password = 'admin';

    public function check_login($login, $password) {
        if ($login == $this->login && $password == $this->password) {
            return true;
        }
        return false;
    }

    public function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco, $senha) {
        
    }
}

$log = new Admin();
$login = $_GET['login'];
$password = $_GET['senha'];
if ($log->check_login($login, $password)) {
    header('Location: ../administrador.html');
} else {
    $loginError = 'Login ou senha incorretos!';
}