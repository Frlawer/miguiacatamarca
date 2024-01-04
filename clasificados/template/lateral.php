<?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>

	<h3>Todos los Clasificados en un solo lugar</h3>
	<p>Vende, compra o alquila en Clasificados Mi Guía Catamarca.</p>
	<a href="/nuevo" class="button special" title="Nuevo Clasificado">Agregar Clasificado</a>
	<hr>
	<p>No te olvides que si tenes un comercio, ofreces un servicio, sos profesional, dictas cursos o capacitaciones, u ofreces servicio de delivery no te olvides que podes agregar en nuestra guía tus datos para que los visitantes de Mi Guía Catamarca puedan encontrarte más facilmente.</p>
	<a href="http://miguiacatamarca.com/agregar-lugar" class="button special" title="Agregá tu comercio, servicio o profesion">Agregar un comercio a Mi Guía Catamarca</a>

<?php elseif(basename($_SERVER['PHP_SELF']) === 'categoria.php'): ?>
	<section id="categoria">
		<h3>Más vistos de la Categoria</h3>
		<?php
		$id = $_GET['id'];
		$masvisto = new Clasificado();
		$masvisto->getMasVistosCat($id);
		?>
		<ul class="alt">
			<?php foreach ($masvisto->rows as $mas => $masdato): ?>
			<li><a href="/clasificado/<?php echo $masdato['categoria'] ?>-<?php echo $masdato['id'] ?>" title="<?php echo $masdato['titulo'] ?>"><?php echo $masdato['titulo'] ?></a></li>
			<?php endforeach ?>
		</ul>
	</section>
	<section id="categoria">
		<h3>Ultimos Clasificados</h3>
		<?php
		$ultimos = new Clasificado();
		$ultimos->selectUltimos();?>
		<ul class="alt">
			<?php foreach ($ultimos->rows as $key => $value): ?>
				<li>
					<a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>" title="<?php echo $value['titulo'] ?>">
						<?php echo $value['titulo'] ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</section>

<?php elseif(basename($_SERVER['PHP_SELF']) === 'clasificado.php'): ?>

	<section id="clasificado">
		<h3>Más vistos de la Categoria</h3>
		<?php
		$id = $_GET['tipo'];
		$masvisto = new Clasificado();
		$masvisto->getMasVistosCat($id);
		?>
		<ul class="alt">
			<?php foreach ($masvisto->rows as $mas => $masdato): ?>
			<li><a href="/clasificado/<?php echo $masdato['categoria'] ?>-<?php echo $masdato['id'] ?>" title="<?php echo $masdato['titulo'] ?>"><?php echo $masdato['titulo'] ?></a></li>
			<?php endforeach ?>
		</ul>
	</section>
	<section id="clasificado">
		<h3>Ultimos Clasificados</h3>
		<?php
		$ultimos = new Clasificado();
		$ultimos->selectUltimos();?>
		<ul class="alt">
			<?php foreach ($ultimos->rows as $key => $value): ?>
				<li>
					<a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>" title="<?php echo $value['titulo'] ?>">
						<?php echo $value['titulo'] ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</section>

<?php elseif(basename($_SERVER['PHP_SELF']) === 'nuevo.php'): ?>

	<h3>También Comercios y Servicios</h3>
	<p>Si tenes un comercio, ofreces un servicio, sos profesional, dictas cursos o capacitaciones, u ofreces servicio de delivery no te olvides que podes agregar en nuestra guía tus datos para que los visitantes de Mi Guía Catamarca puedan encontrarte más facilmente.</p>
	<a href="http://miguiacatamarca.com/agregar-lugar" class="button special" title="Agregá tu comercio, servicio o profesion">Agregar un comercio a Mi Guía Catamarca</a>
<?php endif ?>