jQuery(document).ready(function () {
    $('#searchdoador').autocomplete({
        source: 'search/search_doador.php',
        minLength: 1
    });
    
    $('#searchresponsavel').autocomplete({
        source: 'search/search_responsavel.php',
        minLength: 1
    });
});

