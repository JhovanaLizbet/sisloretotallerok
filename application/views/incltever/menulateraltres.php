  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-cyan-primary elevation-4">
    
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?php echo base_url();?>adminlte/dist/img/reloj.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fecha: <?php echo date('d/m/Y'); ?></span>
    </a>

    <a href="" class="brand-link">
      <img src="<?php echo base_url();?>adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Rol: <?php echo $this->session->userdata('tipo'); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bienvenid@: <?php echo $this->session->userdata('login'); ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">

            <a href="<?php echo base_url(); ?>index.php/estudiante/indexlte" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Gestión
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-swimmer"></i>
              <p>
                Clases
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
              
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/clases/indexlte" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
            </ul>          
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-water"></i>
              <p>
                Ambiente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rol y permisos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

          </li>

              <li class="nav-item">
                <a href="../gallery.html" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Galeria
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../gallery.html" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Comunicados
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
