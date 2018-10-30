<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index(){
        $this->load->view('Common/header');
        $this->load->view('Common/navbar');
        $this->load->view('Common/footer');
	}

}
