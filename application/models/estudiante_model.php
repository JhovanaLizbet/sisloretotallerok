<?php
	class Estudiante_model extends CI_Model
	{ 
		public function listaestudiantes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('estudiantesok');
			$this->db->where('habilitado','1');//muestra solo est hab
			return $this->db->get();
		}

		public function listaestudiantesdes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('estudiantesok');
			$this->db->where('habilitado','0');//muestra solo est hab
			return $this->db->get();
		}


		public function agregarestudiante($data)
		{
			$this->db->insert('estudiantesok',$data);//inserta a la base de datos
		}

		public function eliminarestudiante($idestudiante)
		{
			                    // BD
			$this->db->where('idEstudiante',$idestudiante);
			$this->db->delete('estudiantesok');
		}

		public function recuperarestudiante($idestudiante)
		{
			$this->db->select('*');
			$this->db->from('estudiantesok');
			$this->db->where('idEstudiante',$idestudiante);
			return $this->db->get();

		}

		public function modificarestudiante($idestudiante,$data)
		{
			$this->db->where('idEstudiante',$idestudiante);
			$this->db->update('estudiantesok',$data);
		}
	} 
		
		

