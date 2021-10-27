<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('medic_model');
    }
	
    
	public function index(){
        /* Função temPermissão definida ao final desse arquivo */
        $data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->medic_model->getUsersList();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('medicamentos');
		$this -> load -> view('includes/html_footer');
		
	}


    public function novoUsuario(){
        
        // Pego os dados enviados pelo $.post
        $dados['nome'] = $this->input->post('nome');
        $dados['princ_ativo'] = $this->input->post('princ_ativo');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');

        //envio para o meu model
        $retorno = $this->medic_model->novoUsuario($dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output($retorno);
    }


    public function editarUsuario(){
        
        // Pego os dados enviados pelo $.post
        $id_med = $this->input->post('id_med');
        $dados['nome'] = $this->input->post('nome');
        $dados['princ_ativo'] = $this->input->post('princ_ativo');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');

        //envio para o meu model
        $retorno = $this->medic_model->editarUsuario($id_med, $dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output('true');
    }


    public function apagarUsuario($id_med){

        //envio para o meu model
        $data['retorno'] = $this->medic_model->apagarUsuario($id_med);

        //recarrego minha view
		$data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->medic_model->getUsersList();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('medicamentos');
		$this -> load -> view('includes/html_footer');
    }


    /* Verifica se o atual usuario tem permissão para acessar determinado recurso 
        para isso pego os dados sobre esse usuário da sessão
        e caso esses dados não atendam meus requisitos eu recuso o acesso dele
    */

}


