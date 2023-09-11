
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
            <center><h3 class="text-primary">Crear Nueva Cuenta de Usuario</h3></center>
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
                <h4 class="card-title">Rellene el formulario para crear una cuenta nueva</h4>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                 	echo form_open_multipart('estudiante/agregarbd');
                ?>
<!---
<form>
        <label for="palabra">Ingrese una palabra:</label>
        <input type="text" id="palabra" name="palabra" onkeyup="validarPalabras()" required>
        <span id="mensaje-error" style="display: none; color: red;">Solo se permiten letras.</span>
    </form>
-->

					<b>Nombre:</b>
          <!---
          <input type="text" id="palabra" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo set_value('nombre'); ?>">
          -->
          <input type="text" id="nombre" name="nombre" placeholder="Escriba el nombre" class="form-control input-md" value="<?php echo set_value('nombre'); ?>" pattern="[A-Za-z]+" required >
          <div class="error-message" id="nombre-error">Solo se permiten letras</div>

          

          <?php echo form_error('nombre'); ?> <!-- --> <!-- -->

					<b>Apellido Paterno:</b>
          <input type="text" id="apellido" name="apellido1" title="Solo se permiten letras" placeholder="Escriba el primer apellido" class="form-control input-md" value="<?php echo set_value('apellido1'); ?>" pattern="[A-Za-z]+" required>
          <div class="error-message" id="apellido-error">Solo se permiten letras</div>
          

          <?php echo form_error('apellido1'); ?>

					<b>Apellido Materno:</b>
          <input type="text" id="apellidom"name="apellido2" placeholder="Escriba el segundo apellido" class="form-control input-md" value="<?php echo set_value('apellido2'); ?>" pattern="[A-Za-z]+" required>
          <div class="error-message" id="apellidom-error">Solo se permiten letras</div>

          <?php echo form_error('apellido2'); ?>

          <b>Carnet de Identidad:</b>
          <input type="text" id="ci" name="ci" pattern="[0-9]+" placeholder="Escriba su carnet de identidad" class="form-control input-md" value="<?php echo set_value('ci'); ?>" required>
          <div class="error-message" id="ci-error">Solo se permiten números</div>

          <?php echo form_error('ci'); ?>

          <b>Fecha de Nacimiento:</b>
          <input type="date" id="fechaNacimiento" name="fechaNacimiento" >
          

          <?php echo form_error('fechaNacimiento'); ?>

<!--  
          <b>Fecha de Nacimiento:</b>
          <input type="text" name="fechanac" placeholder="Escriba la fecha de su nacimiento" class="form-control" value="<?php echo set_value('fechanac'); ?>">
-->
          <?php echo form_error('fechanac'); ?>

          <br>Sexo:</br>
          <select name="genero" placeholder="Escriba su genero" class="form-control input-md" value="<?php echo set_value('genero'); ?>">
            <option value="M">Hombre</option>
            <option value="F">Mujer</option>
          </select>

          <?php echo form_error('genero'); ?>          

          <b>Direccion:</b>
          <input type="text" name="direccion" placeholder="Escriba su direccion" class="form-control input-md" value="<?php echo set_value('direccion'); ?>">

          <?php echo form_error('direccion'); ?>

          <b>Correo Electronico:</b>
          <input type="email" id="email" name="email" placeholder="Escriba su direccion de correo electronico" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" class="form-control input-md" value="<?php echo set_value('email'); ?>">

          <?php echo form_error('email'); ?>
          

          <b>Celular:</b>
          <input type="text" id="celular" name="celular" pattern="[0-9]+" placeholder="Escriba su numero de celular" class="form-control input-md" value="<?php echo set_value('celular'); ?>">
          <div class="error-message" id="celular-error">Solo se permiten números</div>

          
          <?php echo form_error('celular'); ?>

          <b>Contraseña: </b>
          <input type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" placeholder="Escriba su contraseña" class="form-control input-md"value="<?php echo set_value('password'); ?>" required>
          <p>Contiene 8 o más caracteres, número, letra mayúscula y minúscula</p>

          <?php echo form_error('contraseña'); ?>

          <b>Confirmar Contraseña:</b>
          <input type="password" id="password2" name="password2" placeholder="Confirme su contraseña" class="form-control input-md" required>

          <span id="match_status" class="match-tick"></span>
          <span id="match_text"></span>            

     <br></br>

					<button type="submit" class="btn btn-success"> REGISTRAR </button>
          <button class="btn btn-dark"> CANCELAR </button>
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
  