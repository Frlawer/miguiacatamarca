<?php
				require_once('./clases/lugar.php');
				$mapa = new Lugar();
				$mapa->ObtenerCoords();
				 ?>
				 <script>
					var map;
					$(document).ready(function () {
						prettyPrint();
						map = new GMaps({
							div: '#fullmap',
							height: '300px',
							lat: -28.4667867,
							lng: -65.7760949,
							zoom: 14,
							disableDefaultUI: true,
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

						<?php
						$array_resultante = array();
							$rubros = new Lugar();
						for ($i=1; $i <= 5; $i++) {

							$rubros->A($i);
							$array_resultante = $rubros->rows;
						}
						?>

						map.addMarkers([{<?php	foreach ($array_resultante as $key => $value){
							if ($value['coord'] !== ''){
								$padre = new Lugar();
								$padre->ObtenerIdPadre($value['categoria']);

								$coordid = explode(',', $value['coord']);

						?>lat: <?php echo $coordid[0] ?>,lng: <?php echo $coordid[1] ?>,icon: '/images/maker_<?php echo $padre->rows[0]["id_padre"] ?>.png',size: 'small',details: <?php echo $padre->rows[0]["id_padre"] ?>,infoWindow: {content: '<img src="../images/<?php if (!empty($value["img"])){echo "u/".$value["img"].".jpg";}else{echo "default.png";} ?>" style="width: 110px;float: left;margin-right: 10px;" /><h3><a href="../lugar/<?php echo $value["url"] ?>"><?php echo utf8_encode($value["nombre"]) ?></a></h3><p style="margin-bottom:0"><?php echo utf8_encode($value["direccion"]) ?></p>'}<?php
									}

						    		if(count($rubros->rows)-1 != $key) {

						    			echo '},{';

						    		}else{

						    			echo '}';

						    		}

						    	} ?>]);

					});

					$(document).on('click', '.num', function(e) {
						e.preventDefault();

						var $num = $(this).data('rubro');

					    var miArray = new Array('1', '2', '3','4','5');
						// var posBorrar = miArray.indexOf($num);
						// miArray.splice(posBorrar, 1);

						if ($num != 0) {

							for (var indice = 0; indice < miArray.length; ++indice) {

							    var no_filtrado = map.markerFilter(function() {
							    	return this == miArray[indice];
							    });

							    for (var indi = 0; indi < no_filtrado.length; indi++) {
							    	no_filtrado[indi].setVisible(false);
							    }

							}

						}else{

							for (var indice = 0; indice < miArray.length; ++indice) {

							    var no_filtrado = map.markerFilter(function() {
							    	return this == miArray[indice];
							    });

							    for (var indi = 0; indi < no_filtrado.length; indi++) {
							    	no_filtrado[indi].setVisible(true);
							    }

							}
						}

						if ($num != undefined) {
						    var filtered = map.markerFilter(function() {
						    	return this == $num;
						    });

						    for (var index = 0; index < filtered.length; index++) {
						    	filtered[index].setVisible(true);
						    }

						}

					});
					</script>
					<div class="12u">
						<h1>Bienvenido a Mi Guía Catamarca</h1>
						
						<p>La primera guía geolocalizada de servicios, comercios, profesionales, educación y delivery de la provincia. MiGuiacatamarca.com te permite buscar, agregar y opinar sobre tus lugares preferidos! <strong>Todo lo que buscás esta más cerca de lo que pensás.</strong></p>
					</div>
					<div class="12u">
						<ul id="markers" class="">
							<li class="2u">
								<a href="#" class="num" data-rubro="0">Todos</a>
							</li>
							<li class="2u">
								<a href="#" class="num" data-rubro="1">Servicios</a>
							</li>
							<li class="2u">
								<a href="#" class="num" data-rubro="2">Comercios</a>
							</li>
							<li class="2u">
								<a href="#" class="num" data-rubro="3">Profesionales</a>
							</li>
							<li class="2u">
								<a href="#" class="num" data-rubro="4">Educación</a>
							</li>
							<li class="2u">
								<a href="#" class="num" data-rubro="5">Delivery</a>
							</li>
					  </ul>
					</div>
					<div class="12u">
						<div id="fullmap" class="12u"></div>
					</div>
					<div id="content" class="8u">
						<div class="12u">
							<a href="http://clasificados.miguiacatamarca.com" target="_blank"><img src="/images/publicidad_anchoclas.jpg" alt="Clasificados gratis en Catamarca" width="100%" /></a>
						</div>
						<!-- Lista de Empresas -->
						<?php require_once('./clases/lugar.php');
						$lugardest = new lugar();
						$lugardest->Destacados();
						if (!empty($lugardest->rows)) { ?>
							<div class="12u">
								<h2 class="button 12u">Mi Guía Catamarca Recomienda</h2>

								<?php foreach ($lugardest->rows as $key) {
									?>
								<div class="4u" style="text-align:center;padding-right: 10px;">
									<a href="lugar/<?php echo $key['url'] ?>" style=""><i class="i-bookmark" style="position: absolute;margin-left: -7%;font-size: 2em;color: #0090B2;text-shadow: 0px 1px 1px white,-1px 1px 3px gray;margin-top: 2px;"></i><img src="/images/<?php if(!empty($key['img'])){echo "u/".$key['img'].".jpg";}else{echo "default.png";} ?>" style="width: 100%;padding: .5em;text-align: center;border:3px solid #0090B2;background: #fff;display: block;height: 190px;"></a>
									<a class="12u" href="/lugar/<?php echo $key['url']; ?>" style="border: none;"><?php echo $key['nombre'] ?></a>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
						<div class="12u">
							<a href="http://miguiacatamarca.com/agregar-lugar"><img src="/images/publicidad_ancho.jpg" alt="Agregar tu comercio" width="100%" /></a>
						</div>
						<article class="12u">
							<?php
							$lugarimg = new lugar();
							$lugarimg->ObtenerLugarimg();
							if (!empty($lugarimg->rows)) {
								shuffle($lugarimg->rows);
								?>
								<div class="row">
									<div class="12u">
										<h2 class="button 12u">Comercios</h2>

										<?php foreach ($lugarimg->rows as $key) { ?>
										<div class="3u" style="text-align:center;padding-right: 10px;margin-bottom:30px">
											<a href="lugar/<?php echo $key['url'] ?>" style="  font-size: .9em;">
												<img src="/images/u/<?php echo $key['img']; ?>.jpg" style="width: 100%;text-align: center;border:3px solid #0090B2;background: #fff;height: 100px;" /><?php echo ucfirst(substr($key['nombre'],0,20)); ?></a>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							<!-- <div id="features-wrapper">
								<?php
								require 'clases/categoria.php';
								$categoria = new Categoria();
								$categoria->select();
								foreach ($categoria->rows as $key) {
									$id = $key['id'];
									$nombre = $key['nombre'];
									$id_padre = $key['id_padre'];
									$url = $key['url'];
									if ($id_padre == 0){
										?>
										<div class="lista-<?php echo $id ?>">
											<h3 class="button <?php echo $url ?> 12u actions">
												<a href="rubro/<?php echo $url ?>"><?php echo $nombre ?>
												</a>
											</h3>
						             		<ul>
										<?php
										$hijos = new Categoria();
										$hijos->ObtenerCategoriaHijos($id);
										for ($i=0; $i < 8; $i++) {
											?>
											<li class="6u actions">
												<i aria-hidden="true" class="i-checkmark listar-categorias"></i>
												<a href="categoria/<?php echo $hijos->rows[$i]['url'] ?>" class="listar-categorias">
													<?php echo $hijos->rows[$i]['nombre']?>
												</a>
											</li>
										<?php } ?>
										</ul>
									</div>
									<?php }
								}?>
							</div> -->

							<!-- Tweets -->
							<div class="12u not-mobile">
								<h3 class="button 12u tweets-catamarca">Qué pasa en Catamarca</h3>
								<div id="tweetMGC"></div>
							</div>
							<!-- /tweets -->
							<!-- SnapWidget -->
							<div class="12u not-mobile">
								<h3 class="button 12u insta-catamarca">Fotos en Instagram: #catamarca</h3>
								<div id="insta"></div>
								<iframe class=" not-mobile" src="http://snapwidget.com/in/?h=Y2F0YW1hcmNhfGlufDEzNXw0fDR8ZmZmZmZmfHllc3w0fG5vbmV8b25TdGFydHx5ZXM=&v=6314" title="Instagram Widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:596px; height:596px"></iframe>
								<!-- / SnapWidget -->
							</div>
						</article>
						<!-- /Lista de Empresas -->
					</div>
					<?php include_once('template/aside.php'); ?>