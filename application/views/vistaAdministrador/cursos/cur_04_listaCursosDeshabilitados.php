<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->
    <div class="container mt-4">
        <h2 align="center"><u>Lista de Cursos Deshabilitados</u></h2>
        <!-- Agrega el contenido de tu página aquí -->
    </div>
    <br>

    <a href="<?php echo base_url(); ?>index.php/administrador/indexCursos">
        <button type="button" class="btn btn-warning">Cursos Habilitados  <i class="bi bi-person-check-fill"></i></button>
    </a>

    <div id="content" class="tabla-contenedor">

        <table id="example" class="table table-bordered table-striped">
            <thead align="center" style="color: black;">
                <tr bgcolor="#3CC6FA">
                    <th>No</th>
                    <th>Nombre del Curso</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Actualizacion</th>
                    <th>Habilitar</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $indice = 1; //el contador comienza en 1
                foreach ($listaCursos->result() as $row) // de la base de datos
                {
                ?>
                    <tr>
                        <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                        <td><?php echo $row->nombre ?></td>
                        <td><?php echo $row->precio ?></td>
                        <td><?php echo $row->descripcion ?></td>
                        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>


                        <!--HABILITAR-->
                        <td>
                            <?php
                            echo form_open_multipart('administrador/habilitarCurso');
                            ?>
                            <input type="hidden" name="idCurso" value="<?php echo $row->id; ?>">
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
                    <th>Nombre del Curso</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
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