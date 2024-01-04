<?php require_once('template/head.php') ?>
		<!-- Main -->
			<div id="nuevo" class="container">
<?php
// Si no enviaron nada por POST Muestro formulario
if(empty($_POST)){ ?>

				<div class="row">
					<div class="8u" id="cargar">
						<form method="post" name="clasificado" action="" enctype="multipart/form-data" >
							<div class="row mgbt">
					    		<label for="nombre" class="4u">
					    			<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-user fa-stack-1x"></i>
									</span>
					    			Nombre de Contacto:
					    		</label>
					    		<div class="8u">
						    		<input type="text" name="nombre" required placeholder="Nombre Apellido" autofocus/>
					    		</div>
					    	</div>
				    		<div class="row mgbt">
				    			<label for="email" class="4u">
					    			<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-envelope-o fa-stack-1x"></i>
									</span>
				    				Email:
				    			</label>
					    		<div class="8u">
					    			<input type="email" name="email" placeholder="email@email.com" />
					    		</div>
				    		</div>
				    		<div class="row mgbt">
				    			<label for="telefono" class="4u">
					    			<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-phone fa-stack-1x"></i>
									</span>
				    				Teléfono:
				    			</label>
					    		<div class="8u">
					    			<input type="text" name="telefono" placeholder="383 0000000" />
					    		</div>
				    		</div>
							<div class="row mgbt">
					    		<label for="titulo" class="4u">
					    			<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-header fa-stack-1x"></i>
									</span>
					    			Titulo del clasificado:
					    		</label>
						    	<div class="8u">
						    		<input type="text" name="titulo" placeholder="Titulo del Clasificado" required />
						    	</div>
					    	</div>
					    	<div class="row mgbt">
					    		<label for="categoria" class="4u">
				    				<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-list-ol fa-stack-1x"></i>
									</span>
					    			Categoria del clasificado:
					    		</label>
					    		<div class="select-wrapper 8u">
						    		<select name="categoria" required >
						    			<option value="" selected="selected" disabled="disabled">
						    				Selecciona una categoria
						    			</option>
						    			<option value="1">Compra-Venta</option>
						    			<option value="2">Vehiculos</option>
						    			<option value="3">Inmuebles</option>
						    			<option value="4">Empleo</option>
						    		</select>
					    		</div>
					    	</div>
					    	<div class="row mgbt">
					    		<label for="texto" class="4u">
					    			<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-list fa-stack-1x"></i>
									</span>
					    			Texto del clasificado:
					    		</label>
						    	<div class="8u">
						    		<textarea name="texto" required placeholder="Texto del Clasificado"></textarea>
						    	</div>
					    	</div>
				    		<div class="row mgbt">
				    			<label for="img" class="4u">
				    				<span class="fa-stack fa-lg">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-image fa-stack-1x"></i>
									</span>
				    				Imagen:
				    			</label>
					    		<div class="8u">
					    			<input type="file" name="img" id="imagen" />
					    		</div>
				    		</div>
				    		<div class="row mgbt">

								<script type="text/javascript">
								var RecaptchaOptions = {
									theme : 'clean'
								};
								</script>
				    			<?php
								require_once('../recaptcha/recaptchalib.php');
								$publickey = "6Ld4qPoSAAAAAIF4fy_nSrv2uUecH9jQRADIiRUB";
								echo recaptcha_get_html($publickey);
								?>

				    		</div>
				    		<input class="button special icon fa-check 6u" type="submit" value="Agregar"  name="nuevo">
						</form>

					</div>
					<div class="4u">
						<?php require_once('template/lateral.php'); ?>
					</div>
				</div>

<?php
// Si enviaron el formulario y post no esta vacio continuo
}elseif(isset($_POST) && $_POST !== ''){
// incluyo el captcha
	require_once('../recaptcha/recaptchalib.php');
	$privatekey = "6Ld4qPoSAAAAAOjSDQPcVADP4MisfF9UWlHijEkI";
	$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
// Si el captcha fue incorrecto muestro mensaje
	if (!$resp->is_valid) {
		die ("El captcha fue ingresado incorrectamente, intentelo nuevamente." .
			"(reCAPTCHA error: " . $resp->error . ")");
// Si fue correcto el captcha continuo
	} else {
// Array con los datos para validarlos
		$lista_de_campos = array(
			'nombre'=>array('personal_name', true, 6, 100),
			'categoria'=>array('numeric', true),
			'titulo'=>array('string', true, 6, 150, true),
			'texto'=>array('string', true, 10, 3000, true),
			'telefono'=>array('numeric', true, true),
			'email'=>array('email', true)
			);
// Valido los datos
		require_once('../clases/phpformvalidator.php');
		$fv = new FormValidator('POST', $lista_de_campos);
// Si son incorrectos envio mensaje con el campo incorrecto
		if($fv->invalid_fields) {
			print '<h3 class="align-center" id="error"><span class="fa-stack fa-lg">
			<i class="fa fa-square-o fa-stack-2x"></i>
			<i class="fa fa-exclamation fa-stack-1x"></i>
			</span>Ups te equivocaste: </h3>';
			?>
			<ul class="box alt">

				<?php
				foreach ($fv->invalid_fields as $key => $value) {
					switch ($key) {
						case 'nombre':
						echo '<li class="align-center"><i class="icon fa-user"></i> <span>Debes ingresar un nombre valido con mayuscula la primera letra.</span></li>';
						break;
						case 'titulo':
						echo '<li class="align-center"><i class="icon fa-phone"></i> <span>Debes ingresar un titulo valido (hasta 150 caracteres).</span></li>';
						break;
						case 'texto':
						echo '<li class="align-center"><i class="icon fa-file-text-o"></i> <span>Debes ingresar unicamente texto, unicamente puedes ingresar un - entre los numeros.</span></li>';
						break;
						case 'telefono':
						echo '<li class="align-center"><i class="icon fa-phone"></i> <span>Debes ingresar un telefono valido, unicamente puedes ingresar un - entre los numeros.</span></li>';
						break;
						case 'email':
						echo '<li class="align-center"><i class="icon fa-envelope-o"></i> <span>Debes ingresar un email valido.</span></li>';
						break;
						default:
						echo '<a href="nuevo" class="button special">Cargar de nuevo</a>';
						break;
					}
					echo '<a href="nuevo" class="button special">Cargar de nuevo</a>';
				} ?>
			</ul>
		<?php
// Si los datos son correctos edito la imagen
		}else{

				$data = $fv->form_data;
// Si cargaron una imagen la modifico y pego la marca de agua
				if (is_uploaded_file($_FILES['img']['tmp_name'])) {

					require_once('lib/WideImage.php');

// cambio el nombre
					$nombre_img = $_FILES['img']['name'];
					$ext = explode(".", $nombre_img);
					$extension = end($ext);
					$textimg = reset($ext);
					$nom_img = mt_rand(1, 99) . md5($textimg) . mt_rand(1, 99) . "." . $extension;
					$ruta = "images/i/" . $nom_img;

// edito la imagen

					$img = WideImage::loadFromFile($_FILES['img']['tmp_name']);
					$watermark = WideImage::load('images/logowm.png');

					$redi = $img->resize(600,600);
					$new = $redi->merge($watermark, 'center', 'center', 100);
					$save = $new->saveToFile($ruta);

// Si no cargaron imagen dejo una por defecto
				}else{
					$ruta = "images/default.jpg";
				}
// la fecha de carga
				$fecha = date('Y-m-d');

// Envio los datos a la base de datos
				$subir = new Clasificado(
					null,
					htmlspecialchars($data['nombre']),
					$data['categoria'],
					htmlspecialchars($data['titulo']),
					htmlspecialchars($data['texto']),
					$data['telefono'],
					$data['email'],
					$ruta,
					0,
					0,
					$fecha
					);
				$subir->insertar();
// Muestro el mensaje de clasificado cargado.
				echo '<div class="button special">Clasificado Agregado.!!</div>';
// Muestro el mensaje de clasificado cargado.
			}
		}
	} ?>
			</div>

<?php require_once('template/footer.php'); ?>