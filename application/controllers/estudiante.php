<?php

defined('BASEPATH') OR exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

//Lineas de solicitud de recursos de excel
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Estudiante extends CI_Controller // herencia
{
	/*
	public function index() //metodo
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista;

		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('est_lista',$data); //esta importando el archivo inicio.php  // contenido
		$this->load->view('inc/pie'); // pie 
	}
	*/

	public function indexlte() //metodo
	{
		if($this->session->userdata('login')) // si esxiste una session abierta
		{
			$lista=$this->estudiante_model->listaestudiantes();
			$data['estudiantesok']=$lista; // de la base de datos

			$fechaprueba=formatearFecha('2023-06-02 16:00:08');
			$data['fechatest']=$fechaprueba; //se crea otro campo fechatest su valor va a ser $fechaprueba

			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu
			//$this->load->view('incltever/menulateraltres');
			//$this->load->view('inclteok/centro');
			$this->load->view('est_listalte',$data); // vista del formulario
			$this->load->view('incltever/pie'); // pie
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}

	public function listaUsuarios() //metodo
	{
		if($this->session->userdata('login')) // si esxiste una session abierta
		{
			$lista=$this->estudiante_model->listaestudiantes();
			$data['estudiantesok']=$lista; // de la base de datos

			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu superior
			$this->load->view('incltever/menulateralchatgpt'); //menu lateral
			$this->load->view('incltever/menulateralcentro', $data); //menu centro
			$this->load->view('incltever/pie'); // pie
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}

	}

	public function cambiarContrasenia() //metodo
	{
			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu
			$this->load->view('incltever/menulateralchatgpt'); //menu lateral
			$this->load->view('est_formularioCambioContrasenia'); //
			$this->load->view('incltever/pie'); // pie		
	}

	public function verificarDatosContrasenia()
	{
		if ($this->session->userdata('login')) {

			$idUsuario = $this->session->userdata('idUsuario');
			
			$contraseniaActual = $_POST['contraseniaActual'];
			$contraseniaNueva = $_POST['contraseniaNueva'];
			$repeContraseniaNueva = $_POST['repeContraseniaNueva'];
			
			if (isset($_POST['contraseniaNueva']))
			{
			    // Obtén la contraseña desde el formulario
			    $contrasenanueva = $_POST['contraseniaNueva'];
			    
			    // Hashea la contraseña usando password_hash
			    $hashContrasena = password_hash($contrasenanueva, PASSWORD_DEFAULT);
			    
			    // Asigna el hash de la contraseña al campo 'password'
			    $data['password'] = $hashContrasena;
			}

			$consulta = $this->contrasenia_model->verificarPasswordAdministrador($idEstudiante, $contraseniaActual);

			if ($consulta->num_rows() > 0) {
				if($contraseniaNueva == $repeContraseniaNueva){
					$this->contrasenia_model->actualizarContraseniaAdministrador($idEstudiante, $data);
					redirect('usuarios/logout', 'refresh');
				}
				else{
					redirect('estudiante/cambioContrasenia', 'refresh');
				}
			} 
			else 
			{
				redirect('estudiante/cambioContrasenia', 'refresh');
			}
		} 
		else 
		{
			redirect('estudiante/indexlte', 'refresh');
		}
	}


	public function inscribir() //metodo
	{
		$data['infocarreras']=$this->carrera_model->listaCarreras();

		$this->load->view('inc/cabecera'); //cabecera
		$this->load->view('inc/menu'); //menu
		$this->load->view('inscribirform',$data); 
		$this->load->view('inc/pie'); // pie 
	}

	public function inscribirbd()
	{
		//atributo BD          formulario         
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];

		$idCarrera=$_POST['idCarrera'];

		$this->carrera_model->inscribirEstudiante($idCarrera,$data);

		//redireccionamos, dirigirnos al controlador estudiante y el metoddo index
		redirect('estudiante/indexlte','refresh');
	}

	public function subirfoto() //metodo
	{
		if($this->session->userdata('login')) // si existe una session abierta
		{
			$data['idEstudiante']=$_POST['idestudiante'];

			$this->load->view('inc/cabecera'); //cabezera
			$this->load->view('inc/menu'); //menu
			$this->load->view('subirform',$data);
			$this->load->view('inc/pie'); // pie 
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}			
	}

	public function subir() //metodo
	{
		if($this->session->userdata('login')) // si existe una session abierta
		{
			$idestudiante=$_POST['idEstudiante'];
			//$nombrearchivo=$idestudiante.".png"; // van a subir y tener nombre unico
			$nombrearchivo=$idestudiante.".pdf"; 

			$config['upload_path']='./uploads/estudiantes/'; //vas a subir a esta carpeta 
			
			$config['file_name']=$nombrearchivo;

			$direccion="./uploads/estudiantes/".$nombrearchivo; // 

			if(file_exists($direccion)) // si existe el archivo "direccion"
			{
				unlink($direccion); // se borra la direccion, se borra la foto de perfil y reemplazar por otra
			}

			//$config['allowed_types']='png'; // q tipos de archivos voy a permitir, jpg, gif, png
			$config['allowed_types']='pdf';

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload()) // si no se puede subir la foto
			{
				$data['error']=$this->upload->display_errors();
			}
			else
			{
				$data['foto']=$nombrearchivo;
				$this->estudiante_model->modificarestudiante($idestudiante,$data); // base de datos
				$this->upload->data(); //copia el archivo a carpeta
			}

			redirect('estudiante/indexlte','refresh');
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}			
	}

	public function agregar()
	{
		//mostrar un formulario (que va a estar en una vista) para agregar nuevo est

		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		//$this->load->view('inclte/menulateral');
		$this->load->view('est_formulariocrearcuenta');
		$this->load->view('inclteok/pie'); // pie 
	}

	public function agregarbd() //aqui deben estar las validaciones
	{

		
		//cargamos la libreria validacion (podemos cargar tb )
		$this->load->library('form_validation');

										  //name
		$this->form_validation->set_rules('nombre','Nombre de usuario','required|min_length[3]|max_length[12]',array('required'=>'Se requiere el apellido paterno','min_length'=>'Por lo menos 3 caracteres','max_length'=>'Maximo 12 caracteres')); 
		//define las reglas, no admite celda vacia, min 5 y max 12 caracteres, de esta manera se valida el campo nombre

		$this->form_validation->set_rules('apellido1','Primer apellido','required|min_length[3]|max_length[12]',array('required'=>'Se requiere el apellido paterno','min_length'=>'Por lo menos 3 caracteres','max_length'=>'Maximo 12 caracteres')); 

		$this->form_validation->set_rules('apellido2','Segundo apellido','required|min_length[3]|max_length[12]',array('required'=>'Se requiere el apellido materno','min_length'=>'Por lo menos 3 caracteres','max_length'=>'Maximo 12 caracteres'));


		$this->form_validation->set_rules('ci','ci','required|numeric','required|greater_than[-1]|less_than[100000000]',array('required'=>'Se requiere el carnet de identidad','numeric'=>'numeros','greater_than'=>'mayor o igual a 100000','less_than'=>'Menor o igual a 0'));

		$this->form_validation->set_rules('genero','genero','required|min_length[1]|max_length[1]',array('required'=>'Se requiere el sexo','min_length'=>'Por lo menos 1 caracteres','max_length'=>'Maximo 1 caracteres'));

		$this->form_validation->set_rules('direccion','direccion','required|min_length[1]|max_length[32]',array('required'=>'Se requiere la direccion','min_length'=>'Por lo menos 1 caracteres','max_length'=>'Maximo 32 caracteres'));

		$this->form_validation->set_rules('email','La direccion de correo','required|min_length[1]|max_length[52]',array('required'=>'Se requiere el correo electronico','min_length'=>'Por lo menos 1 caracteres','max_length'=>'Maximo 52 caracteres'));

		$this->form_validation->set_rules('celular','celular','required|numeric','required|greater_than[-1]|less_than[100000000]',array('required'=>'Se requiere el numero del celular','numeric'=>'numeros','greater_than'=>'mayor o igual a 100000','less_than'=>'Menor o igual a 0'));

		$this->form_validation->set_rules('password', 'password');
/*		
    	$this->form_validation->set_rules('password2', 'Confirmar Contraseña', 'required|matches[password]');

    	// Establece los mensajes de error personalizados (opcional)
    	$this->form_validation->set_message('matches', 'Las contraseñas no coinciden.');



		// devuelve false si no supera alguna validacion, caso contrario se carga nuevamente todo el formulario

*/		
		//$this->load->view('registro_exitoso');

		if($this->form_validation->run()==FALSE) 
		{
			$this->load->view('inclteok/cabecera'); //cabezera
			$this->load->view('inclteok/menusuperior'); //menu
			//$this->load->view('inclte/menulateral');
			$this->load->view('est_formulariocrearcuenta');
			$this->load->view('inclteok/pie'); // pie 			
		}
		else //SI llega los datos validados
		{

			
			//atributo BD          formulario         
			$data['nombre']=$_POST['nombre'];
			$data['primerApellido']=$_POST['apellido1'];
			$data['segundoApellido']=$_POST['apellido2'];
			$data['ci']=$_POST['ci'];
			$data['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data['genero']=$_POST['genero'];
			$data['direccion']=$_POST['direccion'];
			$data['email']=$_POST['email'];
			$data['celular']=$_POST['celular'];
			$data['password']=$_POST['password'];

			if (isset($_POST['password']))
			{
			    // Obtén la contraseña desde el formulario
			    $contrasena = $_POST['password'];
			    
			    // Hashea la contraseña usando password_hash
			    $hashContrasena = password_hash($contrasena, PASSWORD_DEFAULT);
			    
			    // Asigna el hash de la contraseña al campo 'password'
			    $data['password'] = $hashContrasena;
			}

			$this->estudiante_model->agregarestudiante($data);
			redirect('estudiante/mostrarDatosRegistro', 'refresh');
		}
	}
	
	public function mostrarDatosRegistro()
    {
    	$this->load->view('registro_exitoso');
    }


/*/////////////////////
	function validarPalabras() 
	{
            var palabraInput = document.getElementById("palabra");
            var mensajeError = document.getElementById("mensaje-error");

            var palabra = palabraInput.value;
            var regex = /^[a-zA-Z]+$/;

            if (!regex.test(palabra)) 
            {
                mensajeError.style.display = "block";
            } else {
                mensajeError.style.display = "none";
            }
        }

/*/////////////////////////	
	
	public function modificar()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idestudiante);
		/*  
		$this->load->view('inclte/cabecera'); //cabezera
		$this->load->view('inclte/menu'); //menu
		$this->load->view('est_modificar',$data);
		$this->load->view('inclte/pie'); // pie 
		*/

		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		//$this->load->view('inclte/menulateral');
		$this->load->view('est_modificar',$data); // vista del formulario
		$this->load->view('inclteok/pie'); // pie


	}

	public function modificarbd()
	{
		$idestudiante=$_POST['idestudiante'];

		$data['nombre']=$_POST['nombre'];//construyendo mi array data
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['ci']=$_POST['ci'];
		$data['genero']=$_POST['genero'];
		$data['edad']=$_POST['edad'];
		$data['direccion']=$_POST['direccion'];


		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/indexlte','refresh');
	}


	public function eliminarbd()
	{
		                          //FORM
		$idestudiante=$_POST['idestudiante'];
		$this->estudiante_model->eliminarestudiante($idestudiante);
		redirect('estudiante/indexlte','refresh');		
	}



	public function deshabilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';
		
		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/indexlte','refresh');//
	}

	public function habilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';
		
		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/deshabilitados','refresh');
	}

	public function deshabilitados() //metodo
	{
		$lista=$this->estudiante_model->listaestudiantesdes();
		$data['estudiantesok']=$lista;

		/*
		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('est_listades',$data); 
		$this->load->view('inc/pie'); // pie 
		*/

		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		//$this->load->view('inclte/menulateral');
		$this->load->view('est_listades',$data); // vista del formulario
		$this->load->view('inclteok/pie'); // pie


	}



////////////////////////////////////
	public function listaxls()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="estudiantes.xlsx"');

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer apellido');
		$sheet->setCellValue('D1', 'Segundo apellido');
		$sheet->setCellValue('E1', 'nota');
		$sn=2;
	
		foreach ($lista as $row) 
		{
			$sheet->setCellValue('A'.$sn,$row->idEstudiante);
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->primerApellido);
			$sheet->setCellValue('D'.$sn,$row->segundoApellido);
			$sheet->setCellValue('E'.$sn,$row->nota);
			$sn++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
////////////////////////////////
	public function listaxls2()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="estudiantes.xlsx"');

		$spreadsheet = new Spreadsheet();

		//METADATOS
		$spreadsheet
		->getProperties()
		->setCreator("Nombre del autor")
		->setLastModifiedBy("Juan Perez")
		->setTitle('Excel creado en el sistema')
		->setSubject('Excel de prueba')
		->setDescription('Descripcion del excel')
		->setKeywords('Lista estudiantes')
		->setCategory('Categoria de prueba');

		$sheet = $spreadsheet->getActiveSheet();

		// nombre de la hoja de la pestaña de excel
		$sheet->setTitle('Lista estudiantes');

		// color de la letra de la fila 1, de la columna A hasta E
		$sheet->getStyle('A1:E1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);

		//color del fondo de la fila 1, de la columna A hasta E
		$sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

		// Ancho de columna, en este caso la columna A tiene un ancho de 8 puntos
		$sheet->getColumnDimension('A')->setWidth(5);

		// Ancho de columna, en este caso la columna B tiene un ancho de 20 puntos
		$sheet->getColumnDimension('B')->setWidth(20);

		// Ancho de columna, en este caso la columna C tiene un ancho de 20 puntos
		$sheet->getColumnDimension('C')->setWidth(20);

		// Ancho de columna, en este caso la columna D tiene un ancho de 20 puntos
		$sheet->getColumnDimension('D')->setWidth(20);

		// Ancho de columna, en este caso la columna E tiene un ancho de 8 puntos
		$sheet->getColumnDimension('E')->setWidth(8);

		// Ancho de columna, en este caso la columna F tiene un ancho de 20 puntos
		$sheet->getColumnDimension('F')->setWidth(20);

		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer apellido');
		$sheet->setCellValue('D1', 'Segundo apellido');
		$sheet->setCellValue('E1', 'nota');

		// concatenamos a la celda F1, las celdas D1 y E1
		$sheet->setCellValue('F1', '=CONCAT(D1,E1)');

		$sn=2;
	
		foreach ($lista as $row) 
		{
			$sheet->setCellValue('A'.$sn,$row->idEstudiante);
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->primerApellido);
			$sheet->setCellValue('D'.$sn,$row->segundoApellido);
			$sheet->setCellValue('E'.$sn,$row->nota);
			$sn++;
		}

		// se pone la palabra promedio en la columna Dn finalizado el ciclo de foreach
		$sheet->setCellValue('D'.$sn,'PROMEDIO');
		
		// se pone el resultado del promedio en la columna En finalizado el ciclo de foreach
		$sheet->setCellValue('E'.$sn,'=AVERAGE(E2:E'.($sn-1).')');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

/////////////////////////////////
	public function proformapdf()
	{
		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();//agregamos numeros de paginas
		$this->pdf->SetTitle("Proforma");//tenemos un titulo
			
		$this->pdf->SetLeftMargin(15); //
		$this->pdf->SetRightMargin(15); //

		
		// vamos a inportar imagenes
		$ruta=base_url()."img/pclogo.jpg";
		$this->pdf->Image($ruta,10,20,30,18); //rescatamos la imagen

		$this->pdf->SetFont('Courier','B',10);
		$this->pdf->Ln(10);
		$this->pdf->Cell(20);
		$this->pdf->Cell(100,3,'COMPUTER SERVICE','',0,'L',0); //0 SIN RELLENO; 1 CON RELLENO

		//
		$this->pdf->SetFont('Courier','',8);//

		$this->pdf->Ln(3);//SALTO DE LINEA
		$this->pdf->Cell(20);
		$this->pdf->Cell(100,3,'Calle Bolivia No. 133','',0,'L',0); //0 SIN RELLENO; 1 CON RELLENO
		$this->pdf->Ln(3);
		$this->pdf->Cell(20);
		$this->pdf->Cell(100,3,'Barrio Libertad - Zona Oeste','',0,'L',0);

		$this->pdf->Ln(3);
		$this->pdf->Cell(20);
		$this->pdf->Cell(100,3,'Cochabamba - Bolivia','',0,'L',0);

		$this->pdf->Ln(10);

		$this->pdf->SetFont('Courier','B',20);
		$this->pdf->SetFillColor(51,204,51);
		$this->pdf->SetTextColor(255,255,255);
		$this->pdf->SetDrawColor(23,15,23);
		$this->pdf->Cell(180,10,'PROFORMA','TBLR',0,'C',1);

		$this->pdf->Ln(15); // SALTO DE LINEA DE 15 PTOS

		// DOS AREAS DE 60   120
		$this->pdf->SetTextColor(0,0,0);//COLOR NEGRO
		$this->pdf->SetFont('Courier','B',8);

		$this->pdf->Cell(30,5,'FECHA:','TBLR',0,'C',0);
		$fecha=date("d/m/Y");
		$this->pdf->Cell(30,5,$fecha,'TBLR',0,'C',0);

		$this->pdf->Cell(5,5,'','',0,'C',0);// ESPACIO SIN CONTENIDO

		$this->pdf->Cell(25,5,'CLIENTE:','TBLR',0,'C',0);
		$this->pdf->Cell(90,5,'JUAN PABLO FLORES SUAREZ','TBLR',0,'L',0);

		$this->pdf->Ln(5);

		$this->pdf->Cell(30,5,'VALIDEZ:','TBLR',0,'C',0);
		$this->pdf->Cell(30,5,utf8_decode('10 días'),'TBLR',0,'C',0);

		$this->pdf->Cell(5,5,'','',0,'C',0);

		$this->pdf->Cell(25,5,'CODIGO:','TBLR',0,'C',0);
		$this->pdf->Cell(90,5,'JPFS-1023','TBLR',0,'L',0);

		$this->pdf->Ln(5);

		$this->pdf->Cell(65); // CELDA VACIA
		$this->pdf->Cell(25,5,'NIT/CI:','TBLR',0,'C',0);
		$this->pdf->Cell(90,5,'6557722','TBLR',0,'L',0);
/////////////////////////////////////////////////////////////

		$this->pdf->Ln(10); // SALTO DE 10 PTOS 

		//COMENZAMOS A DIBUJAR LA TABLA DE PRECIOS

		// CONFIGURAMOS LA TABLA DE PRODUCTOS, TITULARES
		$this->pdf->SetFont('Courier','B',8);
		$this->pdf->SetFillColor(51,204,51);
		$this->pdf->SetTextColor(255,255,255);
		$this->pdf->SetDrawColor(23,15,23);
		$this->pdf->Cell(10,5,'COD','TBLR',0,'C',1);
		$this->pdf->Cell(110,5,'DESCRIPCION','TBLR',0,'C',1);
		$this->pdf->Cell(20,5,'CANTIDAD','TBLR',0,'C',1);
		$this->pdf->Cell(20,5,'P. UNITARIO','TBLR',0,'C',1);
		$this->pdf->Cell(20,5,'SUB TOTAL','TBLR',0,'C',1);

		$this->pdf->Ln(5); // SALTO DE 5 PTOS 

		$this->pdf->SetFont('Courier','B',8);
		$this->pdf->SetTextColor(0,0,0);
		$this->pdf->SetDrawColor(0,0,0);

		$this->pdf->Cell(10,5,'1524','TBLR',0,'C',0);
		$this->pdf->Cell(110,5,'MOUSE DE GAMA ALTA','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'5','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'20','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'10','TBLR',0,'R',0);
		$this->pdf->Ln(5); // SALTO DE 5 PTOS 


		$this->pdf->Cell(10,5,'1024','TBLR',0,'C',0);
		$this->pdf->Cell(110,5,'TECLADO GAMER','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'1','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'100','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'200','TBLR',0,'R',0);
		$this->pdf->Ln(5); // SALTO DE 5 PTOS 


		$this->pdf->Cell(10,5,'1004','TBLR',0,'C',0);
		$this->pdf->Cell(110,5,'MONITOR FLAT SCREEN','TBLR',0,'L',0);
		$this->pdf->Cell(20,5,'1','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'1000','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'1000','TBLR',0,'R',0);
		$this->pdf->Ln(5); // SALTO DE 5 PTOS 


		$this->pdf->Cell(140);
		$this->pdf->Cell(20,5,'TOTAL BS.','TBLR',0,'R',0);
		$this->pdf->Cell(20,5,'1300','TBLR',0,'R',0);

		// imagen delante del contenigo, en este caso PAGADO
		$ruta2=base_url()."img/front.png";
		$this->pdf->Image($ruta2,0,0,220,300);

		$this->pdf->Output("proforma1.pdf","I");//salida  
										//I=>PARA ABRIR EN UNA NUEVA VENTANA
										//D==> PARA DESCARGAR

	}

//////////////////////////////////

//////////////////////////////////	
	public function listapdf()
	{
		if($this->session->userdata('login')) // si esxiste una session abierta
		{
			$lista=$this->estudiante_model->listaestudiantes();//retorna todos los estudiantes
			$lista=$lista->result();//result va a transfomar este objeto a un array relacional

			//se empieza a desarrollar el reporte
			$this->pdf=new Pdf();

			$this->pdf->AddPage();
			$this->pdf->AliasNbPAges();//agregamos numeros de paginas
			$this->pdf->SetTitle("Lista de estudiantes");//tenemos un titulo
			
			//empezar a personalizar el reporte
			$this->pdf->SetLeftMargin(15); //
			$this->pdf->SetRightMargin(15); //
			$this->pdf->SetFillColor(210,210,210); // define un color de fondo RGB
			$this->pdf->SetFont('Arial','B',11); //tipo de letra, negrita, tamaño
			// I Italic    U  Underline   B Bold   ''  normal
			$this->pdf->Ln(5); // salto de linea de 5 puntos
			$this->pdf->Cell(30);//construir celda d 30 ptos celda vacia
			$this->pdf->Cell(120,10,'LISTA DE ESTUDIANTES', 0,0,'C',1);
			//ancho, alto, texto, borde, generacion de la sig celda
			// 0 derecha  1 siguiente line 2 debajo de la anterior celda
			//Alineacion  L  C  R,  fill  0  1

			// cambiamos el tipo de letra
			$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial','B',8); //tipo de letra, normal, tamaño

			$this->pdf->Cell(30);
			$this->pdf->Cell(7,5,'No','TBLR',0,'C',0);
			$this->pdf->Cell(50,5,'NOMBRE','TBLR',0,'C',0);
			$this->pdf->Cell(31,5,'PRIMER APELLIDO','TBLR',0,'C',0);
			$this->pdf->Cell(31,5,'SEGUNDO APELLIDO','TBLR',0,'L',0);		
			$this->pdf->Ln(5);

			$this->pdf->SetFont('Arial','',9); //tipo de letra, normal, tamaño
			
			$num=1;
			foreach($lista as $row)
			{
				$nombre=$row->nombre;//atributo de la base de datos
				$primerApellido=$row->primerApellido;
				$segundoApellido=$row->segundoApellido;

				$this->pdf->Cell(30);
				$this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
				$this->pdf->Cell(50,5,$nombre,'TBLR',0,'L',0);
				$this->pdf->Cell(31,5,$primerApellido,'TBLR',0,'L',0);
				$this->pdf->Cell(31,5,$segundoApellido,'TBLR',0,'L',0);
				$this->pdf->Ln(5);
				$num++;
			}





			$this->pdf->Output("listaestudiantes.pdf","I");
			//I Mostrar en navegador
			//D Forzar descarga
			
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}		
	}

	public function invitadolte() //metodo
	{
		if($this->session->userdata('login')) // si esxiste una session abierta
		{
			$this->load->view('inclteok/cabecera'); //cabezera
			$this->load->view('inclteok/menusuperior'); //menu
			//$this->load->view('inclte/menulateralotro');
			$this->load->view('est_comlte');
			$this->load->view('inclteok/pie'); // pie
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}	
}