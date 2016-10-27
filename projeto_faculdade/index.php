<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Faça seu Login</title>
        <link rel="stylesheet" type="text/css" href="conteudos/css/login.css"> 
    </head>   
    <body>
        <form action="Login.php" method="post">
            <h1>Faça seu Login</h1>           
            <p>Bem-Vindo ao painel de controle</p>
            <div class="info">                    
                <input type="text" id="usu" name="usu" placeholder="Seu Login" required="required"/>
                <input type="password" id="pass" name="pass" placeholder="Sua Senha" required="required"/>
            </div>                    
            <input type="submit" value="Entrar" />      
        </form>               
    </body>
</html>



