<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cli_model extends CI_Model {


    public function getUsersList(){
        // escolhe a tabela
        $this->db->from('clientes');

        // pega todos os registros
        $result = $this->db->get()->result();

        // coloca o resultado como saída (retorno) da função
        return $result;
    }

    public function novoUsuario($dados){
        /* tenta inserir $dados na tabela usuarios */
        if($this->db->insert('clientes', $dados)){
            return 'true'; // se der certo retorna true
        }else{
            return 'false'; // caso contrário retorna falso
        }
    }

    public function editarUsuario($id_cli, $dados){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_cli', $id_cli);

        /* tento fazer o update */
        if($this->db->update('clientes', $dados)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function apagarUsuario($id_cli){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_cli', $id_cli);

        /* tento fazer o update */
        if($this->db->delete('clientes')){
            return 'true';
        }else{
            return 'false';
        }
    }

}

