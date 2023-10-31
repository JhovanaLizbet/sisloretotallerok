<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div>

                <h5 class="text-white posicion">...</h5>
                <h3 class="text-primary posicion"><b style="color: white;"></b>Crear Nueva Cuenta de Usuariolllllllllll</h3>

            </div>

            <!-- 
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <h1>d</h1>
                    </div>
                    <div class="col-sm-5">
                        <h5 class="text-white">...</h5>
                        <center>
                            <h3 class="text-primary">Crear Nueva Cuenta de Usuario</h3>
                        </center>
                    </div>
                    <div class="col-sm-1">
                        <h1></h1>
                    </div>
                </div>/.container-fluid -->
        </section>

        <!-- Main content -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div>

                        </div>
                    </div>
                    <!----------------------------------- --------------------------------------->
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h4 class="card-title">Rellene el formulario para crear una nueva cuenta</h4>
                                </center>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                echo form_open_multipart('usuarios/agregarUsuarioBDD');
                                ?>

                                <b>Nombre Completo:</b>
                                <input type="text" id="nombres" name="nombres" placeholder="Nombres" class="form-control input-md" autocomplete="off" required aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                <div class="error-message" id="nombres-error">Solo se permiten letras</div>

                                <?php echo form_error('nombres'); ?> <!-- --> <!-- -->

                                <input type="text" id="primerApellido" name="primerApellido" class="form-control input-md" placeholder="Apellido Paterno" required aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                <div class="error-message" id="primerApellido-error">Solo se permiten letras</div>

                                <?php echo form_error('primerApellido'); ?>

                                <input type="text" id="segundoApellido" name="segundoApellido" class="form-control input-md" placeholder="Apellido Materno" required aria-invalid="true" pattern="[A-Za-zñÑ\s]+" required>
                                <div class="error-message" id="segundoApellido-error">Solo se permiten letras</div>

                                <?php echo form_error('segundoApellido'); ?>

                                <b>Carnet de Identidad:</b>
                                <input type="text" id="ci" name="ci" class="form-control input-md" placeholder="Carnet de identidad" required aria-invalid="true" pattern="[0-9]+" required>
                                <div class="error-message" id="ci-error">Solo se permiten números</div>

                                <?php echo form_error('ci'); ?>

                                <br>Sexo:</br>
                                <select class="form-control input-md" id="sexo" name="sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>

                                <?php echo form_error('sexo'); ?>

                                <b>Fecha de Nacimiento:</b>
                                <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required aria-invalid="true">

                                <?php echo form_error('fechaNacimiento'); ?>

                                <b>Correo Electronico:</b>
                                <input type="email" id="email" name="email" placeholder="Direccion de correo electronico" class="form-control input-md" required aria-invalid="true" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                                <?php echo form_error('email'); ?>

                                <b>Celular:</b>
                                <input type="text" id="telefono" name="telefono" placeholder="Numero de celular" class="form-control input-md" required aria-invalid="true" pattern="[0-9]+">
                                <div class="error-message" id="telefono-error">Solo se permiten números</div>
                                <?php echo form_error('telefono'); ?>

                                <b>Direccion:</b>
                                <input type="text" name="direccion" placeholder="Direccion donde vive" class="form-control input-md" required aria-invalid="true">
                                <?php echo form_error('direccion'); ?>

                                <b>Contraseña: </b>
                                <input type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" placeholder="Escriba su contraseña" class="form-control input-md" value="<?php echo set_value('password'); ?>" required>
                                <p>Contiene 8 o más caracteres, número, letra mayúscula y minúscula</p>

                                <?php echo form_error('contraseña'); ?>

                                <b>Confirmar Contraseña:</b>
                                <input type="password" id="password2" name="password2" placeholder="Confirme su contraseña" class="form-control input-md" required>

                                <span id="match_status" class="match-tick"></span>
                                <span id="match_text"></span>

                                <br></br>

                                <button type="submit" class="btn btn-success"> REGISTRAR <i class="fa fa-user-plus"></i></button>

                                <?php
                                echo form_close();
                                ?>
                            </div>
                            <a href="<?php echo base_url(); ?>index.php/administrador/index">
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