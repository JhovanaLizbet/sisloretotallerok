<!-- Menú lateral -->
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Contenido del menú lateral -->

                <div>
                  <h7 align="center" style="color: transparent;">Adminstrador</h7>
                  <h5 align="center">Usuario: <?php echo $this->session->userdata('login'); ?></h5>
                </div>
                <div align="center">
                  <img src="<?php echo base_url();?>img/userman4.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>
                <div align="center">
                  <a style="color: darkcyan;" class="d-block">Rol: <?php echo $this->session->userdata('tipo'); ?></a>
                </div>
                <div align="center">
                  <a class="d-block">__________________________</a>
                </div>
                <div align="center">
                  <a href="<?php echo base_url(); ?>index.php/usuarios/cambiarContrasenia"><h6 style="color: darkcyan;">Ver Perfil</h6></a>
                </div>
                <div align="center">
                  <a class="d-block">__________________________</a>
                </div>


                <ul class="nav flex-column">
                    <!-- Agrega tus elementos de menú aquí -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i> Configuración
                        </a>
                    </li>
                    <!-- Agrega más elementos de menú según sea necesario -->
                </ul>
            </div>
        </nav>
        
        <!-- Contenedor principal al lado derecho -->

        
        
