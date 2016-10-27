<?php

$jsonDoador = array();

$jsonDoador['comando'] = 'consultarPorId';
$jsonDoador['id_doador'] = '1';
//$jsonDoador['nome'] = 'Gabriel Figueiredo';
//$jsonDoador['telefone'] = '2199998888';
//$jsonDoador['endereco'] = 'estrada da pamonha verde';
//$jsonDoador['email'] = 'gabigatinhomanhoso@hotmail.com';
//$jsonDoador['cpf'] = 'cpf';

$json = json_encode($jsonDoador);

$url = "http://127.0.0.1/projeto_faculdade/control/ControlerDoador.php";
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
