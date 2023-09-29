<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <!-- Contenido principal de tu página -->

  <!-- ------------------------------------------------------------------------------------------ -->
  <div class="container mt-4">
    <h2 align="center"><u>Lista de Usuarios</u></h2>
    <!-- Agrega el contenido de tu página aquí -->
  </div>
  <br>
  <a href="<?php echo base_url(); ?>index.php/usuarios/agregar">
    <button type="button" class="btn btn-primary">Crear Usuario</button>
  </a>

  <a href="<?php echo base_url(); ?>index.php/usuarios/deshabilitados">
    <button type="button" class="btn btn-warning">Lista Deshabilitados</button>
  </a>

  <div id="content">

    <table id="example" class="table table-bordered table-striped">
      <thead align="center" style="color: black;">
        <tr bgcolor="#3CC6FA">
          <th>No</th>
          <th>Nombre Completo</th>
          <th>Fecha de Nacimiento</th>
          <th>Email</th>
          <th>Celular</th>
          <th>Sexo</th>
          <th>Nombre de Usuario</th>
          <th>password</th>
          <th>Rol</th>
          <th>Fecha Registro</th>
          <th>Fecha Actualizacion</th>
          <th>Modificar</th>
          <th>Eliminar</th>
          <th>Deshabilitar</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $indice = 1; //el contador comienza en 1
        foreach ($listaUsuarios->result() as $row) // de la base de datos
        {
        ?>
          <tr>
            <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
            <td><?php echo $row->nombres.' '.$row->primerApellido.' '.$row->segundoApellido ?></td>
            <td><?php echo $row->fechaNacimiento ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo $row->telefono ?></td>
            <td><?php echo $row->sexo ?></td>
            <td><?php echo $row->nombreUsuario ?></td>
            <td><?php echo $row->password ?></td>
            <td><?php echo $row->rol ?></td>            
            <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
            <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

            <td>

              <?php
              echo form_open_multipart('usuarios/modificar');
              ?>
              <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $row->idUsuario; ?>">
              <!--  <button type="submit" class="btn btn-success">MODIFICAR</button> -->
              <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/modificarok4.png">

              <?php
              echo form_close();
              ?>
            </td>


            <td>
              <?php
              echo form_open_multipart('usuarios/eliminarbd');
              ?>
              <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
              <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/eliminarok.png">

              <?php
              echo form_close();
              ?>
            </td>

            <!--DESHABILITAR-->
            <td>
              <?php
              echo form_open_multipart('usuarios/deshabilitarbd');
              ?>
              <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
              <!--  <button type="submit" class="btn btn-warning">DESHABILITAR</button>
      <img src="<?php echo base_url(); ?>adminlte/dist/img/onvok2.png"> -->
              <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/onvok2.png">

              <?php
              echo form_close();
              ?>
            </td>
          </tr>
        <?php
          $indice++;
        }
        ?>
      </tbody>

      <tfoot>
        <tr align="center" bgcolor="#3CC6FA" style="color: black;">
          <th>No</th>
          <th>Nombre Completo</th>
          <th>Fecha de Nacimiento</th>
          <th>Email</th>
          <th>Celular</th>
          <th>Sexo</th>
          <th>Nombre de Usuario</th>
          <th>password</th>
          <th>Rol</th>
          <th>Fecha Registro</th>
          <th>Fecha Actualizacion</th>
          <th>Modificar</th>
          <th>Eliminar</th>
          <th>Deshabilitar</th>
        </tr>
      </tfoot>
    </table>
  </div>
</main>
</div>
</div>