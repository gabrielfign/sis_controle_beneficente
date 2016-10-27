<?php

require_once '../conectabanco/conexao.php';

class DaoLogin {

    function gravaLogin($login) {

        try {

            $sql = "insert into adm (cpf, nome, login, senha) values (:cpf, :nome, :login, :senha)";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':nome', $login->getNome());
            $stman->bindValue(':cpf', $login->getCpf());
            $stman->bindValue(':login', $login->getLogin());
            $stman->bindValue(':senha', $login->getSenha());

            if ($stman->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar" . $e;
            return false;
        }
    }

    function excluiLogin($idadm) {

        try {

            $sql = "delete from adm where id_adm = :idadm";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':idadm', $idadm);

            if ($stman->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar" . $e;
            return false;
        }
    }

    function consultaLogin() {

        try {

            $sql = "select * from adm";

            $stman = Conexao::getInstance()->prepare($sql);

            if ($stman->execute()) {
                return $stman->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'Erro ao Cadastrar - ' . $ex;
            return 0;
        }
    }
    
    function consultaLoginPorId($idadm) {

        try {

            $sql = "select * from adm where id_adm = :idadm";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':idadm', $idadm);

            if ($stman->execute()) {
                $array = $stman->fetchAll(PDO::FETCH_ASSOC);
                return $array[0];
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'Erro ao Cadastrar - ' . $ex;
            return 0;
        }
    }
    
    function alterar($id_adm, $nome, $login, $cpf ,$senha) {
        try {

            $sql = "update adm set nome = :nome, "
                    . "login = :login, "
                    . "senha = :senha, "
                    . "cpf = :cpf "
                    . "where id_adm = :id_adm";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':id_adm', $id_adm);
            $stman->bindValue(':nome', $nome);    
            $stman->bindValue(':login', $login);
            $stman->bindValue(':cpf', $cpf);                    
            $stman->bindValue(':senha', $senha);
            

            if ($stman->execute()) {
                return true;
            } else {
                return false;
            }
          
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar" . $e;
            return false;
        }
    }

}
