<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Administrador extends CI_Controller // herencia
{
    public function listaUsuarios() //ok   era index
    {
        if ($this->session->userdata('login')) {

            $listaUsuarios = $this->usuario_model->listaUsuarios();
            $data['listaUsuarios'] = $listaUsuarios;
            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;
            //$listaUsuarios = $this->usuario_model->listaUsuariosLogueadosNombres();
            //$data['listaUsuariosLogueadosNombres'] = $listaUsuarios;

/*
            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            //$this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('incltever/03_menu_lateral_ini_admin'); 
            //$this->load->view('incltever/01_menu_lateral_admin'); //menu lateral
            $this->load->view('vistaUsuario/usu_03_listaUsuarios', $data); // centro
            $this->load->view('incltever/pie'); // pie
*/
            $this->load->view('incltever/01_cabecera_admin'); //cabezera
            $this->load->view('incltever/02_menu_superior_admin'); //menu superior
            //$this->load->view('incltever/menulateralchatgpt'); 
            $this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
            $this->load->view('vistaUsuario/usu_03_listaUsuarios', $data); // centro
            $this->load->view('incltever/04_pie_admin'); // pie

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    public function indexSKY(){
     if ($this->session->userdata('login')) {
	
		$this->load->view('incltever/cabecera'); //cabezera
		$this->load->view('incltever/01_menu_superior'); //menu superior
		$this->load->view('incltever/menulateralgpt'); //menu lateral
		$this->load->view('incltever/centro'); //menu lateral
		$this->load->view('incltever/pie'); // pie
        } else {
            redirect('usuarios/index', 'refresh');
        }
	}
    public function listaClientesHab() // ok  era indexClientes
    {
        if ($this->session->userdata('login')) {

            $listaClientes = $this->cliente_model->listaClientes();
            $data['listaClientes'] = $listaClientes;

            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;
            //$listaUsuarios = $this->usuario_model->listaUsuariosLogueadosNombres();
            //$data['listaUsuariosLogueadosNombres'] = $listaUsuarios;

			$this->load->view('incltever/01_cabecera_admin'); //cabezera
			$this->load->view('incltever/02_menu_superior_admin'); //menu superior
			$this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
            $this->load->view('vistaAdministrador/cliente/cli_03_listaClientes', $data); // centro
			$this->load->view('incltever/04_pie_admin'); // pie
/*
            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            $this->load->view('incltever/03_menu_lateral_cliente'); //menu lateral
            //$this->load->view('incltever/04_menu_lateral_gen');
            $this->load->view('vistaAdministrador/cliente/cli_03_listaClientes', $data); // centro
            $this->load->view('incltever/pie'); // pie
*/
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function listaClientesDeshabilitados() //ok   metodo
    {
        $lista = $this->cliente_model->listaClientesDeshabilitados();
        $data['listaClientes'] = $lista;

        $this->load->view('incltever/01_cabecera_admin'); //cabezera
        $this->load->view('incltever/02_menu_superior_admin'); //menu superior
        $this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
        $this->load->view('vistaAdministrador/cliente/cli_04_listaClientesDeshabilitados', $data); // centro        $this->load->view('incltever/04_pie_admin'); // pie
        $this->load->view('incltever/04_pie_admin'); // pie
/*
        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/cliente/cli_04_listaClientesDeshabilitados', $data); // centro
        $this->load->view('incltever/pie'); // pie 
        */
    }


    public function indexInstructores()
    {
        if ($this->session->userdata('login')) {

            $listaInstructores = $this->instructor_model->listaInstructores();
            $data['listaInstructores'] = $listaInstructores;

            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;
            //$listaUsuarios = $this->usuario_model->listaUsuariosLogueadosNombres();
            //$data['listaUsuariosLogueadosNombres'] = $listaUsuarios;


            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            $this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('vistaAdministrador/instructor/ins_03_listaInstructores', $data); // centro
            $this->load->view('incltever/pie'); // pie

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function listaInstructoresDeshabilitados() //metodo
    {
        $lista = $this->instructor_model->listaInstructoresDeshabilitados();
        $data['listaInstructores'] = $lista;

        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/instructor/ins_04_listaInstructoresDeshabilitados', $data); // centro
        $this->load->view('incltever/pie'); // pie 
    }
    /*
    

    */
    public function indexCursos() // muestra la lista de todos los cursos habilitados
    {
        if ($this->session->userdata('login')) {

            $listaCursos = $this->cursos_model->listaCursos();
            $data['listaCursos'] = $listaCursos; //para el foreach

            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;
            //$listaUsuarios = $this->usuario_model->listaUsuariosLogueadosNombres();
            //$data['listaUsuariosLogueadosNombres'] = $listaUsuarios;


            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            $this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('vistaAdministrador/cursos/cur_03_listaCursos', $data); // centro
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

    public function listaCursosDeshabilitados() //metodo
    {
        $lista = $this->cursos_model->listaCursosDeshabilitados();
        $data['listaCursos'] = $lista;

        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/cursos/cur_04_listaCursosDeshabilitados', $data); // centro
        $this->load->view('incltever/pie'); // pie 
    }

    public function indexRoles()
    {
        if ($this->session->userdata('login')) {

            $listaRoles = $this->roles_model->listaRoles();
            $data['listaRoles'] = $listaRoles; //para el foreach

            $listaUsuarios = $this->usuario_model->listaUsuariosLogueados();
            $data['listaUsuariosLogueados'] = $listaUsuarios;
            //$listaUsuarios = $this->usuario_model->listaUsuariosLogueadosNombres();
            //$data['listaUsuariosLogueadosNombres'] = $listaUsuarios;


            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            $this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('vistaAdministrador/roles/rol_listaRoles', $data); // centro
            $this->load->view('incltever/pie'); // pie

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function listaRolesDeshabilitados() //metodo
    {
        $lista = $this->roles_model->listaRolesDeshabilitados();
        $data['listaRoles'] = $lista;

        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/roles/rol_listaRolesDeshabilitados', $data); // centro
        $this->load->view('incltever/pie'); // pie 
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    public function cambioContrasenia()
    {
        if ($this->session->userdata('login')) {

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu superior
            $this->load->view('incltever/menulateralchatgpt'); //menu lateral
            $this->load->view('vistaUsuario/usu_formCambiarPassword'); // centro
            $this->load->view('incltever/pie'); // pie

            /*
            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/vistaUsuario/cambioContrasenia');
            $this->load->view('vistaAdministrador/extem/4_pie');*/
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

            $consulta = $this->password_model->verificarPasswordAdministrador($idUsuario, $contraseniaActual);

            if ($consulta->num_rows() > 0) {
                if ($contraseniaNueva == $repeContraseniaNueva) {
                    $this->password_model->actualizarContraseniaAdministrador($idUsuario, $data);
                    redirect('administrador/mostrarDatosModPassword', 'refresh');
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

    private function verificarExistenciaNombreUsuario($nombreUsuario)
    {
        $usuarioExiste = false;
        $consulta = $this->usuario_model->verificarNameUserProductor($nombreUsuario);

        if ($consulta->num_rows() > 0) {
            $usuarioExiste = true;
        }

        return $usuarioExiste;
    }

    /*/MOSTRAR LA LISTA DE CLIENTES
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
    }*/

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
    ////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
    ////////////////////////////////// CLIENTE ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// INSERTAR / AGREGAR //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function agregarCliente() // noooooooooooooooooooooooooooooooo
    {
        if ($this->session->userdata('login')) {
            $this->load->view('incltever/01_cabecera_admin'); //cabezera
			$this->load->view('incltever/02_menu_superior_admin'); //menu superior
			$this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
			$this->load->view('vistaAdministrador/cliente/cli_01_formAgregarNuevoCliente'); // centro
			$this->load->view('incltever/04_pie_admin'); // pie
/*

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/cliente/cli_01_formAgregarNuevoCliente'); // centro
            $this->load->view('incltever/pie'); // pie 
            */
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function agregarClienteBDD() //noooooooooooooooooooooooooooooo
    {
        if ($this->session->userdata('login')) {

            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['ci'] = $_POST['ci'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['sexo'] = $_POST['sexo'];
            $data['razonSocial'] = $_POST['razonSocial'];
            $data['direccion'] = $_POST['direccion'];
            $data['email'] = $_POST['email'];
            $data['telefono'] = $_POST['telefono'];
            $data['rol'] = 'Cliente'; // PONE POR DEFECTO EL ROL DE Cliente

            $data['idUsuario'] = $this->session->userdata('idUsuario');

            /////////////// SE GENERA EL NOMBRE DE USUARIO //////////////////////////////////
            $nombre = $_POST['nombres'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $email = $_POST['email'];
            $nombreCompletoReceptor = $nombre . ' ' . $primerApellido . ' ' . $segundoApellido;

            $username = $this->generarNombreUsuarioUnico($nombre, $primerApellido, $segundoApellido);

            $data['nombreUsuario'] = $username;

            /////////////// SE GENERA EL PASSWORD //////////////////////////////////

            //$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
            //$password = substr(str_shuffle($characters), 0, 8);

            //$data['password'] = md5($password);
            $data['password'] = md5($_POST['password']);
            //$password=md5($_POST['password']);

            $datos_registro = array('nameUser' => $username);

            $this->session->set_userdata('datos_registro', $datos_registro);

            $this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
            $this->session->set_userdata('nombreUsuarioReceptor', $username);
            //$this->session->set_userdata('contraseniaReceptor', $password);
            //$this->session->set_userdata('correoReceptor', $email);

            $this->cliente_model->agregarCliente($data);
            redirect('administrador/mostrarDatosRegistroCli', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// MODIFICAR ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function modificarCliente() // ok
    {
        if ($this->session->userdata('login')) {
            $idCliente = $_POST['idCliente'];
            $data['datosDelCliente'] = $this->cliente_model->recuperarDatosCliente($idCliente);

            $this->load->view('incltever/01_cabecera_admin'); //cabezera
			$this->load->view('incltever/02_menu_superior_admin'); //menu superior
			$this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
            $this->load->view('vistaAdministrador/cliente/cli_02_modificarClientes', $data); // centro			$this->load->view('incltever/04_pie_admin'); // pie
            $this->load->view('incltever/04_pie_admin'); // pie

/*


            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/cliente/cli_02_modificarClientes', $data); // centro
            $this->load->view('incltever/pie'); // pie 
*/
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
            $data['ci'] = $_POST['ci'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['sexo'] = $_POST['sexo'];
            $data['razonSocial'] = $_POST['razonSocial'];
            $data['direccion'] = $_POST['direccion'];
            $data['email'] = $_POST['email'];
            $data['telefono'] = $_POST['telefono'];
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->cliente_model->modificarCliente($idCliente, $data);
            redirect('administrador/mostrarDatosRegistroModCli', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////// DESHABILITAR / ELIMINAR /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function deshabilitarCliente()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idCliente = $_POST['idCliente'];
            $data['estado'] = '0';

            $this->cliente_model->deshabilitarCliente($idCliente, $data);

            redirect('administrador/mostrarDatosRegistroDesCli', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// HABILITAR ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function habilitarCliente()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idCliente = $_POST['idCliente'];
            $data['estado'] = '1';

            $this->cliente_model->habilitarCliente($idCliente, $data);
            redirect('administrador/mostrarDatosRegistroHabCli', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
    ////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
    ////////////////////////////////// INSTRUCTOR ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// INSERTAR / AGREGAR //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function agregarInstructor()
    {
        //mostrar un formulario (que va a estar en una VISTA) para agregar nuevo est

        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/instructor/ins_01_formAgregarNuevoInstructor'); // centro
        $this->load->view('incltever/pie'); // pie 
    }

    public function agregarInstructorBDD()
    {
        if ($this->session->userdata('login')) {
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['ci'] = $_POST['ci'];
            $data['sexo'] = $_POST['sexo'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['telefono'] = $_POST['telefono'];
            $data['email'] = $_POST['email'];
            $data['rol'] = 'Instructor'; // PONE POR DEFECTO EL ROL DE Cliente

            $data['idUsuario'] = $this->session->userdata('idUsuario');

            /////////////// SE GENERA EL NOMBRE DE USUARIO //////////////////////////////////
            $nombre = $_POST['nombres'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $email = $_POST['email'];
            $nombreCompletoReceptor = $nombre . ' ' . $primerApellido . ' ' . $segundoApellido;

            $username = $this->generarNombreUsuarioUnico($nombre, $primerApellido, $segundoApellido);

            $data['nombreUsuario'] = $username;

            /////////////// SE GENERA EL PASSWORD //////////////////////////////////

            //$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
            //$password = substr(str_shuffle($characters), 0, 8);

            //$data['password'] = md5($password);
            $data['password'] = md5($_POST['password']);
            //$password=md5($_POST['password']);

            $datos_registro = array('nameUser' => $username);

            $this->session->set_userdata('datos_registro', $datos_registro);

            $this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
            $this->session->set_userdata('nombreUsuarioReceptor', $username);
            //$this->session->set_userdata('contraseniaReceptor', $password);
            //$this->session->set_userdata('correoReceptor', $email);

            $this->instructor_model->agregarInstructor($data);
            redirect('administrador/mostrarDatosRegistroIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// MODIFICAR ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function modificarInstructor()
    {
        if ($this->session->userdata('login')) {
            $idInstructor = $_POST['idInstructor'];
            $data['datosDelInstructor'] = $this->instructor_model->recuperarDatosInstructor($idInstructor);

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/instructor/ins_02_modificarInstructores', $data); // centro
            $this->load->view('incltever/pie'); // pie 

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function modificarInstructorBDD()
    {
        if ($this->session->userdata('login')) {

            $idInstructor = $_POST['idInstructor'];
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['ci'] = $_POST['ci'];
            $data['sexo'] = $_POST['sexo'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['email'] = $_POST['email'];
            $data['telefono'] = $_POST['telefono'];
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->instructor_model->modificarInstructor($idInstructor, $data);
            redirect('administrador/mostrarDatosRegistroModIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////// DESHABILITAR / ELIMINAR /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function deshabilitarInstructor()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idInstructor = $_POST['idInstructor'];
            $data['estado'] = '0';

            $this->instructor_model->deshabilitarInstructor($idInstructor, $data);

            redirect('administrador/mostrarDatosRegistroDesIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// HABILITAR ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function habilitarInstructor()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idInstructor = $_POST['idInstructor'];
            $data['estado'] = '1';

            $this->instructor_model->habilitarInstructor($idInstructor, $data);
            redirect('administrador/mostrarDatosRegistroHabIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    /*
    */

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
    ////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
    ////////////////////////////////// CURSOS ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// INSERTAR / AGREGAR //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function agregarCurso()
    {
        if ($this->session->userdata('login')) {
            $lista = $this->instructor_model->listaInstructoresCombo();
            $data['listaInstructoresCombo'] = $lista;

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/cursos/cur_01_formAgregarNuevoCurso', $data); // centro
            $this->load->view('incltever/pie'); // pie
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function agregarCursoBDD()
    {
        //realizamos transaccion curso instructor
        if ($this->session->userdata('login')) {

            $datosCurso = array(
                'gestion' => $_POST['gestion'],
                'codigo' => $_POST['codigo'],
                'nombre' => $_POST['nombre'],
                'nivel' => $_POST['nivel'],
                'duracion' => $_POST['duracion'],
                'diaClase' => $_POST['diaClase'],
                'hora' => $_POST['hora'],
                'fechaInicio' => $_POST['fechaInicio'],
                'fechaFin' => $_POST['fechaFin'],
                'precioTotal' => $_POST['precioTotal'],
                'descripcion' => $_POST['descripcion'],

                'idInstructor' => $_POST['idInstructor'],
                'idUsuario' => $this->session->userdata('idUsuario')
            );

            $this->cursos_model->registrarCurso($datosCurso);
            redirect('administrador/mostrarDatosRegistroCur', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }

        /*
            $data['gestion'] = $_POST['gestion'];
            $data['codigo'] = $_POST['codigo'];
            $data['nombre'] = $_POST['nombre'];
            $data['nivel'] = $_POST['nivel'];
            $data['duracion'] = $_POST['duracion'];
            $data['diaClase'] = $_POST['diaClase'];
            $data['hora'] = $_POST['hora'];
            $data['fechaInicio'] = $_POST['fechaInicio'];
            $data['fechaFin'] = $_POST['fechaFin'];
            $data['precioTotal'] = $_POST['precioTotal'];
            $data['descripcion'] = $_POST['descripcion'];
            $data['idInstructor'] = $_POST['idInstructor'];

            $data['idUsuario'] = $this->session->userdata('idUsuario');

*/
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// MODIFICAR ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function modificarCurso()
    {
        if ($this->session->userdata('login')) {

            //$idCurso = $_POST['idCurso'];
            //$data['datosDelCurso'] = $this->cursos_model->recuperarDatosCursos($idCurso);
            $lista = $this->instructor_model->listaInstructoresCombo();
            $data['listaInstructoresCombo'] = $lista;

            $idCurso = $_POST['idCurso'];
            $data['obtenerDetalleCurso'] = $this->cursos_model->obtenerDetalleCurso($idCurso);

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/cursos/cur_02_modificarCursos', $data); // centro
            $this->load->view('incltever/pie'); // pie 

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function modificarCursoBDD()
    {
        if ($this->session->userdata('login')) {

            // Obtén los datos del formulario
            $idCurso = $_POST['idCurso'];
            $idInstructor = $_POST['idInstructor'];

            $data['gestion'] = $_POST['gestion'];
            $data['codigo'] = $_POST['codigo'];
            $data['nombre'] = $_POST['nombre'];
            $data['nivel'] = $_POST['nivel'];
            $data['duracion'] = $_POST['duracion'];
            $data['diaClase'] = $_POST['diaClase'];
            $data['hora'] = $_POST['hora'];
            $data['fechaInicio'] = $_POST['fechaInicio'];
            $data['fechaFin'] = $_POST['fechaFin'];
            $data['precioTotal'] = $_POST['precioTotal'];
            $data['descripcion'] = $_POST['descripcion'];
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idInstructor'] = $_POST['idInstructor'];
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->cursos_model->modificarCursos($idCurso, $data);
            redirect('administrador/mostrarDatosRegistroModCur', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////// DESHABILITAR / ELIMINAR /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function deshabilitarCurso()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idCurso = $_POST['idCurso'];
            $data['estado'] = '0';

            $this->cursos_model->deshabilitarCursos($idCurso, $data);

            redirect('administrador/mostrarDatosRegistroDesCur', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// HABILITAR ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function habilitarCurso()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idCurso = $_POST['idCurso'];
            $data['estado'] = '1';

            $this->cursos_model->habilitarCursos($idCurso, $data);
            redirect('administrador/mostrarDatosRegistroHabCur', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
    ////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
    ///////////////////////////////// INSCRIPCION ////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// INSERTAR / AGREGAR //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function agregarInscripcion()
    {
        //mostrar un formulario (que va a estar en una VISTA) para agregar nuevo est
        if ($this->session->userdata('login')) {

            //$this->load->view('incltever/cabecera'); //cabezera
            //$this->load->view('incltever/02_menu_superior'); //menu
            //$this->load->view('incltever/03_menu_lateral_cliente');
            $this->load->view('busqueda'); // formulario de inscripcion
            //$this->load->view('incltever/pie'); // pie 
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    /*
    public function agregarInscripcionBDD()
    {
        if ($this->session->userdata('login')) {
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['ci'] = $_POST['ci'];
            $data['sexo'] = $_POST['sexo'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['telefono'] = $_POST['telefono'];
            $data['email'] = $_POST['email'];
            $data['rol'] = 'Instructor'; // PONE POR DEFECTO EL ROL DE Cliente

            $data['idUsuario'] = $this->session->userdata('idUsuario');

            /////////////// SE GENERA EL NOMBRE DE USUARIO //////////////////////////////////
            $nombre = $_POST['nombres'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $email = $_POST['email'];
            $nombreCompletoReceptor = $nombre . ' ' . $primerApellido . ' ' . $segundoApellido;

            $username = $this->generarNombreUsuarioUnico($nombre, $primerApellido, $segundoApellido);

            $data['nombreUsuario'] = $username;

            /////////////// SE GENERA EL PASSWORD //////////////////////////////////

            //$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
            //$password = substr(str_shuffle($characters), 0, 8);

            //$data['password'] = md5($password);
            $data['password'] = md5($_POST['password']);
            //$password=md5($_POST['password']);

            $datos_registro = array('nameUser' => $username);

            $this->session->set_userdata('datos_registro', $datos_registro);

            $this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
            $this->session->set_userdata('nombreUsuarioReceptor', $username);
            //$this->session->set_userdata('contraseniaReceptor', $password);
            //$this->session->set_userdata('correoReceptor', $email);

            $this->instructor_model->agregarInstructor($data);
            redirect('administrador/mostrarDatosRegistroIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// MODIFICAR ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function modificarInscripcion()
    {
        if ($this->session->userdata('login')) {
            $idInstructor = $_POST['idInstructor'];
            $data['datosDelInstructor'] = $this->instructor_model->recuperarDatosInstructor($idInstructor);

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/instructor/ins_02_modificarInstructores', $data); // centro
            $this->load->view('incltever/pie'); // pie 

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function modificarInscripcionBDD()
    {
        if ($this->session->userdata('login')) {

            $idInstructor = $_POST['idInstructor'];
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['ci'] = $_POST['ci'];
            $data['sexo'] = $_POST['sexo'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['email'] = $_POST['email'];
            $data['telefono'] = $_POST['telefono'];
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->instructor_model->modificarInstructor($idInstructor, $data);
            redirect('administrador/mostrarDatosRegistroModIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////// DESHABILITAR / ELIMINAR /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function deshabilitarInscripcion()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idInstructor = $_POST['idInstructor'];
            $data['estado'] = '0';

            $this->instructor_model->deshabilitarInstructor($idInstructor, $data);

            redirect('administrador/mostrarDatosRegistroDesIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// HABILITAR ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function habilitarInscripcion()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idInstructor = $_POST['idInstructor'];
            $data['estado'] = '1';

            $this->instructor_model->habilitarInstructor($idInstructor, $data);
            redirect('administrador/mostrarDatosRegistroHabIns', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

*/

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// AHORA REALIZAMOS LOS /////////////////////////////////////////////////	
    ////////////////////////////// CRUD EN LA TABLA //////////////////////////////////////////////////
    //////////////////////////////////  ROLES  ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// INSERTAR / AGREGAR //////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function agregarRol()
    {
        //mostrar un formulario (que va a estar en una VISTA) para agregar nuevo est

        $this->load->view('incltever/cabecera'); //cabezera
        $this->load->view('incltever/02_menu_superior'); //menu
        $this->load->view('incltever/menulateralchatgpt');
        $this->load->view('vistaAdministrador/roles/rol_01_formAgregarNuevoRol'); // centro
        $this->load->view('incltever/pie'); // pie 
    }

    public function agregarRolBDD()
    {
        if ($this->session->userdata('login')) {
            $data['nombre'] = $_POST['nombre'];
            $data['descripcion'] = $_POST['descripcion'];

            $data['idUsuario'] = $this->session->userdata('idUsuario');


            $this->roles_model->agregarRol($data);
            redirect('administrador/mostrarDatosRegistroRol', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////////// MODIFICAR ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function modificarRol()
    {
        if ($this->session->userdata('login')) {
            $idRol = $_POST['idRol'];
            $data['datosDelRol'] = $this->roles_model->recuperarDatosRoles($idRol);

            $this->load->view('incltever/cabecera'); //cabezera
            $this->load->view('incltever/02_menu_superior'); //menu
            $this->load->view('incltever/menulateralchatgpt');
            $this->load->view('vistaAdministrador/roles/rol_02_modificarRoles', $data); // centro
            $this->load->view('incltever/pie'); // pie 

        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    public function modificarRolBDD()
    {
        if ($this->session->userdata('login')) {

            $idRol = $_POST['idRol'];
            $data['nombre'] = $_POST['nombre'];
            $data['descripcion'] = $_POST['descripcion'];
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->roles_model->modificarRoles($idRol, $data);
            redirect('administrador/mostrarDatosRegistroModRol', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////// DESHABILITAR / ELIMINAR /////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function deshabilitarRol()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idRol = $_POST['idRol'];
            $data['estado'] = '0';

            $this->roles_model->deshabilitarRoles($idRol, $data);

            redirect('administrador/mostrarDatosRegistroDesRol', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    //////////////////////////// HABILITAR ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    public function habilitarRol()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $idRol = $_POST['idRol'];
            $data['estado'] = '1';

            $this->roles_model->habilitarRoles($idRol, $data);
            redirect('administrador/mostrarDatosRegistroHabRol', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    /* 


*/

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////// Generar Nombre Usuario Unico /////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

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

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    ///////////////// Obtener las Iniciales nombres y apellidos //////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

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

    //////////////////////////////////////////////////////////////////////////////////////////////////	
    /////////////////////// Se Genera Numeros Aleatorios /////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////	

    private function generarNumeroAleatorio()
    {
        // Generar un número aleatorio entre 1000 y 9999
        return mt_rand(1000, 9999);
    }

    /*private function verificarExistenciaNombreUsuario($nombreUsuario)
    {
        $usuarioExiste = false;
        $consulta = $this->cliente_model->verificarNombreCliente($nombreUsuario);

        if ($consulta->num_rows() > 0) {
            $usuarioExiste = true;
        }

        return $usuarioExiste;
    }
*/


    /*
<!------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------->
*/
    public function mostrarDatosRegistroCli()
    {
        redirect('administrador/mostrarDatosRegistroNuevoCli', 'refresh');
    }
    public function mostrarDatosRegistroNuevoCli()
    {
        $this->load->view('vistaAdministrador/cliente/cli_05_registro_exitoso_01_creado');
    }

    public function mostrarDatosRegistroModCli()
    {
        redirect('administrador/mostrarDatosRegistroModificadoCliente', 'refresh');
    }

    public function mostrarDatosRegistroModificadoCliente()
    {
        $this->load->view('vistaAdministrador/cliente/cli_06_registro_exitoso_02_modificado');
    }

    public function mostrarDatosRegistroDesCli()
    {
        redirect('administrador/mostrarDatosRegistroDeshabilitadoCliente', 'refresh');
    }

    public function mostrarDatosRegistroDeshabilitadoCliente()
    {
        $this->load->view('vistaAdministrador/cliente/cli_07_registro_exitoso_03_deshabilitado');
    }

    public function mostrarDatosRegistroHabCli()
    {
        redirect('administrador/mostrarDatosRegistroHabilitadoCliente', 'refresh');
    }

    public function mostrarDatosRegistroHabilitadoCliente()
    {
        $this->load->view('vistaAdministrador/cliente/cli_08_registro_exitoso_04_habilitado');
    }


    /*
<!------------------------------------------------------------------------------------->
<!----------------------   INSTRUCTOR  ------------------------------------------------>
<!------------------------------------------------------------------------------------->
*/
    public function mostrarDatosRegistroIns()
    {
        redirect('administrador/mostrarDatosRegistroNuevoIns', 'refresh');
    }
    public function mostrarDatosRegistroNuevoIns()
    {
        $this->load->view('vistaAdministrador/instructor/ins_05_registro_exitoso_01_creado');
    }

    public function mostrarDatosRegistroModIns()
    {
        redirect('administrador/mostrarDatosRegistroModificadoInstructor', 'refresh');
    }

    public function mostrarDatosRegistroModificadoInstructor()
    {
        $this->load->view('vistaAdministrador/instructor/ins_06_registro_exitoso_02_modificado');
    }

    public function mostrarDatosRegistroDesIns()
    {
        redirect('administrador/mostrarDatosRegistroDeshabilitadoInstructor', 'refresh');
    }

    public function mostrarDatosRegistroDeshabilitadoInstructor()
    {
        $this->load->view('vistaAdministrador/instructor/ins_07_registro_exitoso_03_deshabilitado');
    }

    public function mostrarDatosRegistroHabIns()
    {
        redirect('administrador/mostrarDatosRegistroHabilitadoInstructor', 'refresh');
    }

    public function mostrarDatosRegistroHabilitadoInstructor()
    {
        $this->load->view('vistaAdministrador/instructor/ins_08_registro_exitoso_04_habilitado');
    }

    /*
/*

*/

    /*    
<!------------------------------------------------------------------------------------->
<!-------------------------- CURSOS --------------------------------------------------->
<!------------------------------------------------------------------------------------->
*/


    public function mostrarDatosRegistroCur()
    {
        redirect('administrador/mostrarDatosRegistroNuevoCur', 'refresh');
    }
    public function mostrarDatosRegistroNuevoCur()
    {
        $this->load->view('vistaAdministrador/cursos/cur_05_registro_exitoso_01_creado');
    }

    public function mostrarDatosRegistroModCur()
    {
        redirect('administrador/mostrarDatosRegistroModificadoCurso', 'refresh');
    }

    public function mostrarDatosRegistroModificadoCurso()
    {
        $this->load->view('vistaAdministrador/cursos/cur_06_registro_exitoso_02_modificado');
    }

    public function mostrarDatosRegistroDesCur()
    {
        redirect('administrador/mostrarDatosRegistroDeshabilitadoCurso', 'refresh');
    }

    public function mostrarDatosRegistroDeshabilitadoCurso()
    {
        $this->load->view('vistaAdministrador/cursos/cur_07_registro_exitoso_03_deshabilitado');
    }

    public function mostrarDatosRegistroHabCur()
    {
        redirect('administrador/mostrarDatosRegistroHabilitadoCurso', 'refresh');
    }

    public function mostrarDatosRegistroHabilitadoCurso()
    {
        $this->load->view('vistaAdministrador/cursos/cur_08_registro_exitoso_04_habilitado');
    }
    /*   
<!------------------------------------------------------------------------------------->
<!-------------------------- ROLES --------------------------------------------------->
<!------------------------------------------------------------------------------------->
*/


    public function mostrarDatosRegistroRol()
    {
        redirect('administrador/mostrarDatosRegistroNuevoRol', 'refresh');
    }
    public function mostrarDatosRegistroNuevoRol()
    {
        $this->load->view('vistaAdministrador/roles/rol_registro_exitoso_01_creado');
    }

    public function mostrarDatosRegistroModRol()
    {
        redirect('administrador/mostrarDatosRegistroModificadoRol', 'refresh');
    }

    public function mostrarDatosRegistroModificadoRol()
    {
        $this->load->view('vistaAdministrador/roles/rol_registro_exitoso_02_modificado');
    }

    public function mostrarDatosRegistroDesRol()
    {
        redirect('administrador/mostrarDatosRegistroDeshabilitadoRol', 'refresh');
    }

    public function mostrarDatosRegistroDeshabilitadoRol()
    {
        $this->load->view('vistaAdministrador/roles/rol_registro_exitoso_03_deshabilitado');
    }

    public function mostrarDatosRegistroHabRol()
    {
        redirect('administrador/mostrarDatosRegistroHabilitadoRol', 'refresh');
    }

    public function mostrarDatosRegistroHabilitadoRol()
    {
        $this->load->view('vistaAdministrador/roles/rol_registro_exitoso_04_habilitado');
    }

    /*    
*/




    /*
<!------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------->
*/



    public function mostrarDatosModPassword()
    {
        redirect('administrador/mostrarDatosModificadoPassword', 'refresh');
    }

    public function mostrarDatosModificadoPassword()
    {
        $this->load->view('vistaAdministrador/usu_registro_exitoso_mod_password');
    }
}
