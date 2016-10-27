<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery('#ajaxform').submit(function () {

      var url;
      var dados = jQuery(this).serialize();
      
      var con = $('input:checked').val();

      switch (con) {
      case 'login':
        url = 'conteudos/retorna_login.php';
        break;

      case 'crian':
        url = 'conteudos/retorna_crianca.php';
        break;

      case 'doador':
        url = 'conteudos/retorna_doador.php';
        break;

      case 'responsa':
        url = 'conteudos/retorna_responsavel.php';
        break;

      case 'festa':
        url = 'conteudos/retorna_festa.php';
        break;

      default:
        return null;
      }

      jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        success: function (data) {
            $('#painel').empty();
          $('#painel').append(data);
        }
      });
      return false;
    });
  });
</script>



<div class="panel-body">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Consulta</h4>
        </div>
        <div class="panel-body">
          <form method="post" id="ajaxform">
            <div class="form-group">
              <div class="radio-group">



                <label class="radio-inline">
                  <input type="radio" name="budget" id="optionsRadios1" value="login">Login
                </label>

                <label class="radio-inline">
                  <input type="radio" name="budget" id="optionsRadios2" value="crian">Criança
                </label>

                <label class="radio-inline">
                  <input type="radio" name="budget" id="optionsRadios3" value="doador">Doador
                </label>

                <label class="radio-inline">
                  <input type="radio" name="budget" id="optionsRadios4" value="responsa">Responsável
                </label>

                <label class="radio-inline">
                  <input type="radio" name="budget" id="optionsRadios5" value="festa">Festa
                </label>


              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="salvar" name="consulta" value="Consultar">Consultar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
    </div>
  </div>
</div>
<div id="painel" class="panel-body">
</div>