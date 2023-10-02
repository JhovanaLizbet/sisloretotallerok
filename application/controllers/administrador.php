<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Administrador extends CI_Controller // herencia
{
    public function index()
    {
        if ($this->session->userdata('login')) {

            $listaUsuarios = $this->usuario_model->listaUsuarios();
            $data['listaUsuarios'] = $listaUsuarios;
            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/menusuperior'); //menu superior
            $this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('vistaUsuario/usu_listaUsuarios', $data); // centro
            $this->load->view('incltever/pie'); // pie
    
            /*			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/vistaUsuario/inicio_lte',$data);
			$this->load->view('vistaAdministrador/extem/4_pie');
*/
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function cambioContrasenia()
    {
        if ($this->session->userdata('login')) {
            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/vistaUsuario/cambioContrasenia');
            $this->load->view('vistaAdministrador/extem/4_pie');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function verificarDatosContrasenia()
    {
        if ($this->session->userdata('login')) {

            $idUsuario = $this->session->userdata('idUsuario');
            $contraseniaActual = $_POST['contraseniaActual'];
            $contraseniaNueva = $_POST['contraseniaNueva'];
            $repeContraseniaNueva = $_POST['repeContraseniaNueva'];

            $data['password'] = md5($contraseniaNueva);

            $consulta = $this->contrasenia_model->verificarPasswordAdministrador($idUsuario, $contraseniaActual);

            if ($consulta->num_rows() > 0) {
                if ($contraseniaNueva == $repeContraseniaNueva) {
                    $this->password_model->actualizarContraseniaAdministrador($idUsuario, $data);
                    redirect('usuarios/logout', 'refresh');
                } else {
                    redirect('administrador/cambioContrasenia', 'refresh');
                }
            } else {
                redirect('administrador/cambioContrasenia', 'refresh');
            }
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////	
/////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
////////////////////////////////// CLIENTE ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////	

    //MOSTRAR LA LISTA DE CLIENTES
    public function cliente()
    {
        if ($this->session->userdata('login')) {
            $listaClientes = $this->cliente_model->listaClientes();
            $data['listaClientes'] = $listaClientes;
            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/productor/list_productor', $data);
            $this->load->view('vistaAdministrador/extem/4_pie');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //FUNCION PARA AGREGAR NUEVO 
    public function agregarNuevoCliente()
    {
        if ($this->session->userdata('login')) {
            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/productor/agregarNuevoProductorFormulario');
            $this->load->view('vistaAdministrador/extem/4_pie');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function agregarClienteBDD()
    {
        if ($this->session->userdata('login')) {
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['sexo'] = $_POST['sexo'];
            $data['telefonos'] = $_POST['telefonos'];
            $data['descripcion'] = $_POST['descripcion'];
            $data['email'] = $_POST['email'];
            $data['rol'] = 'Productor';
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

            $data['password'] = md5($password);

            $datos_registro = array('nameUser' => $username, 'contraseniaUser' => $password);

            $this->session->set_userdata('datos_registro', $datos_registro);

            $this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
            $this->session->set_userdata('nombreUsuarioReceptor', $username);
            $this->session->set_userdata('contraseniaReceptor', $password);
            $this->session->set_userdata('correoReceptor', $email);

            $this->cliente_model->agregarCliente($data);
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
        $consulta = $this->usuario_model->verificarNombreUsuarioCliente($nombreUsuario);

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
        /* Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lizjhovy@gmail.com';
        $mail->Password = 'dvsbfbcocxssjsoj'; ////////////????????????????????????
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('lizjhovy@gmail.com', 'CENTRO ACUATICO LORETO ACCESO PARA EL SISTEMA');
        $mail->addReplyTo('lizjhovy@gmail.com', 'CENTRO ACUATICO LORETO ACCESO PARA EL SISTEMA');

        // Add a recipient
        $mail->addAddress($this->session->userdata('correoReceptor'));

        $mail->Subject = 'Bienvenido a CENTRO ACUATICO LORETO - ACCESOS';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>ACCESOS CENTRO ACUATICO LORETO, por favor cambie la contraseña lo mas antes posible</h1>
            <p>Nombre de Usuario: " . $this->session->userdata('nombreUsuarioReceptor') . " </p></hr>
			<p>Password: " . $this->session->userdata('contraseniaReceptor') . " </p></hr>";
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        }
        $this->load->view('vistaAdministrador/cliente/usu_registro_exitoso_modificado'); ///////??????????????
        */
        redirect('usuarios/mostrarDatosRegistroNuevo', 'refresh');
	}

	public function mostrarDatosRegistroNuevo()
	{
		$this->load->view('vistaAdministrador/cliente/usu_registro_exitoso_creado');
	}

    public function modificarCliente()
    {
        if ($this->session->userdata('login')) {
            $idCliente = $_POST['idCliente'];
            $data['informacionCliente'] = $this->cliente_model->recuperarDatosCliente($idCliente);

            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/productor/modificarProductor', $data);
            $this->load->view('vistaAdministrador/extem/4_pie');
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
            $data['descripcion'] = $_POST['descripcion'];
            $data['email'] = $_POST['email'];
            $data['rol'] = 'Cliente';

            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->cliente_model->modificarCliente($idCliente, $data);
            redirect('administrador/productor', 'refresh'); ///////////////////?????
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    public function deshabilitarCliente()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');
            $idUsuario = $_POST['idCliente'];
            $data['estado'] = '0';

            $this->cliente_model->deshabilitarCliente($idUsuario, $data);
            redirect('administrador/productor', 'refresh'); ///////////////////?????
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
}
