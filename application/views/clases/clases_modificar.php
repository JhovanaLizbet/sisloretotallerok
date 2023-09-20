<!--solo se tiene contenido-->

<h1>Inicio</h1>
	<div class="container"> 
		<div class="row">
			<div class="col-md-12">
				<h1> Modificar Clase</h1>
<?php 
foreach ($infoestudiante->result() as $row) 
{
	// code...

 	echo form_open_multipart('clases/modificarbd');
?>
					<input type="hidden" name="idclases" class="form-control" value="<?php echo $row->idClases; ?>">

					<input type="text" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo $row->nombre; ?>">
					<input type="text" name="descripcion" placeholder="Escriba la descripcion" class="form-control" value="<?php echo $row->descripcion; ?>">

					<button type="submit" class="btn btn-success"> MODIFICAR </button>
					<button class="btn btn-dark"> CANCELAR </button>
<?php
	echo form_close();
}

?>					
			</div>
		</div>
		
	</div>
