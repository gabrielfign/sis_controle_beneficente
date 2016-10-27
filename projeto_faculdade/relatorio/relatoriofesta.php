<?php
include("verificar_login.php");
?>
<?php
set_time_limit(3000);

//ABRIR CONEXÃO COM O BANCO DE DADOS
        require_once '../conectabanco/Conexao.php';


	/*
	Biblioteca: http://www.mpdf1.com/mpdf/index.php
	Site do exemplo: http://www.gigasystems.com.br/artigo/68/criando-um-relat%C3%B3rio-pdf-com-php
	*/

        //definimos uma constante com o nome da pasta
        define('MPDF_PATH', 'mpdf60/');
        //incluimos o arquivo
        include(MPDF_PATH.'mpdf.php');
        //definimos o timezone para pegar a hora local
        date_default_timezone_set('America/Sao_Paulo');
       
        //instanciamos nossa classe mPDF
        $mpdf=new mPDF();
        //definimos o tipo de exibicao
        $mpdf->SetDisplayMode('fullpage');
        //definimos estilos de fonts
        $mpdf->useOnlyCoreFonts = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        //definimos se vamos exibir a marca d'agua
        //$mpdf->showWatermarkText = true;
        //$mpdf->SetWatermarkText('Marca d\'agua');
        //colocamos um icone de logo tipo no pdf 
        $mpdf->SetWatermarkImage('icones/logoif.png', 1, '', array(140,10));
        //definimos se sera exibido ou nao o logo no pdf
        $mpdf->showWatermarkImage = true;
		
        //escrve o titulo de nosso pdf
        $mpdf->WriteHTML('<br/><h1>Relatório Final da Festa</h1><hr/>');
		
$conteudo.="";
$conteudo.="<style type=\"text/css\">";
$conteudo.="";
$conteudo.="  table.gridtable {";
$conteudo.="    font-family: 'Open Sans', Helvetica, sans-serif;";
$conteudo.="    font-size:11px;";
$conteudo.="    color:#333333;";
$conteudo.="    border-width: 1px;";
$conteudo.="    border-color: #666666;";
$conteudo.="    border-collapse: collapse;";
$conteudo.="  }";
$conteudo.="  table.gridtable th {";
$conteudo.="    border-width: 1px;";
$conteudo.="    padding: 8px;";
$conteudo.="    border-style: solid;";
$conteudo.="    border-color: #666666;";
$conteudo.="    background-color: #dedede;";
$conteudo.="  }";
$conteudo.="  table.gridtable td {";
$conteudo.="    border-width: 1px;";
$conteudo.="    padding: 8px;";
$conteudo.="    border-style: solid;";
$conteudo.="    border-color: #666666;";
$conteudo.="    background-color: #ffffff;";
$conteudo.="  }";
$conteudo.="</style>";
$conteudo.="";
$conteudo.="  <table class=\"gridtable\" border=\"1\" style=\"width:100%\">";

$conteudo.="    <tbody><tr>";
$conteudo.="      <th>Nome do Responsavel</th>";
$conteudo.="      <th>Nome da Criança</th>";
$conteudo.="      <th>Nome do Data de Nascimento</th>";
$conteudo.="      <th>Idade</th>";
$conteudo.="      <th>Número do Calçado</th>";
$conteudo.="      <th>Número da Roupa</th>";
$conteudo.="      <th>Nome do doador</th>";
$conteudo.="    </tr>";
		
// cria a instrução SQL que vai selecionar os dados
$sql = ("select r.nome Nome, c.nome criancaNome, c.dtnasc dataNasc, c.idade idde, c.n_calcado calcado, c.n_roupa roupa,d.nome doadorNome from responsavel r inner join crianca c on r.id_resp = c.id_resp inner join doador d on d.id_doador = c.id_doador where c.`status` = 'A'  order by r.id_resp");
        $stman = Conexao::getInstance()->prepare($sql);
        $stman->execute();
		while ($linha = $stman->fetch(PDO::FETCH_ASSOC)) {
           
    // aqui eu mostro os valores de minha consulta
		$conteudo.="    <tr>";
$conteudo.="      <td>{$linha['Nome']}</td>";
$conteudo.="      <td>{$linha['criancaNome']}</td>";
$conteudo.="      <td>{$linha['dataNasc']}</td>";
$conteudo.="      <td>{$linha['idde']}</td>";
$conteudo.="      <td>{$linha['calcado']}</td>";
$conteudo.="      <td>{$linha['roupa']}</td>";
$conteudo.="      <td>{$linha['doadorNome']}</td>";
        $conteudo.="    </tr>";
}

$conteudo.="  </tbody></table>";
$conteudo.="";
$conteudo.="";	

		
		 //criamos uma variavel e colocamos nela tudo que desejamos que nosso pdf contenha
        $html = $conteudo;
				
        //definimos oque vai conter no rodape do pdf
        $mpdf->SetFooter('{DATE j/m/Y  H:i}||Pagina {PAGENO}/{nb}');		
		
        //e finalmente escrevemos todo nosso conteudo no pdf para exibir
        $mpdf->WriteHTML($html);
        //fechamos nossa instancia ao pdf
        $mpdf->Output();
        //pausamos a tela para exibir o que foi feito
        exit();
?>