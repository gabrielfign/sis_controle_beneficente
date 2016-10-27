<?php

    $usu = filter_input(INPUT_POST, 'usu');
    $senha = filter_input(INPUT_POST, 'pass');

    // "!" = não
    if (!empty($usu) && !empty($senha)) {

        //#########################################
        //ABRIR CONEXÃO COM O BANCO DE DADOS
        require_once 'conectabanco/Conexao.php';

        //VARIÁVEL RECEBE O CÓDIGO SQL
        $sql = "select senha from adm where login ='$usu'";

        $stman = Conexao::getInstance()->prepare($sql);

        $stman->execute();

        $array = $stman->fetchAll(PDO::FETCH_ASSOC);

        if ($array == null) { //TESTA SE A CONSULTA RETORNOU ALGUM REGISTRO
            echo '<script>alert("Login ou senha inválidos!");window.location.href="index.php"</script>';
        } else {
            
            if ($array[0]['senha'] != $senha) { //CONFERE SENHA
                echo '<script>alert("Login ou senha inválidos!");window.location.href="index.php"</script>';
            } else { //USUÁRIO E SENHA CORRETOS
                // Verifica se precisa iniciar a sessão
                session_start();
                $_SESSION['login'] = $usu;
                $_SESSION['senha'] = $senha;

                //DIRECIONA PARA A PÁGINA INICIAL DOS USUÁRIOS CADASTRADOS
                header("Location: principal.php");
            }
        }
    } else {
        echo '<script>alert("Informe usuário e senha!");window.location.href="index.php"</script>';
    }