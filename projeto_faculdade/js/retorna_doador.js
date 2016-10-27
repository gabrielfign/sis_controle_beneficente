function consultarPorId(value) {

    var url = 'conteudos/consulta_doador_id.php';

    dados = {id_doador : value};
    
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType : "json",
        success: function (data) {
           
            $("#id_doador").val(data.id_doador);
            $("#nome").val(data.nome);
            $("#cpf").val(data.cpf);
            $("#telefone").val(data.telefone);
            $("#endereco").val(data.endereco);
            $("#email").val(data.email);
            $("#grupo").val(data.grupo);
            
            
            $('#myModal').modal();
            $('#myModal').modal({keyboard: false});
            $('#myModal').modal('show');
        }
    });
}

function salva_alteracao() {
    var url = 'conteudos/salva_alteracao_doador.php';

    dados = {id_doador: $('#id_doador').val(),
        nome: $('#nome').val(),
        endereco: $('#endereco').val(),
        telefone: $('#telefone').val(),
        email: $('#email').val(),
        grupo: $('#grupo').val(),
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