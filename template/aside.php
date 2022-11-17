				<!-- Sidebar -->
				<div id="sidebar" class="4u">
						<section>
							<h3>BUSCA LO QUE NECESITAS</h3>
							<script>
							  (function() {
							    var cx = '002879616134673256382:WMX-1286968695';
							    var gcse = document.createElement('script');
							    gcse.type = 'text/javascript';
							    gcse.async = true;
							    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
							        '//www.google.com/cse/cse.js?cx=' + cx;
							    var s = document.getElementsByTagName('script')[0];
							    s.parentNode.insertBefore(gcse, s);
							  })();
							</script>
							<gcse:search></gcse:search>
						</section>
						<section>
							<h3>AGREGADOS RECIENTEMENTE</h3>
							<ul>
							<?php
							require_once('./clases/lugar.php');
							$recientes = new Lugar();
							$recientes->UltimosLugares();
							foreach ($recientes->rows as $key) {
								?>
								<li><p><i aria-hidden="true" class="i-location 1u"></i><a href="/lugar/<?php echo $key['url'] ?>"><?php echo utf8_encode($key['nombre']) ?></a></p></li>
							<?php } ?>
							</ul>
						</section>
						<section>
							<div class="is-excerpt">
								<a href="/agregar-lugar"><img src="<?php BASE_URL ?>images/publica_gratis.jpg" style="width:100%" alt="Clasificados gratis en Mi Guía Catamarca" /></a>
							</div>
						</section>
						<section class="not-mobile">
							<h3>SEGUINOS EN FACEBOOK</h3>
							<div class="fb-page" data-href="https://www.facebook.com/miguiacatamarca" data-width="300" data-height="400" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/miguiacatamarca"><a href="https://www.facebook.com/miguiacatamarca">Mi Guía Catamarca</a></blockquote></div></div>
						</section>
						<section>
							<div class="is-excerpt">
								<a href="/publicidad"><img src="<?php BASE_URL ?>images/publicita_aqui.jpg" style="width:100%" alt="Anunciate en Mi Guía Catamarca" /></a>
							</div>
						</section>
						<section class="not-mobile">
							<?php include_once('ads.php'); ?>
						</section>
						<section class="not-mobile">
							<div class="12u"><a href="lugar/fds-radio"><img src="images/u/b74f493020a9a27f7766d6d7507ef29b.jpg" width="100%"></a></div>
						</section>
						<section class="not-mobile">
							<ul class="divided">
								<li>


								</li>
								<li>
									<div class="is-excerpt">
										<a href="/publicidad"><img src="<?php BASE_URL ?>images/publicita_aqui.jpg" style="width:100%" alt="Anunciate en Mi Guía Catamarca" /></a>
									</div>

								</li>
							</ul>
						</section>
						<section class="not-mobile">
							<h3>EL TIEMPO EN CATAMARCA</h3>
							<!-- www.TuTiempo.net - Ancho:278px - Alto:72px -->
							<div id="TT_tyYwLxtxdC1KdN6ATfurrLbbb9nAMEdmjtdjghFqm4eEE1Ekk">
								<h3>El tiempo</h3>
							<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_tyYwLxtxdC1KdN6ATfurrLbbb9nAMEdmjtdjghFqm4eEE1Ekk"></script>
						</section>
				</div>
				<!-- /Sidebar -->