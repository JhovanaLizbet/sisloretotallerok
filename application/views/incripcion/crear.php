<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<!-- Contenido principal de tu página -->

	<!-- ------------------------------------------------------------------------------------------ -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div>
				<h5 class="text-white posicion">...</h5>
				<center>
					<h3 class="text-primary">Inscripcion</h3>
				</center>
			</div>
			<div class="container">
				<?php echo form_open('inscripcion/store'); ?>
				<!--				<form method="post" action="--><?php //echo base_url('inscripcion/store'); 
																	?><!--">-->
				<div class="row">
					<div class="col-md-6">

						<label for="exampleInputEmail1">Cliente:</label>
						<select name="idCliente" class="js-example-basic-single form-control" id="idCliente">
							<option value="none" selected="selected">------------Selecione el Cliente------------</option>

							<?php foreach ($datosCliente as $cliente) : ?>
								<option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombres . ' ' . $cliente->primerApellido. ' ' . $cliente->segundoApellido ?></option>
							<?php endforeach; ?>

						</select>
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1">Fecha de Inscripción:</label>
						<input type="date" class="form-control" required aria-invalid="true" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">

					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<label for="exampleInputEmail1">Cursos:</label>
						<select name="city" class="form-control" id="cursoId">
							<option value="none" selected="selected">------------Seleccione el Curso------------</option>
							<?php foreach ($datosCursos as $curso) : ?>
								<option value="<?php echo $curso->id ?>"><?php echo $curso->codigo. ' - ' . $curso->nombre. ' - ' . $curso->nivel ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<table class="table table-bordered" id="cursos">
							<thead align="center">
								<tr bgcolor="#3CC6FA">
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Nivel</th>
									<th>Duracion</th>
									<th>Día</th>
									<th>Hora</th>
									<th>Precio Bs.</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-9">

					</div>
					<div class="col-1">
						<input type='hidden' class="form-control" id="total" name="total" value="0">
						Total Bs.
					</div>
					<div class="col-2">
						<p id="result"></p>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<strong><b>Observacion</b></strong>
						<input type="text" id="observacion" name="observacion" class="form-control input-md" placeholder="" required aria-invalid="true" required>

					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-6">

					</div>
					<div class="col-6">
						<input type="submit" value="REGISTRAR" class="btn btn-success" />
					</div>
				</div>

				</form>
			</div>
		</section>
	</div>
</main>
</div>
</div>

<script>
	function removeItem(item) {
		$("#" + item).remove();
		var values = $("input[name='prices[]']")
			.map(function() {
				return +$(this).val();
			}).get();
		let sum = values?.reduce(function(a, b) {
			return a + b;
		}, 0);
		$('#total').val(sum);
		$('#result').text(sum);
	}
	
	$(document).ready(function() {
		$('#idCliente').select2();
		$('#cursoId').select2();

		$('#cursoId').change(function() {
			var cursoId = $('#cursoId').val();
			var curso = $('#cursoId option:selected').text();
			if (cursoId != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>index.php/inscripcion/searchCurso",
					method: "GET",
					dataType: "json",
					data: {
						id: cursoId
					},
					success: function(data) {
						const {
							codigo,
							nombre,
							nivel,
							duracion,
							diaClase,
							hora,
							precioTotal
						} = data[0];
						var inputCourse = "<tr id=" + cursoId + ">" +
							"<td><input type='hidden' class='form-control' id='prices' name='prices[]' value=" + precioTotal + ">  <input type='hidden' class='form-control' id='curso'" + cursoId + " name='cursos[]' value=" + cursoId + ">" + codigo + "</td>" +
							"<td>" + nombre + "</td>" +
							"<td>" + nivel + "</td>  " +
							"<td>" + duracion + "</td>  " +
							"<td>" + diaClase + "</td>  " +
							"<td>" + hora + "</td>  " +
							"<td>" + precioTotal + "</td>  " +
							"<td><button type='button' class='fa fa-trash' onclick='removeItem(" + cursoId + ")'></button> </td>" +
							"</tr>";
						$("table tbody").append(inputCourse);
						var values = $("input[name='prices[]']")
							.map(function() {
								return +$(this).val();
							}).get();
						let sum = values?.reduce(function(a, b) {
							return a + b;
						});
						$('#total').val(sum);
						$('#result').text(sum);
					}
				});
			}

		});
	});
</script>