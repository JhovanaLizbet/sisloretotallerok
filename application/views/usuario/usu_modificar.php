<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<!-- Contenido principal de tu página -->

	<!-- ------------------------------------------------------------------------------------------ -->

	<h1>Inicio</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1> Modificar Estudiante</h1>
				<?php
				foreach ($infoUsuario->result() as $row) {
					// code...

					echo form_open_multipart('estudiante/modificarbd');
				?>
					<input type="text" name="idestudiante" class="form-control" value="<?php echo $row->idUsuario; ?>">

					<input type="text" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo $row->login; ?>">
					<input type="text" name="apellido1" placeholder="Escriba el primer apellido" class="form-control" value="<?php echo $row->password; ?>">
					<input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control" value="<?php echo $row->tipo; ?>">

					<button type="submit" class="btn btn-success"> MODIFICAR </button>
				<?php
					echo form_close();
				}

				?>
			</div>
		</div>

	</div>