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
                    <h4>Sus datos fueron registrados correctamente.</h4>
                    <h5>Puede ingresar al sistema danco click en el Login.</h5>
                    <h6>Usuario: "Su correo electronico"</h6>
                    <h5>Contraseña: "Su Contraseña"</h5>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>index.php/usuarios">
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
            var tiempoEspera = 5000; // 5 segundos en milisegundos
            setTimeout(function() {
                $('#datosModal').modal('hide');
                setTimeout(function() {
                    window.location.href = "<?php echo base_url(); ?>index.php/usuarios";
                }, 500); // Esperar 500 milisegundos antes de redireccionar
            }, tiempoEspera);
        });
    </script>

</body>

</html>