<!--solo se tiene contenido-->

<h1></h1>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<a href="<?php echo base_url(); ?>index.php/clases/indexlte">
					<button type="button" class="btn btn-warning">Lista de clases habilitadas</button>
				</a>


				<h1> Lista de Clases Deshabilitados</h1>

				<table class="table">
					<tr>
                      <th>No</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Fecha Creacion</th>
                      <th>Fecha Actualizacion</th>
						<th>Habilitar</th>
					</tr>

					<?php
						$indice=1;//el contador comienza en 1
						foreach($clases->result() as $row)
						{
					?>
							<tr>
								<td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                  <td><?php echo $row->nombre; ?></td>
                  <td><?php echo $row->descripcion; ?></td>
                  <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                  <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

								<!--HABILITAR-->
								<td>
			<?php 
			 	echo form_open_multipart('clases/habilitarbd');
			?>
			<input type="hidden" name="idclases" value="<?php echo $row->idClases; ?>">
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
