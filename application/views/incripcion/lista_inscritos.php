<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->
    <center>
        <h1></h1>
        <h1>Lista de Inscritos</h1>
    </center>
    <div id="content" class="tabla-contenedor">
        <table id="example" class="table table-bordered table-striped">
            <thead align="center" style="color: black;">
                <tr bgcolor="#3CC6FA">
                    <th>No</th>
                    <th>Nombre Cliente</th>
                    <th>Curso Inscrito</th>
                    <th>Fecha de la Inscripcion</th>
                    <th>PDF</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $indice = 1; //el contador comienza en 1
                foreach ($inscritos as $inscrito) // de la base de datos
                {
                ?>
                    <tr>
                        <td><?php echo $indice; ?></td>
                        <td><?php echo $inscrito->cliente; ?></td>
                        <td><?php echo $inscrito->nombreCurso; ?></td>
                        <td><?php echo $inscrito->fechaInscripcion; ?></td>
                        
                        <td>
                        <a href="<?php echo base_url(); ?>index.php/recibo/generarReciboPDF3">
                                <button class="btn btn-danger">PDF</button>
                            </a>
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
                    <th>Nombre Cliente</th>
                    <th>Curso Inscrito</th>
                    <th>Fecha de la Inscripcion</th>
                    <th>PDF</th>
                </tr>
            </tfoot>
        </table>
    </div>