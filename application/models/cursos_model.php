<?php

class Cursos_model extends CI_Model
{
	public function buscar_cursoso($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombres",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("usuarios");
		return $consulta->result();
	}

	public function cursos_id($id) {
		$this->db->select('*');
//		$this->db->from('cursos');
		$this->db->where('id', $id);
		$query = $this->db->get('cursos');
		return $query->result();
	}

	public function buscar_cursos($search_query) {
        // Define tu lógica de búsqueda aquí
        // Puedes usar la función $this->db->like() para realizar la búsqueda en la base de datos
        $this->db->like('nivel', $search_query); // Reemplaza 'nombre' por el nombre de la columna que deseas buscar
        $query = $this->db->get('cursos'); // Reemplaza 'cursos' por el nombre de tu tabla
        return $query->result();
    }

	//////////////////////////////////////////////////////////////////////
	// busca un registro en la tabla 'cursos',  donde el valor de la columna 'id' coincide con el valor 
	//de la variable $id, y luego devuelve ese registro como un objeto que contiene 
	//los datos de dicho registro.
	
	public function find_by_id($id)
	{
		$result = $this->db->get_where('cursos', ['id' => $id])->row();
		return $result;
	}
	//////////////////////////////////////////////////////////////////////7
	public function obtener_cursos() {
        $query = $this->db->get('cursos');
        return $query->result();
    }

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////////////////////// AHORA REALIZAMOS LAS /////////////////////////////////////////////////	
	/////////////////////////// CONSULTAS  SQL  PARA /////////////////////////////////////////////////	
	/////////////////////////// REALIZAR  LOS  CRUD  /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function listaCursos() //recupera la lista de todos los clientes
	{
		$this->db->select('*');
		$this->db->from('cursos');
		$this->db->where('estado', '1'); //muestra solo est hab
		return $this->db->get();
	}
	public function listaCursosDeshabilitados() //recupera la lista de todos los usuarios
	{
		$this->db->select('*');
		$this->db->from('cursos');
		$this->db->where('id <>', $this->session->userdata('idCurso'));
		$this->db->where('estado', '0'); //muestra solo est hab
		return $this->db->get();
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// I N S E R T /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	//public function agregarCurso($data)
	//{
	//	$this->db->insert('cursos', $data); //inserta a la base de datos
	//}
	/////////////////////////////////////////////////////////////////////////////////////////////
	public function registrarCurso($datosCurso) //realizamos transaccion curso - instructor
	{
		// Iniciar una transacción
		$this->db->trans_start();

		// Insertar en la tabla ALQUILER (curso el instructor)
		//$this->db->insert('instructor', $datosCurso);
		
		// Insertar en la tabla ALQUILER (curso)
		$this->db->insert('cursos', $datosCurso);
		
        // Obtener el ID de la venta recién insertada
        $idCurso = $this->db->insert_id();
/*
        // Calcular el total de la venta
        $totalAlquiler = 0;

        // Insertar el detalle de alquiler en la tabla detalleAlquiler
        $detalleAlquiler['idAlquiler'] = $idAlquiler;
        $this->db->insert('detalleAlquiler', $detalleAlquiler);

        // Calcular el subtotal del detalle y sumarlo al total del alquiler
        $subtotal = $detalleAlquiler['precioAlquiler'] * $detalleAlquiler['cantidad'];
        $totalAlquiler += $subtotal;

        // Actualizar el atributo ALQUILER en la tabla EQUIPO a 1 para indicar que ha sido alqulado y no vendido
        $this->db->where('id', $detalleAlquiler['idEquipo']);
        $this->db->update('equipo', array('alquiler' => 1));

        // Actualizar el campo "total" en la tabla alquiler con el valor calculado
        $this->db->where('id', $idAlquiler);
        $this->db->update('alquiler', array('total' => $totalAlquiler));
*/
		// Finalizar la transacción
		$this->db->trans_complete();

		// Verificar si la transacción se completó con éxito
		if ($this->db->trans_status() === FALSE) {
			// Si hubo un error, deshacer la transacción
			return FALSE;
		} else {
			return TRUE;
		}
	}


	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// RECUPERAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function recuperarDatosCursos($idCurso)
	{
		$this->db->select('*');
		$this->db->from('cursos');
		$this->db->where('id', $idCurso);
		return $this->db->get();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// MODIFICAMOS /////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function modificarCursos($idCurso, $data)
	{
		$this->db->where('id', $idCurso);
		$this->db->update('cursos', $data);
	}

	//           obtenerDetalleAlquiler($idAlquiler)
	public function obtenerDetalleCurso($idCurso)
	{
		$this->db->select('C.id, C.gestion AS GESTION, C.codigo AS CODIGO, C.nombre AS CURSO, C.nivel AS NIVEL, 
		C.duracion AS DURACION, C.diaClase AS DIA, C.hora AS HORA, 
        C.fechaInicio AS FECHAI, C.fechaFin AS FECHAF, C.precioTotal AS TOTAL,
		C.descripcion AS DESCRIPCION,
		CONCAT(I.nombres," ", I.primerApellido," ", IFNULL(I.segundoApellido, " ")) AS nameinstructor');
		$this->db->from('cursos as C');
		$this->db->join('instructor as I', 'C.idInstructor=I.id', 'inner');
		$this->db->where('C.id', $idCurso);
		return $this->db->get();

		/*
        $this->db->select('a.id AS idAlquiler, p.id AS idProductor, CONCAT(p.nombres, " ", p.primerApellido, " ", IFNULL(p.segundoApellido,"")) AS nombreProductor,
                       e.id AS idEquipo, CONCAT(e.serie, " - ", e.descripcion) AS equipo,
                       a.total AS precio, a.fechaDevolucion AS fechaDevolucion, a.fechaAlquiler AS fechaAlquiler');
        $this->db->from('alquiler AS a');
        $this->db->join('productor AS p', 'a.idProductor = p.id', 'inner');
        $this->db->join('detalleAlquiler AS da', 'a.id = da.idAlquiler', 'inner');
        $this->db->join('equipo AS e', 'da.idEquipo = e.id', 'inner');
        $this->db->where('a.id', $idAlquiler);

        return $this->db->get();
		$this->db->select('');
		$this->db->from('');
		$this->db->join('');
		$this->db->where('a.id', $idAlquiler);
		*/
	}


	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////// ELIMINAMOS //////////////////////////////////////////////////
	///////////////////////////////// DESHABILITAMOS /////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function deshabilitarCursos($idCurso, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idCurso);
		$this->db->update('cursos', $data);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	////////////////////////////////// HABILITAMOS ///////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////	

	public function habilitarCursos($idCurso, $data) //recupera la lista de todos los estudiantes
	{
		// BD
		$this->db->where('id', $idCurso);
		$this->db->update('cursos', $data);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	
	//////////////////////////////////////////////////////////////////////////////////////////////////	

}
