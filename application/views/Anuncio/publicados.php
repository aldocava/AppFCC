<section>
	<div class="container">
		<div class="row">
			<div class="form-group col-md-1"></div>
			<div class="form-group col-md-10">
				<?php if($anuncios!=FALSE){
					foreach($anuncios->result() as $row) { ?>
						<div class="card mb-3">
							<img class="card-img-top" src="<?=base_url('images/'.$row->Imagen)?>" alt="Imagen no disponible">
							<div class="card-body">
								<h5 class="card-title"><?= $row->Nombre ?></h5>
								<p class="card-text"><?= $row->Descripcion ?></p>
								<p class="card-text"><small class="text-muted"><?=$row->Fecha_Inicio?></small></p>
							</div>
							<div class="card-body">
								<?php if ($this->session->userdata('appfcc')['rol'] == 2): ?>
									<a href="<?php echo base_url(); ?>UnidadAcademica/modificaAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-outline-success">Editar</a>
								<?php elseif ($this->session->userdata('appfcc')['rol'] == 3): ?>
									<a href="<?php echo base_url(); ?>Profesor/modificaAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-outline-success">Editar</a>
								<?php endif; ?>
								<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Estás por eliminar esta publicación, ¿Estás seguro que quieres continuar?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												<?php if ($this->session->userdata('appfcc')['rol'] == 2): ?>
													<a href="<?php echo base_url(); ?>UnidadAcademica/borrarAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-primary">Continuar</a>
												<?php elseif ($this->session->userdata('appfcc')['rol'] == 3): ?>
													<a href="<?php echo base_url(); ?>Profesor/borrarAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-primary">Continuar</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }
				}?>
			</div>
			<div class="form-group col-md-1"></div>
		</div>
	</div>
</section>
