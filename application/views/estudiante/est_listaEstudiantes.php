
        <!-- Contenedor principal al lado derecho -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Contenido principal de tu página -->

<!-- ------------------------------------------------------------------------------------------ -->
            <div class="container mt-4">
                <h2 align="center"><u>Lista de Clientes</u></h2>
                <!-- Agrega el contenido de tu página aquí -->
            </div>
            <br>
        <a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
          <button type="button" class="btn btn-primary">Crear Cliente</button>
        </a>

        <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
          <button type="button" class="btn btn-warning">Lista deshabilitados</button>
        </a>

            <div id="content">

                <table id="example" class="table table-bordered table-striped">
                  <thead align="center" style="color: black;">
                    <tr bgcolor="#3CC6FA">
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
            $indice=1;//el contador comienza en 1
            foreach($estudiantesok->result() as $row) // de la base de datos
            {
          ?>                                        
                <tr>
                  <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                  <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido; ?></td>
                  <td><?php echo $row->ci; ?></td>
                  <td><?php echo $row->fechaNacimiento; ?></td>
                  <td><?php echo $row->genero; ?></td>
                  <td><?php echo $row->direccion; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->celular; ?></td>
                  <td><?php echo formatearFecha($row->creado); ?></td>
                  <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>
                  
                  <td>

      <?php 
        echo form_open_multipart('estudiante/modificar');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <!--  <button type="submit" class="btn btn-success">MODIFICAR</button> -->
      <input type="image" src="<?php echo base_url();?>adminlte/dist/img/modificarok4.png">
            
      <?php
        echo form_close();
      ?>                  
                </td>

                
                <td>
      <?php 
        echo form_open_multipart('estudiante/eliminarbd');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <input type="image" src="<?php echo base_url();?>adminlte/dist/img/eliminarok.png">

      <?php
        echo form_close();
      ?>
                </td>

                <!--DESHABILITAR-->
                <td>
      <?php 
        echo form_open_multipart('estudiante/deshabilitarbd');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <!--  <button type="submit" class="btn btn-warning">DESHABILITAR</button>
      <img src="<?php echo base_url();?>adminlte/dist/img/onvok2.png"> -->
      <input type="image" src="<?php echo base_url();?>adminlte/dist/img/onvok2.png">

      <?php
        echo form_close();
      ?>                      
                    </td>
<!--                      
                    <td>
                      <?php
                        $foto=$row->foto;
                        if($foto=="")
                        {
                          ?>
                            <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/default.png">
                          <?php 
                        }
                        else
                        {
                          ?>
                            <a href="<?php echo base_url();?>uploads/estudiantes/pdficon.pdf" target="_blank" download> 
                            <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/pdficon.png" > 
                                                  
                          <?php
                        }
                      ?>

      <?php 
        echo form_open_multipart('estudiante/subirfoto');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <button type="submit" class="btn btn-primary">Subir</button>
      <?php
        echo form_close();
      ?> 
                    </td>
-->
                  </tr>
              <?php
              $indice++;
            }
          ?>                  
                  </tbody>

                  <tfoot>
                  <tr align="center" bgcolor="#3CC6FA" style="color: black;">
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
        </main>
    </div>
</div>
