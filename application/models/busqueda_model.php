<?php
class Busqueda_model extends CI_Model {
    public function buscar_productos($search_query) {
        $this->db->like('nombres', $search_query); // Reemplaza 'nombre' por el nombre de la columna que deseas buscar
        $this->db->or_like('primerApellido', $search_query);
        $this->db->or_like('sexo', $search_query);
        $query = $this->db->get('productor'); // Reemplaza 'productos' por el nombre de tu tabla
        return $query->result();
    }
}
