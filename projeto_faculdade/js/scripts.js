jQuery(document).ready(function () {

    $('.form').on('submit', function (e) {
        
        e.preventDefault();
        
        var con = $('input:checked').val();
        
        location.href="principal.php?per=" + con + "?p=consulta";
    });

});