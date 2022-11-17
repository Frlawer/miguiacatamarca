							<div id="features-wrapper" class="8u">
								<?php
								if (isset($_REQUEST['urlrubro'])) {
									$urlrubro = $_REQUEST['urlrubro'];
									include_once('./clases/categoria.php');
									$rubro = new Categoria(NULL,NULL,NULL,$urlrubro);
									$rubro->ObtenerNombre();

									$id = $rubro->rows[0]['id'];
									$nombre = $rubro->rows[0]['nombre'];
									$id_padre = $rubro->rows[0]['id_padre'];
									$url = $rubro->rows[0]['url'];

									?>
									<h2><?php echo $nombre ?></h2>
									<?php


									$abc = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');
									foreach ($abc as $i) {
										// $letra = strtoupper(substr($hijos->rows[0]['nombre'], 0, 1));
										$hijos = new Categoria();
										$hijos->ObtenerLetra($i,$id);
										if (!empty($hijos->rows)) {
										?>
										<div class="letra_categoria">
											<h3 class="button-rounded-<?php echo $id; ?>">
											<?php echo $i; ?>
											</h3>
											<ul>
										<?php
										foreach ($hijos->rows as $key) {
											if ($i == strtoupper(substr($hijos->rows[0]['nombre'], 0, 1))) {
												# code...
												$id_cat = $key['id'];
												$nombre_cat = $key['nombre'];
												$id_padre_cat = $key['id_padre'];
												$url_cat = $key['url'];
												$letra = strtoupper(substr($nombre_cat, 0, 1));
												?>
												<li class="6u actions"> <i aria-hidden="true" class="i-checkmark listar-categorias"></i>
													<a href="categoria/<?php echo $url_cat ?>" class="listar-categorias">
														<?php echo $nombre_cat;?>
													</a>
												</li>
										<?php
											}
										}
										?>

											</ul>
										</div>
										<?php
									}
									}
								}else{
									?>
									<h2>Esta Rubro se encuentra vacio o no existe</h2>
									<p>
										Puedes elegir otra Rubro para poder visualizar mas anunciantes
									</p>
									<p>
										Si deseas agregar tu anuncio en este Rubro no dudes en comunicarte con nosotros a través de cualquiera de las siguientes opciones.
									</p>
									<p>
										<a href="/contacto">Contacto con Mi Guía Catamarca</a>
									</p>
									<p>
										<a href="http://facebook.com/miguiacatamarca">Facebook</a>
									</p>

									<?php
								}
								?>
						<!-- /Lista de Empresas -->
					</div>
					<?php require_once('template/aside.php') ?>