<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdnatacion";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener datos de la base de datos
$sql = "SELECT * FROM estudiantesok"; // Reemplaza "tu_tabla" por el nombre de tu tabla

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadatos, enlaces a hojas de estilo y otros elementos de encabezado aquí -->
</head>

<body>
    <!-- Contenedor principal al lado derecho -->
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
        <!-- ----------------------------------------------------------------------- -->
        <div id="content">
            <table id="example1" class="table table-bordered table-striped">
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
                    $indice = 1; //el contador comienza en 1
                    
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $indice; ?></td>
                            <td><?php echo $row['nombre'] . " " . $row['primerApellido'] . " " . $row['segundoApellido']; ?></td>
                            <td><?php echo $row['ci']; ?></td>
                            <td><?php echo $row->ci; ?></td>
                            <td><?php echo $row['fechaNacimiento']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['celular']; ?></td>
                            <td><?php echo formatearFecha($row['creado']); ?></td>
                            <td><?php echo formatearFecha($row['fechaActualizacion']); ?></td>

                            <td>
                                <?php
                                echo form_open_multipart('estudiante/modificar');
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row['idEstudiante']; ?>">
                                <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/modificarok4.png">
                                <?php
                                echo form_close();
                                ?>
                            </td>

                            <td>
                                <?php
                                echo form_open_multipart('estudiante/eliminarbd');
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row['idEstudiante']; ?>">
                                <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/eliminarok.png">
                                <?php
                                echo form_close();
                                ?>
                            </td>

                            <!--DESHABILITAR-->
                            <td>
                                <?php
                                echo form_open_multipart('estudiante/deshabilitarbd');
                                ?>
                                <input type="hidden" name="idestudiante" value="<?php echo $row['idEstudiante']; ?>">
                                <input type="image" src="<?php echo base_url(); ?>adminlte/dist/img/onvok2.png">
                                <?php
                                echo form_close();
                                ?>
                            </td>
                        </tr>
                    <?php
                        $indice++;
                    }
                    ?>
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
    </main>
    </div>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
