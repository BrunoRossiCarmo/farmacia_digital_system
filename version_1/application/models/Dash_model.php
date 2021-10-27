<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_model extends CI_Model {


    public function getUsersList(){
        // escolhe a tabela
        $this->db->from('login');

        // pega todos os registros
        $result = $this->db->get()->result();

        // coloca o resultado como saída (retorno) da função
        return $result;
    }

    public function novoUsuario($dados){
        /* tenta inserir $dados na tabela usuarios */
        if($this->db->insert('login', $dados)){
            return 'true'; // se der certo retorna true
        }else{
            return 'false'; // caso contrário retorna falso
        }
    }

    public function editarUsuario($id, $dados){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id', $id);

        /* tento fazer o update */
        if($this->db->update('login', $dados)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function apagarUsuario($id){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id', $id);

        /* tento fazer o update */
        if($this->db->delete('login')){
            return 'true';
        }else{
            return 'false';
        }
    }

}

