<!--                               INICIO  CABECERA                                   -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema Loreto RE OK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <!-- ------------------------------------------------------------------------------------------------ -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/vertical-layout-light/style.css">
    endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- -----------------PARA EL MENU LATERAL  PONER COLOR DONDE ESTE -------------------------

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css"> -->
    <!-- --------------------------------------------------------------------------------------- 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">-->
    <!-- --------------------------------------------------------------------------------------- -->
    <!-- --------------------------------------------------------------------------------------- -->
    <!-- -----------------PARA EL MENU LATERAL  SKY -------------------------------------------- 

    plugins:css 
    <link rel="stylesheet" href="vendor/feather/feather.css">
    <link rel="stylesheet" href="vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
     endinject 
    Plugin css for this page 
    <link rel="stylesheet" href="vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    End plugin css for this page 
    inject:css 
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- -------------------- INI MENU LATERAL  ADMIN -------------------------------------------- -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <!-- -------------------- FIN MENU LATERAL  ADMIN -------------------------------------------- -->
    <style>
        .input:invalid {
            border: 1px solid Silver;
        }

        .error-message {
            color: red;
            display: none;
        }

        .tabla-contenedor {
            max-height: 400px;
            /* Establece la altura máxima del contenedor */
            overflow-y: auto;
            /* Agrega una barra de desplazamiento vertical cuando sea necesario */
        }
    </style>
    
    <style>
        .match-tick::before {
            content: "✔";
            /* Símbolo de marca de verificación */
            color: green;
            font-size: 20px;
            margin-right: 5px;
            /* Espacio entre el símbolo y el texto */
        }

        /*////////////////////////*/
        /* Estilos para el botón de perfil */
        .profile-button {
            display: inline-block;
            position: relative;
            margin: 10px;

        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Estilos para el menú desplegable */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #EBF5FB;
            /* color del fondo del menu*/
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #85C1E9;
            /* color del dezplazamiento*/
        }

        .custom-button {
            background-color: #EBF5FB;
            /* Color de fondo azul */
            color: white;
            /* Color del texto blanco */
            padding: 10px 20px;
            /* Espaciado interno */
            border: none;
            /* Sin borde */
            cursor: pointer;
            /* Cambia el cursor al pasar el mouse por encima */
            border-radius: 5px;
            /* Bordes redondeados */
        }

        .blue-text {
            color: #7c8184;
            /* Cambia el color del texto a azul */
        }

        .circulo-img {
            border-radius: 50%;
            border: 2px solid #333;
        }

        .derecho {
            position: fixed;
            right: -100px;
            /* Menú inicialmente oculto en el margen derecho */
            top: 1;
            height: 100%;
            width: 250px;

            color: white;
            transition: right 0.3s ease-in-out;
        }

        .posicion {

            top: 100px;
            left: 50px;
            margin-left: 290px;
        }


        /* Estilo para el botón de cerrar sesión 
        #logout {
            color: #e74c3c;*/
        /* Rojo para el botón de cerrar sesión 
        }*/

        /* Estilo para el botón de cerrar sesión al pasar el mouse por encima 
        #logout:hover {
            background-color: #e74c3c;
            color: white;
        }*/
    </style>

</head>
<!--                                  FIN  CABECERA                                   -->