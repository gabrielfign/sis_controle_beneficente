<div class="panel-body">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Cadastro de Festa</h4>
        </div>
        <div class="panel-body">
          <form method="post" action="principal.php?p=cadastro_festa">
              
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" maxlength="70" placeholder="Nome" required="true">
            </div>

            <div class="form-group">
              <label for="data">Data</label>
              <input type="date" class="form-control" id="data" name="data" maxlength="70" placeholder="Data da Festa" required="true">
            </div>

            <div class="form-group">
              <label for="local">Local</label>
              <input type="text" class="form-control" id="local" name="local" maxlength="70" placeholder="Local da Festa" required="true">
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
                $jsonFesta = array();

                $jsonFesta['comando'] = 'gravar';
                $jsonFesta['nome'] = filter_input(INPUT_POST, "nome");
                $jsonFesta['data'] = filter_input(INPUT_POST, "data");
                $jsonFesta['local'] = filter_input(INPUT_POST, "local");

                $json = json_encode($jsonFesta);

                $url = "http://127.0.0.1/projeto_faculdade/control/ControlerFesta.php";
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