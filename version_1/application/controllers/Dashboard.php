<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dash_model');
    }
	
	public function index(){
        
        $papel = $this->session->userdata('cargo');

        switch ($papel){
            case 'administrador':
                $data['titulo'] = "Farmática Digital";
                $data['subtitulo'] = "FMA"; 
                $data['users'] = $this->dash_model->getUsersList();
        
                $this->load->view('includes/html_header', $data);
                $this->load->view('includes/html_navbar');
                $this->load->view('dashboard');
                $this->load->view('includes/html_footer');
                break;
            case 'paciente':
                //pego os dados do estudante
                //$data['student'] = $this->usuarios_model->getUser($this->session->userdata('id'));
                //carrego a view para aquele estudante específico
        
                break;
            default:
                break;
        }   

	}
}


