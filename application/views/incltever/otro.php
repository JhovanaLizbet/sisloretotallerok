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
    <link rel="stylesheet" href="<?php echo base_url();?>css/vertical-layout-light/style.css">
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
<!--  //////////////////////////////////////////////////////////////////////////////////////////////// -->
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
        <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="img-fluid" src="<?php echo base_url();?>img/loretosin.png" width="75px" alt="">
            <h4 class="m-0 text-primary">Centro Acuatico<br>Loreto</br></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="" class="nav-item nav-link active">Iniciootrosdfsdfsdfsdf</a>
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

<!--  ///////////////////////////////////////////////////////////////////////////////////////////// -->

        

<!--  ///////////////////////////////////////////////////////////////////////////////////////////// -->

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
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

            <div class="row">
                df
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1>Lista de Usuarios</h1>
                      </div>
                    </div>
                  </div>
                </section>

                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
                              <button type="button" class="btn btn-primary">Crear Usuario</button>
                            </a>
                      

                            <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
                              <button type="button" class="btn btn-warning">Lista deshabilitados</button>
                            </a>
                          </div>

                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example" class="display expandable-table" style="width:100%">
                              <thead>
                                <tr align="center">
                                  <th>No</th>
                                  <th>Nombre</th>
                                  <th>CI</th>
                                  <th>Fecha de Nacimiento</th>
                                  <th>Genero</th>
                                  <th>Direccion</th>
                                  <th>Email</th>
                                  <th>Celular</th>
                                  <th>Fecha Creacion</th>
                                  <th>Fecha Actualizacion</th>
                                  <th>Modificar</th>
                                  <th>Eliminar</th>
                                  <th>Deshabilitar</th>
                                  
                                </tr>
                              </thead>

                              <tbody>
                                <?php
            if($estudiantesok->result() as $row){
                                <tr>
                                    <td><?php echo $indice; ?></td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>

?>                                </tr>
}
                              </tbody>

                              <tfoot>
                              <tr align="center">
                                <th>No</th>
                                  <th>Nombre</th>
                                  <th>CI</th>
                                  <th>Fecha de Nacimiento</th>
                                  <th>Genero</th>
                                  <th>Direccion</th>
                                  <th>Email</th>
                                  <th>Celular</th>
                                  <th>Fecha Creacion</th>
                                  <th>Fecha Actualizacion</th>
                                  <th>Modificar</th>
                                  <th>Eliminar</th>
                                  <th>Deshabilitar</th>
                              </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            </div>
        </div>
      </div>
    </div>   
  </div>

<!--  ///////////////////////////////////////////////////////////////////////////////////////////// -->

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


</body>

</html>

<!--  ///////////////////////////////////////////////////////////////////////////////////////////// --><!--  ///////////////////////////////////////////////////////////////////////////////////////////// --><!--  ///////////////////////////////////////////////////////////////////////////////////////////// --><!--  ///////////////////////////////////////////////////////////////////////////////////////////// --><!--  ///////////////////////////////////////////////////////////////////////////////////////////// -->