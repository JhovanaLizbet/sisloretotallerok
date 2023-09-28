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
                    <div class="col-sm-4">
                        <h5 class="text-white">...</h5>
                        <h3 class="text-primary">Crear Nueva Cuenta de Usuario</h3>
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
                                <h4 class="card-title">Rellene el formulario para crear una cuenta nueva</h4>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                switch ($msg) {
                                    default:
                                        $mensaje = "Rellene los siguientes campos en el formulario";
                                        $clase = "primary";
                                        break;
                                }
                                ?>
                                <p class="login-box-msg text-<?php echo $clase; ?>"> <?php echo $mensaje; ?></p>

                                <!-- INI FORMULARIO -->





                                <?php
                                echo form_open_multipart('usuarios/validarusuario', array('id' => 'form1', 'class' => 'needs-validation', 'method' => 'post'));
                                ?>
                                <?php
                                echo form_open_multipart('estudiante/agregarbd');
                                ?>

                                <!-- ///////////////////////////////////////////////////////////////// -->
                                <div class="bg1">
                                    <div class="col-md-12 panel"> <!-- tamaño del textbox 12 grande, 1 pequeño -->

                                        <!-- sign in form begins -->
                                        <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
                                            <fieldset>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="name"></label>
                                                    <div class="col-md-12">
                                                        <b>Nombre:</b><input type="text" id="name" name="nombre" placeholder="Ingresa tu nombre" class="form-control input-md" value="<?php echo set_value('nombre'); ?>">
                                                        <?php echo form_error('nombre'); ?>
                                                    </div>
                                                </div>
                                                <!--<b>Nombre:</b>
          <input type="text" id="palabra" name="nombre" placeholder="Escriba el nombre" class="form-control" value="<?php echo set_value('nombre'); ?>" onkeyup="validarPalabras()"> -->

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="name"></label>
                                                    <div class="col-md-12">
                                                        <b>Apellido Paterno:</b></b><input type="text" id="name" name="apellido1" placeholder="Ingresa tu primer apellido" class="form-control input-md" value="<?php echo set_value('apellido1'); ?>">

                                                        <?php echo form_error('apellido1'); ?>
                                                    </div>
                                                </div>
                                                <!-- 
            <b>Apellido Paterno:</b>
          <input type="text" id="pal" name="apellido1" placeholder="Escriba el primer apellido" class="form-control" value="<?php echo set_value('apellido1'); ?>" onkeyup="validarPalabras()" >
          <span id="mensaje-error" style="display: none; color: red;">Solo se permiten letras.</span>

          
          -->

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="name"></label>
                                                    <div class="col-md-12">
                                                        <b>Apellido Materno:</b><input type="text" id="name" name="apellido2" placeholder="Ingresa tu segundo apellido" class="form-control input-md" value="<?php echo set_value('apellido2'); ?>">
                                                        <?php echo form_error('apellido2'); ?>
                                                    </div>
                                                </div>
                                                <!--
            <b>Apellido Materno:</b>
          <input type="text" name="apellido2" placeholder="Escriba el segundo apellido" class="form-control" value="<?php echo set_value('apellido2'); ?>">
          -->

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="name"></label>
                                                    <div class="col-md-12">
                                                        <b>Carnet de Identidad:</b><input type="text" id="name" name="ci" placeholder="Ingresa tu carnet de identidad" class="form-control input-md" value="<?php echo set_value('ci'); ?>">
                                                        <?php echo form_error('ci'); ?>
                                                    </div>
                                                </div>
                                                <!--
            <b>Carnet de Identidad:</b>
          <input type="text" name="ci" placeholder="Escriba su carnet de identidad" class="form-control" value="<?php echo set_value('ci'); ?>">
          -->

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="gender"></label>
                                                    <div class="col-md-12">
                                                        <b>Sexo:</b><select id="gender" name="genero" placeholder="Ingresa tu género" class="form-control input-md" value="<?php echo set_value('genero'); ?>">
                                                            <option value="M">Hombre</option>
                                                            <option value="F">Mujer</option>
                                                        </select>
                                                        <?php echo form_error('genero'); ?>
                                                    </div>
                                                </div>

                                                <!-- 
            <b>Sexo:</b>
          <input type="text" name="genero" placeholder="Escriba su genero" class="form-control" value="<?php echo set_value('genero'); ?>">          
           -->

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="name"></label>
                                                    <div class="col-md-12">
                                                        <b>Direccion:</b><input type="text" id="name" name="direccion" placeholder="Ingresa tu direccion" class="form-control input-md" value="<?php echo set_value('direccion'); ?>">
                                                        <?php echo form_error('direccion'); ?>
                                                    </div>
                                                </div>
                                                <!-- 
            <b>Direccion:</b>
          <input type="text" name="direccion" placeholder="Escriba su direccion" class="form-control" value="<?php echo set_value('direccion'); ?>">          
           -->

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label title1" for="email"></label>
                                                    <div class="col-md-12">
                                                        <b>Correo Electronico:</b><input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" class="form-control input-md" value="<?php echo set_value('email'); ?>">
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <!-- 
           -->

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="mob"></label>
                                                    <div class="col-md-12">
                                                        <b>Nro. de Celular:</b><input type="number" id="mob" name="celular" placeholder="Ingresa tu número celular" class="form-control input-md" value="<?php echo set_value('celular'); ?>">
                                                        <?php echo form_error('celular'); ?>
                                                    </div>
                                                </div>
                                                <!--  -->

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="password"></label>
                                                    <div class="col-md-12">
                                                        <b>Contraseña:</b><input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control input-md" value="<?php echo set_value('password'); ?>">
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <!--  -->

                                                <div class="form-group">
                                                    <label class="col-md-12control-label" for="cpassword"></label>
                                                    <div class="col-md-12">
                                                        <b>Contraseña:</b><input type="password" id="cpassword" name="cpassword" placeholder="Confirma tu contraseña" class="form-control input-md">

                                                    </div>
                                                </div>
                                                <!--  -->
                                                <?php if (@$_GET['q7']) {
                                                    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
                                                }
                                                ?>
                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for=""></label>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="sub btn btn-primary btn-block">Registrarse</button>
                                                        <button class="btn btn-dark"> CANCELAR </button>
                                                    </div>
                                                </div>

                                                <?php
                                                echo form_close();
                                                ?>


                                    </div>

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