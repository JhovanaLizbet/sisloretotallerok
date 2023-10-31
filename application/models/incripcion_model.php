<?php
class Incripcion_model extends CI_Model
{
	public function listaCarreras()
	{
		$this->db->select('*');
		$this->db->from('carreras');
		return $this->db->get();
	}

	///////////////////////////////////////////////////////////////		
	public function store($data)
	{
		$this->db->insert('inscripcion', $data);
		return $this->db->insert_id();
	}
	/////////////////////////////////////////////////////

	public function inscribirEstudiante($idCarrera, $data)
	{
		$this->db->trans_start(); //INICIAMOS LA TRANSACCION

		$this->db->insert('estudiantes', $data);  //insertamos estudiante
		$idEstudiante = $this->db->insert_id();    //recupera ultimo id insert

		$data2['idCarrera'] = $idCarrera;          //creamos data2
		$data2['idEstudiante'] = $idEstudiante;    //creamos data2
		$this->db->insert('inscripcion', $data2); //REGISTRAR INSCRIPCION

		$this->db->trans_complete(); //FINALIZAMOS LA TRANSACCION

		if ($this->db->trans_status() === FALSE) {
			return false;
		}
	}

	/////////////////////////////////////////////////////////////777
	public function obtenerInscripcion($inscripcion_id)
	{
		$query = $this->db->get_where('inscripcion', array('id' => $inscripcion_id));
		return $query->row();
	}
	////////////////////////////////////////////////////////////////////////
	public function obtenerInscritos()
	{
		$this->db->select('I.id AS idInscripcion, CONCAT(C.nombres, " ",C.primerApellido," ",IFNULL(C.segundoApellido,"")) AS cliente, C.ci AS ci, C.razonSocial AS razonSocial,
		                I.fechaInscripcion AS fechaInscripcion, I.observacion AS observacion, Cu.nombre AS nombreCurso');
        $this->db->from('inscripcion I');
        $this->db->join('clientes C', 'C.id = I.idCliente');
		$this->db->join('detalleinscripcion DI', 'I.id=DI.idInscripcion');
		$this->db->join('cursos Cu', 'Cu.id = DI.idCurso');
        $this->db->where('I.estado', 1); 
		//$this->db->where('I.id', $idInscripcion);

		$query = $this->db->get(); // Obtener los resultados de la consulta

		return $query->result();
	}
}
