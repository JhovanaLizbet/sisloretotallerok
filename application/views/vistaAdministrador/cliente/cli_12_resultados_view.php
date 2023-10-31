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
                    <h3 class="text-primary">Bienvenido a la Escuela de Natacion</h3>
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
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Fecha de Inscripción:</label>
                            <input type="date" class="form-control" required aria-invalid="true" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div class="form-group has-feedback has-feedback-left">
                            <!--
                            <form id="search-form" action="<?php echo site_url('busqueda/buscarSearch'); ?>" method="post">
                                <input type="text" class="form-control" name="search_query" placeholder="Buscar..." />
                                <i class="fa fa-search"></i>
                            </form>
                            -->
                            <label></label>
                            <form id="search-form" action="<?php echo site_url('busqueda/buscarSearch'); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_query" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <center>
                                    <h4>Cursos Habilitados</h4>
                                </center>
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
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Nivel</th>
                                            <th>Duracion</th>
                                            <th>Día</th>
                                            <th>Hora</th>
                                            <th>Precio Bs.</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($resultados)) : ?>
                                            <?php foreach ($resultados as $curso) : ?>
                                                <tr> <!-- Inicio de fila -->
                                                    <td><?php echo $curso->codigo; ?></td>
                                                    <td><?php echo $curso->nombre; ?></td>
                                                    <td><?php echo $curso->nivel; ?></td>
                                                    <td><?php echo $curso->duracion; ?></td>
                                                    <td><?php echo $curso->diaClase; ?></td>
                                                    <td><?php echo $curso->hora; ?></td>
                                                    <td><?php echo $curso->precioTotal; ?></td>
                                                    <td><input type="checkbox" name="seleccion[]" value="<?php echo $curso->id ?>"></td>
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
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Nivel</th>
                                            <th>Duracion</th>
                                            <th>Día</th>
                                            <th>Hora</th>
                                            <th>Precio Bs.</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-center paginacion">
                                    <strong><b>Observacion</b></strong>
                                    <input type="text" id="observacion" name="observacion" class="form-control input-md" placeholder="" required aria-invalid="true" required>
                                </div>

                                <center><button type="submit" class="btn btn-success"> INSCRIBIR <i class="fa fa-user-plus"></i></button>

                                    <?php
                                    echo form_close();
                                    ?>

                            </div>
                            <div class="text-right">
                            <a href="<?php echo base_url(); ?>index.php/cliente/index">
                                <button class="btn btn-dark">CANCELAR <i class="bi bi-x-circle"></i></button>
                            </a>

                            </div>
                        </div>
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <center>
                                    <h4>Datos de Inscripción</h4>
                                </center>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="tblDetalle">
                                    <thead align="center">
                                        <tr bgcolor="#3CC6FA">
                                            <th>Nro.</th>
                                            <th>Descripcion</th>
                                            <th>Cantidad</th>
                                            <th>Precio Bs.</th>
                                            <th>Total Bs.</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                    </tbody>
                                    <tfoot>
                                        <tr class="font-weight-bold">
                                            <td colspan=3>Total Bs.</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <a href="#" class="btn btn-primary" id="btn_generar"><i class="fas fa-save"></i> Generar Venta</a>
                </div>

            </div>
        </section>


    </div>



</main>
</div>
</div>