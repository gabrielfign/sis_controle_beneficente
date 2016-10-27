<?php

require_once '../conectabanco/Conexao.php';

class DaoResponsavel {

    function gravaResponsavel($responsavel) {

        try {


            $sql = "insert into responsavel (observacao, endereco, nome, representante, telefone, nis, cpf) values (:observacao, :endereco, :nome, :representante, :telefone, :nis, :cpf)";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':endereco', $responsavel->getEndereco());
            $stman->bindValue(':nome', $responsavel->getNome());
            $stman->bindValue(':representante', $responsavel->getRepresentante());
            $stman->bindValue(':telefone', $responsavel->getTelefone());
            $stman->bindValue(':nis', $responsavel->getNis());
            $stman->bindValue(':cpf', $responsavel->getCpf());
       
            $stman->bindValue(':observacao', $responsavel->getObservacao());

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

    function consulta() {

        try {

            $sql = "select * from responsavel";

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
    
    function consultaResponsavel($responsavel) {

        try {

            $sql = "select * from responsavel where id_resp = :idresp";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':idresp', $responsavel->getIdResp());

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
    
    function alterar($id_resp, $nome, $observacao, $endereco, $representante, $telefone, $nis, $cpf) {
        try {

            $sql = "update responsavel set nome = :nome, "
                    . "observacao = :observacao, "
                    . "endereco = :endereco, "
                    . "representante = :representante, "
                    . "telefone = :telefone, "
                    . "nis = :nis, "
                    . "cpf = :cpf "
                    . "where id_resp = :id_resp";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':id_resp', $id_resp);
            $stman->bindValue(':observacao', $observacao);
            $stman->bindValue(':nome', $nome);
            $stman->bindValue(':endereco', $endereco);
            $stman->bindValue(':representante', $representante);
            $stman->bindValue(':telefone', $telefone);
            $stman->bindValue(':nis', $nis);
            $stman->bindValue(':cpf', $cpf);
            
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
