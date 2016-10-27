<?php

    $jsonFesta = array();

    $jsonFesta['comando'] = 'consultarPorId';

    $jsonFesta['id_festa'] = filter_input(INPUT_POST, "id_festa");
    
    $json = json_encode($jsonFesta);

    $url = "http://127.0.0.1/projeto_faculdade/control/ControlerFesta.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $json_response = curl_exec($curl);

    $array = json_decode($json_response, true);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($status != 200) {
        die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    }

    curl_close($curl);

    print $json_response;