<?php


$cont = 0;
if(isset($_POST['cardapio'])){    
 $caradapio =  $_POST['cardapio'];

}else{   
	
    $caradapio = '';
}

//ve os dias que já foram escolhidos na semana
$dias_semana_ja_escolhido = array();
foreach ($dados['cardapio'] as $almoco): 
   $dias_semana_ja_escolhido[] =  $almoco->dia_semana;
 $cont++;
endforeach;


/*print_r($dados);
exit();*/

$array_cardapio =  array();
$array_cardapio[0] = "Selecione o Cardápio";
 foreach ($dados['cardapio'] as $cardapio): 
   $array_cardapio[$cardapio->id ] = $cardapio->cardapio; 
   
 endforeach;
 if (isset($_POST['controller'])) {
    $controller = 'almoco/inserir_cardapio';
} else {

    $controller = 'almoco/inserir_cardapio';
}
 ?>

<!-- Bootstrap modal -->
<div class="modal fade" id="myModal" role="dialog">





    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cadastro Pessoa</h3>
            </div>
            <div class="modal-body form">
                <?php echo form_open($controller, 'id="form-pessoas"'); ?>


                
                
                
                <label for="nome">Dia:</label><br/>
                        <?php foreach ($dados['dia_semana'] as $dia): ?>
                           <?php echo  $dia->dia_semana;?>:<input type="checkbox" name="dia_semana[]" value="<?php echo  $dia->id;?>" <?php echo set_checkbox('dia_semana[]', 'Segunda'); ?> />
                
                        <?php endforeach; ?>
                        
                            
                      
                <div class="error"><?php echo form_error('dia_semana'); ?></div>
                
                <label for="cardapio">Cardápio:</label><br/>
                <input value="<?php echo $caradapio; ?>" name="cardapio" id="cardapio" type="text" class="form-control" placeholder="Cardápio" required autofocus name="cardapio">
                <div class="error"><?php echo form_error('cardapio'); ?></div>
                
                      
             

                <div class="modal-footer">
                    
                    <input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
