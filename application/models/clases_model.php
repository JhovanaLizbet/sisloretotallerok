<?php
	class Clases_model extends CI_Model
	{ 
		public function listaestudiantes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('clases');
			$this->db->where('estado','1');//muestra solo est hab
			return $this->db->get();
		}

		public function listaestudiantesdes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('clases');
			$this->db->where('estado','0');//muestra solo est hab
			return $this->db->get();
		}


		public function agregarestudiante($data)
		{
			$this->db->insert('clases',$data);//inserta a la base de datos
		}

		public function eliminarestudiante($idclases)
		{
			                    // BD
			$this->db->where('idClases',$idclases);
			$this->db->delete('clases');
		}

		public function recuperarestudiante($idclases)
		{
			$this->db->select('*');
			$this->db->from('clases');
			$this->db->where('idClases',$idclases);
			return $this->db->get();

		}

		public function modificarestudiante($idclases,$data)
		{
			$this->db->where('idClases',$idclases);
			$this->db->update('clases',$data);
		}
	} 
		
		

