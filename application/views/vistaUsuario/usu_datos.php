<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<!-- Contenido principal de tu página -->

	<!-- ------------------------------------------------------------------------------------------ -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-3">
					<div class="col-sm-4">
						<h1></h1>
					</div>
					<div class="col-sm-4">
						<h5 class="text-white">...</h5>
						<h3 class="text-primary">Datos del Usuario</h3>
					</div>
					<div class="col-sm-4">
						<h1></h1>
					</div>
				</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section id="services" class="services">
			<div class="container" data-aos="fade-up">
				<div class="row">
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
						<div>

						</div>
					</div>
					<!----------------------------------- --------------------------------------->
					<div class="col-5">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"></h4>

							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<?php
								foreach ($datosUsuario->result() as $row) {
									// code...

									echo form_open_multipart('usuarios/modificarbd');
								?>
									<input type="hidden" name="idusuario" class="form-control" value="<?php echo $row->idUsuario; ?>">

									<input type="text" name="login" class="form-control" value="<?php echo $row->login; ?>">
									<input type="text" name="tipo" class="form-control" value="<?php echo $row->tipo; ?>">

									<button type="submit" class="btn btn-success"> MODIFICAR </button>
								<?php
									echo form_close();
								}
								?>

							</div>

							<a href="<?php echo base_url(); ?>index.php/usuarios/verListaUsuarios">
								<button class="btn btn-dark">CANCELAR</button>
							</a>

						</div>
					</div>

					<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
						<div>

						</div>
					</div>
					<!----------------------------------- --------------------------------------->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
	</div>
	<!-- /.col -->
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->