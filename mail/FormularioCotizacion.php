<?php
if(empty($_POST['c_name']) ||
	empty($_POST['c_email']) ||
	empty($_POST['c_phone']) ||
	empty($_POST['fecha']) ||
	empty($_POST['opciones']) ||
	empty($_POST['c_message']) ||
	!filter_var($_POST['c_email'], FILTER_VALIDATE_EMAIL)){
	echo "<script>alert('Todos los campos son requeridos');</script>";
	echo "<script>window.location.href='index.html';</script>";
}

else{
	$nombre= htmlspecialchars($_POST['c_name']);
	$correo = htmlspecialchars($_POST['c_email']);
	$telefono = htmlspecialchars($_POST['c_phone']);
	$fecha = htmlspecialchars($_POST['fecha']);
	$opciones = htmlspecialchars($_POST['opciones']);
	$mensaje = htmlspecialchars($_POST['c_message']);

	$asunto="Mensaje de la página web";
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
			<p>Puedes ponerte en contacto con '.$nombre.' al correo: '.$correo.' o al teléfono: '.$telefono.'</p>
		<hr/>

		<p>Y la siguiente información:</p>
		<ul>
			<li><p>'.$opciones.'</p></li>
			<li><p>'.$fecha.'</p></li>
		</ul>
	</body>
	</html>
	';

	$envio = mail($destino, $asunto, $contenido, $headers);

	if($envio){
		echo "<script>alert('Informacion eviada exitosamente, redireccionando.');</script>";
		//Enviando autorespuesta
        $pwf_header = "From: juan_27angel@hotmail.com\n"
        ."Reply-to: juan_27angel@hotmail.com\n";
        $pwf_asunto = "Mensaje recibido";
        $pwf_dirigido_a = "$correo";
        $pwf_mensaje = "Muchas gracias $nombre por enviar su información desde la sección de contacto\n"
        ."Su mensaje ha sido recibido satisfactoriamente.\n"
        ."Nos pondremos en contacto lo antes posible a su e-mail: $correo\n"
        ."\n"
        ."\n"
        ."-----------------------------------------------------------------"
        ."Favor de NO responder este e-mail ya que es generado Automáticamente.\n"
        ."Atte: Grúas Zavala. \n"
        ."http://gruaszavala.mx";
        
        @mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);
		echo "<script>window.location.href='../index.html';</script>";
	}else{
		echo "<script>alert('Int&eacute;ntelo de nuevo en unos momentos');</script>";
		echo "<script>window.location.href='../index.html';</script>";
	}
}
?>