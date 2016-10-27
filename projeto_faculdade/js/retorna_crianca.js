function consultarPorId(value) {

    var url = 'conteudos/consulta_crianca_id.php';

    dados = {id_cri : value};
    
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType : "json",
        success: function (data) {
            
       
            $("#id_cri").val(data.id_cri);
            $("#nome").val(data.nome);
            $("#datanascimento").val(data.dtnasc);
            $("#escola").val(data.escola);
            $("#certidao").val(data.cernasc);
            $("#doador").val(data.id_doador);
            $("#responsavel").val(data.id_resp);
            $("#numeroroupa").val(data.n_roupa);
            $("#numerocalcado").val(data.n_calcado);
            
            
            $('#myModal').modal();
            $('#myModal').modal({keyboard: false});
            $('#myModal').modal('show');
        }
    });
}

function salva_alteracao() {
    var url = 'conteudos/salva_alteracao_crianca.php';

    dados = {id_cri: $('#id_cri').val(),
        nome: $('#nome').val(),
        dtnasc: $('#dtnasc').val(),
        escola: $('#escola').val(),
        cernasc: $('#cernasc').val(),
        id_doador: $('#id_doador').val(),
        id_resp: $('#id_resp').val(),
        n_roupa: $('#n_roupa').val(),
        n_calcado: $('#n_calcado').val()};
    
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType: "json",
        success: function (data) {

            if (data.response = "true") {
                alert("Salvo!");
            }
        }
    });
}