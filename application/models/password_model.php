<?php

class Password_model extends CI_Model
{

    public function verificarPasswordAdministrador($idAdministrador, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('usuarios');
        $this->db->WHERE('id', $idAdministrador);
        $this->db->WHERE('password', md5($contraseniaActual));
        return $this->db->get();
    }

    public function actualizarContraseniaAdministrador($idAdministrador, $data){ 

        $this->db->where('id',$idAdministrador,);
        $this->db->update('usuarios',$data);
    }    

    public function verificarPasswordCliente($idCliente, $contraseniaActual)
    {
        $this->db->SELECT('*');
        $this->db->FROM('cliente');
        $this->db->WHERE('id', $idCliente);
        $this->db->WHERE('password', md5($contraseniaActual));
        return $this->db->get();
    }
    public function actualizarContraseniaCliente($idCliente, $data){ 

        $this->db->where('id',$idCliente,);
        $this->db->update('cliente',$data);
    }
}
