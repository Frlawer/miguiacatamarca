<?php
		if (isset($_REQUEST['nombre'])){
			require_once('./clases/lugar.php');
			$url = $_REQUEST['nombre'];
			$lugar = new Lugar();
			$lugar->ObtenerLugarUrl($url);
			$datos = $lugar->rows[0];
			if (!empty($datos)) {
				$id = $datos['id'];
				$persona = $datos['persona'];
				$nombre = $datos['nombre'];
				$categoria = $datos['categoria'];
				$direccion = utf8_encode($datos['direccion']);
				$telefono = $datos['telefono'];
				$web = $datos['web'];
				$fb = $datos['fb'];
				$tw = $datos['tw'];
				$email = $datos['email'];
				$img = $datos['img'];
				$coord = $datos['coord'];
				$url = $datos['url'];
				$descrip = $datos['descrip'];
				$online = $datos['online'];
				$fecha = $datos['fecha'];
				if ($online == 1){
					require_once('./clases/categoria.php');
					$cat = new Categoria();
					$cat->ObtenerNombreId($categoria); ?>
					<div class="row" itemscope itemtype="http://schema.org/LocalBusiness">
						<div class="8u">
							<a href="/categoria/<?php echo $cat->rows[0]['url'] ?>">
								<span style="color:#D06503"><?php echo $cat->rows[0]['nombre'] ?></span>
							</a>
						</div>
						<h2 class="titulo-cliente 12u" itemprop="name"><?php echo ucfirst(utf8_encode($nombre)) ?></h2>
						<div class="8u">
							<?php if (!empty($img)): ?>
							<div class="img-cliente">
								<img itempromp="image" src="/images/u/<?php echo $img ?>.jpg" alt="<?php echo utf8_encode($nombre) ?>" style="width:100%" />
							</div>
							<?php else: ?>
							<?php endif ?>
							<?php if (!empty($email)): ?>
							<form method="post" action="contactocliente">
								<input type="text" name="id" style="display: none;" value="<?php echo $id ?>" />
								<input class="button 12u" type="submit" name="contactar" value="Contactar" />
							</form>
							<?php else: ?>
							<?php endif ?>
							<div class="descrip" itemprop="description">
								<p><?php echo $descrip ?></p>
							</div>
							<?php
							$id_padre = new Lugar();
							$id_padre->ObtenerIdPadre($categoria);
							if($coord != ''){ $coords = explode(',',$coord); ?>
							<script>
							var map;
							$(document).ready(function () {
								prettyPrint();
								map = new GMaps({
									div: '#mapas',
									height: '300px',
									lat: <?php echo $coords[0] ?>,
									lng: <?php echo $coords[1] ?>,
									zoom: 15,
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


								map.addMarker({
									lat: <?php echo $coords[0] ?>,
									lng: <?php echo $coords[1] ?>,
									icon: '/images/maker_<?php echo $id_padre->rows[0]["id_padre"] ?>.png',
									verticalAlign: 'top',
									horizontalAlign: 'center',
									title: '<?php echo $nombre ?>',
									infoWindow: {
										content: '<h4><?php echo $nombre ?></h4><p><?php echo $direccion ?></p><p><?php echo $telefono ?></p>'
									}
								});
							});
							</script>
							<?php } ?>
							<div class="12u">
								<div id="socialshare">
									<div id="shareme" data-text="<?php echo $nombre ?> está en Mi Guía Catamarca"></div>
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
							<div class="12u">
								<div id="disqus_thread"></div>
							    <script type="text/javascript">
							        var disqus_shortname = 'miguacatamarca';
							        (function() {
							            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
							            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
							            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
							        })();
							    </script>
							    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
							</div>
						</div>
						<div class="4u">
							<?php if($direccion != ''){ ?>
							<div class="datos" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" >
								<i aria-hidden="true" class="i-location 1u" ></i>
								<p class="11u" itemprop="streetAddress"><?php echo $direccion ?></p>
							</div>
							<?php } ?>
							<?php if($telefono != ''){ ?>
							<div class="datos" itemprop="telephone">
								<i aria-hidden="true" class="i-phone 1u" ></i>
								<p class="11u"><?php echo $telefono ?></p>
							</div>
							<?php } ?>
							<?php if($web != ''){ ?>
							<div class="datos" itemprop="url">
								<i aria-hidden="true" class="i-link 1u" ></i>
								<p class="11u"><a href="<?php echo $web ?>" target="_blank"><?php echo $web ?></a></p>
							</div>
							<?php } ?>
							<?php if($fb != ''){ ?>
							<div class="datos" itemprop="url">
								<i aria-hidden="true" class="i-facebook 1u" ></i>
								<p class="11u"><a href="<?php echo $fb ?>" target="_blank"><?php echo $fb ?></a></p>
							</div>
							<?php } ?>
							<?php if($tw != ''){ ?>
							<div class="datos" itemprop="url">
								<i aria-hidden="true" class="i-twitter 1u" ></i>
								<p class="11u"><a href="<?php echo $tw ?>" target="_blank"><?php echo $tw ?></a></p>
							</div>
							<?php } ?>
							<div class="datos">
								<i aria-hidden="true" class="i-user 1u" ></i>
								<p class="11u"><a href="/terminos-y-condiciones" target="_blank">¿Sos el dueño de este lugar?</a></p>
							</div>
							<?php if($coord != ''){ ?><div id="mapas" class="12u"></div><?php } ?>
							<div>
								<a href="http://clasificados.miguiacatamarca.com">
									<img src="<?php BASE_URL ?>images/clasif_gratis.jpg" alt="Clasificados Gratis" style="width:100%" />
								</a>
							</div>
							<div>
								<a href="http://miguiacatamarca.com/agregar-lugar">
									<img src="<?php BASE_URL ?>images/publica_gratis.jpg" alt="Subi tu comercio" style="width:100%" />
								</a>
							</div>
						</div>
					</div>
				<?php }
				}else{ ?>
					<h2>Este Anunciante no existe. ¿Quisieras aparecer aquí?</h2>
					<p>
						<a href="/agregar/" class="button">Agregar Negocio</a>
					</p>
					<p>Consultas o sugerencias.</p>
					<p><a href="/contacto">Contacto con Mi Guía Catamarca</a></p>
					<p><a href="http://facebook.com/miguiacatamarca" target="_blank">Facebook</a></p>
				<?php }
			}else{ ?>
				<h2>Este Anunciante no existe. ¿Quisieras aprecer aquí?</h2>
				<p>
					<a href="/agregar/" class="button">Agregar Negocio</a>
				</p>
				<p>Consultas o sugerencias.</p>
				<p><a href="/contacto">Contacto con Mi Guía Catamarca</a></p>
				<p><a href="http://facebook.com/miguiacatamarca" target="_blank">Facebook</a></p>
			<?php } ?>