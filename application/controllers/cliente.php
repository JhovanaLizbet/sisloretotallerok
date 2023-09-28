<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Cliente extends CI_Controller // herencia
{
	public function index()
	{
		if ($this->session->userdata('login')) {
			$idClienteLogueado = $this->session->userdata('idCliente');
			$datosCliente = $this->usuario_model->datosClientesLogueados($idClienteLogueado);
			$data['datosCliente'] = $datosCliente;
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/inicio_lte', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function modificarClienteDatos()
	{
		if ($this->session->userdata('login')) {
			$idCliente = $_POST['idCliente'];
			$data['datosCliente'] = $this->cliente_model->recuperarDatosCliente($idCliente);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/modificarProductor', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarClienteBDD()
	{
		if ($this->session->userdata('login')) {
			$idCliente = $_POST['idCliente'];
			$data['nombres'] = $_POST['nombres'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
			$data['sexo'] = $_POST['sexo'];
			$data['telefonos'] = $_POST['telefonos'];
			$data['email'] = $_POST['email'];
			$data['nombreUsuario'] = $_POST['nombreUsuario'];

			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$this->cliente_model->modificarCliente($idCliente, $data);
			redirect('cliente/index', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	//////////////////////////////////////////////////////////////////////////////////////////////////	
	////////////////////////////////// CAMBIAMOS LA //////////////////////////////////////////////////
	/////////////////////////////////   CONTRASEÑA  //////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function cambioContrasenia()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/cambioContraseña_formulario');
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function verificarDatosContrasenia()
	{
		if ($this->session->userdata('login')) {

			$idCliente = $this->session->userdata('idCliente');
			$contraseniaActual = $_POST['contraseniaActual'];
			$contraseniaNueva = $_POST['contraseniaNueva'];
			$repeContraseniaNueva = $_POST['repeContraseniaNueva'];

			$data['password'] = md5($contraseniaNueva);

			$consulta = $this->password_model->verificarPasswordCliente($idCliente, $contraseniaActual);

			if ($consulta->num_rows() > 0) {
				if ($contraseniaNueva == $repeContraseniaNueva) {
					$this->password_model->actualizarContraseniaCliente($idCliente, $data);
					redirect('usuarios/logout', 'refresh');
				} else {
					redirect('cliente/cambioContrasenia', 'refresh');
				}
			} else {
				redirect('cliente/cambioContrasenia', 'refresh');
			}
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
}
