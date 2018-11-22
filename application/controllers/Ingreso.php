<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

    public function __construct(){
        parent::__construct();
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: SAMEORIGIN' );
        header( 'X-XSS-Protection: 1; mode=block' );
        $this->load->model('ingreso_model');
    }

	public function index(){
        $this->form_validation->set_rules('username','Usuario','trim|xss_clean|required');
        $this->form_validation->set_rules('pswd','Contraseña','trim|xss_clean|required');
        $this->form_validation->set_rules('g-recaptcha-response','Validación de Captcha','trim|required|callback_validate_captcha');
        if ($this->form_validation->run() == false) {
            redirect('inicio');
        }else {
            $session = $this->ingreso_model->verificar($this->input->post('username'));
            if ($session != false) {
                $pass = $session[0]['Contraseña'];
                if (password_verify($this->input->post('pswd'), $pass)){

                    $atributos = array(
                                    'username' => $session[0]['Usuario'],
                                    'correo' => $session[0]['Correo'],
                                    'rol' => $session[0]['Id_Rol']
                                );
                    $this->session->set_userdata('appfcc', $atributos);
                    $this->tipoDeUsuario();
                }else {
                    $this->form_validation->set_message('pswd', 'La contraseña es incorrecta');
                    redirect('inicio');
                }
            }else {
                $this->form_validation->set_message('username', 'El nombre de usuario es incorrecto');
                redirect('inicio');
            }
        }
	}

    public function tipoDeUsuario(){
        $nivel = $this->session->userdata('appfcc')['rol'];
        switch ($nivel) {
            //Administrador
            case '1':
                $this->load->view('common/header');
                $this->load->view('common/navbarAdmin');
                $this->load->view('prueba/success');
                $this->load->view('common/footer');
                //$this->salir();
                break;
            //UAcademica
            case '2':
                redirect('UnidadAcademica');
                break;
            //Profesor
            case '3':
                redirect('Profesor');
                break;
            //Usuario
            case '4':
                redirect('usuario');
                break;
            default:
                // code...
                break;
        }
    }

    public function validate_captcha(){
        $captcha = $this->input->post('g-recaptcha-response');
        $response=@file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcJ-ngUAAAAAMQp1Skwxc3pqoqN0dTze5ikebNu & response=".$captcha."& remoteip=".$_SERVER['REMOTE_ADDR']);
        if ($response.'success'==FALSE){
            $this->form_validation->set_message('validate_captcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
            return FALSE;
        }else
            return TRUE;
    }

    public function salir(){
      $this->session->sess_destroy();
      redirect(base_url());
    }
}
