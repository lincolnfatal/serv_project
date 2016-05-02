<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Almoco extends MY_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
         
        $this->load->model('Almoco_model', 'model', TRUE);
    }

    
    
    
    function index() {    
   
        
        $this->load->helper('form');
        
        $data['controle_escolhida'] = 'almoco_tela';
        $data['titulo'] = "Almoço";
        $data['dados'] = $this->model->listar($this->session->userdata('id_pessoa'));
      
      
        
        $data['titulo'] = "Almoço | Cadastro de Almoço";
        
       
        //$this->load->view('menu',$data); 
        $this->load->view('menu2',$data);  
         $this->load->view('almoco.php', $data);
        $this->load->view('modal_almoco', $data);
        $this->load->view('rodape', $data);
        
    }
    
    
     function cardapio() {         
        
        
        $data['titulo'] = "Cardápio";
        $data['dados'] = $this->model->listar_cardapio(); 
        $data['controle_escolhida'] = 'almoco_tela';
        $data['titulo'] = "Almoço | Cardapio";
        //$this->load->view('menu',$data); 
        $this->load->view('menu2',$data);  
         $this->load->view('cardapio.php', $data);
        $this->load->view('modal_cardapio', $data);
        $this->load->view('rodape', $data);
        
    }

    function inserir() {
           
    
        
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');
        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
       $this->form_validation->set_rules('cardapio', 'cardapio', 'required|callback_cardapio_check');
       $this->form_validation->set_rules('dia_semana', '...', 'callback_accept_terms');
        //$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');

        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            /* Senão, caso sucesso: */
        } else {          
                     
            
             //gravar as opçoes
             $opcoes = implode(', ', $this->input->post('opcao'));
      
            /* Recebe os dados do formulário (visão) */
             foreach ($this->input->post('dia_semana') as $dia_semana):                 
                $data['id_pessoa'] = $this->session->userdata("id_pessoa");//$this->input->post('cardapio');
                $data['id_cardapio'] = $this->input->post('cardapio');
                $data['opcoes'] = $opcoes;//$this->input->post('email');
                $data['dia_semana'] = $dia_semana;
                $data['semana'] = $this->session->userdata('semana');
                $this->model->inserir($data);
            endforeach;
            
            
            redirect('almoco');
            /* Chama a função inserir do modelo */
            /*if ($this->model->inserir($data)) {
                $this->session->set_userdata('data_atual', $data_hoje);
                redirect('almoco');
            } else {
                log_message('error', 'Erro ao inserir a pessoa.');
            }*/
        }
    }
    
    
     function inserir_cardapio() {
           
    
        
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');
        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
       $this->form_validation->set_rules('cardapio', 'cardapio', 'required');
       $this->form_validation->set_rules('dia_semana', '...', 'callback_accept_terms');
        //$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');

        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE) {
           
            $this->cardapio();
            /* Senão, caso sucesso: */
        } else {  
            
                     
             //inserir na tabela cardapio
            $data['cardapio'] = $this->input->post('cardapio'); 
            $consulta = $this->model->buscar_cardapio_nome($data['cardapio']);
            if($consulta->num_rows() > 0){
                $id_cardapio = $consulta->row()->id; 
                
                $dados_delete['id'] = $id_cardapio;
                $dados_delete['campo'] = 'id_cardapio';
                $dados_delete['tabela'] = 'cardapio_x_dia';
                $this->model->deletar($dados_delete);  
            }else{
                $this->model->inserir_cardapio($data);
                $id_cardapio = $this->db->insert_id();
            }
            
           
            /* Recebe os dados do formulário (visão) */
             foreach ($this->input->post('dia_semana') as $dia_semana): 
                            
                 //inserir na tabela cardapio_x_dia  
                $data2['id_cardapio'] = $id_cardapio;
                $data2['id_dia'] = $dia_semana;//$this->input->post('email');                
                $this->model->inserir_cardapio_x_dia($data2);
                
                
            endforeach;
            
            
            redirect('almoco/cardapio');
            /* Chama a função inserir do modelo */
            /*if ($this->model->inserir($data)) {
                $this->session->set_userdata('data_atual', $data_hoje);
                redirect('almoco');
            } else {
                log_message('error', 'Erro ao inserir a pessoa.');
            }*/
        }
    }
    
    
    function editar($id) {   

        /* Aqui vamos definir o título da página de edição */
        $data['titulo'] = "Almoço | Editar Almoço";

        /* Busca os dados da pessoa que será editada */
        $data['dados'] = $this->model->editar($id);
      
        /* Carrega a página de edição com os dados da pessoa */
        $this->load->view('almoco_editar', $data);
    }

    function atualizar() {

    
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
         /* Define as regras para validação */
       
        
     

           //gravar as opçoes
             $opcoes = implode(', ', $this->input->post('opcao'));
      
            /* Recebe os dados do formulário (visão) */
                            
            $data['id'] = $this->input->post('id');//$this->input->post('cardapio');
            $data['id_cardapio'] = $this->input->post('cardapio');
            $data['opcoes'] = $opcoes;//$this->input->post('email');             
            
         

            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->model->atualizar($data)) {
                redirect('almoco');
            } else {
                log_message('error', 'Erro ao atualizar o almoço.');
            }
        
    }

    function deletar($id) {

        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        if ($this->model->deletar($id)) {
            redirect('almoco');
        } else {
            log_message('error', 'Erro ao deletar a pessoa.');
        }
    }
    
     public function cardapio_check()
    {
            if ($this->input->post('cardapio') === '0')  {
            $this->form_validation->set_message('cardapio_check', 'Por favor, escolha o seu cardápio.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    //verificar se dia da semana foi selecionado
    function accept_terms() {
        if (isset($_POST['dia_semana'])) return true;
            $this->form_validation->set_message('accept_terms', 'Por favor escolha o(s) dia(s) da semana.');
        return false;
    }
    
     public function dados_dia_semana(){
		
            //recebo o id_cliente da view para trazer os dados somente daquele cliente
           
            $id_dia = $this->input->post("id_dia");
           

           $consulta = $this->model->buscar_dia_semana($id_dia);

            //antes de continuar, verifico se alguma informação foi retornada, para não dar erro.
            if ($consulta->num_rows() == 0) {
                    die("Cliente não encontrado");
            }

            //como eu vou retornar os dados para a view em formato jSon, aqui eu crio os índices para serem acessados dentro da função $.post()
            $array_clientes = array(

                    "id" => $consulta->row()->id,
                    "cardapio" => $consulta->row()->cardapio
             
                    

            );

            /*
             * Após os índices criados para o formato jSon, dou um echo no jsonEcode da array acima.
             */
            echo json_encode($array_clientes);

    }
    
    function deletar_cardapio($id) {

        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        $dados['id'] = $id;
        $dados['id'] = $id;
        $dados['tabela'] = 'cardapio';
        if ($this->model->deletar($dados)) {
            redirect('almoco/cardapio');
        } else {
            log_message('error', 'Erro ao deletar a pessoa.');
        }
    }
    
     function buscar_cardapio($id_cardapio) {
         
         //echo $this->input->post("email");
      
        $this->db->where('id', $id_cardapio);             
      
       
        $this->db->from('cardapio');
    
        
       
        return  $this->db->get();
    }

}

?>