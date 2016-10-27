<?php

if (!isset($_REQUEST['term'])) {
    exit();
}

function buscar(){

    require_once '../conectabanco/Conexao.php';
    $banco = new Conexao();

    try {
        
            $sql = 'select id_resp, nome from responsavel
                            where nome
                            like "'.ucfirst($_REQUEST['term']).'%" 
                            order by nome asc 
                            limit 0,10';

            $stman = $banco->conecta()->prepare($sql);

            $stman->execute();

            return $stman->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

            return 'Erro ao conectar'.$e;
    }
}

$data = buscar();


foreach ($data as &$value) {
    $result[] = array(
		'label' => $value['nome'],
		'value' => $value['nome'],
	);
}

echo json_encode($result);

flush(); // Vide les tampons de sortie