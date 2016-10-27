<?php

$jsonFesta = array();


$jsonFesta['comando'] = 'consultarPorId';
$jsonFesta['id_festa'] = '1';
//######################################################
//  GRAVAR

//$jsonFesta['comando'] = 'gravar';
//$jsonFesta['nome'] = 'festa da boa vizinhança';
//$jsonFesta['data'] = '2011-05-22';
//$jsonFesta['local'] = 'Estrada Marechal Alencastro, casa 3, Deodoro';

//######################################################
//  EXCLUIR

//$jsonFesta['comando'] = 'excluir';
//$jsonFesta['id_festa'] = '4';

//######################################################

$json = json_encode($jsonFesta);

$url = "http://127.0.0.1/projeto_faculdade/control/ControlerFesta.php";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

print $json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}

curl_close($curl);
