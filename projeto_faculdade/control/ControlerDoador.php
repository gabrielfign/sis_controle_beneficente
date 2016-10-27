<?php


require_once '../model/Doador.php';

class ControlerDoador {

    public function __construct() {
        $ArrayDoador = json_decode(file_get_contents('php://input'), true);

        $comando = $ArrayDoador["comando"];

        switch ($comando) {
            case "gravar":
                $this->gravaDoador($ArrayDoador);
                break;

            case "consultar":
                $this->consultaDoador();
                break;

            case "consultarPorId":
                $this->consultaDoadorPorId($ArrayDoador);
                break;
            
            case "alterar":
                $this->alterar($ArrayDoador);
                break;
            
            
            default:
                print "Nenhum comando selecionado";
        }
    }

    function gravaDoador($ArrayDoador) {
        $doador = new Doador();
        $doador->setNome($ArrayDoador["nome"]);
        $doador->setGrupo($ArrayDoador["grupo"]);
        $doador->setEndereco($ArrayDoador["endereco"]);
        $doador->setTelefone($ArrayDoador["telefone"]);
        $doador->setEmail($ArrayDoador["email"]);
        $doador->setCpf($ArrayDoador["cpf"]);
    

        if ($doador->gravaDoador()) {
          
            print "Doador gravado com sucesso!";
        } else {
            print "Falha ao tentar salvar, tente novamente mais tarde.";
        }
    }

    function consultaDoador() {
        $doador = new Doador();

        print $json = json_encode($doador->consultaDoador());
    }
    
    
    function consultaDoadorPorId($ArrayDoador) {
        $doador = new Doador();

           $doador->setIdDoador($ArrayDoador["id_doador"]);
        
        print $json = json_encode($doador->consultaDoadorPorId());
    }
    
    function alterar($ArrayDoador) {
        $doador = new Doador();

        $doador->setIdDoador($ArrayDoador["id_doador"]);
        $doador->setNome($ArrayDoador["nome"]);
        $doador->setEndereco($ArrayDoador["endereco"]);
        $doador->setTelefone($ArrayDoador["telefone"]);
        $doador->setEmail($ArrayDoador["email"]);
        $doador->setGrupo($ArrayDoador["grupo"]);
        $doador->setCpf($ArrayDoador["cpf"]);
        
        if ($doador->alterar()) {
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

$obj = new ControlerDoador();
