<!--solo se tiene contenido-->

<h1>Inicio</h1>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1> Modificar Usuario</h1>
			<?php
			foreach ($infoestudiante->result() as $row) {
				// code...

				echo form_open_multipart('estudiante/modificarbd');
			?>
				<input type="hidden" name="idestudiante" class="form-control" value="<?php echo $row->idEstudiante; ?>">

				<input type="text" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo $row->nombre; ?>">
				<input type="text" name="apellido1" placeholder="Escriba el primer apellido" class="form-control" value="<?php echo $row->primerApellido; ?>">
				<input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">
				<input type="text" name="ci" placeholder="Escriba su ci" class="form-control" value="<?php echo $row->ci; ?>">
				<input type="text" name="genero" placeholder="Escriba su genero" class="form-control" value="<?php echo $row->genero; ?>">
				<input type="text" name="edad" placeholder="Escriba su edad" class="form-control" value="<?php echo $row->edad; ?>">
				<input type="text" name="direccion" placeholder="Escriba su direccion" class="form-control" value="<?php echo $row->direccion; ?>">


				<button type="submit" class="btn btn-success"> MODIFICAR </button>
				<button class="btn btn-dark"> CANCELAR </button>
			<?php
				echo form_close();
			}

			?>
		</div>
	</div>

</div>