<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   
    function acessar($email,$senha) {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $query = $this->db->get('pessoas');
        $dados['acesso'] = $query->result();
        
        
        
        
        return $dados;
    }

}

?>