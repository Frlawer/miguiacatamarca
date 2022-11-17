<?php
if (empty($_POST['q'])) {?>
<div class="12u">
	<p>
		No hay nada por aquí
	</p>
	<form method="post" action="">
		<input type="text" name="q" required >
		<input type="submit" name="enviar" value="Buscar.." class="button" >
	</form>
</div>
<?php }else{
	require_once('./clases/busc.php');
	if ($_POST['q']) {
		$q = strip_tags($_POST['q']);
		// busqueda de lugares
		$lug = new Q($q);
		$lug->Qlug();
		// busqueda de categorias
		$cat = new Q($q);
		$cat->Qcat();
		?>
		<div class="8u">
			<form method="post" action="">
				<input type="text" name="q" class="text" required>
				<div class="i-search button">
					<input type="submit" name="enviar" value="Buscar.." />
				</div>
			</form>
			<div class="12u">
				<h2>Resultados de búsqueda relacionados con: <?php echo $q ?></h2>
			</div>
		<?php if (empty($lug->rows[0])): ?>
		<?php else: ?>
			<h2 class="12u button">Lugares</h2>
		    <ul>
		    <?php
		    foreach ($lug->rows as $key) {
		    ?>
		    <li class="6u actions">
				<i aria-hidden="true" class="i-checkmark listar-categorias"></i>
				<a href="lugar/<?php echo $key['url'] ?>" class="listar-categorias">
					<?php echo $key['nombre']?>
				</a>
			</li>
			<?php }?>
		    </ul>
		<?php endif ?>
		<?php if (empty($cat->rows[0])): ?>
		<?php else: ?>
		    <h2 class="12u button">Categorias</h2>
		    <ul>
			<?php
			foreach ($cat->rows as $key2) {?>
			<li class="6u actions">
				<i aria-hidden="true" class="i-checkmark listar-categorias"></i>
				<a href="categoria/<?php echo $key2['url'] ?>" class="listar-categorias">
					<?php echo $key2['nombre']?>
				</a>
			</li>
			<?php }?>
		    </ul>
		<?php endif ?>
		<?php
	}
}?>
		</div>
<?php include_once('template/aside.php') ?>