<?php
	//set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\torneo');
	// require 'PHPMailerAutoload.php';
	require 'PHPMailerAutoload.php';
	if($_POST && isset($_POST['nombre'], $_POST['email'],$_POST['mensaje'])){
		//
		// var_dump($_POST);
		$nombre=$_POST['nombre'];
		$email=$_POST['email'];
		$asunto=$_POST['asunto'];
		$mensaje=$_POST['mensaje'];

		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;                               // Activa mensajes de depuración

		$mail->CharSet="UTF-8";	//Configura la codificacion a UTF-8
		$mail->isSMTP();                                      // Configura STMP como protocolo de envío
		$mail->Host = "folhadoce.com.mx";  // Especifica el servidor SMTP, puede haber más de uno
		$mail->SMTPAuth = true;                               // Activa la autenticación por SMTP
		$mail->Username = "midtown@folhadoce.com.mx";
		$mail->Password = "demo1234";
		//$mail->SMTPSecure = 'ssl';                            // Actica la autenticación por SMTP, 'tls' es aceptado
		$mail->Port = 25;                                    // Puerto por el que enviará el correo

		$mail->From = "midtown@folhadoce.com.mx";
		$mail->FromName = "KIO MIDTOWN";
		$mail->addAddress("midtown@folhadoce.com.mx");     // Añade un destinatario
		$mail->addAddress($email);
		//$mail->addAddress("webmaster@copatimon.org");     // Añade un destinatario
		$mail->addReplyTo($email, $nombre);

		//$mail->addAttachment('../extras/Copa_Timon_Liberacion_de_Responsabilidad.doc');    // Añade un archivo adjunto, el nombre es opcional
		$mail->isHTML(true);                                  // Activa el formateo HTML para el mensaje

		$mail->Subject = 'Nuevo mensaje recibido: '.$asunto;
		$mail->Body='Este correo es enviado automáticamente al recibir un nuevo mensaje: <br><br>'.$mensaje;
		$mail->AltBody = 'Este correo es enviado automáticamente al recibir un nuevo mensaje: '.$mensaje;

		if(!$mail->send()) {
			$mail->send();
		    //echo 'El mensaje no pudo ser enviado';
		    //echo 'Error de Mailer ' . $mail->ErrorInfo;
		    //echo 'Envía el siguiente enlace al correo del tutor para terminar el proceso de inscripción '.$rand;
		    //header("Location:../usuario.php");
		} else {
		    echo 'El mensaje ha sido enviado';
		    //header("Location:../usuario.php");
		}
	}else{
		echo "No enviado";
	}
?>