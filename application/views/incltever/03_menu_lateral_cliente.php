<!-- Menú lateral -->

<div class="container-fluid">
  <div class="row">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="position-sticky">
        <!-- Contenido del menú lateral -->

        <div>
          <h7 align="center" style="color: transparent;">Adminstrador</h7>
          <h5 align="center">Usuario: <?php echo $this->session->userdata('nombreApellido'); ?></h5>
        </div>
        <div align="center">
          <img src="<?php echo base_url(); ?>img/userman4.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <div align="center">
          <a style="color: darkcyan;" class="d-block">Rol: <?php echo $this->session->userdata('tipo'); ?></a>
        </div>
        <div align="center">
          <a class="d-block">__________________________</a>
        </div>
        <div align="center">
          <a href="<?php echo base_url(); ?>index.php/usuarios/perfilUsuario">
            <button type="button" class="btn btn-primary btn-block"><i class="fa fa-user"></i> <b>Ver Mi Perfil</b></button>
          </a>
        </div>
        <div align="center">
          <a class="d-block">__________________________</a>
        </div>


        <ul class="nav flex-column">
          <!-- Agrega tus elementos de menú aquí -->
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url(); ?>index.php/cliente/index">
              <i class="fas fa-home"></i> Inicio
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/busqueda/listaCursos">
              <i class="fas fa-swimmer"></i> Lista de Cursos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/inscripcion/listaInscritos">
              <i class="fas fa-swimmer"></i> Lista de Inscritos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/inscripcion/crear">
              <i class="fas fa-pen"></i> Inscripcion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/administrador/indexClientes">
              <i class="fas fa-users"></i> Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/cliente/indexBuscar">
              <i class="fas fa-swimmer"></i> Cursos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/inscripcion/verRangosEntreFechas">
              <i class="fas fa-swimmer"></i> Reportes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/administrador/indexInstructores">
              <i class="fas fa-user-tie"></i> Instructores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/administrador/indexComunicados">
              <i class="fas fa-address-book"></i> Comunicados
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/administrador/indexAmbientes">
              <i class="fa fa-swimming-pool"></i> Ambientes
            </a>
          </li>


          <!-- Agrega más elementos de menú según sea necesario -->
        </ul>
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>
      </div>
    </nav>

    <!-- Contenedor principal al lado derecho -->