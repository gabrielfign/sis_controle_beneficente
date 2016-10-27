
<!-- -->
<div class="col-lg-3">
</div>
<div class="col-lg-6">
  <div class="table-responsive">
    <div class="panel panel-default">
      <div class="panel-heading">Resultado da Consulta</div>
      <div class="form-group input-group">
       
        <input type="text" class="form-control">
        <span class="input-group-btn">        
      <button class="btn btn-default" type="button">
      <span class="glyphicon glyphicon-search" aria-hidden=""></span>
        </button>
        </span>
        
      </div>     

    

    <?php

    print '<div class="panel-body">';
    print '<table class="table">';   
    print '<tr>';
    print '<th>Nome</th>';
    print '<th>Telefone</th>';
    print '<th>Grupo</th>';
    print '<th>Detalhes</th>';      
    print '</tr>';
      

    $jsonDoador = array();

    $jsonDoador['comando'] = 'consultar';

    $json = json_encode($jsonDoador);

    $url = "http://127.0.0.1/projeto_faculdade/control/ControlerDoador.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

    $json_response = curl_exec($curl);

    $array = json_decode($json_response, true);

    $x = 0;
    foreach ($array as $obj) {
        print '<tr><td>' . $array[$x]['nome'] . '</td><td>' . $array[$x]['telefone'] . '</td><td>' . $array[$x]['email'] . '</td>';
        print '<td><button type="button" class="btn btn-xs btn-success" onclick="consultarPorId(' . $array[$x]['id_doador'] .')">Visualizar
</button></td>';
        print '</tr>';
        $x++;
    }

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($status != 200) {
        die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    }

    curl_close($curl);
    print '</table>';   
      
      ?>
      
       </div>
       
  <div class="col-lg-3">
  </div>
    
   
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalhes</h4>
      </div>
      <div class="modal-body">
        <!-- formulário -->
        
        <form id="formcondoador" method="post" action="principal.php?p=cadastro_doador">
            
            <div class="form-group">
              <label for="nome">ID</label>
              <input type="text" class="form-control" id="id_doador" name="id_doador" maxlength="70" placeholder="ID" required="true" disabled>
            </div>
            
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" maxlength="70" placeholder="Nome" required="true">
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
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" maxlength="70" placeholder="Endereço" required="true">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" maxlength="70" placeholder="Email" required="true">
            </div>

            <div class="form-group">
              <label for="grupo">Grupo</label>
              <input type="text" class="form-control" id="grupo" name="grupo" maxlength="70" placeholder="Grupo" required="true">
            </div>

          </form>
        
        <!-- formulário -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
        </button>
          <button onclick="salva_alteracao()" type="button" class="btn btn-primary" data-dismiss="modal">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar
        </button>
      </div>
    </div>
  </div>
</div>
<script src="js/retorna_doador.js" type="text/javascript"></script>