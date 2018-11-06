<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ingreso_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }


    public function obtener_usuario(){
        $this->db->select('*');
        $this->db->from('login');
        return $this->db->get()->result_array();
    }

    public function verificar($user, $pswd){
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('Usuario', $user);
        $this->db->where('Contraseña', $pswd);
        $query = $this->db->get()->result_array();
        if ($query != null) {
            return $query;
        }else {
            return false;
        }
    }
}
