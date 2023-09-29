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
                    <div class="col-sm-3">
                        <h1></h1>
                    </div>
                    <div class="col-sm-5">
                        <h5 class="text-white">...</h5>
                        <h3 class="text-primary">Datos Personales del Usuario</h3>
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
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div>

                        </div>
                    </div>
                    <!----------------------------------- --------------------------------------->
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datos Personales del Usuario</h4>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p>Login: <?php echo $perfil->login; ?></p>
                                <p>Tipo: <?php echo $perfil->tipo; ?></p>

                            </div>

                            <?php
                            foreach ($listaUsuariosLogeado->result() as $row) {
                            ?>
                                <?php
                                echo form_open_multipart('usuarios/modificar');
                                ?>
                                <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa-solid fa-user-pen fa-lg"></i> <b>Editar Datos</b></button>
                                <?php echo form_close();
                                ?>
                            <?php
                            }
                            ?>


                            <a href="<?php echo base_url(); ?>index.php/usuarios/modificar">
                                <button type="submit" class="btn btn-success"><i class="fa fa-pen-square"></i><b>EDITAR DATOS</b></button>
                            </a>
                            <a href="<?php echo base_url(); ?>index.php/usuarios/verListaUsuarios">
                                <button class="btn btn-dark">CANCELAR</button>
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


    <!-- application/views/perfil.php 
<!DOCTYPE html>
<html>
<head>
    <title>Mi Perfil</title>
</head>
<body>
    <h1>Mi Perfil</h1>
    <p>Nombre: <?php echo $perfil->login; ?></p>
    <p>Correo: <?php echo $perfil->tipo; ?></p>
    Agrega otros campos del perfil aquí según sea necesario
</body>
</html>
-->