<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div>
                <h5 class="text-white posicion">...</h5>
                <center>
                    <h3 class="text-primary">Buscar Usuario</h3>
                </center>
            </div>

            <!-- 
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <h1>d</h1>
                    </div>
                    <div class="col-sm-5">
                        <h5 class="text-white">...</h5>
                        <center>
                            <h3 class="text-primary">Crear Nueva Cuenta de Usuario</h3>
                        </center>
                    </div>
                    <div class="col-sm-1">
                        <h1></h1>
                    </div>
                </div>/.container-fluid -->

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="input-group mb-3 justify-content-end">
                                <div class="form-group has-feedback has-feedback-left">
                                    <label></label>
                                    <form id="search-form" action="<?php echo site_url('busqueda/listaUsuariosBusqueda'); ?>" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_query" placeholder="Buscar...">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                echo form_open_multipart('administrador/agregarInscripcionBDD');
                                ?>

                                <p>
                                    <strong>Mostrar por : </strong>
                                    <select name="cantidad" id="cantidad">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                    </select>
                                </p>
                                <table class="table table-bordered">
                                    <thead align="center">
                                        <tr bgcolor="#3CC6FA">
                                            <th>Nombre</th>
                                            <th>CI</th>
                                            <th>Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($resultados)) : ?>
                                            <?php foreach ($resultados as $curso) : ?>
                                                <tr> <!-- Inicio de fila -->
                                                    <td><?php echo $curso->nombres; ?></td>
                                                    <td><?php echo $curso->ci; ?></td>
                                                    <td><?php echo $curso->rol; ?></td>
                                                    <!-- Agrega más información de los cursos si es necesario -->
                                                </tr> <!-- Fin de fila -->
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr> <!-- Fila para mostrar el mensaje "No se encontraron resultados." -->
                                                <td colspan="3">No se encontraron resultados.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr align="center" bgcolor="#3CC6FA" style="color: black;">
                                            <th>Nombre</th>
                                            <th>CI</th>
                                            <th>Rol</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?php
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        </section>
    </div>

    <div class="input-group mb-3 justify-content-center">
        <a href="<?php echo base_url(); ?>index.php/usuarios/bienvenida">
            <button class="btn btn-dark">CANCELAR <i class="bi bi-x-circle"></i></button>
        </a>
    </div>



</main>
</div>
</div>