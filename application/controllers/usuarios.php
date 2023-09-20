<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Usuarios extends CI_Controller // herencia
{
	public function bienvenido() //metodo
	{
		$this->load->view('inclteok/cabecera'); //cabezera
		$this->load->view('inclteok/menusuperior'); //menu
		$this->load->view('inclteok/centro'); //
		$this->load->view('inclteok/pie'); // pie

	}

	public function validarusuario()
	{
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$consulta = $this->usuario_model->validar($login, $password);

		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result() as $row) {
				//creando mi variable de sesion
				$this->session->set_userdata('idusuario', $row->idUsuario); //
				$this->session->set_userdata('login', $row->login); //
				$this->session->set_userdata('tipo', $row->tipo); //	

				redirect('usuarios/panel', 'refresh'); // redirigimos a su panel de trabajo	
			}
		} else {
			redirect('usuarios/index/1', 'refresh');
		}
	}

	//llegan todos los usuarios autenticados
	public function panel()
	{
		if ($this->session->userdata('login')) // si esxiste una session abierta
		{
			$tipo = $this->session->userdata('tipo');
			if ($tipo == 'admin') {
				redirect('usuarios/verListaUsuarios', 'refresh');
			} else {
				if ($tipo == 'estudiante') {
					redirect('estudiante/verListaEstudiante', 'refresh');
				} else {
					redirect('usuarios/index/2', 'refresh');
				}
			}
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); //vamos a eliminar las variables de sesion y despues
		redirect('usuarios/index/3', 'refresh'); // va a redireccionar al login
	}


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
*/
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


	public function index() //metodo
	{
		if ($this->session->userdata('login')) // si esxiste un usuario VALIDADO
		{
			redirect('usuarios/panel', 'refresh'); // cargamos su panel de trabajo
		} else {
			$data['msg'] = $this->uri->segment(3); // 			
			$this->load->view('login', $data); //llama a   login.php
			//en este caso llama a  crearcuenta.php
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
