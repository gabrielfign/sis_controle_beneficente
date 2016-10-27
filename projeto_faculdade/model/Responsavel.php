<?php

 require_once '../dao/DaoResponsavel.php';
class Responsavel {
    
    var $observacao;
    var $idResp;
    var $nome;
    var $cpf;
    var $telefone;
    var $email;
    var $nis;
    var $representante;
    var $endereco;
        
    function gravaResponsavel() {
       
        $daoresponsavel = new DaoResponsavel();


        $resposta = $daoresponsavel->gravaResponsavel($this);

        if ($resposta) {            
            return true;
        } else {         
            return false;
        }
    }
    
    function consulta() {
        
        $daoresponsavel = new DaoResponsavel();
		
        return $daoresponsavel->consulta();
        
    }
    
    function consultaResponsavel() {
        
        $daoresponsavel = new DaoResponsavel();
		
        return $daoresponsavel->consultaResponsavel($this);
        
    }
    
    function alterar() {
        
        $daoresponsavel = new DaoResponsavel();
        
        return $daoresponsavel->alterar($this->getIdResp(), $this->getNome(), $this->getObservacao(), $this->getEndereco(), $this->getRepresentante(), $this->getTelefone(), $this->getNis(), $this->getCpf());
    }
    
        
    function getObservacao() {
        return $this->observacao;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

        
    //get e set getIdResp
    function getIdResp() {
        return $this->idResp;
    }
    
    function setIdResp($idResp) {
        $this->idResp = $idResp;
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
    
     //get e set getNis
    function getNis() {
        return $this->nis;
    }

    function setNis($nis) {
        $this->nis = $nis;
    }
    
    
     //get e set getRepresentante
    function getRepresentante() {
        return $this->representante;
    }

    function setRepresentante($representante) {
        $this->representante = $representante;
    }
    
    //get e set getEndereco
    function getEndereco() {
        return $this->endereco;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
    
}