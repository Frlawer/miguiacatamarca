<?php
error_reporting(-1);
ini_set('display_errors', '1');

if (isset($_POST['agregarCliente']) == 'Agregar'){
	
	require_once('./clases/lugar.php');

	if ($_POST['persona'] == '' && $_POST['nombre'] == '' && $_POST['tier_two'] == ''){

		echo 'Alguno de los datos no fue correctamente completado';

	}else{

		$persona = htmlentities($_POST['persona'], ENT_QUOTES, "UTF-8");
		$nombre = htmlentities($_POST['nombre'], ENT_QUOTES, "UTF-8");
		$cat = $_POST['tier_two'];
		$dir = htmlentities($_POST['direccion'], ENT_QUOTES, "UTF-8");
		$tel = htmlentities($_POST['telefono'], ENT_QUOTES, "UTF-8");
		$text = htmlentities($_POST['text'], ENT_QUOTES, "UTF-8");
		$web = $_POST['web'];
		$fb = $_POST['fb'];
		$tw = $_POST['tw'];
		$email = $_POST['email'];

		if ($_POST['lat'] == '') {

			$coord = '';

		}else{

			$coord = $_POST['lat'].','.$_POST['lng'];

		}

		$url = post_slug($_POST['nombre']);
		$fecha = date('d/m/Y');

// Si cargaron una imagen la modifico y pego la marca de agua
		if (is_uploaded_file($_FILES['img']['tmp_name'])) {

			require_once('./clases/lib/WideImage.php');

// cambio el nombre
			$nombre_img = $_FILES['img']['name'];
			$ext = explode(".", $nombre_img);
			$extension = end($ext);
			$textimg = reset($ext);
			$nom_img = mt_rand(1, 99) . md5($textimg) . mt_rand(1, 99);
			$ruta = $nom_img;

// edito la imagen

			$img = WideImage::loadFromFile($_FILES['img']['tmp_name']);
			$watermark = WideImage::load('images/logowm.png');
			$redi = $img->resize(600,600);
			$new = $redi->merge($watermark, 'center', 'center', 100);
			$mover = 'images/u/'.$ruta.'.jpg';
			$save = $new->saveToFile($mover);

// Si no cargaron imagen dejo una por defecto
		}else{

			$ruta = '';

		}

		$lugar = new Lugar(
			NULL,
			$persona,
			$nombre,
			$cat,
			$dir,
			$tel,
			$web,
			$fb,
			$tw,
			$email,
			$ruta,
			$coord,
			$url,
			$text,
			0,
			1,
			$fecha
			);
		
		$lugar->insert();

	// email a mi
		require './mail/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->From = 'hola@miguiacatamarca.com';
		$mail->FromName = 'Mi Guia Catamarca';
		$mail->addAddress('hola@miguiacatamarca.com', 'Mi Guia Catamarca');
		$mail->addReplyTo('hola@miguiacatamarca.com', 'Mi Guia Catamarca');
		$mail->isHTML(true);
		$mail->Subject = 'Nuevo local agregado a Mi guia catamarca';
		$mail->Body = '<h1>Ha sido agregado un nuevo local</h1><p>'.$nombre.'</p><p>'.$email.'</p><p>'.$persona.'</p><p><a href="http://miguiacatamarca.com/lugar/'.$url.'">Url</a></p><p><img src="http://miguiacatamarca.com/images/u/'.$ruta.'.jpg" width="400px"></p>';
		$mail->AltBody = 'Ha sido agregado un nuevo local '.$nombre.' '.$email.' '.$persona.' ';

		if(!$mail->send()){echo 'Error: '.$mail->ErrorInfo;}

	// email a cliente
		$mail2 = new PHPMailer;
		$mail2->From = 'hola@miguiacatamarca.com';
		$mail2->FromName = 'Mi Guia Catamarca';
		$mail2->addAddress($email, $persona);
		$mail2->addReplyTo('hola@miguiacatamarca.com', 'Mi Guia Catamarca');
		$mail2->isHTML(true);
		$mail2->Subject = 'Has agregado tu comercio a Mi Guia Catamarca';
		$mail2->Body = '<h1 style="text-align:center"><a href="http://miguiacatamarca.com"><img src="http://miguiacatamarca.com/images/logo.png" alt="Mi Guía Catamarca"></a></h1>
			<h2>Gracias por agregar tu comercio a Mi Gu&iacute;a Catamarca!</h2>
			<p>Ya puedes invitar a tus amigos a visitarlo compartiendo este <a href="http://miguiacatamarca.com/lugar/'.$url.'">enlace</a>:</p>
			<p>Recuerda que si deseas agregar una imagen solo debes etiquetar a @miguiacatamarca en Facebook o Twitter con la foto y te la cargamos.</p>
			<p>Si crees que cometiste un error al cargar tus datos no dudes en escribirnos un mensaje a <a href="mailto:editar@miguiacatamarca.com">editar@MiGuiaCatamarca.com</a></p>
			<p>Este es un mensaje automático. Si deseas contactarnos utiliza nuestro formulario de<a href="http://www.miguiacatamarca.com/contacto"> Contacto</a></p>
			<p>Si usted no solicitó agregar su comercio a Mi Gu&iacute;a Catamarca, envienos un email a <a href="mailto:reclamos@miguiacatamarca.com">reclamos@miguiacatamarca.com</a>.</p><br>
			<p>© 2014 Mi Gu&iacute;a Catamarca. Todos los derechos reservados</p>
		';
		$mail2->AltBody = 'Gracias por agregar tu comercio a Mi Gu&iacute;a Catamarca! Ya puedes invitar a tus amigos a visitarlo compartiendo este enlace. Recuerda que si deseas agregar una imagen solo debes etiquetar a @miguiacatamarca en Facebook o Twitter con la foto y te la cargamos. Si crees que cometiste un error al cargar tus datos no dudes en escribirnos un mensaje a editar@miguiacatamarca.com. Este es un mensaje automático. Si deseas contactarnos utiliza nuestro formulario: http://miguiacatamarca.com/contacto. Si usted no solicitó agregar su comercio a Mi Gu&iacute;a Catamarca, envienos un email a reclamos@miguiacatamarca.com. © 2014 Mi Gu&iacute;a Catamarca. Todos los derechos reservados';

		if(!$mail2->send()){

			echo 'Error: '.$mail2->ErrorInfo;
			
		}else{

			echo'<h2>Gracias por agregar tu lugar.!</h2><h3>Tus datos fueron cargados correctamente</h3><p>Recibiras un email con los datos del mismo para que puedas compartirlo.!</p><p>Un administrador revisará los mismos para dar de alta tu lugar</p><p>También puedes revisar nuestras propuestas publicitarias <a href="/publicidad">AQUÍ</a></p>';

		}

	}

}else{

	require_once('select.php') ?>
	<div id="fb-root"></div>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#drop_1').change(function(){
			$('#wait_1').show();
			$('#result_1').hide();
			$.get("select.php", {
				func: "drop_1",
				drop_var: $('#drop_1').val()
			}, function(response){
				$('#result_1').fadeOut();
				setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
			});
			return false;
		});
	});

	function finishAjax(id, response) {
	    $('#wait_1').hide();
	    $('#' + id).html(unescape(response));
	    $('#' + id).fadeIn();
	}
	</script>
	<div class="12u" id="cargar">
		<h2 class="12u">Ingresa los datos de tu Local</h2>
    	<h3>Los datos marcados con <i class="i-checkmark"></i> son obligatorios</h3>
	    <form method="post" name="upcliente" action="" enctype="multipart/form-data">
			<div class="5u">
		    	<p>
		    		<label for="persona"><i class="i-user"></i> Persona responsable: <i class="i-checkmark"></i></label>
		    		<input type="text" name="persona" class="text" required placeholder="Nombre y Apellido" autofocus/>
		    	</p>
		    	<p>
		    		<label for="nombre"><i class="i-office"></i> Nombre del lugar: <i class="i-checkmark"></i></label>
		    		<input type="text" name="nombre" class="text" required placeholder="Nombre Comercial"/>
		    	</p>
		    	<p>
		    		<label for="categoria"><i class="i-profile"></i> Actividad del comercio: <i class="i-checkmark"></i></label>
		    		<select name="drop_1" id="drop_1" required >
		    			<option value="" selected="selected" disabled="disabled">Selecciona un Rubro</option>
		    			<?php getTierOne(); ?>
		    		</select>
		    		<span id='wait_1' style='display: none;'>
		    			<img alt='Por favor espera' src='/images/ajax-loader.gif'/>
		    		</span>
		    		<span id='result_1' style='display: none;'></span>
		    	</p>
	    		<p>
	    			<label for='direccion'><i class="i-location"></i> Dirección:</label>
	    			<input type='text' name='direccion' class='text' placeholder="Calle y numero"/>
	    		</p>
	    		<p>
	    			<label for='telefono'><i class="i-phone"></i> Teléfono:</label>
	    			<input type='text' name='telefono' class='text' placeholder="000-0000000 - 0000000"/>
	    		</p>
	    		<p>
	    			<label for='email'><i class="i-mail"></i> Email: <i class="i-checkmark"></i></label>
	    			<input type='email' name='email' class='email' required placeholder="email@email.com"/>
	    		</p>
	    		<p>
	    			<label for='web'><i class="i-link"></i> Web:</label>
	    			<input type='text' name='web' class='text' placeholder="http://miweb.com"/>
	    		</p>
	    		<p>
	    			<label for='fb'><i class="i-facebook"></i> Facebook:</label>
	    			<input type='text' name='fb' class='text' placeholder="http://facebook.com/tufb"/>
	    		</p>
	    		<p>
	    			<label for='tw'><i class="i-twitter"></i> Twitter:</label>
	    			<input type='text' name='tw' class='text' placeholder="http://twitter.com/usuario"/>
	    		</p>
			</div>
			<div class="-1u 5u">
				<p>
	    			<label for="text"><i class="i-image"></i> Imagen</label>
					<input type="file" name="img" class="text" />
				</p>
	    		<p>
	    			<label for="text"><i class="i-edit"></i> Descripción de tu comercio</label>
	    			<textarea name="text" class="text" cols="30" rows="10"></textarea>
	    		</p>
	    		<label><i class="i-location"></i> Click sobre la ubicación</label>
	    		<p id="mapas"></p>
	    		<p style="display:none">
	    			<input type='text' id="lat" name='lat' class='text' />
	    		</p>
	    		<p style="display:none">
	    			<input type='text' id="lng" name='lng' class='text' />
	    		</p>
	    		<p>
	    			<div class="g-recaptcha" data-sitekey="6Ld4qPoSAAAAAIF4fy_nSrv2uUecH9jQRADIiRUB"></div>

				<!-- <script type="text/javascript">
				var RecaptchaOptions = {
					theme : 'white'
				};
				</script> -->
				<?php
				// require_once('./recaptcha/recaptchalib.php');
				// $publickey = "6Ld4qPoSAAAAAIF4fy_nSrv2uUecH9jQRADIiRUB";
				// echo recaptcha_get_html($publickey);
				// ?>
	    		</p>
	   			<input class='button' type='submit' value='Agregar nuevo comercio'  name='agregarCliente'>
	   			<br>
			</div>
    	</form>
	</div>
	<script>
		    var map;
		    prettyPrint();
		    map = new GMaps({
		        div: '#mapas',
		        height: '300px',
		        width: '400px',
				lat: -28.4667867,
				lng: -65.7760949,
		        zoom: 14,
		        disableDefaultUI: true
		    });
		    map.addStyle({
				styledMapName: "Places off",
				styles: [{
					featureType:"all",
					elementType:"all",
					stylers:[{
						saturation:-100},
						{
							gamma:0.5
						}]
					},{
					featureType: "poi",
					stylers: [{
						visibility: "off"
					}]
				}],
				mapTypeId: "hide_places"
			});

			map.setStyle('hide_places');

		    if (map.addMarker) {
			    GMaps.on('marker_added', map, function (marker) {
			        $('#lat').val(marker.getPosition().lat().toFixed(7));
			        $('#lng').val(marker.getPosition().lng().toFixed(7));
			    });
		        GMaps.on('click', map.map, function (event) {
		            var lat = event.latLng.lat();
		            var lng = event.latLng.lng();
		            map.removeMarkers();
		            map.addMarker({
		                lat: lat,
		                lng: lng
		            });
		        });
		    } else {
		        GMaps.on('click', map.map, function (event) {
		            var lat = event.latLng.lat();
		            var lng = event.latLng.lng();

		            map.addMarker({
		                lat: lat,
		                lng: lng
		            });
		        });
		    };

      	</script>
<?php } ?>