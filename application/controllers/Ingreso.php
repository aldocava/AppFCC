<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('ingreso_model');
    }

	public function index(){
        $algo = array('nose' => $this->ingreso_model->obtener_usuario() );
        $this->load->view('common/header');
		$this->load->view('common/navbar' );
        //$this->load->view('ingreso/sesion');
		$this->load->view('common/footer', $algo);

	}

    public function verificar(){
        $nueva_pswd = password_hash($this->input->post('pswd'));

        $nose = $this->ingreso_model();
        var_dump($nose);
    }

    public function salir(){
      $this->session->sess_destroy();
      redirect(base_url());
    }
}
