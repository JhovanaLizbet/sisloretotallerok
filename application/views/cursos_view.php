<!-- application/views/cursos_view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Cursos</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
    <!-- En la vista principal (cursos_view.php) -->

    <div class="container">
        <h1>Lista de Cursos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre del Curso</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $curso) : ?>
                    <tr>
                        <td><?php echo $curso->codigo; ?></td>
                        <td><?php echo $curso->nombre; ?></td>
                        <td><?php echo $curso->descripcion; ?></td>
                        <a href="<?php echo site_url('cursos/inscribir/' . $curso->id . '/' . $inscripcion->id); ?>">Inscribirse en el Curso</a>
                        <a href="<?php echo base_url('cursos/inscribir/' . $curso->id . '/' . $inscripcion->id); ?>">Inscribirse en el Curso</a>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>