<div class="panel-body">
  <div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Relatório</h4>
        </div>
          
        <div class="panel-body">
          <form action="./relatorio/ddnpdt.php" method="post" id="ajaxform">
            <div class="form-group">
              <div class="radio-group">
                  <h4>Para Doadores</h4>

                    <p>Doadores que não possuem donatários</p>
             
        </div>  
            <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="salvar" name="consulta" value="enviar">Gerar</button>
            </div>
                
              <hr>
         </form>
		 
            <form action="./relatorio/priorizarcesta.php" method="post" id="ajaxform">
            <div class="form-group">
              <div class="radio-group">
                  <h4>Cestas Básicas</h4>
                    <p>Priorizaçao de cestas básicas</p>
              </div>
            </div>
            <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="salvar" name="consulta" value="enviar">Gerar</button>
            </div>
                
                <hr>
              
          </form>
                <form action="./relatorio/relatoriocriancap.php" method="post" id="ajaxform">
            <div class="form-group">
              <div class="radio-group">
                  <h4>Para Crianças</h4>
                    <p>Crianças que não possuem doadores</p>
              </div>
            </div>
            <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="salvar" name="consulta" value="enviar">Gerar</button>
            </div>
                    
                    <hr>
              
          </form>
                <form action="./relatorio/relatoriofesta.php"method="post" id="ajaxform">
            <div class="form-group">
              <div class="radio-group">
                  <h4>Para Festa</h4>
                    <p>Relatório geral para festa</p>
              </div>
            </div>
            <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="salvar" name="consulta" value="enviar">Gerar</button>
            </div>
                    <hr>
              
          </form>
           
        </div>
      </div>
    </div>
    <div class="col-lg-4">
    </div>
  </div>
</div>
<div id="painel" class="body-panel">
</div>
    </div>
</div>