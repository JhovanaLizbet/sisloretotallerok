<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->
    <div class="container mt-4">
        <h2 align="center"><u>Lista de Usuarios Deshabilitados</u></h2>
        <!-- Agrega el contenido de tu página aquí -->
    </div>
    <br>

    <a href="<?php echo base_url(); ?>index.php/usuarios/verListaUsuarios">
        <button type="button" class="btn btn-warning">Ir Lista Habilitados</button>
    </a>

    <div id="content">

        <table id="example" class="table table-bordered table-striped">
            <thead align="center" style="color: black;">
                <tr bgcolor="#3CC6FA">
                    <th>No</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Tipo</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Actualizacion</th>
                    <th>Habilitar</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $indice = 1; //el contador comienza en 1
                foreach ($usuarios->result() as $row) // de la base de datos
                {
                ?>
                    <tr>
                        <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                        <td><?php echo $row->login; ?></td>
                        <td><?php echo $row->password; ?></td>
                        <td><?php echo $row->tipo; ?></td>
                        <td><?php echo formatearFecha($row->creado); ?></td>
                        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

                        <td>

                            <?php
                            echo form_open_multipart('usuarios/habilitarbd');
                            ?>
                            <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $row->idUsuario; ?>">
                            <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/offvok2.png">

                            <?php
                            echo form_close();
                            ?>
                        </td>

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
                    <th>Login</th>
                    <th>Password</th>
                    <th>Tipo</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Actualizacion</th>
                    <th>Habilitar</th>
                </tr>
            </tfoot>
        </table>

    </div>
</main>
</div>
</div>