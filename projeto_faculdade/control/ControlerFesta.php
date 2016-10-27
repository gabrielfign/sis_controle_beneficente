<?php

require_once '../model/Festa.php';

class ControlerFesta {

    function __construct() {
        $ArrayFesta = json_decode(file_get_contents('php://input'), true);

        $comando = $ArrayFesta["comando"];

        switch ($comando) {
            case "gravar":
                $this->gravaFesta($ArrayFesta);
                break;

            case "excluir":
                $this->excluiFesta($ArrayFesta);
                break;
            
            case 'consultar':
                $this->consultaFesta();
                break;
            
            case "consultarPorId":
                $this->consultaFestaPorId($ArrayFesta);
                break;

            case "alterar":
                $this->alterar($ArrayFesta);
                break;

            default:
                print "Nenhum comando selecionado";
                break;
        }
    }

    function gravaFesta($ArrayFesta) {

        $festa = new Festa();
        $festa->setNome($ArrayFesta["nome"]);
        $festa->setData($ArrayFesta["data"]);
        $festa->setLocal($ArrayFesta["local"]);


        if ($festa->gravaFesta()) {
            print "Festa gravada com sucesso!";
        } else {
            print "Falha ao tentar salvar, tente novamente mais tarde.";
        }
    }

    function excluiFesta($ArrayFesta) {
        $festa = new Festa();
        $festa->setIdFesta($ArrayFesta["id_festa"]);

        if ($festa->excluiFesta()) {
            print "Festa excluída com sucesso!";
        } else {
            print "Falha ao tentar excluir, tente novamente mais tarde.";
        }
    }

    function consultaFesta() {
        $festa = new Festa();

        print $json = json_encode($festa->consultaFesta());
    }
    
    function consultaFestaPorId($ArrayFesta) {
        $festa = new Festa();

        $festa->setIdFesta($ArrayFesta["id_festa"]);
        
        print $json = json_encode($festa->consultaFestaPorId());
    }
    
    function alterar($ArrayFesta) {
        $festa = new Festa();

        $festa->setIdFesta($ArrayFesta["id_festa"]);
        $festa->setNome($ArrayFesta["nome"]);
        $festa->setData($ArrayFesta["data"]);
        $festa->setLocal($ArrayFesta["local"]);
        
        if ($festa->alterar()) {
            $response["response"] = "true";
            $json = json_encode($response);
            print "[" . $json . "]";
        } else {
            $response["response"] = "false";
            $json = json_encode($response);
            print "[" . $json . "]";
        }
    }
    
}

$obj = new ControlerFesta();