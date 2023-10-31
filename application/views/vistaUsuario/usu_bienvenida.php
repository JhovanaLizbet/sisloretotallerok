<!-- Contenedor principal al lado derecho -->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->
    <section>
        <div class="menu">
            <div class="profile-button derecho">
                <img src="<?php echo base_url(); ?>img/userman4p.png" class="circulo-img" style="opacity: .8" alt="Perfil" class="profile-image" id="profileBtn">
                <b style="color: black; font-size: 12px;"><?php echo $this->session->userdata('nombreApellido'); ?></b>
                <div class="dropdown-content" id="dropdown">
                    <?php
                    foreach ($listaUsuariosLogueados->result() as $row) {
                    ?>
                        <?php
                        echo form_open_multipart('usuarios/modificarUsuario');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                        <a><button type="submit" class="custom-button"><b class="blue-text">Editar Datos</b></button></a>
                        <?php echo form_close();
                        ?>
                    <?php
                    }
                    ?>
                    <a href="<?php echo base_url(); ?>index.php/administrador/cambioContrasenia"><b class="blue-text">Cambiar Password</b></a>
                    <a href="<?php echo base_url(); ?>index.php/usuarios/logout" id="logout"><b class="blue-text">Cerrar Sesión</b></a>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/script.js"></script>
    </section>
    <br>
    <center>
    <h4><b>INICIO</b></h4>
    </center>
    <br>
    <br>
    
        <center>
            <img src="<?php echo base_url(); ?>adminlte/dist/img/adminA.jpeg">
        </center>
        <br>
        <center>
            <h4>¡¡ Bienvenido Administrador Principal !!</h4>
        </center>


</main>