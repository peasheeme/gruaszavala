<?php 

if(empty($_POST['c_name']) ||
	empty($_POST['c_email']) ||
	empty($_POST['c_message']) ||
	!filter_var($_POST['c_email'], FILTER_VALIDATE_EMAIL)){
	echo "<script>alert('Todos los campos son requeridos');</script>";
	echo "<script>window.location.href='../index.html';</script>";
}


else{
	$nombre = htmlspecialchars($_POST['c_name']);
	$correo = htmlspecialchars($_POST['c_email']);
	$mensaje = htmlspecialchars($_POST['c_message']);

	$asunto="Mensaje de contacto en la página web";
	$destino="juan_27angel@hotmail.com";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //La codificación del email.

	$contenido='
	<html>
	<head></head>
	<body>
		<h3>'.$nombre.' ha enviado un mensaje a través de la página</h3>
		<hr/>
			<p>'.$mensaje.'</p>
			<br/>
			<p>Puedes ponerte en contacto con '.$nombre.' al correo: '.$correo.'</p>
		<hr/>
	</body>
	</html>
	';

	$envio = mail($destino, $asunto, $contenido, $headers);

	if($envio){
		echo "<script>alert('Informacion eviada exitosamente, redireccionando.');</script>";
		echo "<script>window.location.href='../index.html';</script>";
	}else{
		echo "<script>alert('intentelo de nuevo en unos momentos');</script>";
		echo "<script>window.location.href='../index.html';</script>";
	}

}

?>