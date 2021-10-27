<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('enter_model');
    }
	
	public function index(){	

        $data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
        
        $this->load->view('includes/html_header');
        $this -> load -> view('includes/html_navbar');
        $this->load->view('enter');
		$this -> load -> view('includes/html_footer');
	}

    public function enter_user($alerta = null){


        //armazena os dados do formulario em variáveis
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        
        // Verifico se as informações conferem com o banco de dados
        $result = $this->enter_model->check_login($email, $senha);
        
        switch ($result) {
            case 'FALSE':
                //login inválido
                $alerta = array(
                "class" => "danger",
                "mensagem" => "Dados inválidos! Senha ou Login incorreto."
                );
                break;
            case 'TRUE':
                redirect('dashboard');
                break;
            default:
                //login inválido
                $alerta = array(
                "class" => "danger",
                "mensagem" => "Dados inválidos, entre em contato com o administrador."
                );
                break;
        }

        $dados = array(
            "alerta" => $alerta
		);
		$this->load->view('includes/html_header');
        $this -> load -> view('includes/html_navbar');
        $this->load->view('enter',$dados);
		$this -> load -> view('includes/html_footer');
    }

    /* Função para sair (logout) do sistema */
    public function sair(){
        $this->load->view('includes/html_header');
        $this -> load -> view('includes/html_navbar');
        $this->load->view('enter');
		$this -> load -> view('includes/html_footer');
    } 

}