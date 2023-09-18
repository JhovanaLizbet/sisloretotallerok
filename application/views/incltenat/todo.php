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
<!-- --------------------------------------------------------------------------------------------- -->
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
   <link rel="stylesheet" href="<?php echo base_url();?>css/vertical-layout-light/stylem.css">
     <!-- endinject -->
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

<!----------------------------------------------------------------------------------------------------->
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                  <ul class="nav">
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">UI Elements</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Form elements</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Charts</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                        <i class="icon-grid-2 menu-icon"></i>
                        <span class="menu-title">Tables</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="tables">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                        <i class="icon-contract menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="icons">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                        <i class="icon-ban menu-icon"></i>
                        <span class="menu-title">Error pages</span>
                        <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="error">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages/documentation/documentation.html">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Documentation</span>
                      </a>
                    </li>
                  </ul>
            </nav>
            <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                      <h3 class="font-weight-bold">Welcome Aamir</h3>
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                     <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                         <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                          <a class="dropdown-item" href="#">January - March</a>
                          <a class="dropdown-item" href="#">March - June</a>
                          <a class="dropdown-item" href="#">June - August</a>
                          <a class="dropdown-item" href="#">August - November</a>
                        </div>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card tale-bg">
                    <div class="card-people mt-auto">
                      <img src="images/dashboard/people.svg" alt="people">
                      <div class="weather-info">
                        <div class="d-flex">
                          <div>
                            <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                          </div>
                          <div class="ml-2">
                            <h4 class="location font-weight-normal">Bangalore</h4>
                            <h6 class="font-weight-normal">India</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                  <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                        <div class="card-body">
                          <p class="mb-4">Today’s Bookings</p>
                          <p class="fs-30 mb-2">4006</p>
                          <p>10.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-dark-blue">
                        <div class="card-body">
                          <p class="mb-4">Total Bookings</p>
                          <p class="fs-30 mb-2">61344</p>
                          <p>22.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                      <div class="card card-light-blue">
                        <div class="card-body">
                          <p class="mb-4">Number of Meetings</p>
                          <p class="fs-30 mb-2">34040</p>
                          <p>2.00% (30 days)</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                      <div class="card card-light-danger">
                        <div class="card-body">
                          <p class="mb-4">Number of Clients</p>
                          <p class="fs-30 mb-2">47033</p>
                          <p>0.22% (30 days)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Order Details</p>
                      <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      <div class="d-flex flex-wrap mb-5">
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Order value</p>
                          <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                        </div>
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Orders</p>
                          <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                        </div>
                        <div class="mr-5 mt-3">
                          <p class="text-muted">Users</p>
                          <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                        </div>
                        <div class="mt-3">
                          <p class="text-muted">Downloads</p>
                          <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                        </div> 
                      </div>
                      <canvas id="order-chart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <p class="card-title">Sales Report</p>
                      <a href="#" class="text-info">View all</a>
                     </div>
                      <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                      <canvas id="sales-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                <div class="ml-xl-4 mt-3">
                                <p class="card-title">Detailed Reports</p>
                                  <h1 class="text-primary">$34040</h1>
                                  <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                  <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                </div>  
                                </div>
                              <div class="col-md-12 col-xl-9">
                                <div class="row">
                                  <div class="col-md-6 border-right">
                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                      <table class="table table-borderless report-table">
                                        <tr>
                                          <td class="text-muted">Illinois</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Washington</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Mississippi</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">California</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Maryland</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Alaska</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <canvas id="north-america-chart"></canvas>
                                    <div id="north-america-legend"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="row">
                              <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                <div class="ml-xl-4 mt-3">
                                <p class="card-title">Detailed Reports</p>
                                  <h1 class="text-primary">$34040</h1>
                                  <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                  <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                </div>  
                                </div>
                              <div class="col-md-12 col-xl-9">
                                <div class="row">
                                  <div class="col-md-6 border-right">
                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                      <table class="table table-borderless report-table">
                                        <tr>
                                          <td class="text-muted">Illinois</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Washington</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Mississippi</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">California</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Maryland</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted">Alaska</td>
                                          <td class="w-100 px-0">
                                            <div class="progress progress-md mx-4">
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </td>
                                          <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <canvas id="south-america-chart"></canvas>
                                    <div id="south-america-legend"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title mb-0">Top Products</p>
                      <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                          <thead>
                            <tr>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>Status</th>
                            </tr>  
                          </thead>
                          <tbody>
                            <tr>
                              <td>Search Engine Marketing</td>
                              <td class="font-weight-bold">$362</td>
                              <td>21 Sep 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                            </tr>
                            <tr>
                              <td>Search Engine Optimization</td>
                              <td class="font-weight-bold">$116</td>
                              <td>13 Jun 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                            </tr>
                            <tr>
                              <td>Display Advertising</td>
                              <td class="font-weight-bold">$551</td>
                              <td>28 Sep 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                            </tr>
                            <tr>
                              <td>Pay Per Click Advertising</td>
                              <td class="font-weight-bold">$523</td>
                              <td>30 Jun 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                            </tr>
                            <tr>
                              <td>E-Mail Marketing</td>
                              <td class="font-weight-bold">$781</td>
                              <td>01 Nov 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-danger">Cancelled</div></td>
                            </tr>
                            <tr>
                              <td>Referral Marketing</td>
                              <td class="font-weight-bold">$283</td>
                              <td>20 Mar 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                            </tr>
                            <tr>
                              <td>Social media marketing</td>
                              <td class="font-weight-bold">$897</td>
                              <td>26 Oct 2018</td>
                              <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">To Do Lists</h4>
                                        <div class="list-wrapper pt-2">
                                            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                                <li>
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input class="checkbox" type="checkbox">
                                                            Meeting with Urban Team
                                                        </label>
                                                    </div>
                                                    <i class="remove ti-close"></i>
                                                </li>
                                                <li class="completed">
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input class="checkbox" type="checkbox" checked>
                                                            Duplicate a project for new customer
                                                        </label>
                                                    </div>
                                                    <i class="remove ti-close"></i>
                                                </li>
                                                <li>
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input class="checkbox" type="checkbox">
                                                            Project meeting with CEO
                                                        </label>
                                                    </div>
                                                    <i class="remove ti-close"></i>
                                                </li>
                                                <li class="completed">
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input class="checkbox" type="checkbox" checked>
                                                            Follow up of team zilla
                                                        </label>
                                                    </div>
                                                    <i class="remove ti-close"></i>
                                                </li>
                                                <li>
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input class="checkbox" type="checkbox">
                                                            Level up for Antony
                                                        </label>
                                                    </div>
                                                    <i class="remove ti-close"></i>
                                                </li>
                                            </ul>
                      </div>
                      <div class="add-items d-flex mb-0 mt-2">
                                            <input type="text" class="form-control todo-list-input"  placeholder="Add new task">
                                            <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title mb-0">Projects</p>
                      <div class="table-responsive">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th class="pl-0  pb-2 border-bottom">Places</th>
                              <th class="border-bottom pb-2">Orders</th>
                              <th class="border-bottom pb-2">Users</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="pl-0">Kentucky</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p></td>
                              <td class="text-muted">65</td>
                            </tr>
                            <tr>
                              <td class="pl-0">Ohio</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p></td>
                              <td class="text-muted">51</td>
                            </tr>
                            <tr>
                              <td class="pl-0">Nevada</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p></td>
                              <td class="text-muted">32</td>
                            </tr>
                            <tr>
                              <td class="pl-0">North Carolina</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p></td>
                              <td class="text-muted">15</td>
                            </tr>
                            <tr>
                              <td class="pl-0">Montana</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p></td>
                              <td class="text-muted">25</td>
                            </tr>
                            <tr>
                              <td class="pl-0">Nevada</td>
                              <td><p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p></td>
                              <td class="text-muted">71</td>
                            </tr>
                            <tr>
                              <td class="pl-0 pb-0">Louisiana</td>
                              <td class="pb-0"><p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p></td>
                              <td class="pb-0">14</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-title">Charts</p>
                          <div class="charts-data">
                            <div class="mt-3">
                              <p class="mb-0">Data 1</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                  <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">5k</p>
                              </div>
                            </div>
                            <div class="mt-3">
                              <p class="mb-0">Data 2</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">1k</p>
                              </div>
                            </div>
                            <div class="mt-3">
                              <p class="mb-0">Data 3</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">992</p>
                              </div>
                            </div>
                            <div class="mt-3">
                              <p class="mb-0">Data 4</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="progress progress-md flex-grow-1 mr-4">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">687</p>
                              </div>
                            </div>
                          </div>  
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                      <div class="card data-icon-card-primary">
                        <div class="card-body">
                          <p class="card-title text-white">Number of Meetings</p>                      
                          <div class="row">
                            <div class="col-8 text-white">
                              <h3>34040</h3>
                              <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
                            </div>
                            <div class="col-4 background-icon">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Notifications</p>
                      <ul class="icon-data-list">
                        <li>
                          <div class="d-flex">
                            <img src="images/faces/face1.jpg" alt="user">
                            <div>
                              <p class="text-info mb-1">Isabella Becker</p>
                              <p class="mb-0">Sales dashboard have been created</p>
                              <small>9:30 am</small>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex">
                            <img src="images/faces/face2.jpg" alt="user">
                            <div>
                              <p class="text-info mb-1">Adam Warren</p>
                              <p class="mb-0">You have done a great job #TW111</p>
                              <small>10:30 am</small>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex">
                          <img src="images/faces/face3.jpg" alt="user">
                         <div>
                          <p class="text-info mb-1">Leonard Thornton</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>11:30 am</small>
                         </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex">
                            <img src="images/faces/face4.jpg" alt="user">
                            <div>
                              <p class="text-info mb-1">George Morrison</p>
                              <p class="mb-0">Sales dashboard have been created</p>
                              <small>8:50 am</small>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex">
                            <img src="images/faces/face5.jpg" alt="user">
                            <div>
                            <p class="text-info mb-1">Ryan Cortez</p>
                            <p class="mb-0">Herbs are fun and easy to grow.</p>
                            <small>9:00 am</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Advanced Table</p>
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Quote#</th>
                                  <th>Product</th>
                                  <th>Business type</th>
                                  <th>Policy holder</th>
                                  <th>Premium</th>
                                  <th>Status</th>
                                  <th>Updated at</th>
                                  <th></th>
                                </tr>
                              </thead>
                          </table>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>    
    </div>
<!----------------------------------------------------------------------------------------------------->
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
<!----------------------------------------------------------------------------------------------------->

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