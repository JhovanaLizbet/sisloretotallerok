<!-- confirmacion_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmación de Inscripción</title>
</head>
<body>
    <h1>¡Inscripción Exitosa!</h1>
    <p>Tu inscripción se ha completado satisfactoriamente.</p>
    <p>Curso: <?php echo $cursoNombre; ?></p>
    <p>Inscripción ID: <?php echo $inscripcionId; ?></p>
    <a href="<?php echo site_url('cursos'); ?>">Volver a la lista de cursos</a>
</body>
</html>
