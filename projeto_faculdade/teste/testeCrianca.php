
<?php

$jsonCrianca = array();

//$jsonCrianca['comando'] = 'consultarCriancaPorId';
$jsonCrianca['comando'] = 'alterar';

$jsonCrianca['id_cri'] = '1';
/*
$jsonCrianca['escola'] = 'escola';
$jsonCrianca['ncalcado'] = '1';
$jsonCrianca['status'] = 'A';
$jsonCrianca['nroupa'] = '22';
$jsonCrianca['nome'] = 'Brunim Ratatá';
$jsonCrianca['idade'] = '12';
$jsonCrianca['dtnascimento'] = '2014-12-11';
$jsonCrianca['ncertidao'] = '2012321';
$jsonCrianca['idresponsavel'] = '1';
$jsonCrianca['iddoador'] = '1';
$jsonCrianca['genero'] = 'M';

*/


$json = json_encode($jsonCrianca);

echo "<pre>" . "Comando sinistro = " . json_encode($jsonCrianca, JSON_PRETTY_PRINT) . "</pre>";

$url = "http://127.0.0.1/projeto_faculdade/control/ControlerCrianca.php";

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
