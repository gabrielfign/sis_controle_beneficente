<?php

require_once '../model/Responsavel.php';

class ControlerResponsavel {

    public function __construct() {
        $ArrayResponsavel = json_decode(file_get_contents('php://input'), true);

        $comando = $ArrayResponsavel["comando"];

        switch ($comando) {
            case "gravar":
                $this->gravaResponsavel($ArrayResponsavel);
                break;

            case 'consultar':
                $this->consulta();
                break;

            case 'consultarPorId':
                $this->consultaResponsavelPorId($ArrayResponsavel);
                break;
            
            case "alterar":
                $this->alterar($ArrayResponsavel);
                break;

            default:
                print "Nenhum comando selecionado";
        }
    }

    function gravaResponsavel($ArrayResponsavel) {
        $responsavel = new Responsavel();
        $responsavel->setObservacao($ArrayResponsavel["observacao"]);
        $responsavel->setEndereco($ArrayResponsavel["endereco"]);
        $responsavel->setNome($ArrayResponsavel["nome"]);
        $responsavel->setRepresentante($ArrayResponsavel["representante"]);
        $responsavel->setTelefone($ArrayResponsavel["telefone"]);
        $responsavel->setNis($ArrayResponsavel["nis"]);
        $responsavel->setCpf($ArrayResponsavel["cpf"]);

        if ($responsavel->gravaResponsavel()) {
            print "Responsável gravado com sucesso!";
        } else {
            print "Falha ao tentar salvar, tente novamente mais tarde.";
        }
    }

    function consulta() {
        $responsavel = new Responsavel();

        print $json = json_encode($responsavel->consulta());
    }
    
    function consultaResponsavelPorId($ArrayResponsavel) {
        $responsavel = new Responsavel();

        $responsavel->setIdResp($ArrayResponsavel["id_resp"]);

        print $json = json_encode($responsavel->consultaResponsavel());
    }
    
    
    function alterar($ArrayResponsavel) {
        $responsavel = new Responsavel();

        $responsavel->setIdResp($ArrayResponsavel["id_resp"]);
        $responsavel->setObservacao($ArrayResponsavel["observacao"]);
        $responsavel->setEndereco($ArrayResponsavel["endereco"]);  
        $responsavel->setNome($ArrayResponsavel["nome"]);
        $responsavel->setRepresentante($ArrayResponsavel["representante"]);
        $responsavel->setTelefone($ArrayResponsavel["telefone"]);
        $responsavel->setNis($ArrayResponsavel["nis"]);
        $responsavel->setCpf($ArrayResponsavel["cpf"]);
        
        if ($responsavel->alterar()) {
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

$obj = new ControlerResponsavel();
