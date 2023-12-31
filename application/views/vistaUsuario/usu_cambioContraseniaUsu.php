<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <!-- Contenido principal de tu página -->

  <!-- ------------------------------------------------------------------------------------------ -->
  

<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CAMBIAR CONTRASEÑA</h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/index">
                        <button type="reset" class="btn btn-danger">Cancelar Cambio de contraseña<strong><samp class="fa-regular fa-thumbs-down fa-xl"></samp></strong></button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Introducir los siguientes datos <i class="fa-solid fa-triangle-exclamation fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('administrador/verificarDatosContrasenia');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ingresar la Contraseña Actual:</label>
                                    <input type="password" class="form-control" id="contraseniaActual" autocomplete="off" name="contraseniaActual" required aria-invalid="true" placeholder="Contraseña Actual">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ingresar la Contraseña Nueva:</label>
                                    <input type="password" class="form-control" id="contraseniaNueva" autocomplete="off" name="contraseniaNueva" required aria-invalid="true" placeholder="Ingrese la contrase nueva">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nuevamente ingresar la Contraseña Nueva:</label>
                                    <input type="password" class="form-control" id="repeContraseniaNueva" autocomplete="off" name="repeContraseniaNueva" required aria-invalid="true" placeholder="Reingrese la contrase nueva">
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-4 form-group">                                    
                                </div>
                                <div class="col-md-2 form-group">
                                    <button type="submit" class="btn btn-success btn-block">Cambiar</button>
                                </div>
                                <div class="col-md-2 form-group">
                                    <a href="<?php echo base_url() ?>index.php/administrador/index">
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </a>
                                </div>
                                <div class="col-md-4 form-group">                                    
                                </div>

                            </div>
                            
                        </div>
                        <!-- /.card-body -->


                        <?php echo form_close(); ?>
                    </div>

                </div>
                <div class="col-md-2"></div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>