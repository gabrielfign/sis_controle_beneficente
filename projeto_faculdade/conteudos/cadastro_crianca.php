<div class="panel-body">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Cadastro de Criança</h4>
                </div>
                <div class="panel-body">    
                    <form method="post" action="principal.php?p=cadastro_crianca">
                                               
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" maxlength="70" placeholder="Nome" required="true">
                        </div>                        

                        <div class="form-group">
                            <label for="datanascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="datanascimento" name="datanascimento" maxlength="70" placeholder="Data de Nascimento" required="true">
                        </div>

                        <div class="form-group">
                            <label for="escola">Escola</label>
                            <input type="text" class="form-control" id="escola" name="escola" maxlength="70" placeholder="Escola" required="true">
                        </div>

                        <div class="form-group">
                            <label for="certidao">Certidão</label>
                            <input type="number" class="form-control" id="certidao" name="certidao" maxlength="70" placeholder="Certidão" required="true">
                        </div>

                        <div class="form-group">
                            <label for="doador">Doador</label>
                            <input type="text" class="form-control" id="doador" name="doador" maxlength="70" placeholder="Doador" required="true">
                        </div>
                        
                          <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel" maxlength="70" placeholder="Responsável" required="true">
                        </div>

                        <div class="form-group">
                            <label for="numeroroupa">Número de Roupa</label>
                            <input type="number" class="form-control" id="nroupa" name="nroupa" maxlength="70" placeholder="Número da Roupa" required="true">
                        </div>

                        <div class="form-group">
                            <label for="numerocalcado">Número Calçado</label>
                            <input type="number" class="form-control" id="ncalcado" name="ncalcado" maxlength="70" placeholder="Número do Calçado" required="true">
                        </div>
                        
                        
                        <div class="form-group">
                        <label>Gênero</label>
                        <div class="radio-group">
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="M" >Menino
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="F" >Menina
                            </label>
                        </div>
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
    $jsonCrianca = array();

    $jsonCrianca['comando'] = 'gravar';
    $jsonCrianca['escola'] = filter_input(INPUT_POST, "escola");
    $jsonCrianca['ncalcado'] = filter_input(INPUT_POST, "ncalcado");
    $jsonCrianca['situacao'] = filter_input(INPUT_POST, "situacao");
    $jsonCrianca['nroupa'] = filter_input(INPUT_POST, "nroupa");
    $jsonCrianca['nome'] = filter_input(INPUT_POST, "nome");
    $jsonCrianca['idade'] = filter_input(INPUT_POST, "idade");
    $jsonCrianca['dtnascimento'] = filter_input(INPUT_POST, "data");
    $jsonCrianca['ncertidao'] = filter_input(INPUT_POST, "certidao");
    $jsonCrianca['idresponsavel'] = filter_input(INPUT_POST, "idresponsavel");
    $jsonCrianca['iddoador'] = filter_input(INPUT_POST, "iddoador");
    $jsonCrianca['genero'] = filter_input(INPUT_POST, "optionsRadios");

    $json = json_encode($jsonCrianca);

    $url = "http://127.0.0.1/projeto_faculdade/control/ControlerCrianca.php";
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
    
    echo '<script>alert("Gravado com sucesso!");</script>';
}
?>
