<?php require_once('template/head.php') ?>
		<!-- Main -->
			<div id="clasificado" class="container">

				<div class="row">

					<div class="9u box">
						<?php
						if (isset($_GET['num']) !== '') {
							$clas = new Clasificado();
							$clas->selectClassId($_GET['num']);
							$clas->updateCount2($_GET['num']);
							foreach ($clas->rows as $key => $value) {?>

								<header class="12u align-center mgbt">
									<h3><i class="icon fa-newspaper-o"></i> <?php echo $value['titulo'] ?></h3>
								</header>

								<div class="row">

									<div class="5u">
										<span class="image fit">
											<img src="/<?php echo $value['img'] ?>" alt="<?php echo $value['titulo'] ?>">
										</span>
										<div class="12u">
											<div id="socialshare">
												<div id="socialsh" data-text="<?php echo $clas->rows[0]['titulo'] ?> en Mi Guía Catamarca"></div>
											</div>
											<script>
											$('#socialsh').sharrre({
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
									</div>

									<div class="7u">
										<ul class="alt">
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-user 1u"></i>
													<p class="11u"><?php echo $value['nombre'] ?></p>
												</div>
											</li>
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-file-text-o 1u"></i>
													<p class="11u"><?php echo $value['texto'] ?></p>
												</div>
											</li>
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-phone 1u"></i>
													<p class="11u"><?php echo $value['telefono'] ?></p>
												</div>
											</li>
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-calendar 1u"></i>
													<code class="6u">Publicado el día <?php
														$fecha = explode('-',$value['fecha']);
														echo $fecha[2].'-'.$fecha[1].'-'.$fecha[0]; ?></code>
												</div>
											</li>
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-eye 1u"></i>
													<code class="6u">Visualizado por <?php echo $value['vistas'] ?> personas</code>
												</div>
											</li>
											<li>
												<div class="row quarter no-collapse">
													<i class="icon fa-envelope-o 1u"></i>
													<code class="6u"><?php echo $value['email'] ?></code>
												</div>
											</li>
										</ul>

									</div>
									<div class="12u">
									<div id="disqus_thread"></div>
								    <script type="text/javascript">
								        var disqus_shortname = 'clasificadosmiguiacatamarca';
								        var disqus_identifier = '<?php echo $_GET["num"] ?>';
									    var disqus_title = '<?php echo $value["titulo"] ?>';
									    var disqus_url = 'http://clasificados.miguiacatamarca.com/clasificado/<?php echo $_GET["tipo"] ?>-<?php echo $_GET["num"] ?>';
								        (function() {
								            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
								            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
								            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
								        })();
								    </script>
								    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

									</div>

								</div>

							<?php }
						}else{?>

						<h2>Este clasificado no existe o fue eliminado</h2>

						<?php } ?>


					</div>

					<div class="3u">
						<?php require_once('template/lateral.php'); ?>
					</div>

				</div>

			</div>

<?php require_once('template/footer.php') ?>