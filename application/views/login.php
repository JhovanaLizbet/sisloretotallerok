<!--                               INICIO  CABECERA                                   -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistema Loreto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url();?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
</head>
<!--                                  FIN  CABECERA                                   -->

<!--                               INICIO  MENU SUPERIOR                              -->
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-99">
        <a href="<?php echo base_url(); ?>index.php/usuarios" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="<?php echo base_url();?>img/loretosin.png" width="75px" alt="">
            <h4 class="m-0 text-primary">Centro Acuatico<br>Loreto</br></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url(); ?>index.php/usuarios" class="nav-item nav-link active">Inicio</a>
                <a href="#" class="nav-item nav-link">Nosotros</a>
                <!--  <a href="courses.html" class="nav-item nav-link">Courses</a> -->  
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Clases</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="" class="dropdown-item">Natacion</a>
                        <a href="" class="dropdown-item">Natacion Intensivo</a>
                        <a href="" class="dropdown-item">Aquabebe</a>
                        <a href="" class="dropdown-item">Gimnasia en el agua</a>
                        <a href="" class="dropdown-item">Balneario</a>                        
                    </div>
                </div>

                <a href="#" class="nav-item nav-link">Horarios</a>                
                <a href="#" class="nav-item nav-link">Instalaciones</a>
                <a href="#" class="nav-item nav-link">Contacto</a>
                <a href="#" class="nav-item nav-link">Registrarse</a>
            </div>
            
            <!--<a href="usuarios" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>-->
            <a class="nav-link" href="" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/login3.png">
            </a>
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/usuarios" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/exit5a.png">
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-blue navbar-light shadow sticky-top p-0">        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <a href="" class="nav-item nav-link active"></a>
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active"></a>        
            <a href="" class="nav-item nav-link active">Bienvenid@: <?php echo $this->session->userdata('login'); ?></a>
            <a href="" class="nav-item nav-link active">Rol: <?php echo $this->session->userdata('tipo'); ?></a>
                <a href="" class="nav-item nav-link active">Fecha: <?php echo date('d/m/Y'); ?></a>                     
        </div>
    </nav>
    
   <!--  Navbar End -->

<!--                                FIN  MENU SUPERIOR                                -->

<!----------------------------------- INICIO CENTRO --------------------------------------->
<body class="hold-transition login-page">

<section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="row">
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">              
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">                
                <h5 class="text-white">iniciar sesion</h5>

                <div class="login-box">
  <div class="login-logo">
    <h4 class="text-primary text-center"><a>Iniciar Sesion</a></h4>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php  
          switch($msg)
          {
            case'1':
              $mensaje="Error de ingreso";
              $clase="primary";
              break;

            case'2':
              $mensaje="Acceso no válido";
              $clase="danger";
              break;

            case'3':
              $mensaje="Gracias por usar el sistema";
              $clase="warning";
              break;

            default:
              $mensaje="Ingrese su usuario y congtraseña para iniciar sesion";
              $clase="primary";
              break;
          }
      ?>
      <p class="login-box-msg text-<?php echo $clase; ?>"> <?php echo $mensaje; ?></p>

<!--  -->



<!-- INI FORMULARIO -->

<?php 
  echo form_open_multipart('usuarios/validarusuario', array('id'=>'form1', 'class'=>'needs-validation','method'=>'post'));
?>      
        <b>Usuario</b>
        <div class="input-group mb-3">
          
          <input type="text" class="form-control" placeholder="Ingresa tu usuario" name="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <b>Contraseña</b>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<?php  
  echo form_close();
?>      


      <div class="social-auth-links text-center mb-3">
        <p>______________________________________</p>

      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a class="text-center">¿Olvidaste tu contraseña?</a>
      </p>
      <p class="mb-0">
        <a class="text-center">Escribenos al número:</a>
      </p>
      <p class="mb-0">
        <a class="text-center">Whatsapp  70368576</a>
        <img src="<?php echo base_url();?>adminlte/dist/img/wat.png">
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>




            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">              
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->


<!------------------------------------- FIN  CENTRO --------------------------------------->

<!--                               INICIO  PIE                                       -->
    <!-- Footer Start -->
    <footer>    
        <section>
            <svg class="w-100" style="height: 4rem;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="waves">
                    <use href="#gentle-wave" x="48" y="0" fill="#4ab5df" />
                    <use href="#gentle-wave" x="48" y="3" fill="#259fd3" />
                    <use href="#gentle-wave" x="48" y="5" fill="rgba(12,44,101,0.3)" />
                    <use href="#gentle-wave" x="48" y="7" fill="rgba(12,44,101,1)" />
                </g>
            </svg>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="<?php echo base_url();?>img/fondo.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container py-5">
                            <div class="row g-5">
                                <!--<div class="col-lg-3 col-md-6">
                                    <h4 class="text-white mb-3">Quick Link</h4>
                                    <a class="btn btn-link" href="">About Us</a>
                                    <a class="btn btn-link" href="">Contact Us</a>
                                    <a class="btn btn-link" href="">Privacy Policy</a>
                                    <a class="btn btn-link" href="">Terms & Condition</a>
                                    <a class="btn btn-link" href="">FAQs & Help</a>
                                </div>-->
                                <div class="col-lg-4 col-md-6">
                                    <h4 class="text-white mb-3">Contactos</h4>
                                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Calle nicasio ríos 797 Zona Loreto</p>
                                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>70368576</p>
                                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>club.acuatico.loreto@gmail.com</p>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h4 class="text-white mb-3">Galeria</h4>
                                    <div class="row g-2 pt-2">
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-1.jpg" alt="">
                                        </div>
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-2.jpg" alt="">
                                        </div>
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-3.jpg" alt="">
                                        </div>
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-2.jpg" alt="">
                                        </div>
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-3.jpg" alt="">
                                        </div>
                                        <div class="col-4">
                                            <img class="img-fluid bg-light p-1" src="<?php echo base_url();?>img/course-1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <h4 class="text-white mb-3">Redes Sociales</h4>
                                    <div class="position-relative mx-auto" style="max-width: 400px;">
                                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
                                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-tiktok"></i></a>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center><h6 class="text-blue mb-3">Copyright &copy; 2023. Todos los derechos reservados</h6></center>
            <center><h6 class="text-blue mb-3">Diseñado por: Jhovana Flores</h6></center>
        </div>
        <!-- Carousel End -->
        </section>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>lib/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url();?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url();?>js/main.js"></script>

    <!-- jQuery -->
<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>

<!--                               FIN     PIE                                       -->