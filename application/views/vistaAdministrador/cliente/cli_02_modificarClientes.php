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
                            <h3 class="text-primary">Modificar datos del Cliente</h3>
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
                                foreach ($datosDelCliente->result() as $row) {
                                    echo form_open_multipart('administrador/modificarClienteBDD');
                                ?>

                                    <input type="texto" id="idCliente" name="idCliente" value="<?php echo $row->id ?>" class="form-control">

                                    <b>Nombre Completo:</b>
                                    <input type="text" id="nombres" name="nombres" value="<?php echo $row->nombres ?>" class="form-control" aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                    <div class="error-message" id="nombres-error">Solo se permiten letras</div>
                                    <?php echo form_error('nombres'); ?> <!-- --> <!-- -->

                                    <input type="text" id="primerApellido" name="primerApellido" value="<?php echo $row->primerApellido ?>" class="form-control" aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                    <div class="error-message" id="primerApellido-error">Solo se permiten letras</div>
                                    <?php echo form_error('primerApellido'); ?>

                                    <input type="text" id="segundoApellido" name="segundoApellido" value="<?php echo $row->segundoApellido ?>" class="form-control" aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                    <div class="error-message" id="segundoApellido-error">Solo se permiten letras</div>
                                    <?php echo form_error('segundoApellido'); ?>


                                    <b>Carnet de Identidad:</b>
                                    <input type="text" id="ci" name="ci" value="<?php echo $row->ci ?>" class="form-control" aria-invalid="true" pattern="[0-9]+" required>
                                    <div class="error-message" id="ci-error">Solo se permiten números</div>
                                    <?php echo form_error('ci'); ?>

                                    <b>Fecha de Nacimiento:</b>
                                    <input type="date" value="<?php echo $row->fechaNacimiento ?>" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required aria-invalid="true">
                                    <?php echo form_error('fechaNacimiento'); ?>
                                    
                                    <br>Sexo:</br>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <?php
                                        if ($row->sexo == 'F') {
                                        ?>
                                            <option value="F" selected>Femenino</option>
                                            <option value="M">Masculino</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="F">Femenino</option>
                                            <option value="M" selected>Masculino</option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <b>Razon Social:</b>
                                    <input type="text" name="razonSocial" value="<?php echo $row->razonSocial ?>" class="form-control input-md" required aria-invalid="true">

                                    <b>Direccion:</b>
                                    <input type="text" name="direccion" value="<?php echo $row->direccion ?>" class="form-control input-md" required aria-invalid="true">

                                    <b>Correo Electronico:</b>
                                    <input type="email" id="email" name="email" value="<?php echo $row->email ?>" class="form-control input-md" aria-invalid="true" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                                    <?php echo form_error('email'); ?>

                                    <b>Celular:</b>
                                    <input type="text" id="telefono" name="telefono" value="<?php echo $row->telefono ?>" class="form-control input-md" aria-invalid="true" aria-invalid="true" pattern="[0-9]+">
                                    <div class="error-message" id="telefono-error">Solo se permiten números</div>
                                    <?php echo form_error('telefono'); ?>


                                    <br></br>

                                    <button type="submit" class="btn btn-success"> MODIFICAR <i class="fa fa-pen"></i></button>
                                <?php echo form_close();
                                }
                                ?>
                            </div>
                            <a href="<?php echo base_url(); ?>index.php/administrador/listaClientesHab">
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