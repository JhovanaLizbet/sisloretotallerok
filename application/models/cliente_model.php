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
		$this->db->from('cliente');
		$this->db->where('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////// I N S E R T /////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function agregarCliente($data)
	{
		$this->db->insert('cliente', $data); //inserta a la base de datos
	}

//////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////// RECUPERAMOS /////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function recuperarDatosCliente($idCliente)
	{
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('id', $idCliente);
		return $this->db->get();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////// MODIFICAMOS /////////////////////////////////////////////////	
//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function modificarCliente($idCliente, $data)
	{
		$this->db->where('id', $idCliente);
		$this->db->update('cliente', $data);
	}

//////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////// ELIMINAMOS //////////////////////////////////////////////////
///////////////////////////////// DESHABILITAMOS /////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function deshabilitarCliente($idCliente, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idCliente);
		$this->db->update('cliente', $data);
		return $this->db->get();
	}
}