<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Usuarios extends CI_Controller // herencia
{
	public function bienvenida()
	{
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu superior
		$this->load->view('incltever/menulateralchatgpt'); //menu lateral
		$this->load->view('incltever/pie'); // pie
	}
	public function index() //metodo
	{
		$data['msg'] = $this->uri->segment(3);

		if ($this->session->userdata('login')) // si esxiste un usuario VALIDADO
		{
			redirect('usuarios/panel', 'refresh'); // cargamos su panel de trabajo
		} else {
			$data['msg'] = $this->uri->segment(3); // 			
			$this->load->view('login', $data); //llama a   login.php
			//en este caso llama a  crearcuenta.php
		}
	}

	public function validarUsuario()
	{
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$consulta = $this->usuario_model->validarAdministrador($login, $password);

		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result() as $row) {
				//creando mi variable de sesion, mientras este abierta
				$this->session->set_userdata('idUsuario', $row->id); //
				$this->session->set_userdata('login', $row->nombreUsuario); //
				$this->session->set_userdata('tipo', $row->rol); //	

				redirect('usuarios/panel', 'refresh'); // redirigimos a su panel de trabajo	
			}
		} else {
			$consultaCli = $this->usuario_model->validarCliente($login, $password);
			if ($consultaCli->num_rows() > 0) {
				foreach ($consultaCli->result() as $row) {
					//mientas la sesion este abierta 
					$this->session->set_userdata('idCliente', $row->id);
					$this->session->set_userdata('login', $row->nombreUsuario);
					$this->session->set_userdata('tipo', $row->rol);
					$this->session->set_userdata('descripcion', $row->descripcion);
					$this->session->set_userdata('email', $row->email);
					$this->session->set_userdata('telefonos', $row->telefonos);

					redirect('usuarios/panel', 'refresh');
				}
			} else {
				redirect('usuarios/index/1', 'refresh');
			}
		}
	}

	// llegan los usuarios logueados correctamente
	public function panel()
	{
		if ($this->session->userdata('login')) // si esxiste una session abierta
		{
			$tipo = $this->session->userdata('tipo');
			if ($tipo == 'administrador') {
				redirect('administrador/index', 'refresh');
			} else {
				redirect('cliente/index', 'refresh');
			}
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	// cierre de sesion
	public function logout()
	{
		$this->session->sess_destroy(); //vamos a eliminar las variables de sesion y despues
		redirect('usuarios/index/3', 'refresh'); // va a redireccionar al login
	}

	// reestablecemos la contraseña
	public function recovery()
	{
		$this->load->view('recovery');
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
	////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
	////////////////////////////////// USUARIO ///////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	


	public function agregarClienteBDD()
	{
		if ($this->session->userdata('login')) {
			$data['nombres'] = $_POST['nombres'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
			$data['sexo'] = $_POST['sexo'];
			$data['telefono'] = $_POST['telefonos'];
			$data['email'] = $_POST['email'];
			$data['rol'] = 'Administrador';
			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$nombre = $_POST['nombres'];
			$primerApellido = $_POST['primerApellido'];
			$segundoApellido = $_POST['segundoApellido'];
			$email = $_POST['email'];
			$nombreCompletoReceptor = $nombre . ' ' . $primerApellido . ' ' . $segundoApellido;

			$username = $this->generarNombreUsuarioUnico($nombre, $primerApellido, $segundoApellido);

			$data['nombreUsuario'] = $username;

			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
			$password = substr(str_shuffle($characters), 0, 8);

			$data['contrasenia'] = md5($password);

			$datos_registro = array('nameUser' => $username, 'contraseniaUser' => $password);

			$this->session->set_userdata('datos_registro', $datos_registro);

			$this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
			$this->session->set_userdata('nombreUsuarioReceptor', $username);
			$this->session->set_userdata('contraseniaReceptor', $password);
			$this->session->set_userdata('correoReceptor', $email);

			$this->usuario_model->agregarUsuario($data);
			redirect('administrador/mostrarDatosRegistro', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function generarNombreUsuarioUnico($nombres, $primerApellido, $segundoApellido)
	{
		// Obtener las iniciales del nombre y apellidos
		$iniciales = $this->obtenerIniciales($nombres, $primerApellido, $segundoApellido);

		// Generar un número aleatorio
		$numeroAleatorio = $this->generarNumeroAleatorio();

		// Combinar las iniciales y el número aleatorio para formar el nombre de usuario
		$nombreUsuario = $iniciales . $numeroAleatorio;

		// Verificar si el nombre de usuario generado ya existe en la base de datos
		$nombreUsuarioExistente = $this->verificarExistenciaNombreUsuario($nombreUsuario);

		// Si el nombre de usuario generado ya existe, generar uno nuevo hasta obtener uno único
		while ($nombreUsuarioExistente) {
			// Generar otro número aleatorio
			$numeroAleatorio = $this->generarNumeroAleatorio();

			// Combinar las iniciales y el nuevo número aleatorio
			$nombreUsuario = $iniciales . $numeroAleatorio;

			$nombreUsuarioExistente = $this->verificarExistenciaNombreUsuario($nombreUsuario);
		}

		return $nombreUsuario;
	}

	private function obtenerIniciales($nombres, $primerApellido, $segundoApellido)
	{
		// Obtener las iniciales del nombre y apellidos
		$iniciales = '';

		if (!empty($nombres))
			$iniciales .= $nombres[0];

		if (!empty($primerApellido))
			$iniciales .= $primerApellido[0];

		if (!empty($segundoApellido))
			$iniciales .= $segundoApellido[0];

		return strtoupper($iniciales);
	}

	private function generarNumeroAleatorio()
	{
		// Generar un número aleatorio entre 1000 y 9999
		return mt_rand(1000, 9999);
	}

	private function verificarExistenciaNombreUsuario($nombreUsuario)
	{
		$usuarioExiste = false;
		$consulta = $this->usuario_model->verificarNameUser($nombreUsuario);

		if ($consulta->num_rows() > 0) {
			$usuarioExiste = true;
		}

		return $usuarioExiste;
	}

	public function generarContraseniaInicial()
	{
		// Generar una contraseña inicial aleatoria
		$caracteresPermitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$contrasenia = '';
		$longitud = 8;

		for ($i = 0; $i < $longitud; $i++) {
			$indice = mt_rand(0, strlen($caracteresPermitidos) - 1);
			$contrasenia .= $caracteresPermitidos[$indice];
		}

		return $contrasenia;
	}

	public function validarContraseniaSegura($password)
	{
		$mayuscula = false;
		$minuscula = false;
		$numero = false;
		$careSpecial = false;
		$longitudMinima = 8;

		for ($i = 0; $i < strlen($password); $i++) {
			if (ctype_upper($password[$i])) {
				$mayuscula = true;
			} elseif (ctype_lower($password[$i])) {
				$minuscula = true;
			} elseif (ctype_digit($password[$i])) {
				$numero = true;
			} else {
				$careSpecial = true;
			}
		}

		if ($mayuscula && $minuscula && $numero && $careSpecial && strlen($password) >= $longitudMinima) {
			return true;
		}
		return false;
	}

	public function mostrarDatosRegistro()
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'agrovision147@gmail.com';
		$mail->Password = 'dvsbfbcocxssjsoj';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('agrovision147@gmail.com', 'AGROVISION ACCESOS PARA EL SISTEMA');
		$mail->addReplyTo('agrovision147@gmail.com', 'AGROVISION ACCESOS PARA EL SISTEMA');

		// Add a recipient
		$mail->addAddress($this->session->userdata('correoReceptor'));

		$mail->Subject = 'Bienvenido a AGROVISION - ACCESOS';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>ACCESOS AGROVISION, por favor cambie la contraseña lo mas antes posible</h1>
		<p>Nombre de Usuario: " . $this->session->userdata('nombreUsuarioReceptor') . " </p></hr>
		<p>Password: " . $this->session->userdata('contraseniaReceptor') . " </p></hr>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		}
		$this->load->view('vistaAdministrador/vistaUsuario/registro_exitoso_view');
	}



	public function modificarUsuario()
	{
		if ($this->session->userdata('login')) {
			$idUsuario = $_POST['idUsuario'];
			$data['datosUsuario'] = $this->usuario_model->recuperarDatosUsuario($idUsuario);

			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/vistaUsuario/modificarUsuario', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarUsuarioBDD()
	{
		if ($this->session->userdata('login')) {

			$idUsuario = $_POST['idUsuario'];
			$data['nombres'] = $_POST['nombres'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
			$data['sexo'] = $_POST['sexo'];
			$data['telefono'] = $_POST['telefonos'];
			$data['email'] = $_POST['email'];
			$data['nombreUsuario'] = $_POST['nombreUsuario'];

			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$this->usuario_model->modificarUsuario($idUsuario, $data);
			redirect('administrador/index', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function deshabilitarUsuario()
	{
		if ($this->session->userdata('login')) {
			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idUsuario'] = $this->session->userdata('idUsuario');
			$idUsuario = $_POST['idUsuario'];
			$data['estado'] = '0';

			$this->usuario_model->deshabilitarUsuario($idUsuario, $data);
			redirect('administrador/index', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
}

/*	
	public function probando() //metodo
	{
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu superior
		$this->load->view('incltever/menulateralchatgpt'); //menu lateral
		$this->load->view('usuario/usu_formularioCrearNuevaCuentaUsuario'); // centro
		//$this->load->view('usuario/usu_datos', $data); // centro
		$this->load->view('incltever/pie'); // pie

	}
	public function crearCuentaNueva() //metodo
	{
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu superior
		$this->load->view('incltever/menulateralchatgpt'); //menu lateral
		$this->load->view('usuario/usu_formularioCrearCuentaNueva'); // centro
		$this->load->view('incltever/pie'); // pie		
	}

	public function bienvenido() //metodo
	{
		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		$this->load->view('inclteok/centro'); //
		$this->load->view('inclteok/pie'); // pie

	}


	//llegan todos los usuarios autenticados



	public function verListaUsuarios() //metodo
	{
		if ($this->session->userdata('login')) // si esxiste una session abierta
		{
			$lista = $this->usuario_model->listausuarios();
			$data['usuarios'] = $lista; // de la base de datos

			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu superior
			$this->load->view('incltever/menulateralchatgpt'); //menu lateral
			$this->load->view('usuario/usu_listaUsuarios', $data); // centro
			$this->load->view('incltever/pie'); // pie
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function agregar()
	{
		//mostrar un formulario (que va a estar en una vista) para agregar nuevo est

		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu
		$this->load->view('incltever/menulateralchatgpt');
		$this->load->view('usuario/usu_formularioCrearUsuario'); // centro
		$this->load->view('incltever/pie'); // pie 
	}

	public function agregarbd()
	{
		//cargamos la libreria validacion (podemos cargar tb )
		$this->load->library('form_validation');

		//name
		$this->form_validation->set_rules('login', 'Nombre de login', 'required|min_length[3]|max_length[12]', array('required' => 'Se requiere el apellido paterno', 'min_length' => 'Por lo menos 3 caracteres', 'max_length' => 'Maximo 12 caracteres'));
		//define las reglas, no admite celda vacia, min 5 y max 12 caracteres, de esta manera se valida el campo nombre

		$this->form_validation->set_rules('tipo', 'tipo', 'required|min_length[3]|max_length[12]', array('required' => 'Se requiere el apellido paterno', 'min_length' => 'Por lo menos 3 caracteres', 'max_length' => 'Maximo 12 caracteres'));

		$this->form_validation->set_rules('password', 'password');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu
			$this->load->view('incltever/menulateralchatgpt');
			$this->load->view('usu_formularioCrearUsuario');
			$this->load->view('incltever/pie'); // pie 			
		} else //SI llega los datos validados
		{


			//atributo BD          formulario         
			$data['login'] = $_POST['login'];
			$data['tipo'] = $_POST['tipo'];
			$data['password'] = $_POST['password'];

			if (isset($_POST['password'])) {
				// Obtén la contraseña desde el formulario
				$contrasena = $_POST['password'];

				// Hashea la contraseña usando password_hash
				//$hashContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

				// Asigna el hash de la contraseña al campo 'password'
				//$data['password'] = $hashContrasena;
				$data['password'] = $contrasena;
			}

			$this->usuario_model->agregarUsuario($data);
			redirect('usuarios/mostrarDatosRegistro', 'refresh');
		}
	}
/*
	public function verPerfil()
	{
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu
		$this->load->view('incltever/menulateralchatgpt');		
		$this->load->view('incltever/pie'); // pie 

	}

	public function perfilUsuario()
	{
		$idusuario = $this->session->userdata('idusuario');
        
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu superior
		$this->load->view('incltever/menulateralchatgpt'); //menu lateral

		$datos_perfil = $this->usuario_model->obtener_datos_perfil($idusuario);
        if ($datos_perfil) {
            // Pasa los datos del perfil a la vista
            $data['perfil'] = $datos_perfil;
            $this->load->view('usuario/perfilUsuario', $data);
        } else {
            // Manejar el caso en que no se encuentren los datos del perfil
            echo "No se encontraron datos del perfil.";
        }$this->load->view('incltever/pie'); // pie


	}
/*	public function perfil()
	{
		// Asegúrate de que el usuario esté autenticado y obtén su ID de usuario
        $idusuario = $this->session->userdata('idusuario');

        // Carga el modelo
        //$this->load->model('Usuario_model');

        // Llama al método para obtener los datos del perfil
        $datos_perfil = $this->usuario_model->obtener_datos_perfil($idusuario);

        if ($datos_perfil) {
            // Pasa los datos del perfil a la vista
            $data['perfil'] = $datos_perfil;
            $this->load->view('perfil', $data);
        } else {
            // Manejar el caso en que no se encuentren los datos del perfil
            echo "No se encontraron datos del perfil.";
        }
	}

	public function modificar()
	{
		$idusuario = $_POST['idusuario'];
		$data['infoUsuario'] = $this->usuario_model->recuperarUsuario($idusuario);

		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu
		$this->load->view('incltever/menulateralchatgpt');
		$this->load->view('usuario/usu_modificar', $data); // centro
		$this->load->view('incltever/pie'); // pie 
		/*
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu
		$this->load->view('incltever/menulateralchatgpt'); //menu
		$this->load->view('usuario/usu_modificar', $data); // centro
		$this->load->view('incltever/pie'); // pie 

	}
	public function modificarbd()
	{
		$idusuario = $_POST['idusuario'];

		$data['login'] = $_POST['login']; //construyendo mi array data
		$data['tipo'] = $_POST['tipo'];

		$this->usuario_model->modificarUsuario($idusuario, $data);
		redirect('usuarios/mostrarDatosRegistroMod', 'refresh');
	}

	public function eliminarbd()
	{
		//FORM
		$idusuario = $_POST['idusuario'];
		$this->usuario_model->eliminarUsuario($idusuario);
		redirect('usuarios/mostrarDatosRegistroEli', 'refresh');
	}

	public function deshabilitarbd()
	{
		$idusuario=$_POST['idusuario'];
		$data['habilitado']='0';
		
		$this->usuario_model->modificarUsuario($idusuario,$data);
		redirect('usuarios/mostrarDatosRegistroDes','refresh');//
	}

	public function habilitarbd()
	{
		$idusuario=$_POST['idusuario'];
		$data['habilitado']='1';
		
		$this->usuario_model->modificarUsuario($idusuario,$data);
		redirect('usuarios/mostrarDatosRegistroHab','refresh');//
	}

	public function deshabilitados() //metodo
	{
		$lista=$this->usuario_model->listaUsuariosDes();
		$data['usuarios']=$lista;

		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/menusuperior'); //menu
		$this->load->view('incltever/menulateralchatgpt');
		$this->load->view('usuario/usu_listaUsuariosDes', $data); // centro
		$this->load->view('incltever/pie'); // pie 
	}

	public function cambiarContrasenia() //metodo
	{
		if ($this->session->userdata('login')) {
			$this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/menusuperior'); //menu
			$this->load->view('incltever/menulateralchatgpt'); //menu lateral
			$this->load->view('usu_formularioCambioContrasenia'); //
			$this->load->view('incltever/pie'); // pie		
		} else {
			redirect('usuarios/cambiarContrasenia', 'refresh');
		}
	}

	public function verificarDatosContrasenia()
	{
		if ($this->session->userdata('login')) {
			$idUsuario = $this->session->userdata('idUsuario');

			$contraseniaActual = $_POST['contraseniaActual'];
			$contraseniaNueva = $_POST['contraseniaNueva'];
			$repeContraseniaNueva = $_POST['repeContraseniaNueva'];

			$data['password'] = $contraseniaNueva;

			$consulta = $this->contrasenia_model->verificarPasswordUsuario($idUsuario, $contraseniaActual);

			if ($consulta->num_rows() > 0) {
				if ($contraseniaNueva == $repeContraseniaNueva) {
					$this->contrasenia_model->actualizarContraseniaUsuario($idUsuario, $data);
					redirect('usuarios/logout', 'refresh');
				} else {
					redirect('usuarios/cambiarContrasenia', 'refresh');
				}
			} else {
				redirect('usuarios/cambiarContrasenia', 'refresh');
			}
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}



	public function registrarcuenta()
	{
		//mostrar un formulario (que va a estar en una vista) para agregar nuevo est

		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		$this->load->view('est_formulariocrearcuenta');
		$this->load->view('inclteok/pie'); // pie 
	}




	public function mostrarDatosRegistro()
	{
		$this->load->view('usuario/usu_registro_exitoso');
	}

	public function mostrarDatosRegistroMod()
	{
		$this->load->view('usuario/usu_registro_exitoso_modificado');
	}

	public function mostrarDatosRegistroEli()
	{
		$this->load->view('usuario/usu_registro_exitoso_eliminado');
	}

	public function mostrarDatosRegistroDes()
	{
		$this->load->view('usuario/usu_registro_exitoso_deshabilitado');
	}

	public function mostrarDatosRegistroHab()
	{
		$this->load->view('usuario/usu_registro_exitoso_habilitado');
	}
	
}
*/
