<div class="panel-body">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Cadastro de Responsável</h4>
        </div>
        <div class="panel-body">
          <form method="post" action="principal.php?p=cadastro_responsavel">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" maxlength="70" placeholder="Nome" required="true">
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" maxlength="70" placeholder="Endereço" required="true">
            </div>

            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="number" class="form-control" id="cpf" name="cpf" maxlength="70" placeholder="CPF" required="true">
            </div>

            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="number" class="form-control" id="telefone" name="telefone" maxlength="70" placeholder="Telefone" required="true">
            </div>

            <div class="form-group">
              <label for="nis">Número do Nis</label>
              <input type="number" class="form-control" id="nis" name="nis" maxlength="70" placeholder="Nis" required="true">
            </div>

            <div class="form-group">
              <label for="grupo">Representante</label>
              <input type="text" class="form-control" id="representante" name="representante" maxlength="70" placeholder="Representante" required="true">
            </div>

            <div class="form-group">
              <label for="observacao">Observação</label>
              <textarea class="form-control" rows="3" name="observacao" required="true" maxlength="70" id="observacao" placeholder="Observação"></textarea>
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
                $jsonResponsavel = array();

                $jsonResponsavel['comando'] = 'gravar';
                $jsonResponsavel['endereco'] = filter_input(INPUT_POST, "endereco");
                $jsonResponsavel['nome'] = filter_input(INPUT_POST, "nome");
                $jsonResponsavel['representante'] = filter_input(INPUT_POST, "representante");
                $jsonResponsavel['telefone'] = filter_input(INPUT_POST, "telefone");
                $jsonResponsavel['nis'] = filter_input(INPUT_POST, "nis");
                $jsonResponsavel['cpf'] = filter_input(INPUT_POST, "cpf");              
                $jsonResponsavel['observacao'] = filter_input(INPUT_POST, "observacao");

                $json = json_encode($jsonResponsavel);

                $url = "http://127.0.0.1/projeto_faculdade/control/ControlerResponsavel.php";
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

                echo '<script>alert("' . $json_response . '");</script>';
            }
            ?>

  </section>
  </body>

  </html>