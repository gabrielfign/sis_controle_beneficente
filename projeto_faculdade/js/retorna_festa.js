function consultarPorId(value) {

    var url = 'conteudos/consulta_festa_id.php';

    dados = {id_festa: value};
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType: "json",
        success: function (data) {

            $("#id_festa").val(data.id_festa);
            $("#nome").val(data.nome);
            $("#data").val(data.data);
            $("#local").val(data.local);

            $('#myModal').modal();
            $('#myModal').modal({keyboard: false});
            $('#myModal').modal('show');
        }
    });
}

function salva_alteracao() {
    var url = 'conteudos/salva_alteracao.php';

    dados = {id_festa: $('#id_festa').val(),
        nome: $('#nome').val(),
        data: $('#data').val(),
        local: $('#local').val()};
    
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