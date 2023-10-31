<!-- Contenedor principal al lado derecho -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Contenido principal de tu página -->

    <!-- ------------------------------------------------------------------------------------------ -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div>
                <h5 class="text-white posicion">...</h5>
                <center>
                    <h3 class="text-primary">Cursos Más Solicitados</h3>
                </center>
            </div>
            <div class="container">

                <form action="<?php echo base_url(); ?>index.php/recibo/pdfMasSolicitados/pdf" method="POST" target="_blank">
                    <div class="col-md-4">
                        <br>
                        <center>
                            <button type="submit" class="btn btn-danger">PDF</button>
                        </center>
                    </div>
                </form>

            </div>
        </section>
    </div>
</main>
</div>
</div>