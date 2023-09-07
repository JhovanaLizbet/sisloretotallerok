
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--   <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>-->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rellene el formulario para crear un usuario</h3>

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
          <input type="text" id="palabra" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo set_value('nombre'); ?>" onkeyup="validarPalabras()">
          <span id="mensaje-error" style="display: none; color: red;">Solo se permiten letras.</span>

          <?php echo form_error('nombre'); ?> <!-- --> <!-- -->

					<b>Apellido Paterno:</b>
          <input type="text" id="pal" name="apellido1" placeholder="Escriba el primer apellido" class="form-control" value="<?php echo set_value('apellido1'); ?>" onkeyup="validarPalabras()" >
          <span id="mensaje-error" style="display: none; color: red;">Solo se permiten letras.</span>

          <?php echo form_error('apellido1'); ?>

					<b>Apellido Materno:</b>
          <input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control" value="<?php echo set_value('apellido2'); ?>">

          <?php echo form_error('apellido2'); ?>

          <b>Carnet de Identidad:</b>
          <input type="text" name="ci" placeholder="Escriba su carnet de identidad" class="form-control" value="<?php echo set_value('ci'); ?>">

          <?php echo form_error('ci'); ?>
<!--  
          <b>Fecha de Nacimiento:</b>
          <input type="text" name="fechanac" placeholder="Escriba la fecha de su nacimiento" class="form-control" value="<?php echo set_value('fechanac'); ?>">
-->
          <?php echo form_error('fechanac'); ?>

          <b>Sexo:</b>
          <input type="text" name="genero" placeholder="Escriba su genero" class="form-control" value="<?php echo set_value('genero'); ?>">

          <?php echo form_error('genero'); ?>

          <b>Edad:</b>
          <input type="text" name="edad" placeholder="Escriba su edad" class="form-control" value="<?php echo set_value('edad'); ?>">

          <?php echo form_error('edad'); ?>

          <b>Direccion:</b>
          <input type="text" name="direccion" placeholder="Escriba su direccion" class="form-control" value="<?php echo set_value('direccion'); ?>">

          <?php echo form_error('direccion'); ?>


					<button type="submit" class="btn btn-success"> AGREGAR </button>
          <button class="btn btn-dark"> CANCELAR </button>
<?php
	echo form_close();
?>					
			</div>
		</div>
		
	</div>

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
  