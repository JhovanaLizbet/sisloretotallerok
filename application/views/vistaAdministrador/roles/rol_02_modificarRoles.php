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
                            <h3 class="text-primary">Modificar datos del Rol</h3>
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
                                foreach ($datosDelRol->result() as $row) {
                                    echo form_open_multipart('administrador/modificarRolBDD');
                                ?>

                                    <input type="texto" id="idRol" name="idRol" value="<?php echo $row->id ?>" class="form-control">

                                    <b>Nombre del Rol:</b>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $row->nombre ?>" class="form-control" aria-invalid="true" required>                                    
                                    <?php echo form_error('nombre'); ?> <!-- --> <!-- -->

                                    <b>Descripcion:</b>
                                    <input type="text" name="descripcion" value="<?php echo $row->descripcion ?>" class="form-control input-md" required aria-invalid="true">

                                    <br></br>

                                    <button type="submit" class="btn btn-success"> MODIFICAR <i class="fa fa-pen"></i></button>
                                <?php echo form_close();
                                }
                                ?>
                            </div>
                            <a href="<?php echo base_url(); ?>index.php/administrador/indexRoles">
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