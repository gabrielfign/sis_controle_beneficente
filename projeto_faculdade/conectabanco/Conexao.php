<?php

class Conexao {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=127.0.0.1;dbname=projeto", "root", "vertrigo", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"))
                    or die("Erro ao conectar!");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
}
//    function conecta() {
//
//        try {
//
//            $local = "127.0.0.1";
//            $banco = "Projeto";
//            $username = "root";
//            $passwd = "vertrigo";
//            $con = new PDO("mysql:host=" . $local . ";dbname=" . $banco, $username, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"))
//                    or die("Erro ao conectar!");
//            return $con;
//        } catch (PDOException $e) {
//            echo 'Erro ao conectar' . $e;
//        }
//    }

/*
//configuracoes do banco de dados
$server = "mysql.hostinger.com.br";
$user = "u898946935_benef";
$pass = "password";
$database = "u898946935_benef";

//mysqli_connect() -> Efetua conexao com o bd
$con = mysql_connect($server,$user,$pass);

//mysqli_select_db -> Escolhe qual o banco de dados que sera usado
mysql_select_db($database,$con);

*/