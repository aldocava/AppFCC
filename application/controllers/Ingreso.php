<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index(){
        $this->load->view('common/header');
		$this->load->view('common/navbar');
        //$this->load->view('ingreso/sesion');
		$this->load->view('common/footer');

	}

    public function verificar(){
        // code...
    }

    public function salir(){

    }
}
