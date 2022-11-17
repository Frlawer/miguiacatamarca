<div id="content" class="12u">
	<!-- Lista de Empresas -->
	<article>
		<?php
		if (isset($_POST['enviar_msj']) != ''){
			// renombro las variables enviadas por post
				$nombre_msj = $_POST['nombre_msj'];
				$email_msj = $_POST['email_msj'];
				$mensaje = $_POST['mensaje'];
				$id_r = $_POST['id_r'];
				// llamo a la clase cliente para consultar el email del cliente
				include_once('./clases/lugar.php');
				$lugar = new Lugar($id_r);
				$lugar->ObtenerLugarMail();
				$email = $lugar->rows[0]['email'];

				// Varios destinatarios
				$para  = $lugar->rows[0]['email'];
				$nombredest  = $lugar->rows[0]['nombre'];
		// email a mi
				require './mail/PHPMailerAutoload.php';
				$mail = new PHPMailer;
				$mail->From = $para;
				$mail->FromName = $nombredest;
				$mail->addAddress($email_msj, $nombre_msj);
				$mail->addBCC('mensajes@miguiacatamarca.com');
				$mail->addReplyTo($email_msj, $nombre_msj);
				$mail->isHTML(true);
				$mail->Subject = 'Contacto de '.$nombre_msj.' | Mi Guia Catamarca';
				$mail->Body = '<p>Saludos '.$nombredest.'</p><p>Contacto desde <a href="http://miguiacatamarca.com/lugar/'.$lugar->rows[0]['url'].'">Mi Guía Catamarca</a></p><p>'.$mensaje.'</p><p>Puedes responder este mensaje haciendo click <a href="mailto:'.$email_msj.'" target="_blank">aqui</a></p><p>Este email fue enviado desde la web de Mi Guia Catamarca</p>';
				$mail->AltBody = 'Saludos '.$nombredest.'. Contacto desde Mi Guía Catamarca. '.$mensaje.'. Puedes responder este mensaje haciendo click '.$email_msj.' aqui. Este email fue enviado desde la web de Mi Guia Catamarca';
				if(!$mail->send()){echo '<h3>Por problemas tecnicos este mensaje no fue enviado, contacte al administrador.</h3>';}else{ echo '<h3 class="titulo-cliente">Mensaje enviado a '.$nombredest.'</h3><p>Volver a <a href="/lugar/'.$lugar->rows[0]['url'].'">'.$nombredest.'</a></p>'; }
			
		}elseif(isset($_POST['id']) != ''){
			$idlugar = $_POST['id']; ?>
		<form method="post" action="">
			<p>
				<label for="nombre_msj">
					Nombre:
				</label>
				<input type="text" name="nombre_msj" class="text" />
			</p>
			<p>
				<label for="email_msj">
					Email:
				</label>
				<input type="email" name="email_msj" class="text" />
			</p>
			<p>
				<label for="mensaje">
					Mensaje:
				</label>
				<textarea type="text" name="mensaje" cols="20" rows="3"></textarea>
			</p>
			<p>
				<div class="g-recaptcha" data-sitekey="6Ld4qPoSAAAAAIF4fy_nSrv2uUecH9jQRADIiRUB"></div>
	    	</p>
			<input type="text" value="<?php echo $idlugar ?>" name="id_r" style="display:none"/>
			<input type="submit" class="button" value="Enviar" name="enviar_msj" />
		</form>
		<?php
		}else{
			echo 'No Existe este cliente, por favor vuelve a la pagina del cliente y presione el boton contactar';
		} ?>
	</article>
	<!-- /Lista de Empresas -->
</div>