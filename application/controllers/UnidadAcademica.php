<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadAcademica extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('appfcc')) {
            redirect('/', 'refresh');
        }
        $this->load->helper('url');
        $this->load->model('anuncio_model');
        $this->load->model('ingreso_model');

    }

	public function index(){
        $data["anuncios"]= $this->anuncio_model->getAnuncios();
		$this->load->view('common/header');
		$this->load->view('common/navbarUAcademica');
		$this->load->view('anuncio/anuncios', $data);
		$this->load->view('common/footer');
	}

	public function creaAnuncio(){
		$this->load->view('common/header');
		$this->load->view('common/navbarUAcademica');
		$this->load->view('anuncio/anunciar');
		$this->load->view('common/footer');

	}

	public function crea(){
		$config = array(
			'upload_path' => './images/',
			'allowed_types' => 'jpg|jpeg|png|bmp',
			'max_size' => 0,
			'filename' => url_title( $this->input->post('imagen') ),
			'encrypt_name' => true
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('imagen')) {

			$data = array('user' => $this->session->userdata('appfcc')['username']);
			//$data = array('user' => "appfcc");
			$query = $this->ingreso_model->getIdUser($data);
			if( $query->num_rows() == 1 ){
				foreach ($query->result() as $row) {
					$id = $row->Id_Usuario;
				}
			}

			$data = array( 'idUsuario' => $id,
					'nombre' => $this->input->post('nombre',TRUE),
					'descripcion' => $this->input->post('descripcion',TRUE),
					'image' => $this->upload->file_name,
					'tag' => $this->input->post('tag',TRUE),
					'fecha_inicio' => $this->input->post('fecha_inicio',TRUE),
					'fecha_fin' => $this->input->post('fecha_fin',TRUE));
			$this->anuncio_model->pushAnuncio($data);
			redirect('UnidadAcademica/misAnuncios', 'refresh');
		}
		else
			echo $this->upload->display_errors();

	}

	public function misAnuncios(){
		$data = array('user' => $this->session->userdata('appfcc')['username']);
		//$data = array('user' => "appfcc");
		$query = $this->ingreso_model->getIdUser($data);
		if( $query->num_rows() == 1 ){
			foreach ($query->result() as $row) {
				$id = array('idUsuario' => $row->Id_Usuario);
			}
			$this->load->view('common/header');
			$this->load->view('common/navbarUAcademica');
			$data["anuncios"]= $this->anuncio_model->getMisAnuncios($id);
			$this->load->view('anuncio/publicados',$data);
			$this->load->view('common/footer');
		}
	}


	public function modificaAnuncio(){
		$data["Id_Anuncio"]=$this->uri->segment(3);
		$query["anuncio"] = $this->anuncio_model->getAnuncio($data);
		if( $query!=FALSE ){
			$this->load->view('common/header');
			$this->load->view('common/navbarUAcademica');
			$this->load->view('anuncio/modifica',$query);
			$this->load->view('common/footer');
		}
	}

	public function modifica(){
		$data = array( 'Id_Anuncio' => $this->input->post('idAnuncio',TRUE),
					'Nombre' => $this->input->post('nombre',TRUE),
					'Descripcion' => $this->input->post('descripcion',TRUE),
					'tag' => $this->input->post('tag',TRUE),
					'Fecha_inicio' => $this->input->post('fecha_inicio',TRUE),
					'Fecha_fin' => $this->input->post('fecha_fin',TRUE));
		$this->anuncio_model->updateAnuncio($data);
		$this->load->view('common/header');
		$this->load->view('common/footer');

	}

	public function borrarAnuncio(){
		$data["Id_Anuncio"]=$this->uri->segment(3);
		$this->anuncio_model->deleteAnuncio($data);
		$this->load->view('common/header');
		$this->load->view('common/navbar');
		$this->load->view('common/footer');
		redirect('UnidadAcademica/misAnuncios', 'refresh');
	}
}
