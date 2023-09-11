
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
            <center><h3 class="text-primary">Cambiar Contraseñia</h3></center>
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
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">              
              
            </div>
          </div>
<!----------------------------------- --------------------------------------->
          <div class="col-5">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Introducir los siguientes datos</h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                 	echo form_open_multipart('estudiante/verificarDatosContrasenia');
                ?>

					<b>Ingresar la Contraseña Actual:</b>
          <input type="password" class="form-control" id="contraseniaActual" autocomplete="off" name="contraseniaActual" required aria-invalid="true" placeholder="Contraseña Actual">

					<b>Ingresar la Contraseña Nueva:</b>
          <input input type="password" class="form-control" id="contraseniaNueva" autocomplete="off" name="contraseniaNueva" required aria-invalid="true" placeholder="Ingresar la contraseña nueva">
          
					<b>Reingresar la Contraseña Nueva:</b>
          <input type="password" class="form-control" id="repeContraseniaNueva" autocomplete="off" name="repeContraseniaNueva" required aria-invalid="true" placeholder="Nuevamente ingresar la contraseña nueva">

          <br></br>

					<button type="submit" class="btn btn-success"> CAMBIAR </button>
          <a href="<?php echo base_url(); ?>index.php/usuarios/registrarcuenta">
            <button type="button" class="btn btn-dark" >CANCELAR </button>
          </a>

          <?php
          	echo form_close();
          ?>

			</div>
		</div>
		
	</div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">              
                      
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
  