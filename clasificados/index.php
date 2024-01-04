<?php require_once('template/head.php') ?>
		<!-- Main -->
				<div id="inicio" class="row">
					<div class="8u">
						<div class="row">
							<div class="6u">
								<?php
								$destacados = new Clasificado();
								$destacados->selectMasVistos();?>
								<h3>Más Visitados</h3>
								<ul class="alt">
								<?php foreach ($destacados->rows as $key => $value): ?>
									<li>
										<a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>" title="<?php echo $value['titulo'] ?>">
										<?php echo $value['titulo'] ?>
										</a>
									</li>
								<?php endforeach ?>
								</ul>
							</div>
							<div class="6u">
								<?php
								$ultimos = new Clasificado();
								$ultimos->selectUltimos();?>
								<h3>Ultimos Clasificados</h3>
								<ul class="alt">
									<?php foreach ($ultimos->rows as $key => $value): ?>
										<li>
											<a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>" title="<?php echo $value['titulo'] ?>">
												<?php echo $value['titulo'] ?>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="4u">
						<?php require_once('template/lateral.php'); ?>
					</div>
				</div>
<?php require_once('template/footer.php') ?>
