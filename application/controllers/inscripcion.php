<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script



class Inscripcion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();


		//		$this->load->library('form_validation');
		//		$this->load->library('session');
		$this->load->model('incripcion_model');
		$this->load->model('cliente_model');
		$this->load->model('detalleInscripcion_model');
		$this->load->model('pago_model');
		//		$this->load->model('cursos_model');
	}
	public function index()
	{
	}
	///////////////////////////////////////////////////////////
	public function listaInscritos()
    {
        if ($this->session->userdata('login')) {

			$this->load->model('incripcion_model');

        $data['inscritos'] = $this->incripcion_model->obtenerInscritos(); // Debes crear el modelo correspondiente

		$this->load->view('layouts/header'); //cabezera
		$this->load->view('layouts/menu_superior'); //menu superior
		$this->load->view('layouts/menu_lateral_cliente'); //menu lateral
        $this->load->view('incripcion/lista_inscritos', $data);


        } else {
            redirect('usuarios/index/2', 'refresh');
        }
    }
///////////////////////////////////////////////////////////////////////////////////////
	public function crear()
	{
		$this->load->helper(array('form', 'url'));
		$idClienteLogeado = $this->session->userdata('idCliente');
		$datosCliente = $this->cliente_model->clientes();
		$datosCurso = $this->cursos_model->obtener_cursos();
		$data['datosCliente'] = $datosCliente;
		$data['datosCursos'] = $datosCurso;
		$this->load->view('layouts/header'); //cabezera
		$this->load->view('layouts/menu_superior'); //menu superior
		$this->load->view('layouts/menu_lateral_cliente'); //menu lateral
		$this->load->view('incripcion/crear', $data); // centro
	}

	function searchCurso()
	{
		$q = $this->input->get('id');
		echo json_encode($this->cursos_model->cursos_id($q));
	}

	//se recuepra los datos del formulario de inscripcion
	// y se guarda en la base de datos de la tabla INSCRIPCION
	public function store()
	{
		$data['idCliente'] = $this->input->post('idCliente');
		$data['fechaInscripcion'] = $this->input->post('fecha');
		$data['idCurso'] = 9; //DATO ESTATICO
		//$data['idCurso'] = $this->input->post('idCurso'); //DATO ESTATICO
		$data['observacion'] = $this->input->post('observacion');
		
		$cursos =  $this->input->post('cursos');//está accediendo a la variable 'cursos' que se ha enviado a 
												//través de POST. En otras palabras, está recuperando el valor 
												// del campo 'cursos' enviado en un formulario HTML.

		//esta sacando la sumatoria total de los cursos que se inscribio
		$total = 0;
		foreach ($cursos as $v) {
			$curso = $this->cursos_model->find_by_id($v);
			$total = $total +  $curso->precioTotal;
		}

		// se almacena en la tabla detalleInscripcion
		//		$data['precioTotal'] = $total;
		$incripcion = $this->incripcion_model->store($data);

		foreach ($cursos as $v) {
			$detail['idInscripcion'] = $incripcion;
			$detail['idCurso'] = $v;
			$this->detalleInscripcion_model->store($detail);
		}

		// se almacena en la base de datos de la tabla PAGOS
		$pago['fechaPago'] = $this->input->post('fecha');
		//		$pago['idCliente'] = $this->input->post('idCliente');
		$pago['monto'] = $total;
		$pago['estadoPago'] = false;
		$pago['estado'] = false;
		$pago['idInscripcion'] = $incripcion;
		$this->pago_model->store($pago);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		
		redirect('inscripcion/mostrarDatosRegistroIns', 'refresh');
		//redirect('inscripcion/crear', 'refresh');
	}
	/////////////////////////
	public function cursos_mas_solicitados() {
		$this->load->model('reporte_model'); // Asegúrate de cargar tu modelo
	
		// Llama a una función en tu modelo para obtener los cursos más solicitados
		$cursos_solicitados = $this->reporte_model->obtener_cursos_mas_solicitados();
	
		// Carga una vista para mostrar los resultados
		$this->load->view('incripcion/verEntrefechas2', array('cursos_solicitados' => $cursos_solicitados));
	}
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////7
	public function irFormularioIns()
	{
		$this->load->view('formulario_inscripcion_view');
	}


	// En el controlador (Inscripcion.php)
	// En el controlador (Inscripcion.php) después de procesar la inscripción
	public function procesar_inscripcion()
	{
		$idCurso = $this->input->post('idCurso');
		$idInscripcion = $this->input->post('idInscripcion');

		// Cargar el modelo
		$this->load->model('detalleInscripcion_model');

		// Llamar al modelo para insertar el detalle de inscripción
		$insert_id = $this->detalleInscripcion_model->insertar_detalle_inscripcion($idCurso, $idInscripcion);

		if ($insert_id) {
			// La inserción fue exitosa, puedes redirigir a la vista de confirmación
			redirect('inscripcion/confirmacion');
		} else {
			// Manejar un error si la inserción falla
			// Puedes redirigir a una página de error o mostrar un mensaje de error
		}

		// Realiza la transacción en la tabla detalleinscripcion (por ejemplo, inserta un registro)

		// Luego, carga la vista de confirmación
		$data['cursoNombre'] = "Nombre del Curso"; // Debes obtener el nombre del curso de tu base de datos
		$data['inscripcionId'] = $idInscripcion;
		$this->load->view('confirmacion_view', $data);
	}

	public function verRangosEntreFechas()
	{
		$this->load->helper(array('form', 'url'));
		$idClienteLogeado = $this->session->userdata('idCliente');
		$datosCliente = $this->cliente_model->clientes();
		$datosCurso = $this->cursos_model->obtener_cursos();
		$data['datosCliente'] = $datosCliente;
		$data['datosCursos'] = $datosCurso;

		$this->load->view('layouts/header'); //cabezera
		$this->load->view('layouts/menu_superior'); //menu superior
		$this->load->view('layouts/menu_lateral_cliente'); //menu lateral
		$this->load->view('incripcion/verEntrefechas', $data); // centro
	}
	public function verCantidadCursos()
	{
		$this->load->helper(array('form', 'url'));
		$idClienteLogeado = $this->session->userdata('idCliente');
		$datosCliente = $this->cliente_model->clientes();
		$datosCurso = $this->cursos_model->obtener_cursos();
		$data['datosCliente'] = $datosCliente;
		$data['datosCursos'] = $datosCurso;

		$this->load->view('layouts/header'); //cabezera
		$this->load->view('layouts/menu_superior'); //menu superior
		$this->load->view('layouts/menu_lateral_cliente'); //menu lateral
		$this->load->view('incripcion/verEntrefechas2', $data); // centro
	}

	public function mostrar_reporte() {
		// Aquí obtienes los datos del reporte y los almacenas en la variable $reporte
		$reporte = $this->modelo->obtener_reporte();
	
		// Luego, cargas la vista y le pasas los datos
		$this->load->view('reporte_view', ['reporte' => $reporte]);
	}
	public function pdf()
	{
		$desde=$_POST['desde'];
		$hasta=$_POST['hasta'];

		//print_r($desde);
		//print_r($hasta);
		//exit;

		

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


				$this->pdf->Cell(0, 10, 'Curso: ' );

                /*
        $ruta = base_url() . "img/logoCOLOR.jpg";
        $this->pdf->Image($ruta, 5, 6, 50, 15);
*/
/*
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
*/
                $this->pdf->SetFont('Arial', 'BU', 17);
                $this->pdf->SetTextColor(32, 10, 210);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Lista de Inscritos')), 0, 0, 'C');
                $this->pdf->Ln(15);

                $this->pdf->SetFont('Arial', 'B', 13);
                $this->pdf->SetTextColor(0, 0, 0);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Desde:' )),$desde, 0, 0, 'L');
                $this->pdf->Ln(15);
                $this->pdf->Cell(200, 0, iconv("UTF-8", "ISO-8859-1", strtoupper('Hasta:')),$hasta, 0, 0, 'L');
                $this->pdf->Ln(15);
//foreach($data as $row)
//{
	//$this->pdf->Cell(10, 5, $ror['fechaInscripcion'],0,0,0,'l');
//}
//				$this->pdf->Output("recibo3.pdf", "I");

	}
	public function venta()
	{
		$this->load->view('formventa');
	}

	public function mostrarDatosRegistroIns()
    {
        redirect('inscripcion/mostrarDatosRegistroNuevoIns', 'refresh');
    }
    public function mostrarDatosRegistroNuevoIns()
    {
        $this->load->view('vistaAdministrador/cliente/cli_14_registro_exitoso_01_creado');
    }
}
