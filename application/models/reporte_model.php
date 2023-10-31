<?php

class Reporte_model extends CI_Model
{
    //////////////////////////////////////////////////////////////////////////////////////////////////	
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
        $this->db->select('I.id AS id, CONCAT(C.nombres, " ",C.primerApellido," ",IFNULL(C.segundoApellido,"")) AS cliente, C.ci AS ci, C.razonSocial AS razonSocial,
		                I.fechaInscripcion AS fechaInscripcion, I.observacion AS observacion');
        $this->db->from('inscripcion I');
        $this->db->join('clientes C', 'C.id = I.idCliente');
        $this->db->where('I.estado', 1);
        $this->db->where('I.id', $idInscripcion);
        return $this->db->get();
    }


    public function getRangoFechas($desde, $hasta)
    {
        $this->db->select('I.id, I.fechaInscripcion AS fechaIns, CONCAT(C.nombres, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS cliente, 
    C.ci AS CI, C.razonSocial AS "RAZON SOCIAL", cu.nombre AS curso, cu.hora AS HORA, cu.precioTotal AS precioTotal');
        $this->db->from('clientes C');
        $this->db->join('inscripcion I', 'C.id = I.idCliente');
        $this->db->join('detalleinscripcion DI', 'I.id = DI.idInscripcion');
        $this->db->join('cursos cu', 'cu.id = DI.idCurso');
        $this->db->where('I.estado', 1);
        $this->db->where('fechaInscripcion >=', $desde);
        $this->db->where('fechaInscripcion <=', $hasta);
        $this->db->order_by('I.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function cursosMasSolicitados()
    {
        $this->db->select('cu.nombre AS curso, COUNT(*) AS cantidad');
        $this->db->from('cursos cu');
        $this->db->join('detalleInscripcion di', 'cu.id = di.idCurso');
        $this->db->group_by('cu.nombre');
        $this->db->order_by('Cantidad', 'desc');

        $query = $this->db->get();
        return $query->result();
    }
    public function obtener_cursos_mas_solicitados() {
        $this->db->select('cu.nombre AS Curso, COUNT(*) AS Cantidad');
        $this->db->from('cursos cu');
        $this->db->join('detalleInscripcion di', 'cu.id = di.idCurso', 'inner');
        $this->db->group_by('cu.nombre');
        $this->db->order_by('Cantidad', 'desc');
    
        $query = $this->db->get();
        return $query->result();
    }
    
}
