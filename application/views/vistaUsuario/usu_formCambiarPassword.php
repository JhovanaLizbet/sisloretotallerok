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
                <h3 class="text-primary posicion"><b style="color: white;">.......</b>Cambiar mi contraseña</h3>

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
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"> <!-- col-lg-3 posiscion de la columna-->
                        <div>

                        </div>
                    </div>
                    <!----------------------------------- --------------------------------------->
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h4 class="card-title">Introducir los siguientes datos</h4>
                                </center>
                            </div>
                            <!-- /.card-header -->

                            <?php
                            echo form_open_multipart('administrador/verificarDatosContrasenia');
                            ?>

                            <div class="card-body">

                                <b>Ingresar la Contraseña Actual:</b>
                                <input type="password" class="form-control" id="contraseniaActual" autocomplete="off" name="contraseniaActual" required aria-invalid="true" placeholder="Contraseña Actual">

                                <b>Ingresar la Contraseña Nueva:</b>
                                <input input type="password" class="form-control" id="contraseniaNueva" autocomplete="off" name="contraseniaNueva" required aria-invalid="true" placeholder="Ingresar la contraseña nueva">

                                <b>Reingresar la Contraseña Nueva:</b>
                                <input type="password" class="form-control" id="repeContraseniaNueva" autocomplete="off" name="repeContraseniaNueva" required aria-invalid="true" placeholder="Nuevamente ingresar la contraseña nueva">

                                <br></br>

                                <button type="submit" class="btn btn-success">CAMBIAR <i class="fa fa-user-edit"></i> </button>

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