<?php
include_once('./clases/conn.php');

		// Conectar y verificar
	if(isset($_POST['enviado'])){
		
		if (!$resp->is_valid) {

			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			$comentario = $_POST['comentario'];
	// email a mi
			require './mail/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->From = $email;
			$mail->FromName = $nombre;
			$mail->addAddress('mensajes@miguiacatamarca.com', 'Mi Guia Catamarca');
			$mail->addReplyTo('mensajes@miguiacatamarca.com', 'Mi Guia Catamarca');
			$mail->isHTML(true);
			$mail->Subject = 'Mensaje enviado desde el formulario de contacto de Mi Guia Catamarca';
			$mail->Body = '<p>Saludos </p><p>Nombre: '.$nombre.'</p><p>Email: '.$email.'</p><p>Telefono: '.$telefono.'</p><p>Mensaje: '.$comentario.'</p><p>Este email fue enviado desde la web de Mi Guía Catamarca</p>';
			$mail->AltBody = 'Saludos Nombre: '.$nombre.' Email: '.$email.' Telefono: '.$telefono.' Mensaje: '.$comentario.' Este email fue enviado desde la web de Mi Guía Catamarca';
			if(!$mail->send()){echo '<h3>Por problemas tecnicos este mensaje no fue enviado, contacte al administrador.</h3>';}else{ echo '<div class="row"><p class="12u">Gracias '.$nombre.' por ponerte en contacto con nosotros.</p><p class="12u">A la brevedad nos pondremos en contacto contigo.</p><p class="12u">Saludos de Mi Guia Catamarca</p></div>'; }
		}
	}else{
		echo "
		<div class='4u'>&nbsp;</div>
		<div class='row'>
		<h3 class='4u'>Ingresa tus datos</h3>
		</div>
		<div class='4u'>&nbsp;</div>
		";

	}
?>
							
									<!-- Post -->
										<article class="is-post">
											<div class="features-wrapper">
												<div class="info">
													<form class="form-1" method="post" action="" >
														<p class="field">
															<input class="text" type="text" name="nombre" placeholder="Nombre" required >
														</p>
														<p class="field">
															<input class="text" type="email" name="email" placeholder="Email" required>
														</p>
														<p class="field">
															<input class="text" type="text" name="telefono" placeholder="Telefono" required>
														</p>
														<p>
															<textarea rows="5" cols="30" name="comentario" required placeholder="Dejanos tu consulta o pedido" required></textarea>
														</p>
														<p> 
															<div class="g-recaptcha" data-sitekey="6Ld4qPoSAAAAAIF4fy_nSrv2uUecH9jQRADIiRUB"></div>
														</p>
														<p class="submit">
															<button type="submit" name="enviado" class="button">Enviar</button>
														</p>
													</form>
												</div>
											</div>
										</article>