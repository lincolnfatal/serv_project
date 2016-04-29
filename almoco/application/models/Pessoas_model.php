<?php

class Pessoas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('pessoas', $data);
    }
     function buscar_pessoa($email,$id_pessoa = 0) {
         
         //echo $this->input->post("email");
      
        $this->db->where('email', $email);
        if($id_pessoa > 0){
           $this->db->where('id !=', $id_pessoa); 
            
        }
       
        $this->db->from('pessoas');
    
        
       
        return  $this->db->get();
    }
    
   

    function listar() {
       $this->db->select('pes.*,per.perfil');    
        $this->db->from('pessoas as pes');
        $this->db->join('perfil as per ', 'per.id = pes.id_perfil');
        $this->db->where('excluido', 0);
        $query = $this->db->get();
       
        $dados['pessoas'] = $query->result();
        
        $query = $this->db->get('perfil');
        $dados['perfil'] = $query->result();
        
        return $dados;
    }

    function editar($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pessoas');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('pessoas');
    }

    function deletar($dados) {
        $this->db->where($dados['campo'], $dados['id']);
        return $this->db->delete($dados['tabela']);
    }
     function deletar_do_sistema($id) {
        $data['excluido'] = 1;       
        $data['id_usuario_exclusao'] = $this->session->userdata("id_pessoa");
        $this->db->set('data_exclusao', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->set($data);
        return $this->db->update('pessoas');      
       
    }   

}

?>