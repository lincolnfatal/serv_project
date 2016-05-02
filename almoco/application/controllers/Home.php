<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        
        parent::__construct();
        /* Carrega o modelo */
        
        
        
    }

    function index() { 
        $data['titulo'] = "Almoço | Cadastro de Pessoas";
        
       
        //$this->load->view('menu',$data); 
        $this->load->view('menu2',$data);         
        $this->load->view('rodape', $data);
        
    }


}

?>