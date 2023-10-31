<!DOCTYPE html>
<html>

<head>
    <title>Exito</title>
    <!-- Asegúrate de incluir los enlaces a Bootstrap y jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- El modal -->
    <div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="datosModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="datosModalLabel">Registro Exitoso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>El usuario fue habilitado correctamente.</h3>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>index.php/usuarios/listaUsuariosDeshabilitados">
                        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datosModal').modal('show');

            // Ocultar el modal después de cierto tiempo y redireccionar
            var tiempoEspera = 1000; // 2 segundos en milisegundos
            setTimeout(function() {
                $('#datosModal').modal('hide');
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>index.php/usuarios/listaUsuariosDeshabilitados";
                }, 500); // Esperar 500 milisegundos antes de redireccionar
            }, tiempoEspera);
        });
    </script>

</body>

</html>