<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {
    //CONSTRUCTOR
    public function __construct(){
        parent::__construct();//CHAMA O CONSTRUTOR DA CLASSE PAI
        $this->load->helper('url');//CARREGA O HELPER
    }

    public function index(){
        //$this->load->helper('url'); CARREGA APENAS PARA A FUNÇÃO
        $dados  =   array(
            'titulo'    =>  'Crud com CodeIgniter',
            'tela'      =>  '',
        );
        $this->load->view('crud',$dados);
    }

    //TELAS
    public function create(){
        $dados  =   array(
            'tela'      =>  'nome_da_view'
        );
        $this->load->view('crud',$dados);
    }
}