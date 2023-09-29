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
            <h3 class="text-primary">Crear Nueva Cuenta de Usuario</h3>
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
                <h4 class="card-title">Rellene el formulario para crear una cuenta nueva</h4>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                echo form_open_multipart('usuarios/agregarbd');
                ?>

                <b>Login:</b>
                <input type="text" id="login" name="login" placeholder="Escriba el login" class="form-control input-md" value="<?php echo set_value('login'); ?>" required>
                <div class="error-message" id="login-error">Solo se permiten letras</div>

                <?php echo form_error('login'); ?> <!-- --> <!-- -->

                <b>Tipo:</b>
                <input type="text" id="tipo" name="tipo" title="Solo se permiten letras" placeholder="Escriba el tipo" class="form-control input-md" value="<?php echo set_value('tipo'); ?>" pattern="[A-Za-z]+" required>
                <div class="error-message" id="tipo-error">Solo se permiten letras</div>

                <?php echo form_error('tipo'); ?>

                <b>Contraseña: </b>
                <input type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" placeholder="Escriba su contraseña" class="form-control input-md" value="<?php echo set_value('password'); ?>" required>
                <p>Contiene 8 o más caracteres, número, letra mayúscula y minúscula</p>

                <?php echo form_error('contraseña'); ?>

                <b>Confirmar Contraseña:</b>
                <input type="password" id="password2" name="password2" placeholder="Confirme su contraseña" class="form-control input-md" required>

                <span id="match_status" class="match-tick"></span>
                <span id="match_text"></span>

                <br></br>

                <button type="submit" class="btn btn-success"> REGISTRAR </button>

                <?php
                echo form_close();
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