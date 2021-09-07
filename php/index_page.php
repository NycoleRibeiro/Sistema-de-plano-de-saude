<?php

class Adm {
    public $login = 'admin';
    private $password = 'admin';

    public function check_login($login, $password) {
        if ($login == $this->login && $password == $this->password) {
            return true;
        }
        return false;
    }

    public function cadastrar_paciente($nome, $cpf, $data_nasc, $sexo, $telefone, $email, $endereco) {
        
}