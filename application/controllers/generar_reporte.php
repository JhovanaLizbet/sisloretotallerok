<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_desde = $_POST["fecha_desde"];
    $fecha_hasta = $_POST["fecha_hasta"];

    // Validar las fechas aquí (asegurarse de que sean válidas y seguras)

    $this->load->model('reporte_model');

    $reporte = $this->reporte_model->generarReporte($fecha_desde, $fecha_hasta);

    // Aquí puedes mostrar el reporte en una vista o generar un archivo PDF, por ejemplo.
}
