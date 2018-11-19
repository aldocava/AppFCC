<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if ($this->session->has_userdata('appfcc')) {
            redirect('ingreso/tipoDeUsuario');
        }
    }

	public function index(){
        $this->load->view('common/header');
        $this->load->view('common/navbar');
        $this->load->view('inicio/principal');
        $this->load->view('common/footer');
	}

}
