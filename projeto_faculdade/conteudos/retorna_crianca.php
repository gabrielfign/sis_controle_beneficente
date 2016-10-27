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
    print '<th>Status</th>';
    print '<th>Idade</th>';
    print '<th>Detalhes</th>';
    print '</tr>';
      

    $jsonCrianca = array();

    $jsonCrianca['comando'] = 'consultar';

    $json = json_encode($jsonCrianca);

    $url = "http://127.0.0.1/projeto_faculdade/control/ControlerCrianca.php";

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
        print '<tr><td>' . $array[$x]['nome'] . '</td><td>' . $array[$x]['status'] . '</td><td>' . $array[$x]['idade'] . '</td>';
        print '<td><button type="button" class="btn btn-xs btn-success" onclick="consultarPorId(' . $array[$x]['id_cri'] . ')">Visualizar</button></td>';
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
      <div class="panel-body"> 
          
                    <form method="post" action="principal.php?p=cadastro_crianca">
                        
                        <div class="form-group">
                            <label for="nome">ID</label>
                            <input type="text" class="form-control" id="id_cri" name="id_cri" maxlength="70" placeholder="Nome" required="true" disabled>
                        </div>
                        
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
                            <input type="number" class="form-control" id="numeroroupa" name="numeroroupa" maxlength="70" placeholder="Número da Roupa" required="true">
                        </div>

                        <div class="form-group">
                            <label for="numerocalcado">Número Calçado</label>
                            <input type="number" class="form-control" id="numerocalcado" name="numerocalcado" maxlength="70" placeholder="Número do Calçado" required="true">
                        </div>
                     
                    </form>	
                </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
        </button>
          <button onclick="salva_alteracao()" type="button" class="btn btn-primary" data-dismiss="modal">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar
        </button>
      </div>
    </div>
  </div>
</div>

<script src="js/retorna_crianca.js" type="text/javascript"></script>