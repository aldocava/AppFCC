<section>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<br><h1>Publicar anuncio</h1>
				Llena el siguiente formulario para publicar un anuncio.
				<br>Recuerda que los anuncios se muestran por fecha de proximidad.
				<br>¡No publiques más de un anuncio para el mismo evento!<br>

				<?php if ($this->session->userdata('appfcc')['rol'] == 2): ?>
					<?php echo form_open_multipart("UnidadAcademica/crea");?>
				<?php elseif ($this->session->userdata('appfcc')['rol'] == 3): ?>
					<?php echo form_open_multipart("Profesor/crea");?>
				<?php endif; ?>

					<div class="form-group text-left">
						<label for="nombre">Titulo</label>
						<input type="text" class="form-control" required="1" id="nombre" name="nombre" placeholder="Ingrese nombre del evento">
					</div>

					<div class="form-group text-left">
						<label for="descripcion">Descripción</label>
						<textarea class="form-control" required="1" raws="5" id="descripcion" name="descripcion" > </textarea>
					</div>


					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="id_fechaInicio">Fecha de inicio</label>
							<input class="form-control" required="1" type="date" id="fecha_inicio" name="fecha_inicio"/>
						</div>

						<div class="form-group col-md-6">
							<label for="id_fechaFin">Fecha de fin</label>
							<input class="form-control" required="1" type="date" id="fecha_fin" name="fecha_fin"/>
						</div>
					</div>

					<div class="form-group text-left">
						<label for="imagen">Imagen del anuncio</label>
						<input type="file" class="form-control" required="1" name="imagen" accept=".png,.jpg,.bmp,jpeg">
					</div>

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

					<button type="submit" name="upload" vale="Upload" class="btn btn-circle btn-xl btn-outline-success"><i class="fas fa-check"></i></button>
					<a class="btn btn-circle btn-xl btn-outline-danger" href="<?php echo base_url(); ?>"><i class="fas fa-times"></i></a>
				<?php echo "</form>"?>
			</div>
		</div>
	</div>
</section>
