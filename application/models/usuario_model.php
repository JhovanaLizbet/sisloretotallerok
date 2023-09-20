<?php
class Usuario_model extends CI_Model
{
	public function validar($login, $password) //recupera la lista de todos los estudiantes
	{
		// con active record ES MEJOR USAR ESTE TIPO DE CONSULTA

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('login', $login); //muestra solo est hab
		$this->db->where('password', $password);
		return $this->db->get();


		/*consulta en mysql puro
			$query="SELECT * FROM usuarios WHERE login='$login' AND password='$password'"; return $this->db->query($query);
			*/
	}

	public function listausuarios() //recupera la lista de todos los estudiantes
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('habilitado', '1'); //muestra solo est hab
		return $this->db->get();
	}

	public function agregarUsuario($data)
	{
		$this->db->insert('usuarios', $data); //inserta a la base de datos
	}

	public function recuperarUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario', $idusuario);
		return $this->db->get();
	}
	public function recuperarDatosUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario', $idusuario);
		return $this->db->get();
	}

	public function modificarUsuario($idusuario, $data)
	{
		$this->db->where('idUsuario', $idusuario);
		$this->db->update('usuarios', $data);
	}

	public function eliminarUsuario($idusuario)
	{
							// BD
		$this->db->where('idUsuario',$idusuario);
		$this->db->delete('usuarios');
	}

	public function listaUsuariosDes() //recupera la lista de todos los estudiantes
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('habilitado','0');//muestra solo est hab
		return $this->db->get();
	}


}
