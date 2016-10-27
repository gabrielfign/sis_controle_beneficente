<?php
$Nome		= $_POST["name"];	// Pega o valor do campo Nome
$Fone		= $_POST["phone"];	// Pega o valor do campo Telefone
$Email		= $_POST["email"];	// Pega o valor do campo Email
$Mensagem	= $_POST["message"];	// Pega os valores do campo Mensagem

$Vai 		= "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: $Fone\n\nMensagem: $Mensagem\n";

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'projetobeneficente@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'abc,123!');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticaзгo ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 587 deverб estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return true;
	} else {
		$error = 'Mensagem enviada!';
		return false;
	}
}

// Insira abaixo o email que irб receber a mensagem, o email que irб enviar (o mesmo da variбvel GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por ъltimo a variбvel com o corpo do email.

 if (smtpmailer('projetobeneficente@gmail.com', 'projetobeneficente@gmail.com', $Nome, 'Contato Site', $Vai)) {

}

if (!empty($error)) echo $error;
?>