<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->
    <div class="container mt-4">
        <h2 align="center"><u>Lista de Usuarios Deshabilitados</u></h2>
        <!-- Agrega el contenido de tu página aquí -->
    </div>
    <br>

    <a href="<?php echo base_url(); ?>index.php/administrador/index">
        <button type="button" class="btn btn-warning">Lista Habilitados  <i class="bi bi-person-check-fill"></i></button>
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
                    <th>Direccion</th>
                    <th>Nombre de Usuario</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Habilitar</th>
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
                        <td><?php echo $row->nombres . ' ' . $row->primerApellido . ' ' . $row->segundoApellido ?></td>
                        <td><?php echo $row->ci ?></td>
                        <td><?php echo $row->sexo ?></td>
                        <td><?php echo $row->fechaNacimiento ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->telefono ?></td>
                        <td><?php echo $row->direccion ?></td>
                        <td><?php echo $row->nombreUsuario ?></td>
                        <td><?php echo $row->rol ?></td>
                        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>


                        <!--DESHABILITAR-->
                        <td>
                            <?php
                            echo form_open_multipart('usuarios/habilitarUsuario');
                            ?>
                            <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
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
                    <th>Carnet Identidad</th>
                    <th>Sexo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Direccion</th>
                    <th>Nombre de Usuario</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Habilitar</th>
                </tr>
            </tfoot>
        </table>
    </div>


</main>
</div>
</div>