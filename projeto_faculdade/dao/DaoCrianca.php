<?php

require_once '../conectabanco/Conexao.php';

class DaoCrianca {

    function gravaCrianca($crianca) {

        try {

            $sql = "insert into crianca (genero, escola, n_calcado, status, n_roupa, nome, idade, dtnasc, cernasc, id_resp, id_doador) values (:genero, :escola, :n_calcado, :status, :n_roupa, :nome, :idade, :dtnasc, :cernasc, :id_resp, :id_doador)";

            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':escola', $crianca->getEscola());
            $stman->bindValue(':n_calcado', $crianca->getNcalcado());
            $stman->bindValue(':status', $crianca->getStatus());
            $stman->bindValue(':n_roupa', $crianca->getNroupa());
            $stman->bindValue(':nome', $crianca->getnome());
            $stman->bindValue(':idade', $crianca->getIdade());
            $stman->bindValue(':dtnasc', $crianca->getDtNascimento());
            $stman->bindValue(':cernasc', $crianca->getNcertidao());
            $stman->bindValue(':id_resp', $crianca->getIdResponsavel());
            $stman->bindValue(':id_doador', $crianca->getIdDoador());
            $stman->bindValue(':genero', $crianca->getGenero());


            if ($stman->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {

            echo "Erro ao Cadastrar" . $ex;
            return false;
        }
    }

    function consultaCrianca() {

        try {

            $sql = "select * from crianca";

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
    
    function consultaCriancaPorId($crianca) {

        try {

            $sql = "select * from crianca where id_cri = :idcri";

            $stman = Conexao::getInstance()->prepare($sql);
            
            $stman->bindValue(':idcri', $crianca->getIdcrianca());            
            

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
    
        function alterar($id_cri, $nome, $id_doador, $escola, $n_calcado, $n_roupa, $dtnasc, $cernasc, $id_resp) {
        try {

            $sql = "update crianca set nome = :nome, "
                    . "id_doador = :id_doador, "
                    . "escola = :escola, "
                    . "n_calcado = :n_calcado, "
                    . "n_roupa = :n_roupa, "
                    . "dtnasc = :dtnasc, "
                    . "cernasc = :cernasc, "
                    . "id_resp = :id_resp "
                    . "where id_cri = :id_cri";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':id_cri', $id_cri);
            $stman->bindValue(':nome', $nome);
            $stman->bindValue(':id_doador', $id_doador);
            $stman->bindValue(':escola', $escola);
            $stman->bindValue(':n_calcado', $n_calcado);
            $stman->bindValue(':n_roupa', $n_roupa);
            $stman->bindValue(':dtnasc', $dtnasc);
            $stman->bindValue(':cernasc', $cernasc);
            $stman->bindValue(':id_resp', $id_resp);
            
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
