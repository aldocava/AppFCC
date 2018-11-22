<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
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
								<a href="<?php echo base_url(); ?>usuario/modificaAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-outline-success">Editar</a>
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
												<a href="<?php echo base_url(); ?>usuario/borrarAnuncio/<?=$row->Id_Anuncio?>" class="btn btn-primary">Continuar</a>
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
</body>