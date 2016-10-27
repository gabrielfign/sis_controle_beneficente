<?php
require_once '../conectabanco/Conexao.php';
class DaoDoador {
    
    function gravaDoador($doador) {

	
        try {
            
            
            $sql = "insert into doador (grupo, nome, endereco, telefone, email, cpf) values (:grupo, :nome, :endereco, :telefone, :email, :cpf)";
            
            $stman = Conexao::getInstance()->prepare($sql);
            
            $stman->bindValue(':grupo', $doador->getGrupo());
            $stman->bindValue(':nome', $doador->getNome());
            $stman->bindValue(':endereco', $doador->getEndereco());
            $stman->bindValue(':telefone', $doador->getTelefone());
            $stman->bindValue(':email', $doador->getEmail());
            $stman->bindValue(':cpf', $doador->getCpf());

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
    function consultaDoador() {

        try {

            $sql = "select * from doador";

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
    function consultaDoadorPorId($doador) {

        try {

            $sql = "select * from doador where id_doador = :iddoador";

            $stman = Conexao::getInstance()->prepare($sql);
            
            $stman->bindValue(':iddoador', $doador->getIdDoador());

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
    
    function alterar($id_doador, $nome, $endereco, $telefone, $email, $grupo, $cpf) {
        try {

            $sql = "update doador set nome = :nome, "
                    . "endereco = :endereco, "
                    . "telefone = :telefone, "
                    . "email = :email, "
                    . "grupo = :grupo, "
                    . "cpf = :cpf "
                    . "where id_doador = :id_doador";
            
            $stman = Conexao::getInstance()->prepare($sql);

            $stman->bindValue(':id_doador', $id_doador);
            $stman->bindValue(':nome', $nome);
            $stman->bindValue(':endereco', $endereco);
            $stman->bindValue(':telefone', $telefone);
            $stman->bindValue(':email', $email);
            $stman->bindValue(':grupo', $grupo);
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