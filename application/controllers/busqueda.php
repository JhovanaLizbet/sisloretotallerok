<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Busqueda extends CI_Controller
{
    /*
    public function __construct() {
        parent::__construct();
        $this->load->model('busqueda_model'); // Reemplaza 'busqueda_model' por el nombre de tu modelo
    }

    public function index() {
        $this->load->view('busqueda_view');
    }

    public function buscar() {
        $search_query = $this->input->post('search_query');
        $data['resultados'] = $this->busqueda_model->buscar_productos($search_query);
        $this->load->view('resultados_view', $data);
    }

    public function buscar_productos($search_query) {
        $this->db->like('nombres', $search_query); // Reemplaza 'nombre' por el nombre de la columna que deseas buscar
        $query = $this->db->get('productor'); // Reemplaza 'productos' por el nombre de tu tabla
        return $query->result();
    }
*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cursos_model');
    }

    public function index()
    {
        $this->load->view('busqueda_view');
    }

    public function buscar()
    {
        $searchQuery = $this->input->post('search_query');
        $resultados = $this->cursos_model->buscar_cursos($searchQuery);

        // Devolver los resultados en formato HTML
        $data['resultados'] = $resultados;


        //$this->load->view('incltever/cabecera_02'); //cabezera
        //$this->load->view('incltever/01_menu_superior'); //menu
        //$this->load->view('incltever/02_menu_superior'); //menu
        //$this->load->view('incltever/03_menu_lateral_cliente');
        $this->load->view('resultados_view', $data);
    }
    public function listaUsuariosBusqueda()
    {
        if ($this->session->userdata('login')) {

            $idClienteLogeado = $this->session->userdata('idCliente');
            $datosCliente = $this->usuario_model->datosClienteLogeado($idClienteLogeado);
            $data['datosCliente'] = $datosCliente;

            $searchQuery = $this->input->post('search_query');
            $resultados = $this->usuario_model->buscar_usuarios($searchQuery);

            // Devolver los resultados en formato HTML
            $data['resultados'] = $resultados;

			$this->load->view('incltever/01_cabecera_admin'); //cabezera
			$this->load->view('incltever/02_menu_superior_admin'); //menu superior
			$this->load->view('incltever/03_menu_lateral_ini_admin'); //menu lateral
			$this->load->view('vistaUsuario/usu_11_resultados_view_lista',$data); // centro
			$this->load->view('incltever/04_pie_admin'); // pie
/*
            $this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/02_menu_superior'); //menu superior
			$this->load->view('incltever/03_menu_lateral_cliente'); //menu lateral
			$this->load->view('vistaAdministrador/cliente/cli_13_resultados_view_lista',$data); // centro
			$this->load->view('incltever/pie'); // pie
            //$this->load->view('incltever/cabecera_02'); //cabezera
            //$this->load->view('incltever/01_menu_superior'); //menu
            //$this->load->view('incltever/02_menu_superior'); //menu
            //$this->load->view('incltever/03_menu_lateral_cliente');
            //$this->load->view('resultados_view', $data);*/
        } else {
            redirect('usuarios/index/2', 'refresh');
        }
    }
    public function listaCursos()
    {
        if ($this->session->userdata('login')) {

            $idClienteLogeado = $this->session->userdata('idCliente');
            $datosCliente = $this->usuario_model->datosClienteLogeado($idClienteLogeado);
            $data['datosCliente'] = $datosCliente;

            $searchQuery = $this->input->post('search_query');
            $resultados = $this->cursos_model->buscar_cursos($searchQuery);

            // Devolver los resultados en formato HTML
            $data['resultados'] = $resultados;

            $this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/02_menu_superior'); //menu superior
			$this->load->view('incltever/03_menu_lateral_cliente'); //menu lateral
			$this->load->view('vistaAdministrador/cliente/cli_13_resultados_view_lista',$data); // centro
			$this->load->view('incltever/pie'); // pie
            //$this->load->view('incltever/cabecera_02'); //cabezera
            //$this->load->view('incltever/01_menu_superior'); //menu
            //$this->load->view('incltever/02_menu_superior'); //menu
            //$this->load->view('incltever/03_menu_lateral_cliente');
            //$this->load->view('resultados_view', $data);
        } else {
            redirect('usuarios/index/2', 'refresh');
        }
    }
    public function buscarSearch()
    {
        if ($this->session->userdata('login')) {

            $idClienteLogeado = $this->session->userdata('idCliente');
            $datosCliente = $this->usuario_model->datosClienteLogeado($idClienteLogeado);
            $data['datosCliente'] = $datosCliente;

            $searchQuery = $this->input->post('search_query');
            $resultados = $this->cursos_model->buscar_cursos($searchQuery);

            // Devolver los resultados en formato HTML
            $data['resultados'] = $resultados;

            $this->load->view('incltever/cabecera'); //cabezera
			$this->load->view('incltever/02_menu_superior'); //menu superior
			$this->load->view('incltever/03_menu_lateral_cliente'); //menu lateral
			$this->load->view('vistaAdministrador/cliente/cli_12_resultados_view',$data); // centro
			$this->load->view('incltever/pie'); // pie
            //$this->load->view('incltever/cabecera_02'); //cabezera
            //$this->load->view('incltever/01_menu_superior'); //menu
            //$this->load->view('incltever/02_menu_superior'); //menu
            //$this->load->view('incltever/03_menu_lateral_cliente');
            //$this->load->view('resultados_view', $data);
        } else {
            redirect('usuarios/index/2', 'refresh');
        }
    }
}
