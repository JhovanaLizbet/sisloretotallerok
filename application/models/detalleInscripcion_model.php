<?php
class DetalleInscripcion_model extends CI_Model
{
    // En el modelo (DetalleInscripcion_model.php)
    public function inscribir_curso($idCurso, $idInscripcion)
    {
        $this->db->trans_start(); // Inicia la transacción

        // Actualiza la tabla detalleinscripcion
        $data = array(
            'idCurso' => $idCurso,
            'idInscripcion' => $idInscripcion
        );
        $this->db->insert('detalleinscripcion', $data);

        // Realiza otras operaciones si es necesario, por ejemplo, actualizar la tabla cursos

        $this->db->trans_complete(); // Completa la transacción

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback(); // Si hay un error, revierte la transacción
            return false;
        } else {
            $this->db->trans_commit(); // Si todo está bien, confirma la transacción
            return true;
        }
    }
    public function insertar_detalleinscripcion($data)
    {
        $this->db->insert('detalleinscripcion', $data);
    }
    //////////////////////////////////////////////////////////////
    public function store($data)
    {
        $this->db->insert('detalleinscripcion', $data);
    }
    ////////////////////////////////////////////////////////
    ////recibo
    public function obtenerDetalleInscripcion($inscripcion_id)
    {
        $query = $this->db->get_where('detalleInscripcion', array('idInscripcion' => $inscripcion_id));
        return $query->row();
    }
    
}
