<?php
require_once '../dao/DaoDoador.php';
class Doador {

    var $grupo;
    var $idDoador;
    var $nome;
    var $cpf;
    var $telefone;
    var $email;
    var $endereco;

    function gravaDoador() {
        
        $daodoador = new DaoDoador();

        $resposta = $daodoador->gravaDoador($this);

        if ($resposta) {
            return true;
        } else {
            return false;
        }
    }
     function consultaDoador() {

        $daodoador = new DaoDoador();

        return $daodoador->consultaDoador();
    }
     function consultaDoadorPorId() {

        $daodoador = new DaoDoador();

        return $daodoador->consultaDoadorPorId($this);
    }
    
    function alterar() {
        
        $daodoador = new DaoDoador();
        
        return $daodoador->alterar($this->getIdDoador(), $this->getNome(), $this->getEndereco(), $this->getTelefone(), $this->getEmail(), $this->getGrupo(), $this->getCpf());
    }

    
    
    
    function getGrupo() {
        return $this->grupo;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }
    
    function getIdDoador() {
        return $this->idDoador;
    }

    function setIdDoador($idDoador) {
        $this->idDoador = $idDoador;
    }

    //get e set getNome
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    //get e set getCpf
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    //get e set getTelefone
    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    //get e set getEmail
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    //get e set getEndereco
    function getEndereco() {
        return $this->endereco;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

}