<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Loreto</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">

<script>
        function validarPalabras() {
            var palabraInput = document.getElementById("palabra");
            var mensajeError = document.getElementById("mensaje-error");

            var palabra = palabraInput.value;
            var regex = /^[a-zA-Z]+$/;

            if (!regex.test(palabra)) {
                mensajeError.style.display = "block";
            } else {
                mensajeError.style.display = "none";
            }
        }
    </script>

    


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">