<!-- En la vista (resultados_inscripcion_view.php) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados de Inscripción</title>
</head>
<body>
    <h1>Resultados de Inscripción</h1>
    <p><?php echo $mensaje; ?></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Curso</th>
                <th>ID Inscripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $row) : ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->idCurso; ?></td>
                    <td><?php echo $row->idInscripcion; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
