<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fun_model');
    }
	
    
	public function index(){
        /* Função temPermissão definida ao final desse arquivo */
        $data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->fun_model->getUsersList();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('funcionarios');
		$this -> load -> view('includes/html_footer');
		
	}


    public function novoUsuario(){
        
        // Pego os dados enviados pelo $.post
        $dados['nome'] = $this->input->post('nome');
        $dados['cpf'] = $this->input->post('cpf');
        $dados['telefone'] = $this->input->post('telefone');
        $dados['ativo'] = $this->input->post('ativo');
        $dados['funcao'] = $this->input->post('funcao');

        //envio para o meu model
        $retorno = $this->fun_model->novoUsuario($dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output($retorno);
    }


    public function editarUsuario(){
        
        // Pego os dados enviados pelo $.post
        $id_fun = $this->input->post('id_fun');
        $dados['nome'] = $this->input->post('nome');
        $dados['cpf'] = $this->input->post('cpf');
        $dados['telefone'] = $this->input->post('telefone');
        $dados['ativo'] = $this->input->post('ativo');
        $dados['funcao'] = $this->input->post('funcao');

        //envio para o meu model
        $retorno = $this->fun_model->editarUsuario($id_fun, $dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output('true');
    }


    public function apagarUsuario($id_fun){

        //envio para o meu model
        $data['retorno'] = $this->fun_model->apagarUsuario($id_fun);

        //recarrego minha view
		$data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->fun_model->getUsersList();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('funcionarios');
		$this -> load -> view('includes/html_footer');
    }


    /* Verifica se o atual usuario tem permissão para acessar determinado recurso 
        para isso pego os dados sobre esse usuário da sessão
        e caso esses dados não atendam meus requisitos eu recuso o acesso dele
    */

}


