<?php
class Contrasenia_model extends CI_Model
{
    public function verificarPasswordAdministrador($idUsuario, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('usuarios');
        $this->db->WHERE('id', $idUsuario);
        $this->db->WHERE('contrasenia', md5($contraseniaActual));
        return $this->db->get();
    }

    public function actualizarContraseniaAdministrador($idUsuario, $data)
    { 

        $this->db->where('id',$idUsuario);
        $this->db->update('usuarios',$data);
    }

/*
    public function verificarPasswordProductor($idProductor, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('productor');
        $this->db->WHERE('id', $idProductor);
        $this->db->WHERE('contrasenia', md5($contraseniaActual));
        return $this->db->get();
    }
    public function actualizarContraseniaProductor($idProctores, $data){ 

        $this->db->where('id',$idProctores,);
        $this->db->update('productor',$data);
    }

*/    

}