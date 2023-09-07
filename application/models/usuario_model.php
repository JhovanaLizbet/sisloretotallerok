<?php
	class Usuario_model extends CI_Model
	{ 
		public function validar($login,$password) //recupera la lista de todos los estudiantes
		{
			// con active record ES MEJOR USAR ESTE TIPO DE CONSULTA
			
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where('login',$login);//muestra solo est hab
			$this->db->where('password',$password);
			return $this->db->get();
			

			/*consulta en mysql puro
			$query="SELECT * FROM usuarios WHERE login='$login' AND password='$password'"; return $this->db->query($query);
			*/

		}

	} 
		
		

