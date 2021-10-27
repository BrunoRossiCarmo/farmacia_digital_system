<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medic_model extends CI_Model {


    public function getUsersList(){
        // escolhe a tabela
        $this->db->from('medicamentos');

        // pega todos os registros
        $result = $this->db->get()->result();

        // coloca o resultado como saída (retorno) da função
        return $result;
    }

    public function novoUsuario($dados){
        /* tenta inserir $dados na tabela usuarios */
        if($this->db->insert('medicamentos', $dados)){
            return 'true'; // se der certo retorna true
        }else{
            return 'false'; // caso contrário retorna falso
        }
    }

    public function editarUsuario($id_med, $dados){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_med', $id_med);

        /* tento fazer o update */
        if($this->db->update('medicamentos', $dados)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function apagarUsuario($id_med){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_med', $id_med);

        /* tento fazer o update */
        if($this->db->delete('medicamentos')){
            return 'true';
        }else{
            return 'false';
        }
    }

}

