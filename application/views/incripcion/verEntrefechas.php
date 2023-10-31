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
                    <h3 class="text-primary">Lista de Inscritos</h3>
                </center>
            </div>
            <div class="container">
            <h3></h3>


                <form action="<?php echo base_url(); ?>index.php/recibo/pdf" method="POST" target="_blank">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Desde:</label>
                            <input type="date" value="<?php echo date('Y-M-D'); ?>" id="min" name="desde">

                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Hasta:</label>
                            <input type="date" value="<?php echo date('Y-M-D'); ?>" id="hasta" name="hasta">

                        </div>
                        <div class="col-md-4">
                            <br>
                            <button type="submit" class="btn btn-danger">PDF</button>
                        </div>
                    </div>
                </form>
                

            </div>
        </section>
    </div>
</main>
</div>
</div>
