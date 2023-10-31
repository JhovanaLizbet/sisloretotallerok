<?php

class Usuario_model extends CI_Model
{
	public function validarAdministrador($login, $password) //recupera la lista de todos los estudiantes
	{
		// con active record ES MEJOR USAR ESTE TIPO DE CONSULTA

		$this->db->select('id, CONCAT(nombres," ",primerApellido) AS nombreApellido, 
							sexo, nombreUsuario, password, fechaNacimiento, fechaRegistro, rol');
		$this->db->from('usuarios');
		$this->db->where('nombreUsuario', $login);
		$this->db->where('password', $password);
		$this->db->WHERE('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}
	public function validarCliente($login, $password)
    {
        $this->db->SELECT('id, CONCAT(nombres," ",primerApellido," ",IFNULL(segundoApellido,"")) AS nombreApellido, sexo, nombreUsuario, password, fechaNacimiento,rol,email, fechaRegistro, idUsuario');
        $this->db->FROM('clientes');
        $this->db->WHERE('nombreUsuario', $login);
        $this->db->WHERE('password', $password);
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }
	public function verificarNameUserCliente($nombreUsuario)
    {
        $this->db->SELECT('*');
        $this->db->FROM('clientes');
        $this->db->WHERE('nombreUsuario', $nombreUsuario);
        return $this->db->get();
    }
	public function datosClienteLogeado($idProductor)
    {
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->WHERE('id', $idProductor);
        $this->db->where('estado', 1);
        return $this->db->get();
    }
	

	public function verificarNombreUsuario($nombreUsuario)
	{
		$this->db->SELECT('*');
		$this->db->FROM('usuarios');
		$this->db->WHERE('nombreUsuario', $nombreUsuario);
		return $this->db->get();
	}



	

	public function listaUsuarios() //recupera la lista de todos los usuarios
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id <>', $this->session->userdata('idUsuario'));
		$this->db->where('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}

	public function listaUsuariosDeshabilitados() //recupera la lista de todos los usuarios
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id <>', $this->session->userdata('idUsuario'));
		$this->db->where('estado', '0'); //muestra solo est hab
		return $this->db->get();
	}

	public function listaUsuariosLogueados()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->WHERE('id', $this->session->userdata('idUsuario'));
		$this->db->where('estado', 1);
		return $this->db->get();
	}

	public function buscar_usuarios($search_query) {
        // Define tu lógica de búsqueda aquí
        // Puedes usar la función $this->db->like() para realizar la búsqueda en la base de datos
        $this->db->like('nombres', $search_query); // Reemplaza 'nombre' por el nombre de la columna que deseas buscar
        $query = $this->db->get('usuarios'); // Reemplaza 'cursos' por el nombre de tu tabla
        return $query->result();
    }
	/*
	public function validarProductor($login, $password)
    {
        $this->db->SELECT('id, CONCAT(nombres," ",primerApellido," ",IFNULL(segundoApellido,"")) AS nombreApellido, sexo, nombreUsuario, contrasenia, fechaNacimiento,rol,descripcion,email,telefonos, fechaRegistro, idUsuario');
        $this->db->FROM('productor');
        $this->db->WHERE('nombreUsuario', $login);
        $this->db->WHERE('contrasenia', $password);
        $this->db->WHERE('estado', '1');
        return $this->db->get();
    }
	public function verificarNameUserProductor($nombreUsuario)
    {
        $this->db->SELECT('*');
        $this->db->FROM('productor');
        $this->db->WHERE('nombreUsuario', $nombreUsuario);
        return $this->db->get();
    }
	public function datosProductorLogeado($idProductor)
    {
        $this->db->select('*');
        $this->db->from('productor');
        $this->db->WHERE('id', $idProductor);
        $this->db->where('estado', 1);
        return $this->db->get();
    }
	

	public function verificarNombreUsuario($nombreUsuario)
	{
		$this->db->SELECT('*');
		$this->db->FROM('usuarios');
		$this->db->WHERE('nombreUsuario', $nombreUsuario);
		return $this->db->get();
	}

*/
	/*
	public function validarCliente($login, $password) //recupera la lista de todos los estudiantes
	{
		$this->db->select('id, CONCAT(nombres," ",primerApellido) AS nombreApellido, 
		sexo, nombreUsuario, password, fechaNacimiento, fechaRegistro, rol');
		$this->db->from('clientes');
		$this->db->where('nombreUsuario', $login);
		$this->db->where('password', $password);
		$this->db->where('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}
	public function verificarNombreUsuarioCliente($nombreUsuario)
	{
		$this->db->SELECT('*');
		$this->db->FROM('clientes');
		$this->db->WHERE('nombreUsuario', $nombreUsuario);
		return $this->db->get();
	}

	public function datosClientesLogueados($idCliente)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->WHERE('id', $idCliente);
		$this->db->where('estado', 1);
		return $this->db->get();
	}
*/
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////////////////////// AHORA REALIZAMOS LAS /////////////////////////////////////////////////	
	/////////////////////////// CONSULTAS  SQL  PARA /////////////////////////////////////////////////	
	/////////////////////////// REALIZAR  LOS  CRUD  /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	


	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// I N S E R T /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function agregarUsuario($data)
	{
		$this->db->insert('usuarios', $data); //inserta a la base de datos
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// RECUPERAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function recuperarDatosDelUsuario($idUsuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id', $idUsuario);
		return $this->db->get();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// MODIFICAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function modificarUsuario($idUsuario, $data)
	{
		$this->db->where('id', $idUsuario);
		$this->db->update('usuarios', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////////////////////// ELIMINAMOS/DESHABILITAMOS ////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function deshabilitarUsuario($idUsuario, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idUsuario);
		$this->db->update('usuarios', $data);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	////////////////////////////////// HABILITAMOS ///////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function habilitarUsuario($idUsuario, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idUsuario);
		$this->db->update('usuarios', $data);
	}
}
/*
	public function eliminarUsuario($idusuario)
	{
		// BD
		$this->db->where('idUsuario', $idusuario);
		$this->db->delete('usuarios');
	}
	public function obtener_datos_perfil($idusuario)
	{
		// Lógica para obtener los datos del perfil del usuario desde la base de datos
		// Ejemplo:
		$this->db->select('login, tipo');
		$this->db->from('usuarios');
		$this->db->where('idUsuario', $idusuario);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function recuperarDatosUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario', $idusuario);
		return $this->db->get();
	}
}
*/