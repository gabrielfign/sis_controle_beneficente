function consultarPorId(value) {

    var url = 'conteudos/consulta_login_id.php';

    dados = {id_adm : value};
    jQuery.ajax({
        type: "post",
        url: url,
        data: dados,
        dataType : "json",
        success: function (data) {
            
            $("#id_adm").val(data.id_adm);
            $("#nome").val(data.nome);
            $("#login").val(data.login);
            $("#cpf").val(data.cpf);
            $("#senha").val(data.senha);
            
            $('#myModal').modal();
            $('#myModal').modal({keyboard: false});
            $('#myModal').modal('show');
        }
    });
}

function salva_alteracao() {
    var url = 'conteudos/salva_alteracao_login.php';

    dados = {id_adm: $('#id_adm').val(),
        nome: $('#nome').val(),
        login: $('#login').val(),
        cpf: $('#cpf').val(),
        senha: $('#senha').val()};
    
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
