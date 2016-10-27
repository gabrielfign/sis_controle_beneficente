<?php

require_once '../dao/DaoFesta.php';

class Festa {

    var $idFesta;
    var $nome;
    var $data;
    var $local;

    function gravaFesta() {
        
        $daofesta = new DaoFesta();


        $resposta = $daofesta->gravaFesta($this->getNome(), $this->getData(), $this->getLocal());

        if ($resposta) {
            return true;
        } else {
            return false;
        }
    }

    function excluiFesta() {

        $daofesta = new DaoFesta();

        $resposta = $daofesta->excluiFesta($this->getIdFesta());

        if ($resposta) {
            return true;
        } else {
            return false;
        }
    }
      function consultaFesta() {
        
        $daofesta = new DaoFesta();
		
        return $daofesta->consultaFesta();
        
    }
    
    function consultaFestaPorId() {

        $daofesta = new DaoFesta();

        return $daofesta->consultaFestaPorId($this);
    }
    
    function alterar() {
        
        $daofesta = new DaoFesta();
        
        return $daofesta->alterar($this->getIdFesta(), $this->getNome(), $this->getData(), $this->getLocal());
    }

    //get e set getidFesta
    function getIdFesta() {
        return $this->idFesta;
    }

    function setIdFesta($idFesta) {
        $this->idFesta = $idFesta;
    }
    
    //get e set getNome
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    //get e set getData
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

    //get e set getLocal
    function getLocal() {
        return $this->local;
    }

    function setLocal($local) {
        $this->local = $local;
    }

}
