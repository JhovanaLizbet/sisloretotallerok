<?php

defined('BASEPATH') or exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script



class Cursos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cursos_model');
    }

    public function index()
    {
        $data['cursos'] = $this->cursos_model->obtener_cursos();
        $this->load->view('cursos_view', $data);
    }

    // En el controlador (Cursos.php)
    public function inscribir($idCurso, $idInscripcion)
    {
        $this->load->model('detalleInscripcion_model');

        // Inicia la transacción
        $this->db->trans_start();

        // Inserta un nuevo registro en la tabla detalleinscripcion
        $data = array(
            'idCurso' => $idCurso,
            'idInscripcion' => $idInscripcion
        );
        $this->detalleInscripcion_model->insertar_detalleinscripcion($data);

        // Termina la transacción
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Si hay un error, revierte la transacción y muestra un mensaje de error
            $this->db->trans_rollback();
            echo "Error al inscribirse en el curso.";
        } else {
            // Si la transacción se completó con éxito, confirma la transacción
            $this->db->trans_commit();

            // Carga una vista para mostrar los resultados
            $this->mostrar_resultados_inscripcion();
        }
    }

    public function mostrar_resultados_inscripcion()
    {
        $data['resultados'] = $this->detalleInscripcion_model->obtener_resultados_inscripcion();
        $this->load->view('resultados_inscripcion_view', $data);
    }
}
