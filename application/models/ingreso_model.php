<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ingreso_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }


    public function obtener_usuarios(){
        $this->db->select('*');
        $this->db->from('login');
        return $this->db->get()->result_array();
    }

    public function verificar($user){
        $this->db->select('*');
        $this->db->from('login as l');
        $this->db->where('l.Usuario', $user);
        $this->db->join('rolusuarios as r', 'l.Id_Usuario = r.Id_Usuario');
        $query = $this->db->get()->result_array();
        if ($query != null) {
            return $query;
        }else {
            return false;
        }
    }

    public function getIdUser($data){
        $cadena="select `Id_Usuario` from `login` where `Usuario`= '".$data["user"]."'; ";
        $query = $this->db->query($cadena);
        if ($query != null)
           return $query;
        else
            return FALSE;
    }
}
