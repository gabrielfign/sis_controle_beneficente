<?php

require_once '../dao/DaoLogin.php';

class Login {

    var $idAdm;
    var $nome;
    var $login;
    var $senha;
    var $cpf;

    function gravaLogin() {

        $daologin = new DaoLogin();

        $resposta = $daologin->gravaLogin($this);

        if ($resposta) {
            return true;
        } else {
            return false;
        }
    }

    function consultaLogin() {

        $daologin = new DaoLogin();

        return $daologin->consultaLogin();
    }
    
    function consultaLoginPorId() {

        $daologin = new DaoLogin();

        return $daologin->consultaLoginPorId($this->getIdAdm());
    }

    function excluiLogin() {

        $daologin = new DaoLogin();

        $resposta = $daologin->excluiLogin($this->getIdAdm());

        if ($resposta) {
            return true;
        } else {
            return false;
        }
    }
    
     function alterar() {
        
        $daologin = new DaoLogin();
        
        return $daologin->alterar($this->getIdAdm(), $this->getNome(), $this->getLogin(), $this->getSenha(), $this->getCpf());
    }  
    
    
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    //get e set IdAdm
    function getIdAdm() {
        return $this->idAdm;
    }

    function setIdAdm($idAdm) {
        $this->idAdm = $idAdm;
    }

    //get e set getNome	
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    //get e set getLogin
    function getLogin() {
        return $this->login;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    //get e set getSenha
    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
