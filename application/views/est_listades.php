<!--solo se tiene contenido-->

<h1>Inicio</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<a href="<?php echo base_url(); ?>index.php/estudiante/indexlte">
					<button type="button" class="btn btn-warning">Lista habilitados</button>
				</a>


				<h1> Lista de Usuarios Deshabilitados</h1>

				<table class="table">
					<tr>
					  <th>No</th>
                      <th>Nombre</th>
                      <th>CI</th>
                      <th>Genero</th>
                      <th>Edad</th>
                      <th>Direccion</th>
                      <th>Fecha Creacion</th>
                      <th>Fecha Actualizacion</th>
						<th>Habilitar</th>
					</tr>

					<?php
						$indice=1;//el contador comienza en 1
						foreach($estudiantesok->result() as $row)
						{
					?>
							<tr>
								<td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
			                  <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido; ?></td>
			                  <td><?php echo $row->ci; ?></td>
			                  <td><?php echo $row->genero; ?></td>
			                  <td><?php echo $row->edad; ?></td>
			                  <td><?php echo $row->direccion; ?></td>
			                  <td><?php echo formatearFecha($row->creado); ?></td>
			                  <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

								<!--HABILITAR-->
								<td>
			<?php 
			 	echo form_open_multipart('estudiante/habilitarbd');
			?>
			<input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
		<!--  <button type="submit" class="btn btn-warning">HABILITAR</button> -->
			<input type="image" src="<?php echo base_url();?>adminlte/dist/img/offvok2.png">
			<?php
				echo form_close();
			?>
								</td>


							</tr>
							<?php
							$indice++;

						}
					?>
					
				</table>
				
				
			</div>
		</div>
		
	</div>
