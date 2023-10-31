<!--                               INICIO  MENU SUPERIOR                              -->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-99">
        <a href="<?php echo base_url();?>index.php/usuarios" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="<?php echo base_url();?>img/loretosin.png" width="75px" alt="">
            <h4 class="m-0 text-primary">Centro Acuatico<br>Loreto</br></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url();?>index.php/usuarios" class="nav-item nav-link active">InicioJHOVANASDFSDFSD</a>
                <a href="#" class="nav-item nav-link">Nosotros</a>
                <!--  <a href="courses.html" class="nav-item nav-link">Courses</a> -->  
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Clases</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="#" class="dropdown-item">Natacion</a>
                        <a href="#testimonial.html" class="dropdown-item">Natacion Intensivo</a>
                        <a href="#" class="dropdown-item">Aquabebe</a>
                        <a href="#" class="dropdown-item">Gimnasia en el agua</a>
                        <a href="#" class="dropdown-item">Balneario</a>                        
                    </div>
                </div>

                <a href="#" class="nav-item nav-link">Horarios</a>                
                <a href="#" class="nav-item nav-link">Instalaciones</a>
                <a href="#" class="nav-item nav-link">Contacto</a>
                <a href="#" class="nav-item nav-link">Registrarse</a>
            </div>
            
            <!--<a href="usuarios" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>-->
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/usuarios/indexLogin" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/login3.png">
            </a>
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/usuarios" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/exit5a.png">
            </a>
        </div>
    </nav>

   <!--  Navbar End -->

<!--                                FIN  MENU SUPERIOR                                -->
