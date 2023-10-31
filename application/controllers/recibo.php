<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

//Lineas de solicitud de recursos de excel
require FCPATH . 'vendor/autoload.php';
require_once "application/controllers/literal.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// application/controllers/Recibo.php

class Recibo extends CI_Controller
{

        public function generarReciboPDF()
        {
                $this->pdf = new Pdf();
                //$this->fpdf=new FPdf();

                // Carga la biblioteca de PDF (por ejemplo, TCPDF)
                //$this->load->library('pdf');
                $this->load->library('fpdf');
                //primer metodo que debemos agregar es AddPage=AgregarPagina
                $this->pdf->AddPage();
                //Agregamos nuemro de paginas
                $this->pdf->AliasNbPages();
                //agregamos un titulo
                $this->pdf->SetTitle("Recibo de Inscripcion");

                //le damos un margen isquierdo de 15 px
                $this->pdf->SetLeftMargin(15);
                //le damos un margen derecho de 15px
                $this->pdf->SetRightMargin(15);
                //definimos un color de fondo al documento
                $this->pdf->SetFillColor(210, 210, 210); //RGB
                //Tipo de letra, tipo de letra
                $this->pdf->SetFont('Arial', 'B', 20);
                // I Cursiva    U subrayada      B negrilla      ''normal


                $this->pdf->AddPage();
                $this->pdf->SetFont('Arial', 'B', 16); // Configura la fuente (en este caso, Arial, negrita, tamaño 16)

                // Luego, puedes continuar con la creación de tu recibo en PDF


                $this->db->select('CONCAT(c.nombres, " ", c.primerApellido) AS NOMBRE, cu.nombre AS CURSO, cu.precioTotal, i.fechaInscripcion AS FECHA_INSCRIPCION, p.monto AS TOTAL_BS');
                $this->db->from('clientes c');
                $this->db->join('inscripcion i', 'c.id = i.idCliente');
                $this->db->join('detalleInscripcion di', 'i.id = di.idInscripcion');
                $this->db->join('cursos cu', 'di.idCurso = cu.id');
                $this->db->join('pagos p', 'i.id = p.idInscripcion');
                $this->db->where('c.id', 5);
                $this->db->order_by('i.fechaInscripcion');
                $query = $this->db->get();
                $result = $query->result();

                // Configura el PDF (título, encabezados, formato, etc.)

                // Recorre los resultados y agrega los datos al PDF
                foreach ($result as $row) {
                        $nombre = $row->NOMBRE;
                        $curso = $row->CURSO;
                        $fechaInscripcion = $row->FECHA_INSCRIPCION;
                        $totalBs = $row->TOTAL_BS;

                        // Agrega los datos al PDF
                        //$this->pdf->Cell(0, 10, 'Nombre: '.$row->NOMBRE);
                        $this->pdf->Cell(0, 10, 'Nombre: ' . $nombre);
                        $this->pdf->Ln(20);
                        //echo '' . $nombre;

                        $this->pdf->Cell(0, 10, 'Curso: ' . $curso);
                        $this->pdf->Ln(20);

                        $this->pdf->Cell(0, 10, 'Fecha de Inscripción: ' . $fechaInscripcion);
                        $this->pdf->Ln(20);
                        $this->pdf->Cell(0, 10, 'Total BS: ' . $totalBs);

                        // Puedes agregar saltos de línea u otros formatos según tus necesidades
                }

                // Genera el PDF
                $this->pdf->Output('recibo.pdf', 'I');  // 'I' para mostrar en el navegador o puedes guardar en el servidor

        }
        public function generarReciboPDF2()
        {
                $this->pdf = new Pdf();
                //$this->fpdf=new FPdf();

                //$idInscripcion = $_POST['idInscripcion'];

                $idInscripcion = 16;

                $datosGeneralesInscripcionID = $this->cliente_model->datosGeneralesInscripcionID($idInscripcion);
                $datosGeneralesInscripcionID = $datosGeneralesInscripcionID->result();
                $cliente = $datosGeneralesInscripcionID[0]->cliente;
                $ci = $datosGeneralesInscripcionID[0]->ci;
                $razonSocial = $datosGeneralesInscripcionID[0]->razonSocial;
                $fechaInscripcion = $datosGeneralesInscripcionID[0]->fechaInscripcion;
                $observacion = $datosGeneralesInscripcionID[0]->observacion;
                $idInscripcion = $datosGeneralesInscripcionID[0]->idInscripcion;

                $detalleInscripcionID = $this->cliente_model->detalleInscripcionID($idInscripcion);
                $detalleInscripcionID = $detalleInscripcionID->result();


                //CREAMOS UN OBJETO DE NUESTRA CLASE PDF
                $this->pdf = new Pdf();
                //primer metodo que debemos agregar es AddPage=AgregarPagina
                $this->pdf->AddPage();
                //Agregamos nuemro de paginas
                $this->pdf->AliasNbPages();
                //agregamos un titulo
                $this->pdf->SetTitle("Recibo de Inscripcion");

                //le damos un margen isquierdo de 15 px
                $this->pdf->SetLeftMargin(5);
                //le damos un margen derecho de 15px
                $this->pdf->SetRightMargin(5);
                //definimos un color de fondo al documento
                $this->pdf->SetFillColor(210, 210, 210); //RGB
                //Tipo de letra, tipo de letra
                $this->pdf->SetFont('Arial', 'B', 20);
                // I Cursiva    U subrayada      B negrilla      ''normal

                /*
        $ruta = base_url() . "img/logoCOLOR.jpg";
        $this->pdf->Image($ruta, 5, 6, 50, 15);
*/
                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(150); //CELDABASICA
                $this->pdf->Cell(50, 10, 'Nro.: ' . $idInscripcion, 0, 0, 'C', 0);

                $this->pdf->SetFont('Arial', 'B', 20);
                //Construllimos una de celda de 30 puntos
                $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(65); //CELDABASICA
                $this->pdf->Cell(80, 10, 'Recibo de Inscripcion', 0, 0, 'C', 0);


                $this->pdf->SetFont('Courier', 'B', 8);
                //Construllimos una de celda de 30 puntos
                $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(50, 5, '"Conectividad sin limites', 0, 0, 'C', 0);
                $this->pdf->Ln(3); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(50, 5, 'Streaming y Wifi a tu alcance"', 0, 0, 'C', 0);
                $this->pdf->Ln(3); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(50, 5, 'Isinuta - Villa Tunari', 0, 0, 'C', 0);
                $ano_actual = date("Y");
                $this->pdf->Ln(3); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(50, 5, 'Cochabamba-' . $ano_actual, 0, 0, 'C', 0);

                //ancho, alto, texto, borde, generacion de la siguiente linea
                //0 derecha         1 sigueien line         2 debajo
                //Alineacion        L=ISQUIERDA  C=CENTRO    R=DERECHA
                //Fill 0 para que NO se vea el fondo         1 para que se vea el fondo
                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->Ln(7); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(70, 5, 'Datos del Cliente', 0, 0, 'L', 0);
                $this->pdf->Cell(12);
                $this->pdf->Cell(70, 5, 'Detalles de Venta', 0, 0, 'L', 0);
                /*
        $ruta = base_url() . "img/sellov1.png";
        $this->pdf->Image($ruta, 150, 15, 50, 50);
*/
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
                $this->pdf->Cell(32, 5, 'Nombre del Cliente: ', 0, 0, 'L',);
                $this->pdf->SetFont('Arial', '', 9);
                $this->pdf->Cell(38, 5, $cliente, 0, 0, 'L',);
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->Cell(12);
                $this->pdf->Cell(26, 5, 'C.I.: ', 0, 0, 'L', 0);
                $this->pdf->SetFont('Arial', '', 9);
                $this->pdf->Cell(38, 5, $ci, 0, 0, 'L',);
                $this->pdf->SetFont('Arial', 'B', 9);

                /*
        $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
        $this->pdf->Cell(32, 5, 'Telefono/Celular: ', 0, 0, 'L',);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(38, 5, $telefono, 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(12);
        $this->pdf->Cell(35, 5, 'Fecha de Finalizacion: ', 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(40, 5, formatearFecha($fechaFin), 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);


        $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
        $this->pdf->Cell(17, 5, 'Direccion: ', 0, 0, 'L',);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(38, 5, $direccion, 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);




*/
                //CAMBIAMOS EL TIPO DE LETRA
                $this->pdf->Ln(8); // le decimos que vamos a saltar 10px asia abajo
                $this->pdf->SetFont('Arial', 'B', 9);
                $this->pdf->SetFillColor(2, 62, 110); //color de fondo
                $this->pdf->SetTextColor(255, 255, 255); //color de texto
                $this->pdf->SetDrawColor(23, 15, 23); //color de borde

                ///enpeamos el siglado

                $this->pdf->Cell(5, 5, '#', 'TBLR', 0, 'C', 1);
                $this->pdf->Cell(25, 5, 'FechaInscripcion', 'TBLR', 0, 'C', 1);
                $this->pdf->Cell(50, 5, 'Observacion', 'TBLR', 0, 'C', 1);
                $this->pdf->Cell(100, 5, 'Nombre Curso', 'TBLR', 0, 'C', 1);
                $this->pdf->Cell(30, 5, 'Duracion', 'TBLR', 0, 'C', 1);
                $this->pdf->Cell(20, 5, 'Precio (Bs.)', 'TBLR', 0, 'C', 1);
                $this->pdf->Ln(5);


                $totalsum = 0;
                $num = 1;
                foreach ($detalleInscripcionID as $row) {
                        $fechaInscripcion = $row->fechaInscripcion;
                        $observacion = $row->observacion;
                        $nombreCurso = $row->nombreCurso;
                        $precio = $row->precioTotal;

                        $this->pdf->SetFillColor(2, 62, 110); //color de fondo
                        $this->pdf->SetTextColor(255, 255, 255); //color de texto
                        $this->pdf->Cell(5, 5, $num, 'TBL', 0, 'C', 1);
                        $this->pdf->SetFont('Arial', '', 9);
                        $this->pdf->SetTextColor(0, 0, 0);
                        $this->pdf->Cell(25, 5, $fechaInscripcion, 'TB', 0, 'C', 0);
                        $this->pdf->Cell(50, 5, $observacion, 'TB', 0, 'C', 0);
                        $this->pdf->Cell(100, 5, $nombreCurso, 'TB', 0, 'C', 0);
                        $this->pdf->Cell(20, 5, $precio, 'TBR', 0, 'C', 0);

                        $totalsum += $precio;
                        //$this->pdf->Cell(30,5,$fechaInicio,'TBLR',0,'L',0);
                        //$this->pdf->Cell(30,5,$fechaFin,'TBLR',0,'L',0);

                        $this->pdf->Ln(5);
                        $num++;
                }
                $this->pdf->Ln(5);
                $this->pdf->Ln(5);
                $this->pdf->Cell(20, 5, $totalsum, 'TBR', 0, 'C', 0);


                /*
        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(160);
        $this->pdf->Cell(19, 5, 'Total (Bs.): ', 0, 0, 'L', 0);
        $this->pdf->SetFillColor(2, 62, 110); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255); //color de texto
        $this->pdf->SetDrawColor(23, 15, 23); //color de borde
        $this->pdf->Cell(1);
        $this->pdf->Cell(20, 5, $totalVenta, 0, 0, 'C', 1);
        $this->pdf->SetFont('Arial', 'B', 9);


        $this->pdf->Ln(5);
        $this->pdf->Cell(100);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto

        $this->pdf->Cell(100, 5, 'SON: ' . $numeroEnLetras . ' BOLIVIANOS', 0, 0, 'R', 0);

        $this->pdf->Ln(5);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto
        $this->pdf->Cell(100, 5, 'Usuario: ' . $nombreUsuario, 0, 0, 'L', 0);

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Courier', 'B', 10);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto
        $this->pdf->Cell(200, 5, '"Esperamos que disfrute de nuestros servicios', 0, 0, 'C',);
        $this->pdf->Ln(4);
        $this->pdf->Cell(200, 5, 'Su confianza es nuestro mayor logro!"', 0, 0, 'C',);

        //

*/
                //totalVentaLiteral

                $this->pdf->Output("DetalleDeVenta.pdf", "I");
                //El parametro I es Mostrar en navegador
                //El parametro D es para Forzar Descarga

        }

        public function generarReciboPDF3()
        {
                $this->pdf = new Pdf();

                //$idInscripcion = $_POST['id'];
                
                $idInscripcion = 17;


                $datosGeneralesInscripcionID = $this->reporte_model->datosGeneralesInscripcionID($idInscripcion);
                $datosGeneralesInscripcionID = $datosGeneralesInscripcionID->result();

                $cliente = $datosGeneralesInscripcionID[0]->cliente;
                $ci = $datosGeneralesInscripcionID[0]->ci;
                $razonSocial = $datosGeneralesInscripcionID[0]->razonSocial;
                $fechaInscripcion = $datosGeneralesInscripcionID[0]->fechaInscripcion;
                $observacion = $datosGeneralesInscripcionID[0]->observacion;
                $idInscripcion = $datosGeneralesInscripcionID[0]->id;

                $detalleInscripcionID = $this->reporte_model->detalleInscripcionID($idInscripcion);
                $detalleInscripcionID = $detalleInscripcionID->result();


                //CREAMOS UN OBJETO DE NUESTRA CLASE PDF
                $this->pdf = new Pdf();
                //primer metodo que debemos agregar es AddPage=AgregarPagina


                //$this->pdf->SetPageSize(array(210, 150)); // Tamaño en milímetros (A4: 210mm x 297mm)

                $this->pdf->AddPage('P', 'A4');
                //Agregamos nuemro de paginas
                $this->pdf->AliasNbPages();
                //agregamos un titulo
                $this->pdf->SetTitle("Recibo de Inscripcion");

                //le damos un margen isquierdo de 15 px
                $this->pdf->SetLeftMargin(10);
                //le damos un margen derecho de 15px
                $this->pdf->SetRightMargin(10);
                $this->pdf->SetTopMargin(10);    // Márgen superior

                //definimos un color de fondo al documento
                $this->pdf->SetFillColor(210, 210, 210); //RGB
                //Tipo de letra, tipo de letra
                $this->pdf->SetFont('Arial', 'B', 20);
                // I Cursiva    U subrayada      B negrilla      ''normal

                /*
        $ruta = base_url() . "img/logoCOLOR.jpg";
        $this->pdf->Image($ruta, 5, 6, 50, 15);
*/
                $this->pdf->Image('adminlte/dist/img/loretosinfon.png', 15, 12, 35, 35, 'PNG');
                $this->pdf->Ln(10);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('ESCUELA DE NATACION')), 0, 0, 'C');
                $this->pdf->Ln(4);

                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('CENTRO ACUATICO LORETO')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Calle Nicacio Rios # 797 Zona Loreto')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(195, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Cel. 70368576')), 0, 0, 'C');
                $this->pdf->Ln(20);

                $this->pdf->SetFont('Arial', 'BU', 17);
                $this->pdf->SetTextColor(32, 10, 210);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('RECIBO DE INSCRIPCION')), 0, 0, 'C');
                $this->pdf->Ln(15);

                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->SetTextColor(39, 39, 51);
                $this->pdf->Cell(36, 7, iconv("UTF-8", "ISO-8859-1", 'Fecha de emisión:'), 0, 0, 'L');
                $this->pdf->SetTextColor(97, 97, 97);
                $this->pdf->Cell(110, 7, iconv("UTF-8", "ISO-8859-1", 'PONER FECHAAAAAAAAA'), 0, 0, 'L');

                $this->pdf->SetFillColor(23, 83, 201);
                $this->pdf->SetDrawColor(23, 83, 201);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(255, 255, 255);
                $this->pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper('Recibo Nro.')), 0, 0, 'C', true);
                $this->pdf->Ln(7);

                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->SetTextColor(39, 39, 51);
                $this->pdf->Cell(14, 7, iconv("UTF-8", "ISO-8859-1", 'Cajero:'), 0, 0, 'L');
                $this->pdf->SetTextColor(97, 97, 97);
                $this->pdf->Cell(132, 7, iconv("UTF-8", "ISO-8859-1", 'PONER NOMBRE CAJERO'), 0, 0, 'L');

                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(97, 97, 97);
                $this->pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $idInscripcion), 'LRB', 0, 'C'); // LINEA AL NRO DE RECIBO
                $this->pdf->Ln(15);

                //ancho, alto, texto, borde, generacion de la siguiente linea
                //0 derecha         1 sigueien line         2 debajo
                //Alineacion        L=ISQUIERDA  C=CENTRO    R=DERECHA
                //Fill 0 para que NO se vea el fondo         1 para que se vea el fondo
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->Cell(15, 5, 'Cliente: ', 0, 0, 'L',);
                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->Cell(50, 5, $cliente, 0, 0, 'L',);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->Cell(12);
                $this->pdf->Cell(8, 5, 'C.I.: ', 0, 0, 'L', 0);
                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->Cell(35, 5, $ci, 0, 0, 'L',);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->Cell(27, 5, 'Razon Social: ', 0, 0, 'L', 0);
                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->Cell(38, 5, $ci, 0, 0, 'L',);


                /*
        $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
        $this->pdf->Cell(32, 5, 'Telefono/Celular: ', 0, 0, 'L',);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(38, 5, $telefono, 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(12);
        $this->pdf->Cell(35, 5, 'Fecha de Finalizacion: ', 0, 0, 'L', 0);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(40, 5, formatearFecha($fechaFin), 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);


        $this->pdf->Ln(5); //ES COLO UN SALTO DE LINEA
        $this->pdf->Cell(17, 5, 'Direccion: ', 0, 0, 'L',);
        $this->pdf->SetFont('Arial', '', 9);
        $this->pdf->Cell(38, 5, $direccion, 0, 0, 'L',);
        $this->pdf->SetFont('Arial', 'B', 9);
*/

                //CAMBIAMOS EL TIPO DE LETRA
                $this->pdf->Ln(12); // le decimos que vamos a saltar 10px asia abajo

                $this->pdf->SetFillColor(23, 83, 201);
                $this->pdf->SetDrawColor(23, 83, 201);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(255, 255, 255);
                $this->pdf->Cell(8, 8, iconv("UTF-8", "ISO-8859-1", '#'), 1, 0, 'C', true);
                $this->pdf->Cell(100, 8, iconv("UTF-8", "ISO-8859-1", 'Descripción'), 1, 0, 'C', true);
                $this->pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", 'Cant.'), 1, 0, 'C', true);
                $this->pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", 'Precio'), 1, 0, 'C', true);
                $this->pdf->Cell(34, 8, iconv("UTF-8", "ISO-8859-1", 'Importe Bs.'), 1, 0, 'C', true);
                $this->pdf->Ln(8);

                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->SetTextColor(39, 39, 51);

                $totalsum = 0;
                $num = 1;
                foreach ($detalleInscripcionID as $row) {
                        $fechaInscripcion = $row->fechaInscripcion;
                        $observacion = $row->observacion;
                        $nombreCurso = $row->nombreCurso;
                        $precio = $row->precioTotal;

                        $this->pdf->SetFillColor(255, 255, 255); //color de fondo                        
                        $this->pdf->SetFont('Arial', '', 11);
                        $this->pdf->Cell(8, 5, $num, 'TBL', 0, 'C', 1);
                        $this->pdf->SetFont('Arial', '', 11);
                        $this->pdf->Cell(105, 5, $nombreCurso, 'TB', 0, 'L');
                        $this->pdf->Cell(20, 5, 1, 'TB', 0, 'L'); //CANTIDAD
                        $this->pdf->Cell(32, 5, $precio, 'TB', 0, 'L');
                        $this->pdf->Cell(24, 5, $precio, 'TBR', 0, 'L');

                        $totalsum += $precio;
                        //$this->pdf->Cell(30,5,$fechaInicio,'TBLR',0,'L',0);
                        //$this->pdf->Cell(30,5,$fechaFin,'TBLR',0,'L',0);

                        $this->pdf->Ln(5);
                        $num++;
                }
                $totalFormateado = number_format($totalsum, 2); /// SUMATORIA DE TODO EN DECIMAL

                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->Cell(130, 5, '', '', 0, 'R', 0);
                $this->pdf->Cell(25, 5, 'TOTAL Bs.', 'BL', 0, 'R', 0);
                $this->pdf->Cell(34, 5, $totalFormateado, 'TBR', 0, 'C', 0);
                $this->pdf->Ln(15);

                ///////////////////////////////////////////////////////////////////////////////
                $ejemploMonto = ($totalFormateado);
                $monto_literal = numtoletras($ejemploMonto); /////////////////////////// 625 con 80 
                $this->pdf->Ln(7);

                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(39, 39, 51);
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", ''), 0, 0, 'L');
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", 'Son: '), 0, 0, 'L');
                $this->pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $monto_literal), 0, 0, 'L');
                $this->pdf->Ln(12);
                ////////////////////////////////////////////////////////////////////////////	

                $this->pdf->SetTextColor(0, 0, 0); //color de texto
                //$this->pdf->Cell(100, 5, 'Usuario: ' . $nombreUsuario, 0, 0, 'L', 0);
                $this->pdf->Ln(5);
                ////////////////////////////////////////////////////////////////////////////                

                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->SetTextColor(39, 39, 51);
                $this->pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Para poder realizar un reclamo o devolución, debe presentar este recibo ***"), 0, 'C', false);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Gracias por su preferencia ***"), 0, 'C', false);
                $this->pdf->Ln(9);



                /*
        $this->pdf->Ln(2);
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(160);
        $this->pdf->Cell(19, 5, 'Total (Bs.): ', 0, 0, 'L', 0);
        $this->pdf->SetFillColor(2, 62, 110); //color de fondo
        $this->pdf->SetTextColor(255, 255, 255); //color de texto
        $this->pdf->SetDrawColor(23, 15, 23); //color de borde
        $this->pdf->Cell(1);
        $this->pdf->Cell(20, 5, $totalVenta, 0, 0, 'C', 1);
        $this->pdf->SetFont('Arial', 'B', 9);


        $this->pdf->Ln(5);
        $this->pdf->Cell(100);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto

        $this->pdf->Cell(100, 5, 'SON: ' . $numeroEnLetras . ' BOLIVIANOS', 0, 0, 'R', 0);

        $this->pdf->Ln(5);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto
        $this->pdf->Cell(100, 5, 'Usuario: ' . $nombreUsuario, 0, 0, 'L', 0);

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Courier', 'B', 10);
        $this->pdf->SetTextColor(0, 0, 0); //color de texto
        $this->pdf->Cell(200, 5, '"Esperamos que disfrute de nuestros servicios', 0, 0, 'C',);
        $this->pdf->Ln(4);
        $this->pdf->Cell(200, 5, 'Su confianza es nuestro mayor logro!"', 0, 0, 'C',);

        //

*/
                //totalVentaLiteral

                $this->pdf->Output("recibo.pdf", "I");
                //El parametro I es Mostrar en navegador
                //El parametro D es para Forzar Descarga
        }
        public function generarReciboPDF4()
        {
                $this->pdf = new Pdf();


                //$idInscripcion = $_POST['id'];

                $idInscripcion = 16;


                $datosGeneralesInscripcionID = $this->reporte_model->datosGeneralesInscripcionID($idInscripcion);
                $datosGeneralesInscripcionID = $datosGeneralesInscripcionID->result();

                $cliente = $datosGeneralesInscripcionID[0]->cliente;
                $ci = $datosGeneralesInscripcionID[0]->ci;
                $razonSocial = $datosGeneralesInscripcionID[0]->razonSocial;
                $fechaInscripcion = $datosGeneralesInscripcionID[0]->fechaInscripcion;
                $observacion = $datosGeneralesInscripcionID[0]->observacion;
                $idInscripcion = $datosGeneralesInscripcionID[0]->idInscripcion;

                $detalleInscripcionID = $this->reporte_model->detalleInscripcionID($idInscripcion);
                $detalleInscripcionID = $detalleInscripcionID->result();


                //CREAMOS UN OBJETO DE NUESTRA CLASE PDF
                $this->pdf = new Pdf();
                //primer metodo que debemos agregar es AddPage=AgregarPagina


                //$this->pdf->SetPageSize(array(210, 150)); // Tamaño en milímetros (A4: 210mm x 297mm)

                $this->pdf->AddPage('P', 'A4');
                //Agregamos nuemro de paginas
                $this->pdf->AliasNbPages();
                //agregamos un titulo
                $this->pdf->SetTitle("Recibo de Inscripcion");

                //le damos un margen isquierdo de 15 px
                $this->pdf->SetLeftMargin(10);
                //le damos un margen derecho de 15px
                $this->pdf->SetRightMargin(10);
                $this->pdf->SetTopMargin(10);    // Márgen superior

                //definimos un color de fondo al documento
                $this->pdf->SetFillColor(210, 210, 210); //RGB
                //Tipo de letra, tipo de letra
                $this->pdf->SetFont('Arial', 'B', 20);
                // I Cursiva    U subrayada      B negrilla      ''normal

                /*
        $ruta = base_url() . "img/logoCOLOR.jpg";
        $this->pdf->Image($ruta, 5, 6, 50, 15);
*/
                $this->pdf->Image('adminlte/dist/img/loretosinfon.png', 15, 12, 35, 35, 'PNG');
                $this->pdf->Ln(10);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('ESCUELA DE NATACION')), 0, 0, 'C');
                $this->pdf->Ln(4);

                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('CENTRO ACUATICO LORETO')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Calle Nicacio Rios # 797 Zona Loreto')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(195, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Cel. 70368576')), 0, 0, 'C');
                $this->pdf->Ln(20);

                $this->pdf->SetFont('Arial', 'BU', 17);
                $this->pdf->SetTextColor(32, 10, 210);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Lista de Inscritos')), 0, 0, 'C');
                $this->pdf->Ln(15);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(0, 0, 0);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Desde:')), 0, 0, 'L');
                $this->pdf->Ln(15);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Hasta:')), 0, 0, 'L');
                $this->pdf->Ln(15);

                $this->pdf->Output("recibo2.pdf", "I");
                //El parametro I es Mostrar en navegador
                //El parametro D es para Forzar Descarga
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function pdf()
        {
                $desde = $_POST['desde'];
                $hasta = $_POST['hasta'];

                $fechaNuevaDesde = date("d-m-Y", strtotime($desde));
                $fechaNuevaHasta = date("d-m-Y", strtotime($hasta));

                $getRangoFechas = $this->reporte_model->getRangoFechas($desde, $hasta);

                $fechaIns = $getRangoFechas[0]->fechaIns;
                $cliente = $getRangoFechas[0]->cliente;
                $curso = $getRangoFechas[0]->curso;
                $precioTotal = $getRangoFechas[0]->precioTotal;


                //CREAMOS UN OBJETO DE NUESTRA CLASE PDF
                $this->pdf = new Pdf();

                $this->pdf->AddPage('P', 'A4');
                //Agregamos nuemro de paginas
                $this->pdf->AliasNbPages();
                //agregamos un titulo
                $this->pdf->SetTitle("Reporte Inscritos");
                //le damos un margen isquierdo de 15 px
                $this->pdf->SetLeftMargin(10);
                //le damos un margen derecho de 15px
                $this->pdf->SetRightMargin(10);
                $this->pdf->SetTopMargin(10);    // Márgen superior

                //definimos un color de fondo al documento
                $this->pdf->SetFillColor(210, 210, 210); //RGB
                //Tipo de letra, tipo de letra
                $this->pdf->SetFont('Arial', 'B', 20);
                // I Cursiva    U subrayada      B negrilla      ''normal
                $this->pdf->Image('adminlte/dist/img/loretosinfon.png', 15, 12, 35, 35, 'PNG');
                $this->pdf->Ln(10);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('ESCUELA DE NATACION')), 0, 0, 'C');
                $this->pdf->Ln(4);

                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('CENTRO ACUATICO LORETO')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Calle Nicacio Rios # 797 Zona Loreto')), 0, 0, 'C');
                $this->pdf->Ln(5);

                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->SetTextColor(32, 100, 210);
                $this->pdf->Cell(195, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Cel. 70368576')), 0, 0, 'C');
                $this->pdf->Ln(20);

                $this->pdf->SetFont('Arial', 'BU', 17);
                $this->pdf->SetTextColor(32, 10, 210);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Lista de Inscritos')), 0, 0, 'C');
                $this->pdf->Ln(15);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(0, 0, 0);
                $this->pdf->Cell(0, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Desde:  ')) . $fechaNuevaDesde, 0, 0, 'L');

                $this->pdf->Ln(15);
                $this->pdf->Cell(0, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Hasta:  ')) . $fechaNuevaHasta, 0, 0, 'L');
                $this->pdf->Ln(15);

                $this->pdf->SetFillColor(23, 83, 201);
                $this->pdf->SetDrawColor(23, 83, 201);
                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(255, 255, 255);
                $this->pdf->Cell(8, 8, iconv("UTF-8", "ISO-8859-1", '#'), 1, 0, 'C', true);
                $this->pdf->Cell(20, 8, iconv("UTF-8", "ISO-8859-1", 'Fecha Insc.'), 1, 0, 'C', true);
                $this->pdf->Cell(60, 8, iconv("UTF-8", "ISO-8859-1", 'Nombre del Cliente'), 1, 0, 'C', true);
                $this->pdf->Cell(40, 8, iconv("UTF-8", "ISO-8859-1", 'Curso Inscrito'), 1, 0, 'C', true);
                $this->pdf->Cell(40, 8, iconv("UTF-8", "ISO-8859-1", ''), 1, 0, 'C', true); //blanco
                $this->pdf->Cell(18, 8, iconv("UTF-8", "ISO-8859-1", 'Precio Bs.'), 1, 0, 'C', true);
                $this->pdf->Cell(3, 8, iconv("UTF-8", "ISO-8859-1", ''), 1, 0, 'C', true); //blanco
                $this->pdf->Ln(8);

                $this->pdf->SetFont('Arial', '', 11);
                $this->pdf->SetTextColor(39, 39, 51);

                $totalsum = 0;
                $num = 1;
                foreach ($getRangoFechas as $row) {
                        $fechaIns = date("d-m-Y", strtotime($row->fechaIns));
                        $cliente = $row->cliente;
                        $curso = $row->curso;
                        $precio = $row->precioTotal;

                        $this->pdf->SetFillColor(255, 255, 255); //color de fondo                        
                        $this->pdf->SetFont('Arial', '', 11);
                        $this->pdf->Cell(7, 5, $num, 'TBLR', 0, 'C', 1);
                        $this->pdf->SetFont('Arial', '', 11);
                        $this->pdf->Cell(25, 5, $fechaIns, 'TBR', 0, 'L');
                        $this->pdf->Cell(50, 5, $cliente, 'TBR', 0, 'L'); //CANTIDAD
                        $this->pdf->Cell(87, 5, $curso, 'TBR', 0, 'L');
                        $this->pdf->Cell(20, 5, $precio, 'TBR', 0, 'L');

                        $totalsum += $precio;
                        $this->pdf->Ln(5);
                        $num++;
                }
                $totalFormateado = number_format($totalsum, 2); /// SUMATORIA DE TODO EN DECIMAL

                $this->pdf->SetFont('Arial', 'B', 12);
                $this->pdf->Cell(130, 5, '', '', 0, 'R', 0);
                $this->pdf->Cell(25, 5, 'TOTAL Bs.', 'BL', 0, 'R', 0);
                $this->pdf->Cell(34, 5, $totalFormateado, 'TBR', 0, 'C', 0);
                $this->pdf->Ln(15);

                ///////////////////////////////////////////////////////////////////////////////
                $ejemploMonto = ($totalFormateado);
                $monto_literal = numtoletras($ejemploMonto); //////////////////////////
                $this->pdf->Ln(7);

                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->SetTextColor(39, 39, 51);
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", ''), 0, 0, 'L');
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", 'Son: '), 0, 0, 'L');
                $this->pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $monto_literal), 0, 0, 'L');
                $this->pdf->Ln(8);
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", ''), 0, 0, 'L');
                $this->pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", 'Monto ingresado en caja. '), 0, 0, 'L');
                $this->pdf->Ln(12);
                ////////////////////////////////////////////////////////////////////////////	
                $this->pdf->SetTextColor(0, 0, 0); //color de texto
                //$this->pdf->Cell(100, 5, 'Usuario: ' . $nombreUsuario, 0, 0, 'L', 0);
                $this->pdf->Ln(5);
                ////////////////////////////////////////////////////////////////////////////                

                $this->pdf->SetFont('Arial', 'B', 11);
                $this->pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Gracias por su preferencia ***"), 0, 'C', false);
                $this->pdf->Ln(9);

                $this->pdf->Output("recibo.pdf", "I");
                //El parametro I es Mostrar en navegador
                //El parametro D es para Forzar Descarga
        }

        ////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////  CURSOS MAS SOLICITADOS ///////////////////////////
        ////////////////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                public function pdfMasSolicitados()
                {
                        /*
                        $desde = $_POST['desde'];
                        $hasta = $_POST['hasta'];
        
                        $fechaNuevaDesde = date("d-m-Y", strtotime($desde));
                        $fechaNuevaHasta = date("d-m-Y", strtotime($hasta));
        */
                        $cursosMasSolicitados = $this->reporte_model->cursosMasSolicitados();
        
                        $curso = $cursosMasSolicitados[0]->curso;
                        $cantidad = $cursosMasSolicitados[0]->cantidad;
                       // $curso = $getRangoFechas[0]->curso;
                        //$precioTotal = $getRangoFechas[0]->precioTotal;
        
        
                        //CREAMOS UN OBJETO DE NUESTRA CLASE PDF
                        $this->pdf = new Pdf();
        
                        $this->pdf->AddPage('P', 'A4');
                        //Agregamos nuemro de paginas
                        $this->pdf->AliasNbPages();
                        //agregamos un titulo
                        $this->pdf->SetTitle("Reporte");
                        //le damos un margen isquierdo de 15 px
                        $this->pdf->SetLeftMargin(10);
                        //le damos un margen derecho de 15px
                        $this->pdf->SetRightMargin(10);
                        $this->pdf->SetTopMargin(10);    // Márgen superior
        
                        //definimos un color de fondo al documento
                        $this->pdf->SetFillColor(210, 210, 210); //RGB
                        //Tipo de letra, tipo de letra
                        $this->pdf->SetFont('Arial', 'B', 20);
                        // I Cursiva    U subrayada      B negrilla      ''normal
                        $this->pdf->Image('adminlte/dist/img/loretosinfon.png', 15, 12, 35, 35, 'PNG');
                        $this->pdf->Ln(10);
        
                        $this->pdf->SetFont('Arial', 'B', 13);
                        $this->pdf->SetTextColor(32, 100, 210);
                        $this->pdf->Cell(185, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('ESCUELA DE NATACION')), 0, 0, 'C');
                        $this->pdf->Ln(4);
        
                        $this->pdf->SetFont('Arial', 'B', 12);
                        $this->pdf->SetTextColor(32, 100, 210);
                        $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('CENTRO ACUATICO LORETO')), 0, 0, 'C');
                        $this->pdf->Ln(5);
        
                        $this->pdf->SetFont('Arial', 'B', 10);
                        $this->pdf->SetTextColor(32, 100, 210);
                        $this->pdf->Cell(185, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Calle Nicacio Rios # 797 Zona Loreto')), 0, 0, 'C');
                        $this->pdf->Ln(5);
        
                        $this->pdf->SetFont('Arial', 'B', 10);
                        $this->pdf->SetTextColor(32, 100, 210);
                        $this->pdf->Cell(195, 2, iconv("UTF-8", "ISO-8859-1", strtoupper('Cel. 70368576')), 0, 0, 'C');
                        $this->pdf->Ln(20);
        
                        $this->pdf->SetFont('Arial', 'BU', 17);
                        $this->pdf->SetTextColor(32, 10, 210);
                        $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Lista de Cursos mas solicitados')), 0, 0, 'C');
                        $this->pdf->Ln(8);
                        $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('De mayor a menor')), 0, 0, 'C');
                        $this->pdf->Ln(15);
                
                        $this->pdf->SetFillColor(23, 83, 201);
                        $this->pdf->SetDrawColor(23, 83, 201);
                        $this->pdf->SetFont('Arial', 'B', 11);
                        $this->pdf->SetTextColor(255, 255, 255);
                        $this->pdf->Cell(10, 8, iconv("UTF-8", "ISO-8859-1", '#'), 1, 0, 'C', true);
                        $this->pdf->Cell(97, 8, iconv("UTF-8", "ISO-8859-1", 'Nombre del Curso'), 1, 0, 'C', true);
                        $this->pdf->Cell(20, 8, iconv("UTF-8", "ISO-8859-1", 'Cantidad'), 1, 0, 'C', true);
                        $this->pdf->Ln(8);
        
                        $this->pdf->SetFont('Arial', '', 11);
                        $this->pdf->SetTextColor(39, 39, 51);
        
                        $totalsum = 0;
                        $num = 1;
                        foreach ($cursosMasSolicitados as $row) {
                                $curso = $row->curso;
                                $cantidad = $row->cantidad;
        
                                $this->pdf->SetFillColor(255, 255, 255); //color de fondo                        
                                $this->pdf->SetFont('Arial', '', 11);
                                $this->pdf->Cell(7, 5, $num, 'TBLR', 0, 'C', 1);
                                $this->pdf->SetFont('Arial', '', 11);
                                $this->pdf->Cell(100, 5, $curso, 'TBR', 0, 'L');
                                $this->pdf->Cell(20, 5, $cantidad, 'TBR', 0, 'C');
        
                                $this->pdf->Ln(5);
                                $num++;
                        }
                        $this->pdf->Ln(5);
                        ////////////////////////////////////////////////////////////////////////////                
        
                        $this->pdf->SetFont('Arial', 'B', 11);
                        $this->pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Gracias por su preferencia ***"), 0, 'C', false);
                        $this->pdf->Ln(9);
        
                        $this->pdf->Output("recibo.pdf", "I");
                        //El parametro I es Mostrar en navegador
                        //El parametro D es para Forzar Descarga
                }
}
