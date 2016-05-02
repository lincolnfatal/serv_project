<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends MY_Controller {

    function __construct() {
        
        parent::__construct();
        /* Carrega o modelo */
        
        if($this->session->userdata("id_perfil") != 1){
            redirect('almoco/index/'.$this->session->userdata("id_pessoa"));
        }
        $this->load->model('Pessoas_model', 'model', TRUE);
    }

    function index($modal_sn = 'N') {
        
      
        $data['controle_escolhida'] = 'pessoa_tela';
        $data['titulo'] = "Almoço | Cadastro de Pessoas";
        $data['dados'] = $this->model->listar();
        $data['modal_sn'] = $modal_sn;
        //$this->load->view('menu',$data); 
        $this->load->view('menu2',$data);  
        $this->load->view('pessoas', $data);
        $this->load->view('modal_cadastro_editar_pessoa', $data);
        $this->load->view('rodape', $data);
        
        
    }
    
     
    

    function inserir() {

       
        
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[10]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]|callback_email_existe_check');
        $this->form_validation->set_rules('id_perfil', 'id_perfil', 'required|callback_id_perfil_check');
        $this->form_validation->set_rules('senha', 'senha', 'required|required|matches[confirme]');      
        $this->form_validation->set_rules('confirme', 'confirme', 'required');
        
     
        
         //verificar se emial já existe, se sim exibi a msg
        $consulta = $this->model->buscar_pessoa($this->input->post('email'),$this->input->post('modal_id_pessoa'));          
        $this->session->set_userdata("counts_temp_pessoa", $consulta->num_rows());
        
        
        
         
        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE || $consulta->num_rows() > 0) {
           
            $this->index('S');           
            /* Senão, caso sucesso: */
        } else {           
            
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['senha'] = $this->input->post('senha');
            $data['id_perfil'] = $this->input->post('id_perfil');
            
            
            /* Chama a função inserir do modelo */
            if ($this->model->inserir($data)) {
                
                redirect('pessoas');
            } else {
                log_message('error', 'Erro ao inserir a pessoa.');
            }
        }
    }

    function editar($id) {
        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[10]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]|callback_email_existe_check');
        $this->form_validation->set_rules('id_perfil', 'id_perfil', 'required|callback_id_perfil_check');
        $this->form_validation->set_rules('senha', 'senha', 'required|required|matches[confirme]');      
        $this->form_validation->set_rules('confirme', 'confirme', 'required');
        
     
        
         //verificar se emial já existe, se sim exibi a msg
        $consulta = $this->model->buscar_pessoa($this->input->post('email'),$this->input->post('modal_id_pessoa'));          
        $this->session->set_userdata("counts_temp_pessoa", $consulta->num_rows());
        
        
        
         
        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE || $consulta->num_rows() > 0) {
           
            $this->index('S');           
            /* Senão, caso sucesso: */
        } else {           
            echo "sss".$this->input->post('modal_id_pessoa');;
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['senha'] = $this->input->post('senha');
            $data['id_perfil'] = $this->input->post('id_perfil');
            $data['id'] = $this->input->post('modal_id_pessoa');
            
            
            /* Chama a função inserir do modelo */
            if ($this->model->atualizar($data)) {                
                redirect('pessoas');
            } else {
                log_message('error', 'Erro ao editar a pessoa.');
            }
        }
        
        
        
        
        
    }

    function atualizar() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Aqui estou definindo as regras de validação do formulário, assim como 
          na função inserir do controlador, porém estou mudando a forma de escrita */
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required|max_length[40]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|max_length[100]'
            )
        );
        $this->form_validation->set_rules($validations);

        /* Executa a validação e caso houver erro chama a função editar do controlador novamente */
        if ($this->form_validation->run() === FALSE) {
            $this->editar($this->input->post('id'));
        } else {
            /* Senão obtém os dados do formulário */
            $data['id'] = $this->input->post('id');
            $data['nome'] = ucwords($this->input->post('nome'));
            $data['email'] = strtolower($this->input->post('email'));

            /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
            if ($this->model->atualizar($data)) {
                redirect('pessoas');
            } else {
                log_message('error', 'Erro ao atualizar a pessoa.');
            }
        }
    }

    function deletar($id) {

        
        
        /* Executa a função deletar do modelo passando como parâmetro o id da pessoa */
        if ($this->model->deletar_do_sistema($id)) {
            redirect('pessoas');
        } else {
            log_message('error', 'Erro ao deletar a pessoa.');
        }
    }
    
     public function id_perfil_check()
    {
            if ($this->input->post('id_perfil') === '0')  {
            $this->form_validation->set_message('id_perfil_check', 'Por favor, escolha o perfil.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
     public function email_existe_check()
    {          
        if( $this->session->userdata("counts_temp_pessoa") > 0){
            $this->session->unset_userdata('counts_temp_pessoa');
            $this->form_validation->set_message('email_existe_check', 'Emial cadastrado para outro usuário.');
            return FALSE;
        }else{
            return true;
        }
        
    }
    
    
   
    
    
    public function dados_pessoa(){
		
            //recebo o id_cliente da view para trazer os dados somente daquele cliente
            $email     = $this->input->post("email");
            $id_pessoa = $this->input->post("id_pessoa");
           

           $consulta = $this->model->buscar_pessoa($email,$id_pessoa);

            //antes de continuar, verifico se alguma informação foi retornada, para não dar erro.
            if ($consulta->num_rows() == 0) {
                    die("Cliente não encontrado");
            }

            //como eu vou retornar os dados para a view em formato jSon, aqui eu crio os índices para serem acessados dentro da função $.post()
            $array_clientes = array(

                    "id_pessoa" => $consulta->row()->id,
                    "nome" => $consulta->row()->nome,
                    "email" => $consulta->row()->email,
                    "senha" => $consulta->row()->senha,
                    "id_perfil"=> $consulta->row()->id_perfil
             
                    

            );

            /*
             * Após os índices criados para o formato jSon, dou um echo no jsonEcode da array acima.
             */
            echo json_encode($array_clientes);

    }
    
    public function dados_cardapio(){
		
            //recebo o id_cliente da view para trazer os dados somente daquele cliente
            $email     = $this->input->post("id_cardapio");
                   

           $consulta = $this->model->buscar_pessoa($email,$id_pessoa);

            //antes de continuar, verifico se alguma informação foi retornada, para não dar erro.
            if ($consulta->num_rows() == 0) {
                    die("Cliente não encontrado");
            }

            //como eu vou retornar os dados para a view em formato jSon, aqui eu crio os índices para serem acessados dentro da função $.post()
            $array_clientes = array(

                    "id_pessoa" => $consulta->row()->id,
                    "nome" => $consulta->row()->nome,
                    "email" => $consulta->row()->email,
                    "senha" => $consulta->row()->senha,
                    "id_perfil"=> $consulta->row()->id_perfil
             
                    

            );

            /*
             * Após os índices criados para o formato jSon, dou um echo no jsonEcode da array acima.
             */
            echo json_encode($array_clientes);

    }

}

