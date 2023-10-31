<!-- formulario_inscripcion_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Inscripción</title>
</head>
<body>
    <!-- TITULO DEL SECCION DONDE ENTRARAN LOS FORMULARIOS TABLAS -->
<div class="page-title">
    <div class="title_left">
        <h3>FORMULARIO DE VENTAS</h3>
    </div>
</div>
<div class="clearfix"></div>
<!-- FIN TITULO -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="x_panel">
                                <div class="x_title">
                                    <a href="<?php echo base_url(); ?>index.php/admin/venta">
                                        <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Volver"><i class="fa fa-mail-reply-all"></i></button>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br>
                                    <?php
                                    echo form_open_multipart('admin/realizarTransaccionVenta', array('id' => 'ventaForm', 'class' => 'needs-validation', 'method' => 'post'));
                                    ?>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Seleccione un cliente:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select class="form-control" name="cliente" id="cliente" required="required">
                                                <option value="" disabled selected>Listado de clientes</option>
                                                <?php
                                                foreach ($clientes->result() as $row) {
                                                ?>

                                                    <option value="<?php echo $row->id; ?>">
                                                        <?php echo $row->razonSocial; ?>
                                                    </option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Seleccione un producto:</label>
                                        <div class="col-md-5 col-sm-5 col-xs-5">

                                            <input type="hidden" name="detalle_data" id="detalle_data" value="">

                                            <select class="form-control" name="producto" id="producto" required="required">
                                                <option value="" disabled selected>Listado de productos</option>
                                                <?php
                                                foreach ($productos->result() as $row) {
                                                ?>

                                                    <option value="<?php echo $row->id; ?>">
                                                        <?php echo $row->nombre; ?>
                                                    </option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <button id="btn-agregar" type="button" class="btn btn-success">Agregar</button>
                                        </div>
                                    </div>

                                    <div class="x_title">
                                        <h2>Tabla de ventas <small></small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="tabla-ventas">
                                        <table class="table table-striped" id="tabla-ventas">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>id</th>
                                                    <th>Producto</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Stock</th>
                                                    <th>Cantidad</th>
                                                    <th>Importe</th>
                                                    <th>Quitar Producto</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list-product">
                                                <tr id="fila-ejemplo" style="display: none;">
                                                    <td></td>
                                                    <td><input type="text" class="producto-id" name="producto_id[]"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><input style="width: 100px;" type="number" required="required" value="0" class="form-control cantidad" name="cantidad[]" id="cantidad" required></td>
                                                    <td></td>
                                                    <td><button class="btn btn-danger btn-remove"><span class="glyphicon glyphicon-trash"></span></button></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2" style="text-align: center;">
                                            <input type="number" name="total" id="total" class="form-control" style="text-align: center;"><strong><samp>TOTAL(Bs.)</samp></strong>
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2" style="text-align: center;">
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-info btn-block" id="btn-guardar"><strong>Guardar</strong></button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var contadorFilas = 1;

        function calcularImporte(fila) {
            var cantidad = parseInt(fila.find("td:eq(6) input").val());
            var precioUnitario = parseFloat(fila.find("td:eq(4)").text());

            var importe = cantidad * precioUnitario;

            fila.find("td:eq(7)").text(importe);
            return importe;
        }

        function calcularTotal() {
            var total = 0;

            $(".added-row").each(function() {
                total += calcularImporte($(this));
            });
            $("#total").val(total);
        }

        $(document).on("input", ".cantidad", function() {
            var fila = $(this).closest("tr");
            calcularImporte(fila);

            calcularTotal();
        });

        
        $("#btn-agregar").on("click", function() {
            var producto_id = $("#producto").val();

            if (producto_id) {

                var fila = $("#fila-ejemplo").clone().removeAttr("id");

                $.getJSON('<?php echo base_url() ?>index.php/ajax/obtenerProductoPorId/' + producto_id, function(data) {
                    if (data) {

                        fila.find("td:eq(0)").text(contadorFilas);
                        fila.find("td:eq(1) input").val(producto_id);
                        fila.find("td:eq(2)").text(data[0].nombre);
                        fila.find("td:eq(3)").text(data[0].descripcion);
                        fila.find("td:eq(4)").text(data[0].precioUnitario);
                        fila.find("td:eq(5)").text(data[0].stock);
                        fila.find("td:eq(6) input").val(20);
                        fila.find("td:eq(7)").text(data[0].precioUnitario);

                        contadorFilas++;

                        fila.addClass("added-row");

                        fila.show();
                        $(".list-product").append(fila);

                        calcularImporte(fila);
                        calcularTotal();
                    } else {
                        alert("No se encontraron detalles del producto.");
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Error en la solicitud AJAX: " + errorThrown);
                });
            } else {
                alert("Seleccione un Producto.");
            }
        });

        $(document).on("click", ".btn-remove", function() {
            var fila = $(this).closest("tr");
            fila.remove();

            calcularTotal();
        });

        calcularTotal();
    });


    $("#btn-guardar").on("click", function() {
        var datos = []; // Array para almacenar los datos de todas las filas

        // Recorre cada fila con la clase "added-row"
        $(".list-product .added-row").each(function() {

            var fila = $(this);

            var cantidad = parseInt(fila.find("td:eq(6) input").val());

            var precioUnitario = parseFloat(fila.find("td:eq(4)").text());

            var importe = cantidad * precioUnitario; // Calcula el importe

            var filaData = {
                idProducto: fila.find("td:eq(1) input").val(),
                precioUnitario: precioUnitario,
                cantidad: cantidad,
                importe: importe
            };
            datos.push(filaData);
        });

        // Muestra el contenido del array en un alert
        alert(JSON.stringify(datos, null, 2));

        // Convierte el array a una cadena JSON
        var datosJSON = JSON.stringify(datos);

        alert(datosJSON);
        // Asigna la cadena JSON al campo de entrada
        $("#detalle_data").val(datosJSON);
    });
</script>
</body>
</html>
