<?php

require_once '../model/Login.php';

class ControlerLogin {

    function __construct() {
        $ArrayLogin = json_decode(file_get_contents('php://input'), true);

        $comando = $ArrayLogin["comando"];

        switch ($comando) {
            case "gravar":
                $this->gravaLogin($ArrayLogin);
                break;

            case "excluir":
                $this->excluiLogin($ArrayLogin);
                break;

            case 'consultar':
                $this->consultaLogin();
                break;
            
            case 'consultarPorId':
                $this->consultaLoginPorId($ArrayLogin);
                break;
            
            case "alterar":
                $this->alterar($ArrayLogin);
                break;

            default:
                print "Nenhum comando selecionado";
                break;
        }
    }

    function gravaLogin($ArrayLogin) {

        $login = new Login();
        $login->setNome($ArrayLogin["nome"]);
        $login->setLogin($ArrayLogin["login"]);
        $login->setCpf($ArrayLogin["cpf"]);
        $login->setSenha($ArrayLogin["senha"]);


        if ($login->gravaLogin()) {
            print "Usuario gravado com sucesso!";
        } else {
            print "Falha ao tentar salvar, tente novamente mais tarde.";
        }
    }

    function excluiLogin($ArrayLogin) {
        $login = new Login();
        $login->setIdAdm($ArrayLogin["id_adm"]);

        if ($login->excluiLogin()) {
            print "Usuario excluído com sucesso!";
        } else {
            print "Falha ao tentar excluir, tente novamente mais tarde.";
        }
    }

    function consultaLogin() {
        $login = new Login();

        print $json = json_encode($login->consultaLogin());
    }
    
    function consultaLoginPorId($ArrayLogin) {
        $login = new Login();

        $login->setIdAdm($ArrayLogin["id_adm"]);

        print $json = json_encode($login->consultaLoginPorId());
    }
    
    function alterar($ArrayLogin) {
        $login = new Login();

        $login->setIdAdm($ArrayLogin["id_adm"]);
        $login->setNome($ArrayLogin["nome"]);
        $login->setLogin($ArrayLogin["login"]);
        $login->setCpf($ArrayLogin["cpf"]);
        $login->setSenha($ArrayLogin["senha"]);
        
        if ($login->alterar()) {
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

$obj = new ControlerLogin();