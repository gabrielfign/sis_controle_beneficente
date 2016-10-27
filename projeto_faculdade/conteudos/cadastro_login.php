<div class="panel-body">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Cadastro de Login</h4>
                </div>
                <div class="panel-body">    
                    <form method="post" action="principal.php?p=cadastro_login">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" maxlength="70" placeholder="Nome" required="true">
                        </div>

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login" maxlength="70" placeholder="Login" required="true">
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="70" placeholder="CPF" required="true">
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" maxlength="70" placeholder="Senha"  type="password" required="true">
                        </div>

                        <div class="form-group">
                            <label for="repita_senha">Repita Senha</label>
                            <input type="password" class="form-control" id="repita_senha" name="repita_senha" maxlength="70" placeholder="Repita Senha"  type="password" required="true">

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="salvar" name="salvar">Salvar</button>
                            <button type="reset" class="btn btn-default" id="limpar" name="limpar">Limpar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>


<?php
if (isset($_POST['salvar'])) {
    $jsonArray = array();

    if($_POST) {
        $senha          = $_POST['senha'];
        $repita_senha  = $_POST['repita_senha'];
         if ($senha == $repita_senha) {
            echo '<script>alert("Login cadastrado com sucesso!")</script>';    
            //echo '<span class =("sucesso")><b>Sucesso</b>: As senhas são iguais:</span>';
        } else {
            //$mensagem = "<script>alert='erro'><b>Erro</b>: As senhas não conferem!</script>";
            echo '<script>alert("As senhas não conferem!")</script>';
            //echo '<span class=("erro")><b>Erro</b>: As senhas não conferem!</span>';
        }
        
    }

    $jsonArray['comando'] = "gravar";
    $jsonArray['nome'] = filter_input(INPUT_POST, "nome");
    $jsonArray['login'] = filter_input(INPUT_POST, "login");
    $jsonArray['cpf'] = filter_input(INPUT_POST, "cpf");
    $jsonArray['senha'] = filter_input(INPUT_POST, "senha");

    $json = json_encode($jsonArray);

    $url = "http://127.0.0.1/projeto_faculdade/control/ControlerLogin.php";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $json_response = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($status != 200) {
        die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    }

    curl_close($curl);

    //echo '<script>alert("' . $json_response . '");</script>';
}
?>