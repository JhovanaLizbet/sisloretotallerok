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
                    <div class="col-sm-5">
                        <h5 class="text-white">...</h5>
                        <center>
                            <h3 class="text-primary">Modificar datos del Curso</h3>
                        </center>
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
                        <div>

                        </div>
                    </div>
                    <!----------------------------------- --------------------------------------->
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h4 class="card-title">Puede modificar los campos que desea</h4>
                                </center>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                foreach ($obtenerDetalleCurso->result() as $row) {
                                    echo form_open_multipart('administrador/modificarCursoBDD');
                                ?>

                                    <input type="texto" id="idCurso" name="idCurso" value="<?php echo $row->id ?>" class="form-control">

                                    <b>Gestion:</b>
                                    <input type="text" id="gestion" name="gestion" value="<?php echo $row->GESTION ?>" class="form-control input-md" placeholder="Gestion del curso" required aria-invalid="true" pattern="[0-9]+" required>
                                    <div class="error-message" id="gestion-error">Solo se permiten números</div>
                                    <?php echo form_error('gestion'); ?>

                                    <b>Codigo:</b>
                                    <input type="text" name="codigo" value="<?php echo $row->CODIGO ?>" placeholder="Codigo del curso" class="form-control input-md" required aria-invalid="true">

                                    <b>Nombre del Curso:</b>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $row->CURSO ?>" class="form-control" aria-invalid="true" required>
                                    <?php echo form_error('nombre'); ?>

                                    <br>Nivel:</br>
                                    <select class="form-control input-md" id="nivel" name="nivel">

                                        <?php
                                        if ($row->NIVEL == 'Basico') {
                                        ?>
                                            <option value="Basico" selected>Basico</option>
                                            <option value="Medio">Medio</option>
                                            <option value="Avanzado">Avanzado</option>
                                            <?php
                                        } else {
                                            if ($row->NIVEL == 'Medio') {
                                            ?>
                                                <option value="Medio" selected>Medio</option>
                                                <option value="Basico">Basico</option>
                                                <option value="Avanzado">Avanzado</option>
                                            <?php
                                            } else {
                                            ?>

                                                <option value="Avanzado" selected>Avanzado</option>
                                                <option value="Basico">Basico</option>
                                                <option value="Medio">Medio</option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('nivel'); ?>

                                    <b>Duracion:</b>
                                    <input type="text" name="duracion" value="<?php echo $row->DURACION ?>" placeholder="Duracion del curso" class="form-control input-md" required aria-invalid="true">
                                    <?php echo form_error('duracion'); ?>

                                    <br>Dia o dias de clases:</br>
                                    <select class="form-control input-md" id="diaClase" name="diaClase" value="<?php echo $row->DIA ?>">
                                        <?php
                                        if ($row->DIA == 'Lunes a Viernes') {
                                        ?>
                                            <option value="Lunes a Viernes" selected>Lunes a Viernes</option>
                                            <option value="Sabado">Sabado</option>
                                            <option value="Domingo">Domingo</option>
                                            <?php
                                        } else {
                                            if ($row->DIA == 'Sabado') {
                                            ?>
                                                <option value="Sabado" selected>Sabado</option>
                                                <option value="Lunes a Viernes">Lunes a Viernes</option>
                                                <option value="Domingo">Domingo</option>
                                            <?php
                                            } else {
                                            ?>

                                                <option value="Domingo" selected>Domingo</option>
                                                <option value="Lunes a Viernes">Lunes a Viernes</option>
                                                <option value="Sabado">Sabado</option>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                    <?php echo form_error('diaClase'); ?>

                                    <b>Hora: <?php echo $row->HORA ?></b>
                                    <select class="form-control input-md" id="hora" name="hora" value="<?php echo $row->hora ?>" required>
                                    <option value="06:00-07:00">06:00 AM - 07:00 AM</option>
                                    <option value="07:00-08:00">07:00 AM - 08:00 AM</option>
                                    <option value="08:00-09:00">08:00 AM - 09:00 AM</option>
                                    <option value="09:00-10:00">09:00 AM - 10:00 AM</option>
                                    <option value="09:00-10:30">09:00 AM - 10:30 AM</option>                                    
                                    <option value="10:00-11:00">10:00 AM - 11:00 AM</option>
                                    <option value="10:30-12:00">10:30 AM - 12:00 AM</option>                                    
                                    <option value="11:00-12:00">11:00 AM - 12:00 AM</option>
                                    <option value="12:00-14:00">12:00 AM - 14:00 PM</option>
                                    <option value="14:00-15:00">14:00 PM - 15:00 PM</option>
                                    <option value="14:00-19:00">14:00 PM - 19:00 PM</option>
                                    <option value="15:00-16:00">15:00 PM - 16:00 PM</option>
                                    <option value="16:00-17:00">16:00 PM - 17:00 PM</option>
                                    <option value="17:00-18:00">17:00 PM - 18:00 PM</option>
                                    <option value="18:00-19:00">18:00 PM - 19:00 PM</option>
                                    <option value="19:00-20:00">19:00 PM - 20:00 PM</option>
                                    <option value="20:00-21:00">20:00 PM - 21:00 PM</option>
                                    <option value="21:00-22:00">21:00 PM - 22:00 PM</option> 
                                    </select>
                                    <?php echo form_error('hora'); ?>

                                    <b>Inicio del Curso:</b>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fechaInicio" value="<?php echo $row->FECHAI; ?>" name="fechaInicio" autocomplete="off">

                                    <b>Fin del Curso:</b>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fechaFin" value="<?php echo $row->FECHAF; ?>" name="fechaFin" autocomplete="off">

                                    <b>Precio del Curso:</b>
                                    <input type="text" id="preciotTotal" name="precioTotal" value="<?php echo $row->TOTAL ?>" class="form-control" aria-invalid="true" pattern="[0-9.]+" required>
                                    <div class="error-message" id="precio-error">Solo se permiten números</div>
                                    <?php echo form_error('precio'); ?>


                                    <b>Descripcion:</b>
                                    <input type="text" name="descripcion" value="<?php echo $row->DESCRIPCION ?>" rows="2" cols="45" class="form-control input-md" required aria-invalid="true">
                                    
                                    <b>Instructor: <?php echo $row->nameinstructor ?></b>
                                    <select name="idInstructor" id="idInstructor" class="form-control form-select form-select-lg" required>
                                        <option value="" disabled selected>Seleccionar Instructor</option>

                                        <?php foreach ($listaInstructoresCombo->result() as $row) : ?>
                                            <?php
                                            $selected = ($row->id == $curso->idInstructor) ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo $row->id; ?>" <?php echo $selected; ?>>
                                                <?php echo $row->instructorname; ?> <!-- Consulta donde se obtienen nombres y apellidos del instructor -->
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <br></br>

                                    <button type="submit" class="btn btn-success"> MODIFICAR <i class="fa fa-pen"></i></button>

                                <?php echo form_close();
                                }
                                ?>

                            </div>
                            <a href="<?php echo base_url(); ?>index.php/administrador/indexCursos">
                                <button class="btn btn-dark">CANCELAR <i class="bi bi-x-circle"></i></button>
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

</main>
</div>
</div>