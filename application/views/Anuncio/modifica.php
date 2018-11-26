<section>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<br><h1>Modificar anuncio</h1>
				Llena el siguiente formulario con la nueva información del anuncio.<br>
				<?php if($anuncio!=FALSE){
					foreach($anuncio->result() as $row) { ?>
						<?php if ($this->session->userdata('appfcc')['rol'] == 2): ?>
							<?php echo form_open_multipart("UnidadAcademica/modifica");?>
						<?php elseif ($this->session->userdata('appfcc')['rol'] == 3): ?>
							<?php echo form_open_multipart("Profesor/modifica");?>
						<?php endif; ?>

							<div class="form-group text-left">
								<label for="nombre">Titulo</label>
								<input type="text" class="form-control" required="1" id="nombre" name="nombre" value="<?=$row->Nombre?>">
							</div>

							<div class="form-group text-left">
								<label for="descripcion">Descripción</label>
								<textarea class="form-control" required="1" raws="5" id="descripcion" name="descripcion" ><?=$row->Descripcion?></textarea>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="id_fechaInicio">Fecha de inicio</label>
									<input class="form-control" required="1" type="date" id="fecha_inicio" name="fecha_inicio" value="<?=$row->Fecha_Inicio?>"/>
								</div>

								<div class="form-group col-md-6">
									<label for="id_fechaFin">Fecha de fin</label>
									<input class="form-control" required="1" type="date" id="fecha_fin" name="fecha_fin" value="<?=$row->Fecha_Inicio?>"/>
								</div>
							</div>
							<!--
							<div class="form-group text-left">
								<label for="imagen">Imagen del anuncio</label>
								<input type="file" class="form-control" required="1" name="imagen" placeholder="<?=$row->Imagen?>" accept=".png,.jpg,.bmp,jpeg">
							</div>
							-->
							<div class="form-group text-left">
								<label for="sel1">Categoría</label>
								<select class="form-control" id="tag" name='tag'>
									<option>Avisos Generales</option>
									<option>Bolsa de Trabajo</option>
									<option>Concursos</option>
									<option>Cursos</option>
									<option>Festividades</option>
								</select>
							</div>

							<br>
							<input type="hidden" name="idAnuncio" value="<?=$row->Id_Anuncio?>">
							<button type="submit" name="upload"  vale="Upload" class="btn btn-circle btn-xl btn-outline-success"><i class="fas fa-check"></i></button>
							<a class="btn btn-circle btn-xl btn-outline-danger" href="<?php echo base_url(); ?>"><i class="fas fa-times"></i></a>
						<?php echo "</form>"?>
					<?php }
				}?>
			</div>
		</div>
	</div>
</section>
