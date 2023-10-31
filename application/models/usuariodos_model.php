<?php

class Usuariodos_model extends CI_Model
{
    public function obtener_rol($usuario_id) {
        $this->db->select('roles.nombre');
        $this->db->from('instructor');
        $this->db->join('roles', 'instructor.rol_id = roles.id');
        $this->db->where('.id', $usuario_id);

        $query = $this->db->get();
        return $query->row()->nombre;
    }
    
}
