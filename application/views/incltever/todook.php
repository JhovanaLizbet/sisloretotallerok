<!--                               INICIO  CABECERA                                   -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistema Loreto RE OK</title>
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
<!-- ------------------------------------------------------------------------------------------------ -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
     <!--<link rel="stylesheet" href="<?php echo base_url();?>css/vertical-layout-light/style.css">
    endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    

    <style>
        input:invalid {
            border: 1px solid Silver;
        }

        .error-message {
            color: red;
            display: none;
        }

    </style>
    <style>
        .match-tick::before {
            content: "✔"; /* Símbolo de marca de verificación */
            color: green;
            font-size: 20px;
            margin-right: 5px; /* Espacio entre el símbolo y el texto */
        }
    </style>
    
</head>
<!--                                  FIN  CABECERA                                   -->







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
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="<?php echo base_url();?>img/loretosin.png" width="75px" alt="">
            <h4 class="m-0 text-primary">Centro Acuatico<br>Loreto</br></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Inicio</a>
                <a href="about.html" class="nav-item nav-link">Nosotros</a>
                <!--  <a href="courses.html" class="nav-item nav-link">Courses</a> -->  
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Clases</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Natacion</a>
                        <a href="testimonial.html" class="dropdown-item">Natacion Intensivo</a>
                        <a href="404.html" class="dropdown-item">Aquabebe</a>
                        <a href="404.html" class="dropdown-item">Gimnasia en el agua</a>
                        <a href="404.html" class="dropdown-item">Balneario</a>                        
                    </div>
                </div>

                <a href="#" class="nav-item nav-link">Horarios</a>                
                <a href="#" class="nav-item nav-link">Instalaciones</a>
                <a href="#" class="nav-item nav-link">Contacto</a>
                <a href="<?php echo base_url(); ?>index.php/usuarios/registrarcuenta" class="nav-item nav-link">Registrarse</a>
            </div>
            
            <!--<a href="usuarios" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>-->
            <a class="nav-link" href="" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/login3.png">
            </a>
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/usuarios/logout" role="button">
                <img src="<?php echo base_url();?>adminlte/dist/img/exit5a.png">
            </a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-blue navbar-light shadow sticky-top p-0">        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <a href="index.html" class="nav-item nav-link active"></a>
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active"></a>        
            <a href="index.html" class="nav-item nav-link active">Bienvenid@: <?php echo $this->session->userdata('login'); ?></a>
            <a href="index.html" class="nav-item nav-link active">Rol: <?php echo $this->session->userdata('tipo'); ?></a>
                <a href="index.html" class="nav-item nav-link active">Fecha: <?php echo date('d/m/Y'); ?></a>                     
        </div>
    </nav>
    
   <!--  Navbar End -->

<!--                                FIN  MENU SUPERIOR                                -->



<!-- Menú lateral -->
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Contenido del menú lateral -->
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
        

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Contenido principal de tu página -->
            <div class="container mt-4">
                <h1>Título de la página</h1>
                <!-- Agrega el contenido de tu página aquí -->
            </div>
            <br>
            <a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
              <button type="button" class="btn btn-primary">Crear Usuario</button>
            </a>
      

            <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
              <button type="button" class="btn btn-warning">Lista deshabilitados</button>
            </a>
            <div id="content">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Nombre</th>
                        </tr>
                      </thead>

                        <tfoot>
                          <tr align="center">
                            <th>No</th>
                              <th>Nombre</th>
                          </tr>
                        </tfoot>
                    </table>
            </div>
        </main>
        

        
           <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      
                      <div class="card-header">
                        <br>
                        <a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
                          <button type="button" class="btn btn-primary">Crear Usuario</button>
                        </a>
                  

                        <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
                          <button type="button" class="btn btn-warning">Lista deshabilitados</button>
                        </a>
                        <br>
                      </div>

                      <!-- /.card-header -->

                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
            </section>
            <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr align="center">
                              <th>No</th>
                              <th>Nombre</th>
                              <th>CI</th>
                            </tr>
                          </thead>

                          
<tbody>
  <?php
    $indice = 1; // el contador comienza en 1
    foreach ($estudiantesok->result() as $row) // de la base de datos
    {
  ?>
      <tr>
        
        <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido; ?></td>
        <td><?php echo $row->ci; ?></td>
      </tr>
  <?php
      
    }
  ?>
</tbody>



                          <tfoot>
                          <tr align="center">
                            <th>No</th>
                              <th>Nombre</th>
                              <th>CI</th>
                          </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
    
</div>


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

<!--------------------------------------------------------------------------->
    <script>
        const inputs = document.querySelectorAll('input[type="text"]');
        
        inputs.forEach(input => {
            const errorElement = document.getElementById(`${input.id}-error`);
            
            input.addEventListener('input', function () {
                if (input.validity.valid) {
                    errorElement.style.display = 'none';
                } else {
                    errorElement.style.display = 'block';
                }
            });
        });
    </script>
<!--------------------------------------------------------------------------->
<script>
        function capturarFecha() {
            // Obtén la fecha de nacimiento ingresada por el usuario
            var fechaNacimiento = document.getElementById('fechaNacimiento').value;
            
            // Puedes utilizar la variable "fechaNacimiento" como desees
            alert('Fecha de Nacimiento: ' + fechaNacimiento);
        }
    </script>
<!--------------------------------------------------------------------------->
<script>
        const password1 = document.getElementById('password1');
        const password2 = document.getElementById('password2');
        const matchStatus = document.getElementById('match_status');
        const matchText = document.getElementById('match_text');

        password1.addEventListener('input', verificarCoincidencia);
        password2.addEventListener('input', verificarCoincidencia);

        function verificarCoincidencia() {
            if (password1.value === password2.value) {
                matchStatus.style.visibility = 'visible'; // Muestra la marca de verificación
                matchText.textContent = 'Las contraseñas coinciden';
            } else {
                matchStatus.style.visibility = 'hidden'; // Oculta la marca de verificación
                matchText.textContent = 'X Las contraseñas NO coinciden';
            }
        }
    </script>
<!--------------------------------------------------------------------------->

        <!-- plugins:js -->
    <script src="<?php echo base_url();?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>js/template.js"></script>
    <script src="<?php echo base_url();?>js/settings.js"></script>
    <script src="<?php echo base_url();?>js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo base_url();?>js/dashboard.js"></script>
    <script src="<?php echo base_url();?>js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->


<!--------------------------------------------------------------------------->    
<!---->

</body>

</html>

<!--                               FIN     PIE                                       -->