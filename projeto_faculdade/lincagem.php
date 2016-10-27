<div id="links"><!--inicio da tag links-->
    <?php 

	if (isset($_GET["p"])){ 
		$p = $_GET["p"]; 
		if (file_exists("conteudos/$p.php")){ 
			include ("conteudos/$p.php"); 
                     } else {
			echo '<script> alert("Conteudo não encontrando!!!\n Tente mais tarde.\n\n\t\t\t\t\t Obrigado.");</script>';
			
		}	
	} 
?>	
</div><!--encerramento da tag links-->
