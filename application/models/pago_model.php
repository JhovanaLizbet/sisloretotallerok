<?php

class Pago_model extends CI_Model
{
	public function store($data) {
		$this->db->insert('pagos', $data);
		return $this->db->insert_id();
	}

	public function obtenerPagos($inscripcion_id) {
        $query = $this->db->get_where('pagos', array('idInscripcion' => $inscripcion_id));
        return $query->result();
    }
}
