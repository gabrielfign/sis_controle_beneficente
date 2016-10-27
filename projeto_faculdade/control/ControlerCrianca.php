<?php

require_once '../model/Crianca.php';
require_once '../utils/DataMysql.php';

class ControlerCrianca {

    public function __construct() {

        $ArrayCrianca = json_decode(file_get_contents('php://input'), true);

        $comando = $ArrayCrianca["comando"];

        switch ($comando) {

            case "consultarPorId":
                $this->consultaCriancaPorId($ArrayCrianca);
                break;

            case "gravar":
                $this->gravaCrianca($ArrayCrianca);
                break;

            case "consultar":
                $this->consultaCrianca();
                break;

            case "alterar":
                $this->alterar($ArrayCrianca);
                break;


            default:
                print "Nenhum comando selecionado";
        }
    }

    function gravaCrianca($ArrayCrianca) {

        $crianca = new Crianca();

        $datamysql = new DataMysql();
        $data = $datamysql->converte($ArrayCrianca["dtnascimento"]);


        $crianca->setGenero($ArrayCrianca["genero"]);
        $crianca->setEscola($ArrayCrianca["escola"]);
        $crianca->setNcalcado($ArrayCrianca["ncalcado"]);
        $crianca->setStatus("A");
        $crianca->setNroupa($ArrayCrianca["nroupa"]);
        $crianca->setNome($ArrayCrianca["nome"]);
        $crianca->setIdade($ArrayCrianca["idade"]);
        $crianca->setDtNascimento($data);
        $crianca->setNcertidao($ArrayCrianca["ncertidao"]);
        $crianca->setIdResponsavel($ArrayCrianca["idresponsavel"]);
        $crianca->setIdDoador($ArrayCrianca["iddoador"]);

        if ($crianca->gravaCrianca()) {

            print "Criança gravada com sucesso!";
        } else {
            print "Falha ao tentar salvar, tente novamente mais tarde.";
        }
    }

    function consultaCrianca() {
        $crianca = new Crianca();

        print $json = json_encode($crianca->consultaCrianca());
    }

    function consultaCriancaPorId($ArrayCrianca) {
        $crianca = new Crianca();

        $crianca->setIdcrianca($ArrayCrianca["id_cri"]);

        print $json = json_encode($crianca->consultaCriancaPorId());
    }
    
        function alterar($ArrayCrianca) {
        $crianca = new Crianca();
        $datamysql = new DataMysql();
        $data = $datamysql->converte($ArrayCrianca["dtnascimento"]);
        

        $crianca->setIdcrianca($ArrayCrianca["id_cri"]);
        $crianca->setEscola($ArrayCrianca["escola"]);
        $crianca->setNcalcado($ArrayCrianca["ncalcado"]);
        $crianca->setNroupa($ArrayCrianca["nroupa"]);
        $crianca->setNome($ArrayCrianca["nome"]);
        $crianca->setDtNascimento($data);
        $crianca->setNcertidao($ArrayCrianca["ncertidao"]);
        $crianca->setIdResponsavel($ArrayCrianca["idresponsavel"]);
        $crianca->setIdDoador($ArrayCrianca["iddoador"]);
        
        
        if ($crianca->alterar()) {
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

$obj = new ControlerCrianca();
?>




