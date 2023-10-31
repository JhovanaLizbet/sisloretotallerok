<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->

    <section>
        <div class="menu">
            <div class="profile-button derecho">
                <img src="<?php echo base_url(); ?>img/userman4p.png" class="circulo-img" style="opacity: .8" alt="Perfil" class="profile-image" id="profileBtn">
                <b style="color: black; font-size: 12px;"><?php echo $this->session->userdata('nombreApellido'); ?></b>
                <div class="dropdown-content" id="dropdown">
                    <?php
                    foreach ($listaUsuariosLogueados->result() as $row) {
                    ?>
                        <?php
                        echo form_open_multipart('usuarios/modificarUsuario');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                        <a><button type="submit" class="custom-button"><b class="blue-text">Editar Datos</b></button></a>
                        <?php echo form_close();
                        ?>
                    <?php
                    }
                    ?>
                    <a href="<?php echo base_url(); ?>index.php/administrador/cambioContrasenia"><b class="blue-text">Cambiar Password</b></a>
                    <a href="<?php echo base_url(); ?>index.php/usuarios/logout" id="logout"><b class="blue-text">Cerrar Sesión</b></a>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/script.js"></script>
    </section>

    <!--
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>img/userman4.png" alt="User profile picture">
      </div>

      <h3 class="profile-username text-center"><strong><?php echo $this->session->userdata('nombreApellido'); ?></strong></h3>

      <p class="text-muted text-center"><?php echo $this->session->userdata('tipo'); ?></p>

      <?php
        foreach ($listaUsuariosLogueados->result() as $row) {
        ?>
        <?php
            echo form_open_multipart('usuarios/modificarUsuario');
        ?>
        <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
        <button type="submit" class="btn btn-danger btn-block"><i class="fa-solid fa-user-pen fa-lg"></i> <b>Editar Datos</b></button>
        <?php echo form_close();
        ?>
      <?php
        }
        ?>

      <hr>
      <a href="<?php echo base_url(); ?>index.php/administrador/cambioContrasenia" class="text-info font-size-h6 font-weight-bolder text-hover-primary pt-5">Cambiar mi contraseña.</a>
    </div>
     /.card-body
  </div>
 -->
    <!------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------->

    <div class="container mt-4">
        <h2 align="center"><u>Lista de Instructores</u></h2>
        <!-- Agrega el contenido de tu página aquí -->
    </div>
    <br>
    <a href="<?php echo base_url(); ?>index.php/administrador/agregarInstructor">
        <button type="button" class="btn btn-primary">Crear Instructor <i class="fa fa-user-plus"></i></button>
    </a>

    <a href="<?php echo base_url(); ?>index.php/administrador/listaInstructoresDeshabilitados">
        <button type="button" class="btn btn-warning">Instructores Deshabilitados <i class="bi bi-person-x-fill"></i></button>
    </a>

    <div id="content" class="tabla-contenedor">

        <table id="example" class="table table-bordered table-striped">
            <thead align="center" style="color: black;">
                <tr bgcolor="#3CC6FA">
                    <th>No</th>
                    <th>Nombre Completo</th>
                    <th>Carnet Identidad</th>
                    <th>Sexo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Nombre de Usuario</th>
                    <th>password</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $indice = 1; //el contador comienza en 1
                foreach ($listaInstructores->result() as $row) // de la base de datos
                {
                ?>
                    <tr>
                        <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                        <td><?php echo $row->nombres . ' ' . $row->primerApellido . ' ' . $row->segundoApellido ?></td>
                        <td><?php echo $row->ci ?></td>
                        <td><?php echo $row->sexo ?></td>
                        <td><?php echo $row->fechaNacimiento ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->telefono ?></td>
                        <td><?php echo $row->nombreUsuario ?></td>
                        <td><?php echo $row->password ?></td>
                        <td><?php echo $row->rol ?></td>
                        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

                        <td>

                            <?php
                            echo form_open_multipart('administrador/modificarInstructor');
                            ?>
                            <input type="hidden" name="idInstructor" id="idinstructor" value="<?php echo $row->id; ?>">
                            <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/modificarok4.png">

                            <?php
                            echo form_close();
                            ?>
                        </td>

                        <!--DESHABILITAR-->
                        <td>
                            <?php
                            echo form_open_multipart('administrador/deshabilitarInstructor');
                            ?>
                            <input type="hidden" name="idInstructor" value="<?php echo $row->id; ?>">
                            <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/eliminarok.png">

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
                    <th>Carnet Identidad</th>
                    <th>Sexo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Nombre de Usuario</th>
                    <th>password</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>


</main>
</div>
</div>