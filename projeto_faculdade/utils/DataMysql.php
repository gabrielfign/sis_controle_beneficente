<?php

class DataMysql {

    function converte($phpdate) {
        $mysqldate = date("Y-m-d", strtotime($phpdate));
        return $mysqldate;
    }
    
    function converteParaFront($mysqldate) {
        $phpdate = date("d-m-Y", strtotime($mysqldate));
        return $phpdate;
    }

}

$obj = new DataMysql();
