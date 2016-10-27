<?php

require_once '../conectabanco/conexao.php';

class DaoFesta {

    function gravaFesta($nome, $data, $local) {

        try {

            $sql = "insert into festa (nome, data, local) values (:nome, :data, :local)";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':nome', $nome);
            $stman->bindValue(':data', $data);
            $stman->bindValue(':local', $local);

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
    
    function excluiFesta($idfesta) {
        
        try {

            $sql = "delete from festa where id_festa = :idfesta";

            $stman = Conexao::getInstance()->prepare($sql);
            
            $stman->bindValue(':idfesta', $idfesta);

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
    function consultaFesta() {

        try {

            $sql = "select * from festa";

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
    function consultaFestaPorId($festa) {

        try {

            $sql = "select * from festa where id_festa = :idfesta";

            $stman = Conexao::getInstance()->prepare($sql);
            
            $stman->bindValue(':idfesta', $festa->getIdFesta());

            if ($stman->execute()) {
                $array = $stman->fetchAll(PDO::FETCH_ASSOC);
                return $array [0];
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo 'Erro ao Cadastrar - ' . $ex;
            return 0;
        }
    }
    
    function alterar($id_festa, $nome, $data, $local) {
        try {

            $sql = "update festa set nome = :nome, "
                    . "data = :data, "
                    . "local = :local "
                    . "where id_festa = :id_festa";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':id_festa', $id_festa);
            $stman->bindValue(':nome', $nome);
            $stman->bindValue(':data', $data);
            $stman->bindValue(':local', $local);

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