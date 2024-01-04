<?php require_once('template/head.php') ?>
		<!-- Main -->
			<div id="categoria" class="container">

				<div class="row">


					<div class="9u">

						<?php if (!isset($_GET['id']) || !isset($_GET['tipo'])): ?>
							<p>Elige una categoria</p>
						<?php endif ?>

						<?php if (!empty($_GET['id'])): ?>
							<?php $id = $_GET['id']; ?>
							<?php $listar = new Clasificado(); ?>
							<?php $listar->selectAllCat($id); ?>

							<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>Titulo</th>
												<th>Descripción</th>
												<th>Telefono</th>
												<th>Imagen</th>
												<th>Comentarios</th>
											</tr>
										</thead>
										<tbody>

										<?php foreach ($listar->rows as $key => $value): ?>

											<tr>
												<td>
													<a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>" title="<?php echo $value['titulo'] ?>">
														<?php echo substr($value['titulo'], 0, 30) ?>
													</a>
												</td>
												<td><?php echo substr($value['texto'],0, 50) ?></td>
												<td><?php echo $value['telefono'] ?></td>
												<td><?php if ($value['img'] !== 'images/i/hola5.jpg') {echo '<i class="icon fa-image"></i>'; }else{echo '<i class="icon fa-remove"></i>';} ?></td>
												<td><i class="icon fa-comment"></i> <a href="/clasificado/<?php echo $value['categoria'] ?>-<?php echo $value['id'] ?>#disqus_thread" >comentarios</a></td>
											</tr>

										<?php endforeach;?>
										</tbody>
									</table>
								</div>
						<?php endif ?>

					</div>
					<div class="3u">
						<?php require_once('template/lateral.php'); ?>
					</div>


				</div>

			</div>

<?php require_once('template/footer.php') ?>