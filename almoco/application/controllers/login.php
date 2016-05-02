<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login');
	}
        
        function __construct() {
            parent::__construct();
            /* Carrega o modelo */
            $this->load->model('Login_model', 'model', TRUE);
         }
	
	public function logar(){
		
		$usuario = $this->input->post("usuario");
		//$senha = sha1($this->input->post("senha"));
                
		$senha = $this->input->post("senha");
                $dados = $this->model->acessar($usuario,$senha);
                    
        
                       
		//Código sha1  da senha 123456 7c4a8d09ca3762af61e59520943dc26494f8941b
		//O usuário no exemplo aqui será usuario@email.com.br
		//Mas em um projeto real, você trará isto do banco de dados.
		
		//Se o usuário e senha combinarem, então basta eu redirecionar para a url base, pois agora o usuário irá passa
		//pela verificação que checa se ele está logado.
		if (isset($dados['acesso'][0]->id) ) {
			$this->session->set_userdata("logado", 1);
                        $this->session->set_userdata("pessoa", $dados['acesso'][0]->nome);
                        $this->session->set_userdata("id_pessoa", $dados['acesso'][0]->id);
                        $this->session->set_userdata("id_perfil", $dados['acesso'][0]->id_perfil);
                        //if($dados['acesso'][0]->id_perfil == 1){
                            redirect('home');
                            
                          
                            
                       /* }else{echo 2;
                            redirect('almoco/index/'.$dados['acesso'][0]->id);
                            
                        }*/
		} else {
			//caso a senha/usuário estejam incorretos, então mando o usuário novamente para a tela de login com uma mensagem de erro.
			$dados['erro'] = "Usuário/Senha incorretos";
			$this->load->view("v_login", $dados);
		}
	}
	/*
	 * Aqui eu destruo a variável logado na sessão e redireciono para a url base. Como esta variável não existe mais, o usuário
	 * será direcionado novamente para a tela de login.
	 */
	public function logout(){
		$this->session->unset_userdata("logado");
		redirect('login');
		
	}
	
}
