<?php

class Cliente_model extends CI_Model
{

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////////////////////// AHORA REALIZAMOS LAS /////////////////////////////////////////////////	
	/////////////////////////// CONSULTAS  SQL  PARA /////////////////////////////////////////////////	
	/////////////////////////// REALIZAR  LOS  CRUD  /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function listaClientes() //recupera la lista de todos los clientes
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}

	public function clientes() {
		$query = $this->db->get('clientes');
		$this->db->where('estado', '1');
		return $query->result();
	}

	public function listaClientesDeshabilitados() //recupera la lista de todos los usuarios
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('id <>', $this->session->userdata('idCliente'));
		$this->db->where('estado', '0'); //muestra solo est hab
		return $this->db->get();
	}
	public function buscar_clientes($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombres",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("usuarios");
		return $consulta->result();
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// I N S E R T /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function agregarCliente($data)
	{
		$this->db->insert('clientes', $data); //inserta a la base de datos
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// RECUPERAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function recuperarDatosCliente($idCliente)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('id', $idCliente);
		return $this->db->get();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// MODIFICAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function modificarCliente($idCliente, $data)
	{
		$this->db->where('id', $idCliente);
		$this->db->update('clientes', $data);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// ELIMINAMOS //////////////////////////////////////////////////
	///////////////////////////////// DESHABILITAMOS /////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function deshabilitarCliente($idCliente, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idCliente);
		$this->db->update('clientes', $data);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////	
	////////////////////////////////// HABILITAMOS ///////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function habilitarCliente($idCliente, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idCliente);
		$this->db->update('clientes', $data);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function verificarNombreCliente($nombreUsuario)
	{
		$this->db->SELECT('*');
		$this->db->FROM('clientes');
		$this->db->WHERE('nombreUsuario', $nombreUsuario);
		return $this->db->get();
	}


/*
	public function detalleInscripcionID($idInscripcion)
    {
      
		$this->db->select('I.fechaInscripcion AS fechaInscripcion, I.observacion AS observacion,
		                    C.nombre AS nombreCurso, C.duracion AS duracion, C.precioTotal AS precioTotal');
		$this->db->from('inscripcion I');
        $this->db->join('detalleinscripcion DI', 'I.id=DI.idInscripcion');
        $this->db->join('cursos C', 'C.id = DI.idCurso');
		$this->db->where('I.estado', 1); 
        $this->db->where('I.id', $idInscripcion); 
		return $this->db->get();
    }
    
    public function datosGeneralesInscripcionID($idInscripcion)
    {
        $this->db->select('I.id AS idInscripcion, CONCAT(C.nombres, " ",C.primerApellido," ",IFNULL(C.segundoApellido,"")) AS cliente, C.ci AS ci, C.razonSocial AS razonSocial,
		                I.fechaInscripcion AS fechaInscripcion, I.observacion AS observacion');
        $this->db->from('inscripcion I');
        $this->db->join('clientes C', 'C.id = I.idCliente');
        $this->db->where('I.estado', 1); 
        $this->db->where('I.id', $idInscripcion); 
        return $this->db->get();
    }

*/

}
