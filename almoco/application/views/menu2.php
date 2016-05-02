

<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('includes/js/jquery.forms/jquery.forms.js'); ?>"></script>
    <meta charset="UTF-8" />
      <style>
    	.container {
    		margin-top: 50px;
    	}
    </style>
    <script>
       

    	/*
    	 * Função que carrega após o DOM estiver carregado.
    	 * Como estou usando o ajaxForm no formulário, é aqui que eu o configuro.
    	 * Basicamente somente digo qual função será chamada quando os dados forem postados com sucesso.
    	 * Se o retorno for igual a 1, então somente recarrego a janela.
    	 */
    
    
    	//Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
    	var base_url = "<?php echo base_url(); ?>";
    	
	    /*
	     *	Esta função serve para preencher os campos do cliente na janela flutuante
	     * usando jSon.  
	     */
    	function carregaDadosPessoaJSon(email){
                $('.error').html('');                
    		$.post(base_url+'index.php/pessoas/dados_pessoa', {
    			email: email
    		}, function (data){
                   

                    $('select#id_perfil').find('option').each(function() {

                        if($(this).val() == data.id_perfil){
                            $('#id_perfil option[value="'+data.id_perfil+'"]').attr({ selected : "selected" });
                        }else{
                            $('#id_perfil option[value="'+$(this).val()+'"]').removeAttr("selected");
                        }
                    });
                    
                    $("#form-pessoas").attr("action",base_url+"index.php/pessoas/editar/"+data.id_pessoa);
                    
                    $('#myModal').modal('show');
                    $('#modal_nome').val(data.nome);
                    $('#modal_email').val(data.email);
                    $('#modal_senha').val(data.senha);
                    $('#modal_confirme').val(data.senha);
                    $('#modal_id_pessoa').val(data.id_pessoa);
                    $('#perfil_div').html(data.perfil);
                   // $('#id_perfil option[value=2]').attr({ selected : "selected" });
                      
    			
    		}, 'json');
    	}
        
        
        function carregaDadosCardapioJSon(id_cardapio){
                $('.error').html('');                
    		$.post(base_url+'index.php/almoco/buscar_cardapio', {
    			email: email
    		}, function (data){     
                    $('#myModal').modal('show');
                    $('#modal_cardapio').val('ss');
                    
                   // $('#id_perfil option[value=2]').attr({ selected : "selected" });
                      
    			
    		}, 'json');
    	}
        
        function carregaDadosMsg(id){
                $('.error').html('');                
    		$.post(base_url+'index.php/almoco/dados_cardapio', {
    			id: id
    		}, function (data){ 
               /* $("#form-pessoas").attr("action",base_url+"index.php/pessoas/editar/"+data.id_pessoa);
                var valor = base_url+'/application/views/tela_auxiliar/';*/
                    $('#myModalMsg').modal('show');
                    $('#msg_id').html(data.dia);
                    
                   // $('#id_perfil option[value=2]').attr({ selected : "selected" });
                      
    			
    		}, 'json');
    	}
        
        function novoCadastroPessoa(){
            $('#myModal').modal('show');
            $('.error').html('');
            $('#modal_nome').val('');
            $('#modal_email').val('');
            $('#modal_senha').val('');
            $('#modal_confirme').val('');
            $('#modal_id_pessoa').val('');
            
            
        }
        
        
        function novoCadastroAlmoco(){
            $('#myModal').modal('show');
            $('.error').html('');
            /*$('#modal_nome').val('');
            $('#modal_email').val('');
            $('#modal_senha').val('');
            $('#modal_confirme').val('');
            $('#modal_id_pessoa').val('');*/
            
        }
        
        
        function novoCadastroAlmoco(){
            $('#myModal').modal('show');
            $('.error').html('');
            /*$('#modal_nome').val('');
            $('#modal_email').val('');
            $('#modal_senha').val('');
            $('#modal_confirme').val('');
            $('#modal_id_pessoa').val('');*/
            
        }
        
        function listarSemana(id_cardapio){
            $.post(base_url+'index.php/pessoas/dados_pessoa', {
    			id_cardapio: id_cardapio
    		}, function (data){
                    
                    $("#form-pessoas").attr("action",base_url+"index.php/pessoas/editar/"+data.id_pessoa);
                    $('#myModal').modal('show');
                    $('#modal_nome').val(data.nome);
                    $('#modal_email').val(data.email);
                    $('#modal_senha').val(data.senha);
                    $('#modal_confirme').val(data.senha);
                    $('#modal_id_pessoa').val(data.id_pessoa);
                   // $('#id_perfil option[value=2]').attr({ selected : "selected" });
                      
    			
    		}, 'json');
            
        }
         <?php  
         if(isset($controle_escolhida)){?>
             
           $(document).ready(function() {
             $('#<?php echo $controle_escolhida; ?>').attr("class","active");
        }); 
        <?php 
        
        }?>
    	
    
        
         
    </script>
   
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	.container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
       <?php if($this->session->userdata("id_perfil") == 1){?>
       <!--class="active" --> <li id='pessoa_tela'  ><a href="<?php echo base_url('index.php/pessoas'); ?>">Usuário</a></li>
       <?php } ?>
      <li class="dropdown" id='almoco_tela'>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Almoço
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            
                <li ><a href="<?php echo base_url('index.php/almoco/cardapio'); ?>">Cadápio</a></li>
            <?php if($this->session->userdata("id_perfil") == 1){?>
                <li><a href="#">Opção</a></li>
                <li><a href="#">Lista de almoço</a></li>
            <?php }?>
           <li><a href="<?php echo base_url('index.php/almoco'); ?>">Listar Seu Almoço</a></li>
          
          
        </ul>
      </li>
      <!--li class="active"><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li -->
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url('index.php/login/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      
    </ul>
  </div>
</nav>
    
    
 