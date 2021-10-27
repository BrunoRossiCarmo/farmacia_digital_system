<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispensacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('disp_model');
    }
	
    
	public function index(){
        /* Função temPermissão definida ao final desse arquivo */
        $data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->disp_model->getUsersList();
        $data['meds'] = $this->disp_model->getIDMed();
        $data['clis'] = $this->disp_model->getIDCli();
        $data['funs'] = $this->disp_model->getIDFun();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('dispensacao');
		$this -> load -> view('includes/html_footer');
		
	}


    public function novoUsuario(){
        
        // Pego os dados enviados pelo $.post
        $dados['date'] = $this->input->post('date');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');
        $dados['id_med'] = $this->input->post('id_med');
        $dados['id_cli'] = $this->input->post('id_cli');
        $dados['id_fun'] = $this->input->post('id_fun');

        //envio para o meu model
        $retorno = $this->disp_model->novoUsuario($dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output($retorno);
    }


    public function editarUsuario(){
        
        // Pego os dados enviados pelo $.post
        $id_dis = $this->input->post('id_dis');
        $dados['data'] = $this->input->post('data');
        $dados['quantidade'] = $this->input->post('quantidade');
        $dados['valor'] = $this->input->post('valor');
        $dados['id_med'] = $this->input->post('id_med');
        $dados['id_cli'] = $this->input->post('id_cli');
        $dados['id_fun'] = $this->input->post('id_fun');

        //envio para o meu model
        $retorno = $this->disp_model->editarUsuario($id_dis, $dados);

        //retorno pra minha view se está ok ou não.
        $this->output->set_output('true');
    }


    public function apagarUsuario($id_dis){

        //envio para o meu model
        $data['retorno'] = $this->disp_model->apagarUsuario($id_dis);

        //recarrego minha view
		$data['titulo'] = 'Farmácia Digital';
		$data['subtitulo'] = "FMA";
		$data['users'] = $this->disp_model->getUsersList();
        $data['meds'] = $this->disp_model->getIDMed();
        $data['clis'] = $this->disp_model->getIDCli();
        $data['funs'] = $this->disp_model->getIDFun();

		$this -> load -> view('includes/html_header',$data);
		$this -> load -> view('includes/html_navbar');
		$this -> load -> view('dispensacao');
		$this -> load -> view('includes/html_footer');
    }


    /* Verifica se o atual usuario tem permissão para acessar determinado recurso 
        para isso pego os dados sobre esse usuário da sessão
        e caso esses dados não atendam meus requisitos eu recuso o acesso dele
    */

}


