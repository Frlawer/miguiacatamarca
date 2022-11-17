<?php
if (isset($_REQUEST['urlcat'])) {
	$urlcat = $_REQUEST['urlcat'];
	require_once('./clases/categoria.php');
	require_once('./clases/lugar.php');
	$cat = new Categoria(NULL,NULL,NULL,$urlcat);
	$cat->ObtenerNombre();

	$id = $cat->rows[0]['id'];
	$nombre = $cat->rows[0]['nombre'];
	$id_padre = $cat->rows[0]['id_padre'];
	$url = $cat->rows[0]['url'];

	$lugar = new Lugar();
	$lugar->ListarLugarCategoria($id);
	$datos = $lugar->rows;
	?>
	<div class="8u">
		<h2><?php echo $nombre ?></h2>
		<div class="row half">
		<?php if (empty($datos)) { ?>
			<h2>Esta Categoria se encuentra vacia o no existe</h2>
			<p>
				Puedes elegir otra Categoria para poder visualizar mas anunciantes
			</p>
			<p>
				O agregar tu negocio.
			</p>
			<p>
				<a href="/agregar-lugar" class="button">Agregar Negocio</a>
			</p>
			<p>
				<a href="/contacto">Contacto con Mi Guía Catamarca</a>
			</p>
			<p>
				<a href="http://facebook.com/miguiacatamarca">Facebook</a>
			</p>
		<?php }else{
			foreach ($lugar->rows as $key) {
				$id_lugar = $key['id'];
				$persona = $key['persona'];
				$nombre_lugar = $key['nombre'];
				$categoria = $key['categoria'];
				$direccion = $key['direccion'];
				$telefono = $key['telefono'];
				$web = $key['web'];
				$email = $key['email'];
				$img = $key['img'];
				$coord = $key['coord'];
				$url_lugar = $key['url'];
				$fecha = $key['fecha'];
				?>
				<div class="4u" style="text-align:center;">
					<div class="img-cliente 12u">
						<a href="/lugar/<?php echo $url_lugar ?>">
							<img src="/images/<?php if(!empty($img)){echo "u/".$img.".jpg";}else{echo "default.png";} ?>" style="width:100%" />
							<span><?php echo $nombre_lugar ?></span>
						</a>
					</div>
				</div>
			<?php }
		}
} ?>
		</div>
		<div class="12u">
			<div id="socialshare">
				<div id="shareme" data-text="<?php echo $nombre ?> en Mi Guía Catamarca"></div>
			</div>
			<script>
			$('#shareme').sharrre({
				share: {
					googlePlus: true,
					facebook: true,
					twitter: true
				},
				buttons: {
					googlePlus: {size: 'tall', annotation:'bubble', lang: 'es-419'},
					facebook: {layout: 'box_count',lang: 'es_LA'},
					twitter: {count: 'vertical', via: 'miguiacatamarca',hashtags: 'miguiacatamarca',lang: 'es'}
				},
				enableHover: false,
				enableCounter: false,
				enableTracking: true
			});
			</script>
		</div>
		<div class="12u">
			<a href="/agregar-lugar"><img src="/images/publicidad_ancho.jpg" alt="Publicita aquí" width="100%" /></a>
		</div>
	</div>
	<!-- /Lista de Empresas -->
	<?php require_once('template/aside.php') ?>