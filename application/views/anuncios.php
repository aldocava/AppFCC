<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
	<div class="container">
		<div class="row">
			<div class="form-group col-md-2">
				<div class="list-group">
					<li class="list-group-item active">Categorias</li>
					<a href="#" class="list-group-item list-group-item-action">Todos</a>
					<a href="#" class="list-group-item list-group-item-action">Secretaria Academica</a>
					<a href="#" class="list-group-item list-group-item-action">Bolsa de Trabajo</a>
					<a href="#" class="list-group-item list-group-item-action">Concursos</a>
				</div>
			</div>
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
								<a href="#" class="card-link">Leer más</a>
							</div>
						</div>
					<?php }
				}?>
			</div>
		</div>
	</div>
</body>