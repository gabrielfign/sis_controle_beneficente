function consultarPorId(value) {

    var url = 'conteudos/consulta_responsavel_id.php';

    dados = {id_resp : value};
        
    
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType : "json",
              
        success: function (data) {
            
            $("#id_resp").val(data.id_resp);
            $("#nome").val(data.nome);
            $("#cpf").val(data.cpf);
            $("#telefone").val(data.telefone);
            $("#endereco").val(data.endereco);
            $("#email").val(data.email);
            $("#nis").val(data.nis);
            $("#representante").val(data.representante);
            $("#observacao").val(data.observacao);
            
            
            $('#myModal').modal();
            $('#myModal').modal({keyboard: false});
            $('#myModal').modal('show');
        }
    });
}


function salva_alteracao() {
    var url = 'conteudos/salva_alteracao_responsavel.php';

    dados = {id_resp: $('#id_resp').val(),
        nome: $('#nome').val(),
        observacao: $('#observacao').val(),
        endereco: $('#endereco').val(),
        representante: $('#representante').val(),
        telefone: $('#telefone').val(),
        nis: $('#nis').val(),
        cpf: $('#cpf').val()};
    
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