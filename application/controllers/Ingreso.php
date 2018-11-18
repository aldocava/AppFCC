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
        $this->form_validation->set_rules('g-recaptcha-response','recaptcha validation','trim|required|callback_validate_captcha');
        if ($this->form_validation->run() == false) {
            redirect('inicio');
        }else {
            $session = $this->ingreso_model->verificar($this->input->post('username'));
            if ($session != false) {
                $pass = $session[0]['Contraseña'];
                if (password_verify($this->input->post('pswd'), $pass)){
                    echo "Sesión iniciada";
                    $atributos = array(
                                    'username' => $session[0]['Usuario'],
                                    'correo' => $session[0]['Correo'],
                                    'rol' => $session[0]['Id_Rol']
                                );
                    $this->session->userdata('appfcc', $atributos);
                    $this->load->view('prueba/success');
                }else {
                    $this->form_validation->set_message('pswd', 'La contraseña es incorrecta');
                    redirect('ingreso');
                }
            }else {
                $this->form_validation->set_message('username', 'El nombre de usuario es incorrecto');
                redirect('ingreso');
            }
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
