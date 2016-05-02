<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

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
<?php







$array_cardapio =  array();

 foreach ($dados['cardapio'] as $cardapio): 
   $array_cardapio[$cardapio->id ] = $cardapio->cardapio; 
   
 endforeach;

//print_r($dados['cardapio'][0]->cardapio);exit();
?>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
    </head>
    <body>
         
    
          
                <?php echo form_open('almoco/atualizar', 'id="form-almoco"'); ?>   


           
            
          
    <?php echo form_error('accept_terms') ?>


            <div class="container" align='center'>
                <h1>Cardápio</h1>
                 <div class="error"><?php echo form_error('cardapio'); ?></div>
            <?php     
                echo form_dropdown('cardapio', $array_cardapio, $dados['almoco'][0]->id_cardapio);
           ?>
            </div>

            <div class="container" align='center'>
                 
                 <div class="container" ><h1>Dia:</h1>
                    <?php echo $dados['almoco'][0]->dia_semana;?>
                </div>
                
            </div>
            
            <div>
                <div class="container" align='center'>
                    <h1>Opções</h1>
                  
                    <?php 
                        $dados_opcoes_temp = str_replace(' ','',$dados['almoco'][0]->opcoes);
                     
                        $opcoes_temp =  explode(',',$dados_opcoes_temp);
                      
                        foreach ($dados['opcoes'] as $opcoes): 
                           
                            if(in_array($opcoes->opcao,$opcoes_temp)){                                    
                                    $checked = "checked='checked'";
                            }else{
                                $checked = "";                                         
                            }   
                         
                          echo '<span>'.$opcoes->opcao.':<input '.$checked.'   type="checkbox" name="opcao[]" value="'.$opcoes->opcao.'"  /></span> ';

                        endforeach;
                    ?>   
                </div>
            
            </div>
            <div class="container" align='center'>
                <input type="hidden" name="id" value="<?php echo $dados['almoco'][0]->id; ?>" />
                 <input type="submit" name="cadastrar" value="Cadastrar" />
            </div>
            <?php echo form_close(); ?>
     
      

        
    </body>
</html>
