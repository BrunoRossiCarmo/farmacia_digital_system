<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disp_model extends CI_Model {


    public function getUsersList(){
        $this->db->from('dispensa_remedio');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getIDMed(){
        $this->db->from('medicamentos');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getIDCli(){
        $this->db->from('clientes');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getIDFun(){
        $this->db->from('funcionarios');
        $result = $this->db->get()->result();
        return $result;
    }

    public function novoUsuario($dados){
        /* tenta inserir $dados na tabela usuarios */
        if($this->db->insert('dispensa_remedio', $dados)){
            return 'true'; // se der certo retorna true
        }else{
            return 'false'; // caso contrário retorna falso
        }
    }

    public function editarUsuario($id_dis, $dados){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_dis', $id_dis);

        /* tento fazer o update */
        if($this->db->update('dispensa_remedio', $dados)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function apagarUsuario($id_dis){
        /* seleciono o registro que eu quero alterar */
        $this->db->where('id_dis', $id_dis);

        /* tento fazer o update */
        if($this->db->delete('dispensa_remedio')){
            return 'true';
        }else{
            return 'false';
        }
    }

}

