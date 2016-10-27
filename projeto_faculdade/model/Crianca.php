<?php

require_once '../dao/DaoCrianca.php';

class Crianca {

    var $idcrianca;
    var $genero;
    var $escola;
    var $ncalcado;
    var $status;
    var $nroupa;
    var $nome;
    var $idade;
    var $dtnascimento;
    var $ncertidao;
    var $idresponsavel;
    var $iddoador;

    function gravaCrianca() {

        // a palavra reservada NEW indica a criação de uma nova instância da classe
        $daocrianca = new DaoCrianca();

        return $daocrianca->gravaCrianca($this);
    }

    function consultaCrianca() {

        $daocrianca = new DaoCrianca();

        return $daocrianca->consultaCrianca();
    }

    function consultaCriancaPorId() {

        $daocrianca = new DaoCrianca();

        return $daocrianca->consultaCriancaPorId($this);
    }
    
    
    function alterar() {
        
        $daocrianca = new DaoCrianca();
        
        return $daocrianca->alterar($this->getIdcrianca(), $this->getNome(), $this->getDtNascimento(), $this->getEscola(), 
                $this->getNcertidao(), $this->getIdDoador(), $this->getNroupa(), $this->getIdResponsavel(), $this->getNcalcado());
    }
 

    function getIdcrianca() {
        return $this->idcrianca;
    }

    function setIdcrianca($idcrianca) {
        $this->idcrianca = $idcrianca;
    }

    function getGenero() {
        return $this->genero;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    //get e set Nome
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    //get e set Idade
    function getIdade() {
        return $this->idade;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    //get e set DtNascimento	
    function getDtNascimento() {
        return $this->dtnascimento;
    }

    function setDtNascimento($dtnascimento) {
        $this->dtnascimento = $dtnascimento;
    }

    //get e set Escola
    function getEscola() {
        return $this->escola;
    }

    function setEscola($escola) {
        $this->escola = $escola;
    }

    //get e set Ncertidao
    function getNcertidao() {
        return $this->ncertidao;
    }

    function setNcertidao($ncertidao) {
        $this->ncertidao = $ncertidao;
    }

    //get e set IdDoador
    function getIdDoador() {
        return $this->iddoador;
    }

    function setIdDoador($iddoador) {
        $this->iddoador = $iddoador;
    }

    //get e set Nroupa
    function getNroupa() {
        return $this->nroupa;
    }

    function setNroupa($nroupa) {
        $this->nroupa = $nroupa;
    }

    //get e set IdResponsavel
    function getIdResponsavel() {
        return $this->idresponsavel;
    }

    function setIdResponsavel($idresponsavel) {
        $this->idresponsavel = $idresponsavel;
    }

    //get e set Ncalcado
    function getNcalcado() {
        return $this->ncalcado;
    }

    function setNcalcado($ncalcado) {
        $this->ncalcado = $ncalcado;
    }

    //get e set Status
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
