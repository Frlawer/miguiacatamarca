<?php if (isset($_GET['view']) == 'lugar'): ?>
					<div>
						<?php
							require_once('./clases/lugar.php');
							$lugarimg = new lugar();
							$lugarimg->ObtenerLugarimg();
							if (!empty($lugarimg->rows)) {
								shuffle($lugarimg->rows);
								?>
								<div class="row">
									<div class="12u">
										<h2 class="button 12u">Lugares con imagenes</h2>

										<?php foreach ($lugarimg->rows as $key) { ?>
										<div class="2u" style="text-align:center;padding-right: 10px;margin-bottom:30px">
											<a href="lugar/<?php echo $key['url'] ?>" style="  font-size: .9em;">
												<img src="/images/u/<?php echo $key['img']; ?>.jpg" style="width: 100%;text-align: center;border:3px solid #0090B2;background: #fff;height: 100px;" /><?php echo ucfirst(substr($key['nombre'], 0, 23)); ?></a>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
					</div>
<?php endif ?>
				</div>
				<!-- /Contenido -->
			</div>
			<!-- Principal -->
	</div>
	<!-- Footer Full -->
	<div id="footer-wrapper">

		<!-- Footer -->
		<div id="footer" class="container">
			<header>
				<h2>¿Quieres enterarte de todas las novedades de <strong>Mi Guía Catamarca?</strong></h2>
			</header>
			<div class="row">

				<!-- Suscripción -->
				<div class="6u">

					<section>
						<header>
							<h2>Suscribíte a nuestras novedades</h2>
						</header>
						<form enctype="application/x-www-form-urlencoded" action="http://miguiacatamarca.ip-zone.com/ccm/subscribe/index/form/atbmtq4a8j" method="post" class="12u">
							<dl class="zend_form">
								<dd id="name-element">
									<input type="text" name="name" id="name" value="" class="text" placeholder="Tu Nombre" />
								</dd>
								<dd id="email-element">
									<input type="text" name="email" id="email" value="" class="email" placeholder="email@email.com" />
								</dd>
								<dt id="submit-label"></dt>
								<dd id="submit-element">
									<input type="submit" name="submit" id="submit" value="Suscribir" class="button 12u"  />
								</dd>
								<dt id="groups-label"></dt>
								<dd id="groups-element">
									<input type="hidden" name="groups[]" value="6" />
								</dd>
								<dt id="successUrl-label"></dt>
								<dd id="successUrl-element">
									<input type="hidden" name="successUrl" value="http://novedades.miguiacatamarca.com/suscripcion-ok.html" id="successUrl" />
								</dd>
								<dt id="errorUrl-label"></dt>
								<dd id="errorUrl-element">
									<input type="hidden" name="errorUrl" value="http://novedades.miguiacatamarca.com/suscripcion-ko.html" id="errorUrl" />
								</dd>
								<dt id="confirmationUrl-label"></dt>
								<dd id="confirmationUrl-element">
									<input type="hidden" name="confirmationUrl" value="http://novedades.miguiacatamarca.com/suscripcion-ok.html" id="confirmationUrl" />
								</dd>
							</dl>
						</form>
						<!-- <form method="get" action="http://novedades.miguiacatamarca.com/suscripcion.php" class="12u">
							<input type="email" name="email" class="email" placeholder="email@email.com">
							<input class="button 12u" type="submit" value="Enviar" name="suscripcion">
						</form> -->
						<footer>
							<p>
								Si te suscribes recibirás periodicamente las últimas novedades de Mi Gu&iacute;a Catamarca, nuestros productos destacados, artículos sobre consejos, promociones y mucho contenido interesante de Mi Gu&iacute;a Catamarca.
							</p>
							<p>
								Recibirás un mensaje en tu correo electrónico para confirmar tu suscripción.
							</p>
						</footer>
					</section>
				</div>
				<!-- /Suscripción -->
				<!-- Redes Sociales -->
				<div class="6u">
					<section>
						<p>También puedes seguirnos en nuestras redes sociales para conocer y estar al día con todos nuestros auspiciantes.</p>
						<p>No olvides de compartir con tus amigos y dejar tus comentarios</p>
						<div class="row">
							<ul class="6u">
								<li>
									<i aria-hidden="true" class="i-phone"></i>
									<a style="font-size: .8em;">(000) 000-0000</a>
								</li>
								<li>
									<i aria-hidden="true" class="i-mail"></i>
									<a href="mailto:hola@miguiacatamarca.com" style="font-size: .8em;" target="_blank">hola@miguiacatamarca.com</a>
								</li>
							</ul>
							<ul class="6u">
								<li>
									<i aria-hidden="true" class="i-twitter"></i>
									<a href="http://twitter.com/MiGuiaCatamarca" style="font-size: .8em;" target="_blank">@MiGuíaCatamarca</a>
								</li>
								<li>
									<i aria-hidden="true" class="i-facebook"></i>
									<a href="http://facebook.com/MiGuiaCatamarca" style="font-size: .8em;" target="_blank">facebook.com/MiGuiaCatamarca</a>
								</li>
								<li>
									<i aria-hidden="true" class="i-google-plus"></i>
									<a href="https://google.com/+MiguiacatamarcaAr" style="font-size: .8em;" target="_blank">google.com/+MiguiacatamarcaAr</a>
								</li>
							</ul>
						</div>
						<div class="fb-like" data-href="https://www.facebook.com/miguiacatamarca" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>
					</section>
				</div>
				<!-- /Redes Sociales -->
			</div>
		</div>
		<!-- /Footer -->

		<!-- Copyright -->
		<div id="copyright" class="container">
			<ul class="center">
				<li>&copy; Mi Guía Catamarca.</li>
				<li>Todos los derechos reservados</li>
				<li>Design by: <a href="https://fb.com/frlawer" target="_blank">Frlawer</a></li>
			</ul>
		</div>
		<!-- /Copyright -->

	</div>
	<!-- /Footer Full -->
</body>
</html>