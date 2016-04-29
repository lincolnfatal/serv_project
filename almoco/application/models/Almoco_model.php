<?php

class Almoco_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        return $this->db->insert('almoco', $data);
    }
    
    function inserir_cardapio($data) {
        
        return $this->db->insert('cardapio', $data);
    }
    
    function inserir_cardapio_x_dia($data) {
        return $this->db->insert('cardapio_x_dia', $data);
    }
   

    function listar($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pessoas');
        $dados['pessoa'] = $query->result();
        
        
        
        $this->db->group_by(array("cardapio")); 
        $this->db->order_by('cardapio asc'); 
        $query = $this->db->get('cardapio');
        
        $dados['cardapio'] = $query->result();
        
        $query = $this->db->get('almoco');
        
        
        $this->db->select('al.*,car.cardapio');    
        $this->db->from('almoco as al');
        $this->db->join('cardapio as car', 'al.id_cardapio = car.id');
        $this->db->where('al.id_pessoa', $id);
        $this->db->where('al.semana', $this->session->userdata('semana'));
        $query = $this->db->get();
        $dados['almoco'] = $query->result();
        
        
        $query = $this->db->get('opcoes');
        $dados['opcoes'] = $query->result();
        
        
        return $dados;
    }
    
   

    function listar_cardapio() {
        
        $this->db->select('car.*,sem.dia_semana');    
        $this->db->from('cardapio as car');
        $this->db->join('cardapio_x_dia as card_dia', 'card_dia.id_cardapio = car.id');
        $this->db->join('semana as sem', 'sem.id = card_dia.id_dia');
        $this->db->group_by(array("sem.dia_semana", "car.cardapio")); 
        $this->db->where('car.excluido', 0); 
        $this->db->order_by('sem.id asc, car.cardapio asc'); 
                
        
        $query = $this->db->get();
        $dados['cardapio'] = $query->result();   
        
        $query = $this->db->get('semana');
        $dados['dia_semana'] = $query->result();  
      
         return $dados;
    }
    
    function buscar_cardapio_id($id) {
        
       
        $this->db->where('id', $id);             
       
       
        $this->db->from('cardapio');    
        
       
        return  $this->db->get();
    }
    
     
    
    function buscar_cardapio_nome($cardapio) {
        
       
        $this->db->where('cardapio', $cardapio);             
        $this->db->where('excluido','0');
       
        $this->db->from('cardapio');    
        
       
        return  $this->db->get();
    }

    function atualizar($data) {
       
       
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('almoco');
    }

    function deletar($dados) {
      
        $this->db->where($dados['campo'], $dados['id']);
        return $this->db->delete($dados['tabela']);
    }

    
    function buscar_dia_semana($id_dia) {
         
         //echo $this->input->post("email");
      
        $this->db->where('id_dia !=', $id_dia); 
            
     
       
        $this->db->from('dia_semana');
    
        
       
        return  $this->db->get();
    }
    
     function deletar_do_sistema($dados) {
        $data['excluido'] = 1;       
        $data['id_usuario_exclusao'] = $this->session->userdata("id_pessoa");
        $this->db->set('data_exclusao', 'NOW()', FALSE);
        $this->db->where($dados['campo'], $dados['id']);
        $this->db->set($data);
        return $this->db->update($dados['tabela']);      
       
    } 
    
    function buscar_cardapio($id_cardapio) {

        //echo $this->input->post("email");

        $this->db->where('id', $id_cardapio);


        $this->db->from('cardapio');


        $query = $this->db->get();
        return  $query->result();
    }
}

?>