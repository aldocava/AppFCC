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
        $this->db->from('login as l, rolusuarios as r');
        $this->db->where('l.Usuario', $user);
        $query = $this->db->get()->result_array();
        if ($query != null) {
            return $query;
        }else {
            return false;
        }
    }
}
