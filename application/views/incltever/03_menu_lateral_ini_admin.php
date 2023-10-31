<!-- Menú lateral -->

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Contenido del menú lateral 

                <div>
                    <h7 align="center" style="color: transparent;">Adminstrador</h7>
                    <h5 align="center">Usuario: <?php echo $this->session->userdata('nombreApellido'); ?></h5>
                </div>
                <div align="center">
                    <img src="<?php echo base_url(); ?>img/userman4.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>-->
                <br>
                <div align="center">
                    <h5 style="color: blue;" class="d-block">Rol: <?php echo $this->session->userdata('tipo'); ?></h5>
                </div>
                <div align="center">
                    <a class="d-block">__________________________</a>
                </div>

                <ul class="nav flex-column">
                    <!-- Agrega tus elementos de menú aquí -->
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url(); ?>index.php/usuarios/bienvenida">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-user"></i> Usuarios <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/usuarios/agregarUsuario"><i class="fas fa-check">
                                    </i> Nuevo Usuario</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/administrador/listaUsuarios"><i class="fas fa-check">
                                    </i> Lista de Usuarios</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/busqueda/listaUsuariosBusqueda"><i class="fas fa-check">
                                    </i> Buscar Usuario</a>
                            </li>
                        </ul>                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" >
                            <i class="fas fa-users"></i> Clientes <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/usuarios/registrarCli"><i class="fas fa-check">
                                    </i> Nuevo Cliente</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/administrador/listaClientesHab"><i class="fas fa-check">
                                    </i> Lista de Clientes</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Buscar Cliente</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-user-tie"></i> Instructores <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Nuevo Instructor</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Lista de Instructores</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Buscar Instructor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-swimmer"></i> Cursos <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Nuevo Curso</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Lista de Cursos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Buscar Curso</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-book"></i> Inscripción <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Nueva Inscripción</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Lista de Inscritos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-bullhorn"></i> Comunicados <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Nuevo Comunicado</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/"><i class="fas fa-check">
                                    </i> Lista de Comunicados</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/inscripcion/verRangosEntreFechas">
                            <i class="fas fa-file"></i> Reportes 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/administrador/indexRoles">
                            <i class="fa fa-star"></i> Rol 
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